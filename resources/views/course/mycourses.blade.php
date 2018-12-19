@extends('layouts.app')

@section('content')

<h2>
    My courses
    <a href="{{ url('/new') }}" class="btn btn-info float-right">New Course</a>
</h2>

@if(count($myCourses) > 0)
    @foreach($myCourses as $course)
        @include("course.course", ["course" => $course, "readonly" => false])
    @endforeach
@else
    <p>You don't hold any courses.</p>
@endif

<h2>
    Courses that i attend
</h2>

@if(count($attendedCourses) > 0)
    @foreach($attendedCourses as $course)
        @include("course.course", ["course" => $course, "readonly" => false])
    @endforeach
@else
    <p>You don't hold any courses.</p>
@endif

@endsection