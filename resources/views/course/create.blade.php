@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Course</div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('create_course') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description"
                                    value="{{ old('description') }}" required autocomplete="description">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">Price</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control" name="price">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="thumbnail" class="col-md-4 col-form-label text-md-right">Thumbnail</label>

                            <div class="col-md-6">
                                <input id="thumbnail_img" type="file" class="form-control" name="thumbnail_img"
                                    required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="course_category_id"
                                class="col-md-4 col-form-label text-md-right">Category</label>
                            <div class="col-md-6">
                                <select name="course_category_id" class="form-control">
                                    <option>Pilih salah satu kategori</option>
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>

                    @if (session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection