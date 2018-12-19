<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use Auth;

class CourseController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function allMyCourses(){
        $myCourses = Course::where('user_id', '=', Auth::user()->id)->orderby('from', 'desc')->get();
        $attendedCourses = Auth::user()->courses;

        return view('course.mycourses', ['myCourses' => $myCourses, 'attendedCourses' => $attendedCourses]);
    }

    public function myCourses(){
        $myCourses = Course::where('user_id', '=', Auth::user()->id)
            ->where('to', '>', date_create()->format('Y-m-d H:i:s'))
            ->orderby('from', 'desc')->get();

        return view('course.mycourses', ['myCourses' => $myCourses, 'attendedCourses' => []]);
    }

    public function create(){
        return view('course.create');
    }

    public function storeNew(Request $request){
        $request->validate([
            'name' => 'required',
            'capacity' => 'numeric|min:1',
            'from' => 'required|after_or_equal:today',
            'to' => 'required|after:from',
        ]);

        $course = Course::create([
            'name' => $request->name,
            'description' => $request->description,
            'capacity' => $request->capacity,
            'from' => $request->from,
            'to' => $request->to,
            'user_id' => Auth::user()->id,
        ]);
 
        return redirect('/home');
    }

    public function edit(Course $course){
        if($course->to < date_create()->format('Y-m-d H:i:s'))
            return abort(400);

        return view('course.edit', ['course' => $course]);
    }

    public function storeEdit(Request $request){
        $course = Course::find($request->id);

        $occupied = count($course->users);
        
        if($occupied == 0)
            $occupied = 1;

        $request->validate([
            'name' => 'required',
            'capacity' => 'numeric|min:'. $occupied,
            'from' => 'required|after_or_equal:today',
            'to' => 'required|after:from',
        ]);

        $course->name = $request->name;
        $course->description = $request->description;
        $course->capacity = $request->capacity;
        $course->from = $request->from;
        $course->to = $request->to;

        $course->save();
 
        return redirect('/home');
    }

    public function delete(Course $course){
        $course->delete();

        return redirect('home');
    }

    public function joinCourse(Course $course){
        $id = Auth::id();
        
        if($id === $course->creator->id || !$course->hasSpace())
            return abort(400);

        $course->users()->attach($id);

        return redirect('/home');
    }

    public function leaveCourse(Course $course){
        $id = Auth::id();
        
        if($id === $course->creator->id)
            return abort(400);

        $course->users()->detach($id);

        return redirect('/home');
    }
}
