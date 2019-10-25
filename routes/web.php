<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { return view('welcome'); });

Route::get('/no-access-forbidden', function () { return view('error-403'); });

Auth::routes();

Route::group(['middleware' => 'auth'], function () 
{
    // HOME - DONE
    Route::get('/home', 'HomeController@index')->name('home');

    //ARTICLES - DONE
    Route::get('articles/create', 'ArticleController@create')->name('articles.create')->middleware('psikolog');
    Route::post('articles/store', 'ArticleController@store')->name('articles.store')->middleware('psikolog');
    Route::get('articles/list', 'ArticleController@index')->name('articles.list');
    Route::get('articles/trashed', 'ArticleController@trashed')->name('articles.trashed')->middleware('admin');
    Route::get('articles/remove/{id}', 'ArticleController@remove')->name('articles.remove')->middleware('admin');
    Route::get('articles/restore/{id}', 'ArticleController@restore')->name('articles.restore')->middleware('admin');
    Route::get('articles/approve/{id}', 'ArticleController@approve')->name('articles.approve')->middleware('admin');
    Route::get('articles/edit/{id}', 'ArticleController@edit')->name('articles.edit');
    Route::post('articles/update/{id}', 'ArticleController@update')->name('articles.update');
    Route::get('articles/read/{slug}', 'ArticleController@detail')->name('articles.read');
    Route::post('articles/favorite/{id}', 'ArticleController@favorite')->name('articles.favorite');
    Route::get('articles/list/my-favorite', 'ArticleController@userFavorite')->name('articles.list-fav');
    Route::get('articles/subscribe', 'ArticleController@subscribe')->name('articles.subscribe');

    // CATEGORIES - DONE
    Route::get('articles/categories/list', 'CategoriesController@index')->name('categories.list')->middleware('admin');
    Route::get('articles/categories/delete/{id}', 'CategoriesController@delete')->name('categories.delete')->middleware('admin');
    Route::get('articles/categories/create', 'CategoriesController@create')->name('categories.create')->middleware('admin');
    Route::post('articles/categories/store', 'CategoriesController@store')->name('categories.store')->middleware('admin');
    Route::get('articles/categories/edit/{id}', 'CategoriesController@edit')->name('categories.edit')->middleware('admin');
    Route::post('articles/categories/update/{id}', 'CategoriesController@update')->name('categories.update')->middleware('admin');

    // USER MANAGEMENTS - DONE
    Route::get('user-management/list', 'UserController@index')->name('user.list')->middleware('admin');
    Route::get('user-management/list/psikolog', 'PsikologController@index')->name('psikolog.list')->middleware('admin');
    Route::get('user-management/ban/{id}', 'UserController@ban')->name('user.ban')->middleware('admin');
    Route::get('user-management/unban/{id}', 'UserController@unban')->name('user.unban')->middleware('admin');
    Route::get('user-management/add-user', 'UserController@create')->name('user.create')->middleware('admin');
    Route::post('user-management/store', 'UserController@store')->name('user.store')->middleware('admin');
    Route::get('user-management/edit-user/{id}', 'UserController@edit')->name('user.edit')->middleware('admin');
    Route::post('user-management/update/{id}', 'UserController@update')->name('user.update')->middleware('admin');
    Route::get('user-management/premium/{id}', 'UserController@premium')->name('user.premium')->middleware('admin');
    Route::get('user-management/read-reset', 'UserController@readReset')->name('user.read-reset')->middleware('admin');
    Route::get('user-management/point-reset/{id}', 'UserController@pointReset')->name('user.point-reset')->middleware('admin');
    Route::get('my-profile', 'UserController@editProfile')->name('profile.edit');
    Route::post('my-profile/update', 'UserController@updateProfile')->name('profile.update');

    // FEEDBACKS - DONE
    Route::get('feedback-management/list', 'FeedbackController@index')->name('feedback.list')->middleware('admin');
    Route::get('feedback-management/finished/{id}', 'FeedbackController@finished')->name('feedback.finished')->middleware('admin');
    Route::get('feedback-management/unfinished/{id}', 'FeedbackController@unfinished')->name('feedback.unfinished')->middleware('admin');
    Route::get('feedback/create', 'FeedbackController@create')->name('feedback.create');
    Route::post('feedback/store', 'FeedbackController@store')->name('feedback.store');

    // FORUMS - DONE
    Route::get('forums/create', 'ForumController@create')->name('forum.create');
    Route::post('forums/store', 'ForumController@store')->name('forum.store');
    Route::get('forums/list', 'ForumController@index')->name('forum.list');
    Route::get('forums/detail/{id}', 'ForumController@detail')->name('forum.detail');
    Route::get('forums/open/{id}', 'ForumController@open')->name('forum.open')->middleware('admin');
    Route::get('forums/close/{id}', 'ForumController@close')->name('forum.close')->middleware('admin');
    Route::get('forums/edit/{id}', 'ForumController@edit')->name('forum.edit');
    Route::post('forums/update/{id}', 'ForumController@update')->name('forum.update');
    Route::get('forums/show/{id}', 'ForumController@show')->name('forum.show')->middleware('admin');
    Route::get('forums/hide/{id}', 'ForumController@hide')->name('forum.hide')->middleware('admin');

    // COMMENTS - DONE
    Route::get('report-logs', 'ForumCommentsController@reportIndex')->name('report.index')->middleware('admin');
    Route::post('forums/{id}/comments/store', 'ForumCommentsController@store')->name('comments.store');
    Route::post('forums/{fid}/comments/{cid}/report', 'ForumCommentsController@report')->name('report.store');
    Route::get('report-logs/open/{id}', 'ForumCommentsController@open')->name('comments.open')->middleware('admin');
    Route::get('report-logs/close/{id}', 'ForumCommentsController@close')->name('comments.close')->middleware('admin');

    // PSIKOLOG
    Route::get('user-management/list/psikolog', 'PsikologController@index')->name('psikolog.list')->middleware('admin');
    Route::get('my-activity-log', 'PsikologController@activity')->name('psikolog.activity')->middleware('psikolog');
    Route::get('psikolog-activity-log', 'PsikologController@allActivity')->name('psikolog.allActivity')->middleware('admin');
    Route::post('claim-points', 'PsikologController@claim')->name('psikolog.claim')->middleware('psikolog');
    Route::post('top-up-points', 'PsikologController@topUp')->name('psikolog.topUp')->middleware('admin');
});