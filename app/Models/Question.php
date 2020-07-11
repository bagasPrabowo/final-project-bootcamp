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

    // public function answer()
    // {
    //     return $this->hasOne('App\Models\Answer', 'answer_id', 'id');
    // }

    public function votesquestion()
    {
        return $this->hasMany('App\Models\VotesQuestion', 'question_id', 'id');

    }

    public function getCountAttribute()
    {
        $questionUpVote = $this->votesquestion()->where('votes_questions.vote', 1)->count();
        $questionDownVote = $this->votesquestion()->where('votes_questions.vote', 0)->count();
        return $questionUpVote - $questionDownVote;
    }

    public function questioncomments(){
        return $this->hasMany('App\Models\QuestionComment');
    }
}
