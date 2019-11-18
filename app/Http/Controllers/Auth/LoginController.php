<?php

namespace Unopicursos\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Unopicursos\Http\Controllers\Controller;
use Unopicursos\Student;
use Unopicursos\User;
use Unopicursos\UserSocialAccount;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        session()->flush();

        return redirect('/login');
    }

    public function redirectToProvider (string $driver) {
        return Socialite::driver($driver)->redirect();
    }

    public function handleProviderCallback (string $driver) {
        //Si llega una variable llamada "code"
        if( ! request()->has('code' ) || request()->has('denied')){
            session()->flash('message',['danger', __("Inicio de sesión cancelada")]);
            return redirect('login');
        }
        $socialUser = Socialite::driver($driver)->user();
        //dd($socialUser);
        $user = null;
        $success = true;
        $email = $socialUser->email;
        $check = User::whereEmail($email)->first();
        if($check){
            $user = $check;
        }else{
            \DB::beginTransaction();
            try {
                $user = User::create([
                    "name" => $socialUser->name,//nickname,
                    "email" => $email
                ]);
                UserSocialAccount::create([
                    "user_id" => $user->id,
                    "provider" => $driver,
                    "provider_uid" => $socialUser->id
                ]);
                Student::create([
                    "user_id" => $user->id
                ]);
            } catch (\Exception $exception) {
                $success = $exception->getMessage();
                \DB::rollBack();
            }
        }
        if($success === true) {
            \DB::commit();
            auth()->loginUsingId($user->id);
            return redirect(route('home'));
        }
        session()->flash('message', ['danger', $success]);
        return redirect('login');

    }

}



