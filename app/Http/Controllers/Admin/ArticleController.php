<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest()->paginate(15);
        return view('Admin.articles.all' , compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ArticleRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        auth()->loginUsingId(170);
        $file = $request->file('images');
        $imageUrl = $this->uploadImages($file);
        auth()->user()->article()->create(array_merge($request->all() , ['images' => $imageUrl]));
        return redirect(route('Article.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($article)
    {
        $articles = Article::where('id' , "=" ,$article)->first();
        return view('Admin.articles.edit' , compact('articles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $article)
    {
        $title = $request->input('title');
        $description = $request->input('description');
        $body = $request->input('body');
        $tags = $request->input('tags');
        Article::where('id' , $article)->update(['title'=>$title , 'description'=>$description , 'body'=>$body , 'tags'=>$tags]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($article)
    {
        Article::destroy($article);
        return back();
    }
}
