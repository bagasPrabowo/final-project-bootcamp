<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;

class AnswersController extends Controller
{
    public function index($pertanyaan_id){
        $user = Auth::user();
    	$pertanyaan = Question::find($pertanyaan_id);
    	return view('answer.index', get_defined_vars());
    }

    public function store($pertanyaan_id, Request $request){
    	 Validator::make($request->all(), [
            'isi' => 'required',
            'question_id' => 'required'
        ], [
            'required' => ':attribute harus diisi!'
        ])->validate();
        $user = Auth::user();
        if (!$user){
            return redirect()->route('login');
        }
        $answers = Answer::create(array_merge($request->all(),[
                                    'user_id' => $user->id,
                                    ]));
        if ($answers->save()) {
            return redirect()->route('pertanyaan.show',['id'=>$pertanyaan_id]);
        }
        return redirect()->back();
    }
}
