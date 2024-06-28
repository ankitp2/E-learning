<?php

use App\Http\Controllers\LessonController;
use App\Http\Controllers\QuizresultController;
use App\Http\Controllers\SuscriberController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\QuizController;

Route::get('/', function () {
    return view('index');
})->name('index');
Route::get('/signup',function(){
    return view('signup');
})->name('signup');
Route::post('registration', [UserController::class, 'store'])->name('register');
Route::get('admin/home', [UserController::class, 'admin_index'])->name('admin.adminindex');
Route::post('login', [UserController::class, 'login'])->name('login');
Route::get('logout', [UserController::class, 'logout'])->name('logout');
Route::group(['middleware' => 'userauth'],function(){
    Route::get('/courses', [CourseController::class, 'index'])->name('courses');
    Route::get('/courses/addCourses', [CourseController::class, 'show'])->name('admin.add.courses');
    Route::get('/courses/addLesson', [LessonController::class, 'show'])->name('admin.add.lesson');
    Route::get('/courses/addQuiz', [QuizController::class, 'show'])->name('admin.add.quiz');
    Route::post('/courses/addCourses/courses', [CourseController::class, 'store'])->name('admin.store.courses');
    Route::post('/courses/addCourses/lessons', [LessonController::class, 'store'])->name('admin.store.lessons');
    Route::post('/courses/addCourses/quiz', [QuizController::class, 'store'])->name('admin.store.quiz');
    Route::post('courses/addCourses/test', [QuizController::class, 'test'])->name('admin.store.test');
    Route::get('/courses/{id}', [CourseController::class, 'profile'])->name('courses.profile');
    Route::get('/courses/lesson/video/{video}', [LessonController::class, 'show_video'])->name('video');
    Route::get('/courses/lesson/quiz/{course_id}/{lesson_id}', [QuizController::class, 'show_quiz'])->name('quiz');
    Route::get('/courses/lesson/intro_video/{video}', [LessonController::class, 'intro_video'])->name('intro_video');
    Route::get('/courses/purchase/{course_id}', [SuscriberController::class, 'store'])->name('suscribe');
    Route::post('/courses/quiz/result/{course_id}/{lesson_id}', [QuizresultController::class, 'result'])->name('quiz.result');

});
