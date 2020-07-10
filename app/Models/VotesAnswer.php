<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class VotesAnswer extends Model {

	protected $guarded= ['id'];

	public function Answer(){
        return $this->belongsTo('App\Models\Answer');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

}
