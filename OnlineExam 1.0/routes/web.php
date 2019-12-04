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
Route::get('/myexam/info/{id}','MyExamController@getInfoExam')->name('info');
Route::get('/myexam/edit/{id}','MyExamController@getEditExam')->name('edit');
Route::get('/myexam/{id}','MyExamController@getCreateExam');
Route::get('/exam','ExamController@getExamList');
Route::get('/exam/test/{name}','ExamController@getExam')->name('exam');
Route::post('/exam/test/scores/{name}','ExamController@postExam')->name('postexam');
Route::get('/exam/info/{name}','ExamController@getInfoExam');
Route::get('/exam/report/{name}','ExamController@getReportExam');

Route::get('/contact','ContactController@getContact');



Route::get('/admin','AdminController@getAdmin');
Route::get('/admin/login','AdminController@getAdminLogin');
Route::post('/admin/postLogin','AdminController@postAdminLogin')->name('adminLogin');






