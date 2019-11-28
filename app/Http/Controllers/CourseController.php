<?php

namespace Unopicursos\Http\Controllers;

use Illuminate\Http\Request;
use Unopicursos\Course;
use Unopicursos\Mail\NewStudentInCourse;
use Unopicursos\Review;

class CourseController extends Controller
{

    public function show(Course $course)//$slug)
    {
        $course->load([
            'category' => function($q) {
                $q->select('id', 'name');
            },
            'goals' => function($q) {
                $q->select('id', 'course_id', 'goal');
            },
            'level' => function($q) {
                $q->select('id', 'name');
            },
            'requirements' => function($q) {
                $q->select('id', 'course_id', 'requirement');
            },
            'reviews.user',
            'teacher'
        ])->get();


        /*$course = Course::with([
            'category' => function($q) {
                $q->select('id', 'name');
            },
            'goals' => function($q) {
                $q->select('id', 'course_id', 'goal');
            },
            'level' => function($q) {
                $q->select('id', 'name');
            },
            'requirements' => function($q) {
                $q->select('id', 'course_id', 'requirement');
            },
            'reviews.user',
            'teacher'
        ])->withCount(['students','reviews'])->where('slug', $slug)->first();*/

        $related = $course->relatedCourses();

        //dd($related);
        return view('courses.detail', compact('course','related'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function inscribe(Course $course)
    {
        //return new NewStudentInCourse($course, auth()->user()->name);
        $course->students()->attach(auth()->user()->student->id);

        \Mail::to($course->teacher->user)->send(new NewStudentInCourse($course, auth()->user()->name));

        return  back()->with('message', ['success', __("Inscrito correctamente al curso")]);

    }

    public function subscribed ()
    {
        $courses = Course::whereHas('students', function($query){
            $query->where('user_id', auth()->id());
        })->get();
        //$courses = auth()->user()->student->courses;
        return view('courses.subscribed', compact('courses'));
    }


    public function addReview()
    {
        //dd(request()->all());
        Review::create([
            "user_id" => auth()->id(),
            "course_id" => request('course_id'),
            "rating" => (int) request('rating_input'),
            "comment" => request('message')
        ]);
        return back()->with('message', ['success', __('Muchas gracias por valorar el curso')]);
    }

    public function create ()
    {
        $course = new Course;
        $btnText = __("Enviar curso para revisión");
        return view('courses.form', compact('course', 'btnText'));
    }


}
