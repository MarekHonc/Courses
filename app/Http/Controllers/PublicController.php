<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Course;

class PublicController extends Controller
{
    public function allCourses(){
        $courses = [];
        $user = Auth::user();
        
        $courses = Course::where('to', '>', date_create()->format('Y-m-d H:i:s'))
            ->orderby('from', 'desc')->get();

        return view('allCourses', ['courses' => $courses]);
    }
}
