<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/student')->group(function () {

    Route::get('/', [StudentController::class, 'student'])->name('student');
    Route::post('/', [StudentController::class, 'store'])->name('student.post');


});
