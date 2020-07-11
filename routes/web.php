<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function(){
    route::get('/pertanyaan/create', 'QuestionsController@create')->name('pertanyaan.create');

    route::post('/pertanyaan', 'QuestionsController@store')->name('pertanyaan.store');

    route::get('/pertanyaan/{id}', 'QuestionsController@show')->name('pertanyaan.show');

    route::get('/pertanyaan/{id}/edit', 'QuestionsController@edit')->name('pertanyaan.edit');

    route::put('/pertanyaan/{id}', 'QuestionsController@update')->name('pertanyaan.update');

    route::delete('/pertanyaan/{id}', 'QuestionsController@delete')->name('pertanyaan.delete');

    route::get('/jawaban/{pertanyaan_id}', 'AnswersController@index')->name('jawaban.index');

    route::post('/jawaban/{pertanyaan_id}','AnswersController@store')->name('jawaban.store');
});

Route::get('/pertanyaan', 'QuestionsController@index')->name('pertanyaan.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/pertanyaan/{id}/1', 'VoteController@store1')->name('vote.store1');

Route::post('/pertanyaan/{id}/0', 'VoteController@store2')->name('vote.store2');

route::post('/pertanyaan/{id}/commentq', 'CommentsController@storeq')->name('comment.storeq');

route::post('/pertanyaan/{id}/commenta', 'CommentsController@storea')->name('comment.storea');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
