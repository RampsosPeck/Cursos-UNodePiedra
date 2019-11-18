<?php

namespace Unopicursos;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected static function boot() {
        parent::boot();
        static::creating(function (User $user){
            //Si no esta creando usuario por console osea por seeder
            if(! \App::runningInConsole()) {
                $user->slug = str_slug($user->name . " " . $user->last_name, "-");
            }
        });
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    public static function navigation () {
        return auth()->check() ? auth()->user()->role->name : 'guest';
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role (){
        return $this->belongsTo(Role::class);
    }

    public function student (){
        return $this->hasOne(Student::class);
    }

    public function teacher (){
        return $this->hasOne(Teacher::class);
    }

    //El usuario tiene una redsocial o no
    public function socialAccount () {
        return $this->hasOne(UserSocialAccount::class);
    }

}
