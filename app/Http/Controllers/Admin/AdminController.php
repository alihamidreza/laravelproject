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
        $file = $file->move(public_path($imagePath), $fileName);
        return $file;
    }
}
