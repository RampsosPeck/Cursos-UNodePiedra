<?php

namespace Unopicursos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
	use SoftDeletes;

    const PUBLISHED = 1;
	const PENDING = 2;
	const REJECTED = 3;

	protected $withCount = ['reviews','students'];

	public function pathAttachment(){
		return "/images/courses/" . $this->picture;
	}

	public function getRouteKeyName() {
		return 'slug';
	}

	public function category (){
		return $this->belongsTo(Category::class)->select('id','name');
	}
	//Un curso tiene muchas metas "de uno a muchos"
	public function goals (){
		return $this->hasMany(Goal::class)->select('id','course_id','goal');
	}

	public function level (){
		return $this->belongsTo(Level::class)->select('id','name');
	}
	//Un curso puede tener muchas valoraciones
	public function reviews (){
		return $this->hasMany(Review::class)->select('id','user_id','course_id','rating','comment','created_at');
	}

	//Un curso tiene varios requisitos
	public function requirements (){
		return $this->hasMany(Requirement::class)->select('id','course_id','requirement');
	}
	//Aqui para la tabla pivote
	//En un curso pueden haber muchos estudiantes
	public function students (){
		return $this->belongsToMany(Student::class);
	}

	//Para saber quien es el profesor de este curso
	public function teacher (){
		return $this->belongsTo(Teacher::class);
	}

	public function getRatingAttribute() {
		return $this->reviews->avg('rating');
	}

	public function relatedCourses () {
		return Course::with('reviews')->whereCategoryId($this->category->id)
				->where('id','!=', $this->id)
				->latest()
				->limit(6)
				->get();
	}

}


