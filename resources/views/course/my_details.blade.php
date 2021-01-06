@extends('layouts.app')


@section('content')
<div class="container">
    <div class="pizza-container mt-5">
        <div class="row">
            <div class="col">
                <img width="600px" src="{{ asset($course->thumbnail_url) }}" alt="">
            </div>
            <div class="col">
                <h1>
                    {{$course->name}}
                </h1>
                <br>
                <p>
                    {{$course->description}}
                </p>
                <br>

                <p>
                    <b>Rp.{{$course->price}}</b>
                </p>

                <h4>Videos</h4>
                @auth
                @if(Auth::user()->role->name == 'admin')
                <a href="{{ route('create_video_view', ['id'=>$course->id]) }}" class="btn btn-primary">Add Video</a>
                @endif
                @endauth
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                Title
                            </th>
                            <th>
                                Link
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($course->videos as $video)
                        <tr>
                            <td>
                                {{$video->order}}
                            </td>
                            <td>
                                {{$video->title}}
                            </td>
                            <td>
                                <a
                                    href="{{ route('get_video', ['id'=>$course->id,'order' => $video->order]) }}">Link</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
            </div>
        </div>
    </div>

</div>
@endsection