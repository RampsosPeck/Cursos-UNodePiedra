<?php

namespace Unopicursos;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

	protected $fillable = ['user_id', 'title'];

	//Para la tabla pivote
	//Un estudiante puede estar escrito en muchos cursos
    public function courses (){
    	return $this->belongsToMany(Course::class);
    }

    //Un estudiante tb es un usuario
    public function user (){
    	return $this->belongsTo(User::class)->select('id','role_id','name','email');
    }
}
