<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Article;
use App\Feedback;
use App\Forum;
use Carbon\Carbon;
use App\ForumComments as Comment;
use App\ReportLog as Log;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // KESELURUHAN DATA
        $article_total = Article::all()->count();
        $forum_total = Forum::all()->count();
        $feedback_total = Feedback::all()->count();
        $user_total = User::all()->count();
        $log_total = Log::all()->count();

        // DATA DIPROSES
        $unapproved_article = Article::where('status', 'Unapproved')->get()->count();
        if($article_total != 0) {
            $new_article = number_format(($unapproved_article / $article_total * 100));
        }else{
            $new_article = 0;
        }
        
        $closed_forum = Forum::where('is_closed', 1)->get()->count();
        if($forum_total != 0) {
            $forum_percent = number_format(($closed_forum / $forum_total * 100));
        }else{
            $forum_percent = 0;
        }

        $unfinished_feedback = Feedback::where('is_finished', 0)->get()->count();
        if($feedback_total != 0) {
            $feedback_percent = number_format(($unfinished_feedback / $feedback_total * 100));
        }else{
            $feedback_percent = 0;
        }

        $blocked_user = User::where('is_banned', 1)->get()->count();
        if($user_total != 0) {
            $blocked_percent = number_format(($blocked_user / $user_total * 100));
        }else{
            $blocked_percent = 0;
        }
        
        $closed_comment = Comment::where('abuse', 1)->get()->count();
        if($log_total != 0) {
            $log_percent = number_format(($closed_comment / $log_total * 100));
        }else{
            $log_percent = 0;
        }

        // GET ALL USERS
        $all_users = User::all();
        $sub = 0;

        // INCREMENT SUB IF MEMBERSHIP ACTIVE
        foreach($all_users as $u) {
            if(count($u->memberships)) {
                if($u->memberships->last()->expired > Carbon::now()) {
                    $sub += 1;
                }
            }
        }

        return view('home', compact(
        [
            'article_total',
            'forum_total',
            'feedback_total',
            'user_total',
            'log_total',
            'new_article',
            'unapproved_article',
            'closed_forum',
            'forum_percent',
            'unfinished_feedback',
            'feedback_percent',
            'blocked_user',
            'blocked_percent',
            'closed_comment',
            'log_percent',
            'sub'
        ]));
    }
}
