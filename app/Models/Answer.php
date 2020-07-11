<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model {

	protected $guarded= ['id'];

	public function question(){
        return $this->belongsTo('App\Models\Question');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function questions()
    {
        return $this->belongsTo('App\Models\Question', 'question_id', 'id');
    }

    public function votesanswers()
    {
        return $this->hasMany('App\Models\VotesAnswer');

    }

    public function getCountAttribute()
    {
        $answerUpVote = $this->votesanswers()->where('votes_answers.vote', 1)->count();
        $answerDownVote = $this->votesanswers()->where('votes_answers.vote', 0)->count();
        return $answerUpVote - $answerDownVote;
    }

    public function answercomments(){
        return $this->hasMany('App\Models\AnswerComment');
    }

}
