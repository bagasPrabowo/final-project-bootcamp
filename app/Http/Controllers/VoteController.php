<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\VotesQuestion;
use App\Models\VotesAnswer;

class VoteController extends Controller
{
    public function store1(Request $request, $id){
        Validator::make($request->all(), [
            'user_id' => 'required',
            'question_id' => 'required',
            'vote' => 'required'
        ], [
            'required' => ':attribute harus diisi!',
        ])->validate();
        $user = Auth::user();
        $voted = VotesQuestion::firstOrNew(['user_id'=> $user, 'question_id' => $request]);
        if ($voted){
            return redirect()->back();
        }
        if ($user->contribution<15 && $request->vote == 0) {
            return redirect()->back();
        }
        if (!$user){
            return redirect()->route('login');
        }
        $vote = VotesQuestion::create($request->all());
        if ($vote->save()) {
            return redirect()->route('pertanyaan.show', ['id' => $id]);
            }
        return redirect()->back();
    }

    public function store2(Request $request, $id){
        Validator::make($request->all(), [
            'user_id' => 'required',
            'answer_id' => 'required',
            'vote' => 'required'
        ], [
            'required' => ':attribute harus diisi!',
        ])->validate();
        $user = Auth::user();
        $voted = VotesAnswer::firstOrNew(['user_id'=> $user, 'answer_id' => $request]);
        if ($voted){
            return redirect()->back();
        }
        if ($user->contribution<15 && $request->vote == 0) {
            return redirect()->back();
        }
        $vote = VotesAnswer::create($request->all());
        if (!$user){
            return redirect()->route('login');
       
        }
        if ($vote->save()) {
            return redirect()->route('pertanyaan.show', ['id' => $id]);
            }
        return redirect()->back();
    }
}
