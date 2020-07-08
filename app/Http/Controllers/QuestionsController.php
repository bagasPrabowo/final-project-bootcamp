<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Question;

class QuestionsController extends Controller
{
    public function index(){
    	$questions = Question::all();
    	return view('question.index', get_defined_vars());
    }

    public function create(){
    	return view('question.form');
    }

    public function store(Request $request){
        Validator::make($request->all(), [
            'judul' => 'required|unique:questions',
            'name' => 'required',
            'isi' => 'required',
        ], [
            'required' => ':attribute harus diisi!',
            'unique' => ':attribute pertanyaan tidak boleh sama',
        ])->validate();
    	$questions = Question::create($request->all());
    	if ($questions->save()) {
    		return redirect()->route('pertanyaan.index');
    	}
        return redirect()->back();
    }

    public function show($id){
        $pertanyaan = Question::find($id);
        return view('question.show', get_defined_vars());
    }

    public function edit(Question $id){
        return view('question.edit', get_defined_vars());
    }

    public function update(Request $request, $id){
        Validator::make($request->all(), [
            'judul' => 'required',
            'name' => 'required',
            'isi' => 'required',
        ], [
            'required' => ':attribute harus diisi!',            
        ])->validate();
        $questions = Question::find($id);
        if ($questions->update($request->all())) {
            return redirect()->route('pertanyaan.show',['id' => $id]);
        }
        return redirect()->back();
    }

    public function delete($id){
        $pertanyaan = Question::find($id);
        if ($pertanyaan->delete()) {
        return redirect()->route('pertanyaan.index');
        }
        return redirect()->back();
    }

}
