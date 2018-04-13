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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::namespace('Admin')->prefix('admin')->group(function (){
    $this->get('/' , 'PanelController@index')->middleware('auth');
    $this->resource('Article' , 'ArticleController')->middleware('auth');
    $this->resource('Course' , 'CourseController')->middleware('auth');
    $this->resource('Episode' , 'EpisodeController')->middleware('auth');
    $this->get('/Article/{article}/comments' , 'ArticleController@comments')->name('ArticleComments.show');
});
