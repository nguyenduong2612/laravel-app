@extends('layouts.master')

@section('content')
<div class="courses_details_banner">
         <div class="container">
             <div class="row">
                 <div class="col-xl-6">
                     <div class="course_text">
                            <h3>{{ $course->title }}</h3>
                            <!-- <div class="prise">
                                <span class="inactive">$89.00</span>
                                <span class="active">$49</span>
                            </div> -->
                            <div class="rating">
                                <i class="flaticon-mark-as-favorite-star"></i>
                                <i class="flaticon-mark-as-favorite-star"></i>
                                <i class="flaticon-mark-as-favorite-star"></i>
                                <i class="flaticon-mark-as-favorite-star"></i>
                                <i class="flaticon-mark-as-favorite-star"></i>
                                @if ( \App\Votes::where(['course_id' => $course->id]) )
                                    <span>{{ \App\Votes::where(['course_id' => $course->id])->avg('star') }}</span>
                                @else
                                    <span>0.0</span>
                                @endif
                            </div>
                            <div class="hours">
                                <div class="video">
                                     <div class="single_video">
                                            <i class="fa fa-clock-o"></i> <span>12 Videos</span>
                                     </div>
                                     <div class="single_video">
                                            <i class="fa fa-play-circle-o"></i> <span>9 Hours</span>
                                     </div>
                                   
                                </div>
                            </div>
                            <br>
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

<div class="courses_details_info">
        <div class="container">
            <div class="row">   
                <div class="col-xl-7 col-lg-7">

                    @auth
                    @if( \App\Http\Controllers\EnrollmentsController::checkEnroll(Auth::user()->id, $course->id) )
                    <div class="single_courses">

                        
                        <h3>Video</h3>
                        <p><img src="{{ asset('storage/'.$course->video) }}" alt="" style="width: 90%"></p>
                    <!-- <h3 class="second_title">Video</h3> -->
                    </div>
                    <div class="outline_courses_info">
                            <!-- <div id="accordion">
                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    <i class="flaticon-question"></i> Is WordPress hosting worth it?
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                            <div class="card-body">
                                                Our set he for firmament morning sixth subdue darkness creeping gathered divide our
                                                let god moving. Moving in fourth air night bring upon
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                    <i class="flaticon-question"></i>Basic Classes</span>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion" style="">
                                            <div class="card-body">
                                                Our set he for firmament morning sixth subdue darkness creeping gathered divide our
                                                let god moving. Moving in fourth air night bring upon
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingThree">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    <i class="flaticon-question"></i> Will you transfer my site?
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                            <div class="card-body">
                                                Our set he for firmament morning sixth subdue darkness creeping gathered divide our
                                                let god moving. Moving in fourth air night bring upon
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="heading_4">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse_4" aria-expanded="false" aria-controls="collapse_4">
                                                    <i class="flaticon-question"></i> Why should I host with Hostza?
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapse_4" class="collapse" aria-labelledby="heading_4" data-parent="#accordion">
                                            <div class="card-body">
                                                Our set he for firmament morning sixth subdue darkness creeping gathered divide our
                                                let god moving. Moving in fourth air night bring upon
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="heading_5">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse_5" aria-expanded="false" aria-controls="collapse_5">
                                                    <i class="flaticon-question"></i> How do I get started <span>with Shared
                                                        Hosting?</span>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapse_5" class="collapse" aria-labelledby="heading_5" data-parent="#accordion">
                                            <div class="card-body">
                                                Our set he for firmament morning sixth subdue darkness creeping gathered divide our
                                                let god moving. Moving in fourth air night bring upon
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                    </div>
                    @else
                        <h3 class="pt-4">Join course to see more awesome content !</h3>
                    @endif
                    @endauth
                    @guest
                    <h3 class="pt-4">Please log in to join this course !</h3>
                    @endguest
                </div>
                <div class="col-xl-5 col-lg-5">
                    <div class="courses_sidebar">
                        <div class="video_thumb">
                            <img src="{{ asset('storage/'.$course->image) }}" alt="">
                            <a class="popup-video" href="https://www.youtube.com/watch?v=AjgD3CvWzS0">
                                <i class="fa fa-play"></i>
                            </a>
                        </div>
                        <div class="author_info">
                            <div class="auhor_header">
                                
                                <div class="name">
                                    <h2>People Enrolled</h2>
                                    <br>
                                    <h2 >{{ \App\Enrollment::where(['course_id' => $course->id])->count() }}</h2>
                                </div>
                            </div>
                            
                        </div>
                        <div class="author_info"> 
                            <div class="auhor_header">
                                <h2 class="mb-3">Created by</h2>
                                <div class="thumb">
                                    <img style="border-radius: 50%" src="{{ asset('storage/'.\App\User::where(['id' => $course->teacher_id])->first()->avatar) }}" alt="" width=60 height=60>
                                </div>
                                <div class="name">
                                    <h3>{{ \App\User::where(['id' => $course->teacher_id])->first()->name }}</h3>
                                    <p>Professional Teacher</p>
                                </div>
                            </div>
                            <p class="text_info">
                                {{ \App\User::where(['id' => $course->teacher_id])->first()->about }}
                            </p>
                            <ul>
                                <li><a href="#"> <i class="fa fa-envelope"></i> </a></li>
                                <li><a href="#"> <i class="fa fa-twitter"></i> </a></li>
                                <li><a href="#"> <i class="ti-linkedin"></i> </a></li>
                            </ul>
                            
                        </div>
                        <div class="author_info">
                            <div class="auhor_header">
                                
                                <div class="name">
                                    <h2>Prerequisites</h2>
                                    <br>
                                    <h2 >None</h2>
                                </div>
                            </div>
                            
                        </div>
                        @auth
                        @if( \App\Http\Controllers\EnrollmentsController::checkEnroll(Auth::user()->id, $course->id) )
                        <div class="feedback_info">
                            <h2>Write your feedback</h2>
                            <p>Your rating</p>
                            
                            
                            <form action="{{ route('votes.store') }}" enctype="multipart/form-data" method = "POST">
                                @csrf
		                        <fieldset class='rate'>
                                    <input id='rate1-star5' type='radio' name='star' value='5' />
                                    <label for='rate1-star5' title='Excellent'>5</label>
                                    <input id='rate1-star4' type='radio' name='star' value='4' />
                                    <label for='rate1-star4' title='Good'>4</label>
                                    <input id='rate1-star3' type='radio' name='star' value='3' />
                                    <label for='rate1-star3' title='Satisfactory'>3</label>
                                    <input id='rate1-star2' type='radio' name='star' value='2' />
                                    <label for='rate1-star2' title='Bad'>2</label>
                                    <input id='rate1-star1' type='radio' name='star' value='1' />
                                    <label for='rate1-star1' title='Very bad'>1</label>
                                </fieldset>
                                <input type="hidden" class="form-control" name="student_id" id="student_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" class="form-control" name="course_id" id="course_id" value="{{ $course->id}}">
	  	                        <input type="submit" class="btn btn-primary d-block" value="Submit">

	  	<!-- <button type="button" class="btn btn-primary" onclick="window.location.href='?thamso=register'">Đăng ký</button> -->
	                            </form>
                        </div>
                        @endif
                        @endauth
                    </div>
                </div>
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