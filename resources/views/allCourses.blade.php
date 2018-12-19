@extends('layouts.app')

@section('content')

<h2>
    All Courses

    <form action="{{ url('/search') }}" method="POST" role="search">
        @csrf
        <div class="input-group">
            <input type="text" class="form-control" name="q" placeholder="Search courses"> 
            <span class="input-group-btn">
                <button type="submit" class="btn btn-default">
                    Search
                </button>
            </span>
        </div>
    </form>
</h2>

@if(count($courses) > 0)
    @foreach($courses as $course)
        @include("course.course", ["course" => $course, "readonly" => true])
    @endforeach
@else
    <p>There are no curses at the moment</p>
@endif

@endsection