<?php

use Illuminate\Support\Facades\Route;

/**
 * Web Section
 */
Route::get('/', 'WebController@index');
/**
 * Authentication
 */
Auth::routes();
/**
 * User Section
 */
Route::get('user/10qExam', 'ExamController@tenqexam')->name('exam.10q');
Route::get('user/50qExam', 'ExamController@fiftyqexam')->name('exam.50q');
Route::get('user/100qExam', 'ExamController@hundredqexam')->name('exam.100q');
Route::get('user/adminExam', 'ExamController@adminexam')->name('exam.admin');
Route::post('user/examin', 'ExamController@examin')->name('examin');
Route::get('user/reset', 'DashController@reset')->name('reset');
Route::get('user/dashboard', 'DashController@index')->name('dash');
/**
 * Admin Section
 */
Route::get('admin/dashboard', 'DashController@index')->name('admin.dash')->middleware('is_admin');
Route::resource('admin/question', 'QuestionBankController')->except(['show','edit','update'])->middleware('is_admin');
Route::get('admin/question/data', 'QuestionBankController@data')->name('question.data')->middleware('is_admin');
Route::resource('admin/subject', 'SubjectController')->middleware('is_admin');
Route::resource('admin/exam', 'ExamSettingController')->middleware('is_admin');