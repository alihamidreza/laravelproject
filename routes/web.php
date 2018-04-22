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
    $this->get('/' , 'PanelController@index');
    $this->resource('Article' , 'ArticleController');
    $this->resource('Course' , 'CourseController');
    $this->resource('Episode' , 'EpisodeController');
    $this->get('/Article/{article}/comments' , 'ArticleController@comments')->name('ArticleComments.show');

    $this->resource('roles' , 'RoleController');
    $this->resource('permissions' , 'PermissionController');


    $this->group(['prefix' => 'users'] , function (){
        $this->get('/' , 'UserController@index');
    });
});
