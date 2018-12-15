@extends('layouts.app')

@section('content')

<h2>
    New Course
</h2>

<form method="POST" action="{{ url('/new') }}">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input id="name" name="name" type="text" value="{{ old('name') }}" placeholder="Name" required autofocus class="form-control" />
        @if ($errors->has("name"))
            <div>{{ $errors->first("name") }} </div>
        @endif
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea id="description" name="description" placeholder="Description" class="form-control">{{ old('description') }}</textarea>
        @if ($errors->has("description"))
            <div>{{ $errors->first("description") }} </div>
        @endif
    </div>

    <div class="form-group">
        <label for="capacity">Capacity</label>
        <input id="capacity" name="capacity" type="number" value="{{ old('capacity') }}" placeholder="Capacity" required class="form-control" min="1"/>
        @if ($errors->has("capacity"))
            <div>{{ $errors->first("capacity") }} </div>
        @endif
    </div>

    <div class="form-group">
        <label for="from">Starts at</label>
        <input id="from" name="from" type="datetime-local" value="{{ old('from') }}" placeholder="Starts at" required class="form-control" />
        @if ($errors->has("from"))
            <div>{{ $errors->first("from") }} </div>
        @endif
    </div>

    <div class="form-group">
        <label for="to">Ends at</label>
        <input id="to" name="to" type="datetime-local" value="{{ old('to') }}" placeholder="Ends at" required class="form-control" />
        @if ($errors->has("to"))
            <div>{{ $errors->first("to") }} </div>
        @endif
    </div>

    <div class="row">
        <div class="col-lg-12">
            <button type="sumbit" class="btn btn-primary mt-2 float-right">Save</button>
        </div>
    </div>
</form>

@endsection
