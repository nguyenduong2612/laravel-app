<?php

namespace App\Http\Controllers;

use App\Course;
use App\Subject;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\Courses\CreateCoursesRequest;
use App\Http\Requests\Courses\UpdateCoursesRequest;
// use Illuminate\Support\Facades\Storage;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('courses.index')->with('courses', Course::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->isStudent()) {
            return redirect(route('home'));
        }
        return view('courses.create')->with('subjects', Subject::all())->with('users', User::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCoursesRequest $request)
    {
        $image = $request->image->store('','public');
        $video = $request->video->store('','public');
        // create new course
        Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image,
            'video' => $video,
            'subject_id' => $request->subject,
            'teacher_id' => $request->teacher
        ]);
        // flash message
        session()->flash('success', 'Courses created successfully.');
        // redirect user
        return redirect(route('courses.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('courses.show')->with('course', $course);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        if (auth()->user()->isStudent()) {
            return redirect(route('home'));
        }
        return view('courses.create')->with('course', $course)->with('subjects', Subject::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCoursesRequest $request, Course $course)
    {
        $data = $request->only(['title', 'description', 'published_at', 'subject_id']);
        // check if new image
        if ($request->hasFile('image')) {
            // delete old one
            unlink('storage/' . $course->image);
            // upload it
            $image = $request->image->store('', 'public');
            $data['image'] = $image;
        }
        if ($request->hasFile('video')) {
            // delete old one
            unlink('storage/' . $course->video);
            // upload it
            $video = $request->video->store('', 'public');
            $data['video'] = $video;
        }
        // update attributes
        $course->update($data);
        // flash message
        session()->flash('success', 'Course updated successfully.');
        // redirect user
        return redirect(route('courses.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        unlink('storage/' . $course->image);
        unlink('storage/' . $course->video);
        $course->delete();
        session()->flash('success', 'Course deleted successfully.');
        return redirect(route('courses.index'));
    }

    public function showAll()
    {
        return view('courses.showAll')->with('courses', Course::all());
    }
}
