@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <div class="row">
            @foreach ($courses as $course)
            <div class="col-md-3 mr-2">
                <a href="{{ route('my_course_details', ['id'=>$course->id]) }}" class="text-dark"
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
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection