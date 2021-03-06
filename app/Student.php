<?php

namespace Unopicursos;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $fillable = ['user_id', 'title'];

	protected $appends = ['courses_formatted'];

	//Para la tabla pivote
	//Un estudiante puede estar escrito en muchos cursos
    public function courses (){
    	return $this->belongsToMany(Course::class);
    }

    //Un estudiante tb es un usuario
    public function user (){
    	return $this->belongsTo(User::class)->select('id','role_id','name','email');
    }

    public function getCoursesFormattedAttribute () {
        return $this->courses->pluck('name')->implode('<br />');
    }

}
