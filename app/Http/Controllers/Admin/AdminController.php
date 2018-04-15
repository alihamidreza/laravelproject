<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    protected function uploadImages($file)
    {
        $year = Carbon::now()->year;
        $imagePath = "upload/images/{$year}/";
        $extension = Input::file('images')->getClientOriginalExtension();
        $fileName = rand(11111,99999).'.'.$extension;
        $file = $file->move($imagePath, $fileName);
        return $file;
    }
    protected function setCourseTime($episode)
    {
        $course = $episode->course;
        $course->time = $this->getCourseTime($episode->pluck('time'));
        $course->save();
    }

    protected function getCourseTime($times)
    {
        $timestamp = Carbon::parse('00:00:00');
        foreach ($times as $t){
            $time = strlen($t) == 5 ? strtotime('00:' . $t) : strtotime($t);
            $timestamp->addSecond($time);
        }
        return $timestamp->format('H:i:s');
    }
}
