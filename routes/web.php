<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\QrCodeController;

Route::get('/', function () {
    return view('welcome');
});

// Define routes for student management
Route::get('/student', [StudentController::class, 'index'])->name('students.index'); // List students
Route::get('/student/create', [StudentController::class, 'create'])->name('students.create'); // Show create form
Route::post('/student', [StudentController::class, 'store'])->name('students.store'); // Store new student
Route::get('/student/{id}', [StudentController::class, 'show'])->name('students.show'); // Show single student details
Route::get('/student/{id}/edit', [StudentController::class, 'edit'])->name('students.edit'); // Show edit form
Route::put('/student/{id}', [StudentController::class, 'update'])->name('students.update'); // Update student
Route::delete('/student/{id}', [StudentController::class, 'destroy'])->name('students.destroy'); // Delete student

// Routes for QRCode Management
Route::post('/generate-qr-code', [QrCodeController::class, 'generate'])->name('generate.qr.code');

Route::get('/generate-qr-code', function () {
    return view('generate-qr-code');
})->name('qr.code.form');

Route::get('/scan-qr-code', [QrCodeController::class, 'scan'])->name('scan.qr.code');