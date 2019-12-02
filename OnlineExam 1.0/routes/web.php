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

Route::get('/', 'HomeController@index')->name('home');
Auth::routes();
Route::get('/myexam', 'MyExamController@getMyExam');
Route::post('/myexam','MyExamController@postMyExam')->name('postmyexam');
Route::get('/myexam/createexam/{examname}','MyExamController@getCreateExam');
Route::post('/myexam/createexam','MyExamController@postCreateExam')->name('postcreateexam');
Route::get('/myexam/deleteexam/{id}','MyExamController@deleteExam')->name('deleteexam');

Route::get('/myexam/{id}','MyExamController@getCreateExam');
Route::get('/exam','ExamController@getExamList');
Route::get('/exam/{name}','ExamController@getExam')->name('exam');;





