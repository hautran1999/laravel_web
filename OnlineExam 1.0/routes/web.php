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
Route::post('/postCheck', 'HomeController@postCheckIndex')->name('check');
Route::get('/messenger/{messenger}','HomeController@getMessenger')->name('messenger');
Auth::routes();

Route::get('/myexam', 'MyExamController@getMyExam');
Route::post('/myexam', 'MyExamController@postMyExam')->name('post_myexam');
Route::get('/myexam/createexam/{name}', 'MyExamController@getCreateExam');
Route::post('/myexam/createexam', 'MyExamController@postCreateExam')->name('post_create_exam');
Route::get('/myexam/deleteexam/{id}', 'MyExamController@deleteExam')->name('delete_exam');
Route::get('/myexam/info/{id}', 'MyExamController@getInfoExam')->name('info');
Route::get('/myexam/edit/{id}', 'MyExamController@getEditExam')->name('edit');
Route::post('/myexam/postedit/{id}', 'MyExamController@postEditExam')->name('postedit');
Route::get('/myexam/{id}', 'MyExamController@getCreateExam');

Route::group(['middleware' => 'checksession'], function () {
    Route::get('/exam', 'ExamController@getExamList');
    Route::get('/exam/info/{name}', 'ExamController@getInfoExam');
    Route::get('/exam/report/{name}', 'ExamController@getReportExam')->name('report');
    Route::post('/exam/postReport/{name}','ExamController@postReportExam')->name('post_report');
});

Route::get('/exam/test/password/{name}', 'ExamController@getPasswordExam')->name('pass_exam');
Route::post('/exam/test/postpassword/{name}', 'ExamController@postPasswordExam')->name('post_pass_exam');
Route::get('/exam/test/{name}', 'ExamController@getExam')->name('test_exam');
Route::post('/exam/test/scores/{name}', 'ExamController@postExam')->name('post_exam');
Route::post('/exam/test/saveresult', 'ExamController@postSaveResultExam')->name('saveResult');

Route::get('/contact', 'ContactController@getContact');


Route::get('/admin', 'AdminController@getAdmin')->name('admin');
