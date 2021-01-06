@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($transaction->courses as $course)
    <div class="card container py-5">
        <div class="row">
            <div class="col">
                <img src="{{ asset($course->thumbnail_url) }}" style="width: 250px;height: 250px;"
                    class="img-fluid card-img-left" alt="...">
            </div>
            <div class="col">
                <h1>{{$course->name}}</h1>
                <div>
                    Rp. {{$course->price}}
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>
@endsection