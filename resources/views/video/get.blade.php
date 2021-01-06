@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md">
            @if($video->order != 1)
            <a href="{{ route('get_video', ['id'=> $course->id, 'order' => $video->order - 1]) }}"
                style="font-size: 24px;width: 30px" class="d-block mr-auto">Back</a>
            @endif
        </div>

        <div class="col-md"></div>
        <div class="col-md"></div>

        <div class="col-md">
            @if ($video->order != $course->videos->count())
            <a href="{{ route('get_video', ['id'=>$course->id, 'order' => $video->order + 1]) }}"
                style="font-size: 24px;width: 30px" class="d-block ml-auto">
                Next
            </a>
            @endif
        </div>
    </div>
    <h1>
        {{$video->title}}
    </h1>
    <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" src="{{$video->url}}" allowfullscreen></iframe>
    </div>
</div>
@endsection