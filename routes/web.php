<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ShapeController;
use App\Http\Controllers\MathProblemController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//auth route for all user 
Route::group(['middleware' => ['auth']], function() { 
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});

// for admin and teacher
Route::group(['middleware' => ['auth' , 'role:admin|teacher']], function() { 
    Route::get('/accounts/show-accounts', 'App\Http\Controllers\AccountController@showAccounts');
    Route::resource('accounts', AccountController::class);
});

// for teachers
Route::group(['middleware' => ['auth', 'role:teacher|student']], function() { 
    Route::get('/activities/quizzes/show-math-problem', 'App\Http\Controllers\QuizController@showMathProblem')->name('show-math-problem');
    Route::get('/activities/quizzes/show-color', 'App\Http\Controllers\QuizController@showColor')->name('show-color');
    Route::get('/activities/quizzes/show-quiz-responses', 'App\Http\Controllers\QuizController@showQuizResponses')->name('show-quiz-responses');
    Route::get('/activities/quizzes/show-color-quizzes', 'App\Http\Controllers\QuizController@showColorQuizzes')->name('show-color-quizzes');
    Route::get('/activities/quizzes/show-math-problem-quizzes', 'App\Http\Controllers\QuizController@showMathProblemQuizzes')->name('show-math-problem-quizzes');
    Route::get('/activities/quizzes/show-quizzes', 'App\Http\Controllers\QuizController@showQuizzes');
    Route::post('/activities/quizzes/store-result', 'App\Http\Controllers\QuizController@storeResult')->name('store-result');
    Route::get('/activities/shapes/show-shapes', 'App\Http\Controllers\ShapeController@showShape')->name('show-shape');
    Route::get('activities/reading', 'App\Http\Controllers\QuizController@showReading')->name('show-reading');
    Route::resource('activities/quizzes/questions/responses', ResponseController::class);
    Route::resource('activities/quizzes/questions', QuestionController::class);
    Route::resource('activities/quizzes', QuizController::class);
    Route::resource('activities/quizzes/math-problem', MathProblemController::class);
    Route::resource('activities/shapes', ShapeController::class);
    Route::resource('activities', ActivityController::class);
});

// for student
Route::group(['middleware' => ['auth', 'role:student']], function() { 
    Route::get('/dashboard/myprofile', 'App\Http\Controllers\DashboardController@myprofile')->name('dashboard.myprofile');
});





require __DIR__.'/auth.php';
