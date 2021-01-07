@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <a href="{{ route('create_course_view') }}" class="btn btn-primary">Add Course</a>
        <div class="row">
            @foreach ($courses as $course)
            <div class="col-md-3 mr-2">
                <a href="{{ route('get_one_course', ['id'=>$course->id]) }}" class="text-dark"
                    style="text-decoration: none;">
                    <div class="card py-3" style="width: 18rem;">
                        <img src="{{asset($course->thumbnail_url)}}" width="286px" style="height: 286px"
                            class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <h5 class="text-decoration-none card-title">
                                {{$course->name}}
                            </h5>
                            <p class="card-text">Rp.{{$course->price}}</p>
                        </div>
                        @if (Auth::user() != null)
                        @if (Auth::user()->role->name == 'admin')
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{ route('update_course_view', ['id'=>$course->id]) }}"
                                        class="btn btn-primary">Update Course</a>
                                </div>
                                <div class="col-md-6">
                                    <form method="POST" action="{{ route('delete_course', ['id'=>$course->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-primary" type="submit">Delete Course</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endif
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection