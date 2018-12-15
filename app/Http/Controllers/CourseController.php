<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function myCourses(){
        return view("home");
    }

    public function create()
    {
        return view("course.create");
    }

    public function storeNew(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'capacity' => 'numeric|min:1',
            'from' => 'required|after:today',
            'to' => 'required|after:from',
        ]);

        $course = Course::create([
            "name" => $request->note,
            "description" => $request->note,
            "capacity" => $request->note,
            "from" => $request->note,
            "to" => $request->note,
            "user_id" => Auth::user()->id,
        ]);

        $note->save();
 
        return redirect('/mycourses');
    }

    public function detail(Course $course)
    {
        return view("course.detail", ["note" => $note]);
    }

    public function edit(Course $course)
    {
        return view("course.detail", ["note" => $note]);
    }

    public function storeEdit(Course $course){

    }

    public function delete(Course $course){
        
    }
}
