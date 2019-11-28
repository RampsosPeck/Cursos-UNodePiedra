<?php

namespace Unopicursos\Http\Controllers;

use Illuminate\Http\Request;
use Unopicursos\Role;
use Unopicursos\Teacher;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function teacher()
    {
        $user = auth()->user();
        if(! $user->teacher){
            try {
                \DB::beginTransaction();
                $user->role_id = Role::TEACHER;
                Teacher::create([
                    'user_id'=> $user->id
                ]);
                $success =true;
            }catch(\Exception $e){
                \DB::rollBack();
                $success = $e->getMessage();
            }
            if($success === true){
                \DB::commit();
                auth()->logout();
                auth()->loginUsingId($user->id);
                return back()->with('message', ['success', __("Felicidades, ya eres instructor en la plataforma")]);
            }
            return back()->with('message', ['danger', $success]);

        }
        return back()->with('message', ['danger', __("Algo a fallado.")]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
