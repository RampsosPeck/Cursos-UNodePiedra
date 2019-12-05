<?php

namespace Unopicursos\Http\Controllers;

use Illuminate\Http\Request;
use Unopicursos\Course;
use Unopicursos\Helpers\Helper;
use Unopicursos\Http\Requests\CourseRequest;
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

    public function store (CourseRequest $course)
    {
        $picture = Helper::uploadFile('picture', 'courses');
        $course->merge(['picture'=> $picture]);
        $course->merge(['teacher_id'=> auth()->user()->teacher->id]);
        $course->merge(['status'=> Course::PENDING]);
        Course::create($course->input());

        return back()->with('message', ['success', __('Curso enviado correctament, recibirás un correo con cualquier información')]);
    }

    public function edit ($slug){
        $course = Course::with(['requirements', 'goals'])->withCount(['requirements', 'goals'])->whereSlug($slug)->first();

        $btnText = __("Actulizar curso");
        return view('courses.form', compact('course', 'btnText'));

    }
    public function update(CourseRequest $course_request, Course $course){

        //dd($course_request->all());
        if($course_request->hasFile('picture')){
            \Storage::delete('courses/' . $course->picture);
            $picture = Helper::uploadFile("picture", 'courses');
            $course_request->merge(['picture' => $picture]);
        }
        $course->fill($course_request->input())->save();
        return back()->with('message', ['success', __('Curso actualizado')]);

    }

}
