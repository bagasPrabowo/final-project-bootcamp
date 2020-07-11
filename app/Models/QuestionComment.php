<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class QuestionComment extends Model {

	protected $guarded= ['id'];

	public function Question(){
        return $this->belongsTo('App\Models\Question');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

}