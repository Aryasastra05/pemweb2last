<?php
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourcesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/dashboard', [DashboardController::class, 'index']);

// route untuk menampilkan student
Route::get('admin/student', [StudentController::class, 'index']);

// route untuk menampilkan cources
Route::get('admin/cource', [CourcesController::class, 'index']);

// route untuk menampilkan form tambah student
Route::get('admin/student/create', [StudentController::class, 'create']);

// route untuk mengirim data form tambah student
Route::post('admin/student/create', [StudentController::class, 'store']);

// route untuk menampilkan halaman edit student
Route::get('admin/student/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
