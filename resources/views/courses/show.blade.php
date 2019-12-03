@extends('layouts.master')

@section('content')
<div class="slider_area ">
    <div class="single_slider d-flex align-items-center justify-content-center slider_bg_1">
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="slider_info mt-5 text-center">
                    <h3>{{ $course->title }}</h3>
                    <h4 class="mb-5 text-white">{{ $course->description }}</h4>
                    <a href="#" class="boxed_btn start-btn">START</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div>
    <div class="container mt-4" style="min-height: 100vh; position: relative">
        <div class="cover">
        </div>
        <div class="card course-info">
        <ul class="list-group list-group-flush text-center" style="font-size: 22px">
            <li class="list-group-item p-4">
                <b>Join</b><br>
                <h2 class="mt-4 mb-3">123456</h2>
                <b>people who have taken this course</b><br>
            </li>
            <li class="list-group-item p-4">
                <b>Created by</b><br>
                <h2 class="mt-4 mb-3">{{ \App\User::where(['id' => $course->teacher_id])->first()->name }}</h2>
            </li>
            <li class="list-group-item p-4">
                <b>Prerequisites</b><br>
                <h2 class="mt-4 mb-3">None</h2>
            </li>
        </ul>
        </div>
    </div>
</div>
@endsection