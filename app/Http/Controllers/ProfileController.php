<?php

namespace Unopicursos\Http\Controllers;

use Illuminate\Http\Request;
use Unopicursos\Rules\StrengthPassword;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user()->load('socialAccount');
        //dd($user);
        return view('profile.index', compact('user'));
    }


    public function update ()
    {
        $this->validate(request(), [
            'password' => ['confirmed', new StrengthPassword]
        ]);
        $user = auth()->user();
        $user->password = bcrypt(request('password'));
        $user->save();
        return back()->with('message', ['success', __("Usuario actualizado correctamente")]);

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
