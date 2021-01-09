@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Update Course</h1>

    <div class="row">
        <div class="col">
            <img src="{{asset($course->thumbnail_url)}}" width="600px" alt="">
        </div>
        <div class="col">
            <form enctype="multipart/form-data" action="{{ route('update_course', ['id' => $course->id]) }}"
                method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$course->name}}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" name="description" value="{{$course->description}}">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" name="price" value="{{$course->price}}">
                </div>
                <div class="form-group row">
                    <label for="thumbnail" class="col-md-4">Thumbnail</label>
                    <input id="thumbnail_img" type="file" class="form-control" name="thumbnail_img" required>
                </div>
                <div class="form-group row">
                    <label for="course_category_id" class="col-md-4 col-form-label">Category</label>
                    <select name="course_category_id" class="form-control">
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}"
                            {{$category->id == $course->course_category_id ? "selected" : ""}}>
                            {{$category->name}}</option>
                        @endforeach
                    </select>

                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

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