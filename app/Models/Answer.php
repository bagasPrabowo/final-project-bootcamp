<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model {

	protected $guarded= ['id'];

	public function question(){
        return $this->belongsTo('App\Models\Question');
    }
  
}