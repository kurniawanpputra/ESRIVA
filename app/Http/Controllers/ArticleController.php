<?php

namespace App\Http\Controllers;

use Image;
use App\Article;
use App\Activity;
use App\User;
use App\Favorite;
use App\Category;
use Carbon\Carbon;
use App\Notifications\ArticleApproved;
use App\Notifications\ArticleRejected;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index() {
        $categories = Category::all();

        $articles = new Article();

        $articles = $articles->where('deleted_at', NULL);

        if(auth()->user()->roles == 1) {
            $articles = $articles->where('status', "Approved");
        }

        if(!empty(request()->kategori)) {
            $articles = $articles->where('category_id', request()->kategori);
        }

        if(!empty(request()->judul != '')) {
            $articles = $articles->where('title', 'LIKE', '%'.request()->judul.'%');
        }

        $articles = $articles->get();
        
        return view('admin.articles.article-list', compact('articles', 'categories'));
    }

    public function userFavorite() {
        if(auth()->user()->roles != 1) {
            session()->flash('error', 'Admin dan Psikolog tidak bisa memfavorit artikel!');
            return redirect()->back();
        }

        $favs = Favorite::where('user_id', auth()->user()->id)
                        ->get();

        $articles = [];

        foreach($favs as $f) {
            $article = Article::find($f->article_id);

            if($f->value == 1) {
                $articles[] = $article;
            }
        }

        return view('admin.articles.article-fav', compact('articles'));
    }

    public function create() {
        $categories = Category::all();

        return view('admin.articles.add-article', compact('categories'));
    }

    public function store() {
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required',
            'category' => 'required',
            'image'  => 'required|dimensions:ratio=5/3|mimes:jpeg,png|image'
        ], [
            'title.required' => 'Judul harus diisi!',
            'body.required' => 'Konten harus diisi!',
            'category.required' => 'Kategori harus diisi!',
            'image.required' => 'Artikel harus memiliki gambar!',
            'image.image' => 'File harus berupa foto!',
            'image.mimes' => 'Format foto harus PNG, JPEG atau JPG!',
            'image.dimensions' => 'Rasio gambar artikel harus 5:3!'
        ]);

        $article = new Article();

        $article->title = request()->title;

        $lower = strtolower(request()->title);
        $the_slug = str_replace(" ", "-", $lower);
        $date = Carbon::now()->format('d-m-Y');
        $full_slug = $the_slug."-".$date;

        $article->body = request()->body;
        $article->status = "Unapproved";
        $article->category_id = request()->category;
        $article->user_id = auth()->user()->id;
        $article->slug = $full_slug;

        $req_img = request()->image;
        $img = Image::make($req_img);

        $time = date('Y-m-d-h-i-s');
        $format = $req_img->getClientOriginalExtension();

        $img->resize(500, 300, function ($constraint) {
            $constraint->aspectRatio();
        });

        // CHECK IF DIRECTORY EXIST
        if (!file_exists('uploads\articles')) {
            mkdir('uploads\articles', 666, true);
        }

        $img->save(public_path('uploads\articles\\'.$time.'_'.'article'.".".$format));
        $name = 'uploads/articles/'.$time.'_'.'article'.".".$format;

        $article->image = $name;

        $article->save();

        // ADD LOG
        $activity = new Activity();

        $activity->user_id = auth()->user()->id;
        $activity->activity = "Membuat artikel";
        $activity->notes = "Poin +25";

        $activity->save();

        session()->flash('success', 'Artikel sukses ditambahkan!');

        return redirect()->route('articles.list');
    }

    public function edit($id) {
        $article = Article::find($id);

        $categories = Category::all();

        if(auth()->user()->id != $article->user_id) {
            if(auth()->user()->roles == 3) {
                return view('admin.articles.edit-article', compact('article', 'categories'));
            }
            
            session()->flash('error', 'Tidak bisa mengubah artikel pengguna lain!');
            return redirect()->back();
        }

        return view('admin.articles.edit-article', compact('article', 'categories'));
    }

    public function update($id) {
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required',
            'category' => 'required'
        ], [
            'title.required' => 'Judul harus diisi!',
            'body.required' => 'Konten harus diisi!',
            'category.required' => 'Kategori harus diisi!'
        ]);

        $article = Article::find($id);

        $article->title = request()->title;

        $lower = strtolower(request()->title);
        $the_slug = str_replace(" ", "-", $lower);
        $date = Carbon::now()->format('d-m-Y');
        $full_slug = $the_slug."-".$date;

        $article->body = request()->body;
        $article->status = "Unapproved";
        $article->category_id = request()->category;
        $article->user_id = auth()->user()->id;
        $article->slug = $full_slug;

        $article->save();

        session()->flash('success', 'Artikel sukses diubah!');

        return redirect()->route('articles.list');
    }

    public function detail($slug) {
        $user = auth()->user();

        if($user->roles == 1) {
            if(count($user->memberships) > 0) {
                if($user->memberships->last()->expired < Carbon::now()) {
                    if($user->article_read >= 6) {
                        session()->flash('error', 'Silahkan berlangganan untuk membaca artikel tanpa batas!');
                        return redirect()->route('home');
                    }
                }
            }else{
                if($user->article_read >= 6) {
                    session()->flash('error', 'Silahkan berlangganan untuk membaca artikel tanpa batas!');
                    return redirect()->route('home');
                }
            }
        }

        $pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';

        if($pageWasRefreshed) {
            // DO NOTHING
        } else {
            $user->article_read += 1;

            $user->save();  
        }     

        $article = Article::where('slug', $slug)->first();

        $views = $article->views;
        $article->views = $views + 1;

        $article->save();

        return view('admin.articles.view-article', compact('article'));
    }

    public function trashed() {
        $articles = Article::where('deleted_at', '!=', NULL)->get();
        
        return view('admin.articles.trashed-article', compact('articles'));
    }

    public function remove($id) {
        $article = Article::find($id);

        if($article->status == "Removed") {
            session()->flash('error', 'Artikel sudah dihapus!');

            return redirect()->route('articles.list');
        }

        $article->status = "Removed";
        $article->deleted_at = Carbon::now();

        $article->save();

        $article->user->notify(new ArticleRejected($article));

        session()->flash('success', 'Artikel sukses dihapus!');

        return redirect()->route('articles.list');
    }

    public function restore($id) {
        $article = Article::find($id);

        if($article->deleted_at == NULL) {
            session()->flash('error', 'Artikel sudah dikembalikan!');

            return redirect()->route('articles.trashed');
        }

        $article->status = "Unapproved";
        $article->deleted_at = NULL;
        
        $article->save();

        session()->flash('success', 'Artikel sukses dikembalikan!');

        return redirect()->route('articles.trashed');
    }

    public function approve($id) {
        $article = Article::find($id);

        if($article->status == "Approved") {
            session()->flash('error', 'Artikel sudah disetujui!');

            return redirect()->route('articles.list');
        }

        $article->status = "Approved";

        $article->save();

        $article->user->notify(new ArticleApproved($article));

        $article->user->points += 25;
        $article->user->save();

        session()->flash('success', 'Artikel sukses disetujui!');

        return redirect()->route('articles.list');
    }

    public function favorite($id) {
        if(auth()->user()->roles != 1) {
            session()->flash('success', 'Admin dan Psikolog tidak bisa memfavorit artikel!');

            return redirect()->route('articles.list');
        }

        $exist = Favorite::where('user_id', auth()->user()->id)
                         ->where('article_id', $id)
                         ->first();

        if(!$exist) {
            $favorite = new Favorite();

            $favorite->user_id = auth()->user()->id;
            $favorite->article_id = $id;
            $favorite->value = 1;

            $favorite->save();

            session()->flash('success', 'Artikel sukses ditambahkan ke favorit!');
        }else{
            if($exist->value == 1) {
                $exist->value = 0;

                $exist->save();

                session()->flash('success', 'Artikel sukses dihapus dari favorit!');
            }else{
                $exist->value = 1;

                $exist->save();

                session()->flash('success', 'Artikel sukses ditambahkan ke favorit!');
            }
        }

        return redirect()->route('articles.list-fav');
    }

    public function subscribe() {
        if(auth()->user()->roles != 1) {
            session()->flash('success', 'Hanya pengguna biasa yang dapat berlangganan!');

            return redirect()->route('home');
        }

        return view('admin.articles.membership');
    }
}
