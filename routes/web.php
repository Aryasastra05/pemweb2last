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

// route untuk menyimpan hasil update student
Route::put('admin/student/update/{id}', [StudentController::class, 'update']);

// route untuk menampilkan form tambah cources
Route::get('admin/cources/create', [CourcesController::class, 'create']);

// route untuk mengirim data form tambah courses
Route::post('admin/cources/create', [CourcesController::class, 'store']);

// route untuk menampilkan halaman edit courses
Route::get('admin/cources/edit/{id}', [CourcesController::class, 'edit'])->name('cources.edit');

// route untuk menyimpan hasil update courses
Route::put('admin/cources/update/{id}', [CourcesController::class, 'update']);

// route untuk  menghapus courses
Route::delete('admin/cources/delete/{id}', [CourcesController::class, 'destroy']);

// route untuk  menghapus student
Route::delete('admin/student/delete/{id}', [StudentController::class, 'destroy']);

