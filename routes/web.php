<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExamController;


Route::get('/', function () {
    return view('admin.index');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('quizz/{quizId}',[ExamController::class, 'getQuizQuestions'])->middleware('auth');

Route::post('quizz/create',[ExamController::class, 'postQuiz'])->middleware('auth');
Route::get('/result/user/{userId}/quiz/{quizId}',[ExamController::class, 'viewResult'])->middleware('auth');

Route::group(['middleware'=>'isAdmin'],function(){

Route::get('/', function () {
    return view('admin.index');
});


Route::resource('quiz',QuizController::class);
Route::resource('question',QuestionController::class);
Route::resource('user',UserController::class);
Route::get('/quiz/{id}/questions',[App\Http\Controllers\QuizController::class, 'question'])->name('quiz.question');
Route::get('/exam/assign',[ExamController::class, 'create'])->name('user.exam');
Route::post('/exam/assign',[ExamController::class, 'assignExam'])->name('exam.assign');
Route::get('exam/user',[ExamController::class, 'userExam'])->name('view.exam');
Route::post('exam/remove',[ExamController::class, 'removeExam'])->name('exam.remove');

Route::get('result',[ExamController::class, 'result'])->name('result');
Route::get('result/{userId}/{quizId}',[ExamController::class, 'userQuizResult']);

});