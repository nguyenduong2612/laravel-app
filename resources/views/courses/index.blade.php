@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-2">
    <a href="{{ route('courses.create') }}" class="btn btn-success">Add Course</a>    
</div>

<div class="card card-default">
    <div class="card-header">Courses</div>

    <div class="card-body">
    <table class="table">
        <thead>
            <th>Image</th>
            <th>Title</th>
            <th>Video</th>
            <th></th>
            <th></th>
        </thead>
        <tbody>
            @foreach($courses as $course)
            <tr>
                <td>
                    <img src="{{ asset($course->image) }}" width="120px" height="60px" alt="">
                </td>
                <td>
                    {{ $course->title }}
                </td>
                <td>
                    <img src="{{ asset($course->video) }}" width="200px" alt="">
                </td>
                <td>
                    <a href="" class="btn btn-info btn-sm">Edit</a>
                </td>
                <td>
                    <a href="" class="btn btn-danger btn-sm">Trash</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection