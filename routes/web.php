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
    $levelsCount = App\Model\Level::all()->count();
    $subjectsCount = App\Model\SchoolSubject::all()->count();
    $sectionsCount = App\Model\Section::all()->count();
    return view('welcome', ['levelsC' => $levelsCount, 'subjectsC' => $subjectsCount, 'sectionsC' => $sectionsCount]);
});

Auth::routes();
Route::get('/home', 'HomeController@index');
Route::get('/forum', 'ForumController@start');
Route::get('/forum/search', ['uses' => 'ForumController@search',
 'as' => 'forum.search']);
Route::post('/forum/ss_update', ['uses' => 'ForumController@ssFind',
 'as' => 'forum.ss_update']);
Route::post('/forum/section_update', ['uses' => 'ForumController@sectionFind',
 'as' => 'forum.section_update']);
Route::get('/forum/{id}/question', ['uses' => 'ForumController@question',
 'as' => 'forum.question']);
Route::post('/forum/create/question', ['uses' => 'ForumController@createQuestion',
    'as' => 'forum.create_question']);
Route::post('/forum/create/answer', ['uses' => 'ForumController@createAnswer',
    'as' => 'forum.create_answer']);
Route::post('/forum/rate/answer', ['uses' => 'ForumController@goodBadAnswer',
    'as' => 'forum.good_bad_answer']);
