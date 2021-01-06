@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('view_create_course_category') }}" class="btn btn-primary">Add</a>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Transactions</div>
                {{-- <div class="card-body"> --}}
                <table class="mt-3 table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Update Button</th>
                            <th>Delete Button</th>
                        </tr>
                    </thead>
                    @foreach ($course_categories as $course_category)
                    <tbody>
                        <tr>
                            <td>{{$course_category->id}}</td>
                            <td>{{$course_category->name}}</td>
                            <td><a href="{{ route('view_update_course_category', ['id'=>$course_category->id]) }}"
                                    class="btn btn-primary">Update</a></td>
                            <td>
                                <form action="{{ route('delete_course_category', ['id'=>$course_category->id]) }}"
                                    method="post">
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-primary">
                                        @csrf
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                {{-- </div> --}}
            </div>
        </div>
    </div>

</div>
@endsection