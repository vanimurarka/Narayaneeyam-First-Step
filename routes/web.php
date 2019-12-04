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

// Route::get('feedback', function () {
//     return view('feedback');
// })->name('feedback');
Route::get('feedback', 'FeedbackController@showFeedback')->name('feedback');
Route::post('submit-feedback', 'FeedbackController@receiveFeedback')->name('submit-feedback');

Route::get('/generate-docx/{slug}', 'WordDashaka');
Route::get('/{slug}', 'ShowDashaka');
