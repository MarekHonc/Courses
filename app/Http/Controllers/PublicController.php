<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Course;

class PublicController extends Controller
{
    public function allCourses(){
        $query = Course::where('to', '>', date_create()->format('Y-m-d H:i:s'))->orderby('from', 'desc');
        $courses = $query->get();

        return view('allCourses', ['courses' => $courses]);
    }

    public function searchCourses(Request $requst){

        $query = $query = Course::where('to', '>', date_create()->format('Y-m-d H:i:s'))->orderby('from', 'desc');

        if($requst->q != null){
            $query = $query->where('name', 'LIKE', '%' . $requst->q . '%');
        }

        $courses = $query->get();

        return view('allCourses', ['courses' => $courses]);
    }
}
