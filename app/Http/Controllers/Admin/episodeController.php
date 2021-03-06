<?php

namespace App\Http\Controllers\Admin;

use App\Episode;
use App\Http\Requests\EpisodeRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class episodeController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $episodes = Episode::latest()->paginate(10);
        return view('Admin.episodes.all' , compact('episodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.episodes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EpisodeRequest $request)
    {
        $episode = Episode::create($request->all());
        $this->setCourseTime($episode);
        return redirect(route('Episode.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $episode = Episode::where('id' , "=" , $id)->first();
        return view('Admin.episodes.edit' , compact('episode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EpisodeRequest|Request $request
     * @param Episode $episode
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(EpisodeRequest $request, $id)
    {
        $episode = $request->all();
        $data = $request->except(['_token' , '_method']);
        Episode::where('id' , $id)->update($data);
        /*$this->setCourseTime($episode);*/
        return redirect(route('Episode.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Episode::destroy($id);
        return back();
    }
}
