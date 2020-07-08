<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Question extends Model {

  protected $guarded = ['id'];

    public function answers(){
        return $this->hasMany('App\Models\Answer');
    }

}