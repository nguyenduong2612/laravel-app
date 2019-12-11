@extends('layouts.master')

@section('content')
<div class="slider_area ">
    <div class="single_slider d-flex align-items-center justify-content-center slider_bg_1">
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="slider_info mt-5 text-center">
                    <h3>{{ $course->title }}</h3>
                    <h4 class="mb-5 text-white">{{ $course->description }}</h4>
                    @auth
                    @if( \App\Http\Controllers\EnrollmentsController::checkEnroll(Auth::user()->id, $course->id) )
                        <a href="#" class="boxed_btn start-btn">CONTINUE</a>
                    @else
                        <button class="boxed_btn start-btn" onclick="handle()">START</button>
                    @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="joinModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="joinCourseForm" action="{{ route('enrollments.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @auth
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Join Course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-center text-bold">
                Are you sure you want to join this course ?
                </p>
            </div>
            <input type="hidden" class="form-control" name="student_id" id="student_id" value="{{ Auth::user()->id }}">
            <input type="hidden" class="form-control" name="course_id" id="course_id" value="{{ $course->id }}">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go back</button>
                <button type="submit" class="btn btn-danger">Yes, I'm sure</button>
            </div>
            </div>
            @endauth
        </form>
    </div>
</div>

<div class="pb-5">
    <div class="container mt-4" style="min-height: 100vh; position: relative">
        <div class="cover">
        </div>
        <div class="card course-info">
        <ul class="list-group list-group-flush text-center" style="font-size: 22px">
            <li class="list-group-item p-4">
                <b>Join</b><br>
                <h2 class="mt-4 mb-3">{{ \App\Enrollment::where(['course_id' => $course->id])->count() }}</h2>
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

        <div class="course-content" style="width: 70%">
        @auth
            @if( \App\Http\Controllers\EnrollmentsController::checkEnroll(Auth::user()->id, $course->id) )
                <h3 class="pt-4 pb-3">Image</h3>
                <img src="{{ asset('storage/'.$course->image) }}" alt="" style="width: 90%">
                <h3 class="pt-4 pb-3">Video</h3>
                <img src="{{ asset('storage/'.$course->video) }}" alt="" style="width: 90%">
            @else
                <h3 class="pt-4">Join course to see more awesome content !</h3>
            @endif
        @endauth
        @guest
            <h3 class="pt-4">Please log in to join this course !</h3>
        @endguest
        </div>
    </div>
</div>


@endsection

@section('scripts')
    <script>
        function handle() {
            var form = document.getElementById('joinCourseForm')
            $('#joinModal').modal('show')
        }
    </script>
@endsection