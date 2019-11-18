<?php

namespace Unopicursos\Http\Controllers;

use Illuminate\Http\Request;
use Unopicursos\Course;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::withCount(['students'])
                    ->with('category','teacher','reviews')
                    ->where('status', Course::PUBLISHED)
                    ->latest()
                    ->paginate(12);
        //dd($courses);
        return view('home',compact('courses'));
    }
}
