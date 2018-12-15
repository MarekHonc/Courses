@extends('layouts.app')

@section('content')

<h2>
    My courses
    <a href="{{ url('/new') }}" class="btn btn-info float-right">New Course</a>
</h2>

<h2>
    Courses that i attend
</h2>

@endsection