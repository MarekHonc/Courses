<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h3>
                    {{$course->name}}
                    @if(!$readonly && $course->to > date_create()->format('Y-m-d H:i:s'))
                        <a href="{{ url('/delete/' . $course->id) }}" class="btn btn-danger float-right">Delete</a>
                        <a href="{{ url('/edit/' . $course->id) }}" class="btn btn-warning float-right">Edit</a>
                    @endif
                </h3>
                @if($course->description)
                    <p>{{$course->description}}</p>
                @endif
                <p>capacity: {{$course->capacity}}</p>
                <p>from: {{$course->from}}</p>
                <p>to: {{$course->to}}</p>
                @if(count($course->users))
                    @foreach($users as $user)
                        <span>{{$user->email}}</span>
                    @endforeach
                @else
                    <p>No one attends this course<p>
                @endif
            </div>
        </div>
    </div>
</div>