<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\QuestionComment;
use App\Models\AnswerComment;

class CommentsController extends Controller
{
    public function storeq($id, Request $request){
        Validator::make($request->all(), [
           'user_id' => 'required',
           'komentar' => 'required',
           'question_id' => 'required'
       ], [
           'required' => ':attribute harus diisi!'
       ])->validate();
       $user = Auth::user();
       if (!$user){
           return redirect()->route('login');
       }
       $comments = QuestionComment::create($request->all());
       if ($comments->save()) {
           return redirect()->route('pertanyaan.show',['id'=>$id]);
       }
       return redirect()->back();
   }

   public function storea($id, Request $request){
    Validator::make($request->all(), [
       'user_id' => 'required',
       'komentar' => 'required',
       'answer_id' => 'required'
   ], [
       'required' => ':attribute harus diisi!'
   ])->validate();
   $user = Auth::user();
   if (!$user){
       return redirect()->route('login');
   }
   $comments = AnswerComment::create($request->all());
   if ($comments->save()) {
       return redirect()->route('pertanyaan.show',['id'=>$id]);
   }
   return redirect()->back();
}
}
