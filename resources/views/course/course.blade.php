<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h3>{{date_create()->format('Y-m-d H:i:s')}}
                    {{$course->name}}
                    @if(!$readonly && new DateTime($course->to) > new DateTime(date_create()->format('Y-m-d H:i:s')))
                        <form method="POST" action="{{ url('/delete/' . $course->id) }}" class="float-right">
                            @csrf
                            <button class="btn btn-danger">Delete</button>
                        </form>
                        <a href="{{ url('/edit/' . $course->id) }}" class="btn btn-warning float-right">Edit</a>
                    @elseif($course->creator->id !== Auth::id())
                        @if(in_array(Auth::id(), array_column($course->users->toArray(), "id")))
                            <a href="" class="btn btn-danger float-right">Sign out</a>
                        @else
                            <a href="" class="btn btn-info float-right">Sign in</a>
                        @endif
                    @endif
                </h3>
                @if($course->description)
                    <p>{{$course->description}}</p>
                @endif
                <p>capacity: {{$course->capacity}}</p>
                <p>from: {{$course->from}}</p>
                <p>to: {{$course->to}}</p>
                @if(count($course->users))
                    @foreach($course->users as $user)
                        <span>{{$user->email}}</span>
                    @endforeach
                @else
                    <p>No one attends this course<p>
                @endif
            </div>
        </div>
    </div>
</div>