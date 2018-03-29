<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Http\Requests\CourseRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::latest()->paginate(15);
        return view('Admin.courses.all' , compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        auth()->loginUsingId(170);
        $file = $request->file('images');
        $imageUrl = $this->uploadImages($file);
        auth()->user()->course()->create(array_merge($request->all() , ['images' => $imageUrl]));
        return redirect(route('Course.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($course)
    {
        $courses = Course::where('id' , "=" ,$course)->first();
        return view('Admin.courses.edit' , compact('courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $course)
    {
        $title = $request->input('title');
        $type = $request->input('type');
        $body = $request->input('body');
        $price = $request->input('price');
        $tags = $request->input('tags');
        Course::where('id' , $course)->update(['title'=>$title , 'type'=>$type , 'body'=>$body , 'price'=>$price , 'tags'=>$tags]);
        return redirect(route('Course.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($course)
    {
        Course::destroy($course);
        return back();
    }
}
