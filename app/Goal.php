<?php

namespace Unopicursos;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    //A que curso pertenese cada una de nuestras metas de nuestra apĺicacion
    public function course (){
    	return $this->belongsTo(Course::class);
    }



}
