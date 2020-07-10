<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Question extends Model {

  protected $guarded = ['id'];

    public function answers(){
        return $this->hasMany('App\Models\Answer');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'question_tag', 'question_id', 'tag_id');
    }

    public function answer()
    {
        return $this->hasOne('App\Models\Answer', 'answer_id', 'id');
    }

}
