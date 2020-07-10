<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function questions()
    {
        return $this->hasMany('App\Models\Question', 'user_id', 'id');
    }

    public function answers()
    {
        return $this->hasMany('App\Models\Answer', 'user_id', 'id');
    }

    public function votesquestions()
    {
        return $this->hasManyThrough('App\Models\VotesQuestion', 'App\Models\Question');

    }

    public function votesanswers()
    {
        return $this->hasManyThrough('App\Models\VotesAnswer', 'App\Models\Answer');

    }

    public function getContributionAttribute()
    {
        $questionUpVote = $this->votesquestions()->where('votes_questions.vote', 1)->count() * 10;
        $questionDownVote = $this->votesquestions()->where('votes_questions.vote', 0)->count() * -1;
        $answerUpVote = $this->votesanswers()->where('votes_answers.vote', 1)->count() *10;
        $answerDownVote = $this->votesanswers()->where('votes_answers.vote', 0)->count() * -1;
        return $questionUpVote + $questionDownVote + $answerUpVote + $answerDownVote;
    }
}
