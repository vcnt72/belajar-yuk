@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($courses as $course)
    <input type="text" name="course_id" value="{{$course->id}}" class="invisible">
    <div class="card container">
        <div class="row py-5">
            <div class="col">
                <img src="{{ asset($course->thumbnail_url) }}" width="200px" height="200px"
                    class="mx-auto card-img-left" alt="...">
            </div>
            <div class="col">
                <h1>{{$course->name}}</h1>
                <div>
                    Rp. {{$course->price}}
                </div>

                <form action="{{ route('delete_cart', ['id' => $course->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <br>
                    <button type="submit" class="btn btn-primary">Delete Cart</button>
                </form>

            </div>
        </div>
    </div>
    @endforeach
    <br>

    @if ($courses->count() != 0)
    <form action="{{ route('create_order') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-dark mx-auto d-block">Checkout</button>

    </form>
    @endif

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
@endsection