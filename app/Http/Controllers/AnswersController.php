<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;

class AnswersController extends Controller
{
    public function index($pertanyaan_id){
    	$pertanyaan = Question::find($pertanyaan_id);
    	return view('answer.index', get_defined_vars());
    }

    public function store($pertanyaan_id, Request $request){
    	 Validator::make($request->all(), [
            'name' => 'required',
            'isi' => 'required',
            'question_id' => 'required'
        ], [
            'required' => ':attribute harus diisi!'
        ])->validate();
        $answers = Answer::create($request->all());
        if ($answers->save()) {
            return redirect()->route('pertanyaan.show',['id'=>$pertanyaan_id]);
        }
        return redirect()->back();
    }
}