<?php

namespace Unopicursos\Http\Controllers;

use Illuminate\Http\Request;
use Unopicursos\Course;
use Unopicursos\VueTable\EloquentVueTables;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function courses()
    {
        return view('admin.courses');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function coursesJson()
    {
        if(request()->ajax()){
            $vueTable = new EloquentVueTables;
            $data = $vueTable->get(new Course, ['id','name','status'], ['reviews']);
            return response()->json($data);
        }
        return abort(401);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateCourseStatus( )
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function students( )
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function studentsJson( )
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function teachers( )
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function teachersJson( )
    {
        //
    }
}
