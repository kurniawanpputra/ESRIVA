<?php

namespace App\Http\Controllers;

use App\Category;
use App\Article;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index() {
        $categories = Category::all();

        return view('admin.categories.categories-list', compact('categories'));
    }

    public function edit($id) {
        $category = Category::find($id);

        return view('admin.categories.category-edit', compact('category'));
    }

    public function update($id) {
        $this->validate(request(), [
            'title' => 'required'
        ],
        [
            'title.required' => 'Nama kategori tidak boleh kosong!'
        ]);

        $category = Category::find($id);

        $category->title = request()->title;
        
        $category->save();

        session()->flash('success', 'Ketgori sukses diupdate!');
        return redirect()->route('categories.list');
    }

    public function create() {
        return view('admin.categories.category-add');
    }

    public function store() {
        $this->validate(request(), [
            'title' => 'required'
        ],
        [
            'title.required' => 'Nama kategori tidak boleh kosong!'
        ]);

        $category = new Category();

        $category->title = request()->title;

        $category->save();

        session()->flash('success', 'Ketgori sukses ditambahkan!');
        return redirect()->route('categories.list');
    }

    public function delete($id) {
        $category = Category::find($id);

        $exist = Article::where('category_id', $category->id)->get();

        if($exist->count() > 0) {
            session()->flash('error', 'Ketgori terpakai, tidak bisa dihapus!');

            return redirect()->route('categories.list');
        }

        $category->delete();

        session()->flash('success', 'Ketgori sukses dihapus!');
        return redirect()->route('categories.list');
    }
}
