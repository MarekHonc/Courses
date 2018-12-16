@extends('layouts.app')

@section('content')

@if(count($courses) > 0)
    @foreach($courses as $course)
        @include("course.course", ["course" => $course, "readonly" => true])
    @endforeach
@else
    <p>There are no curses at the moment</p>
@endif

@endsection