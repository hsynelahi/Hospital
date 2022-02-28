<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/home' ,[HomeController::class,'redirect'])->name('redirect')->middleware('auth','verified');

Route::get('/' ,[HomeController::class,'index'])->name('index.home');
Route::post('/appointment' ,[HomeController::class,'appointment'])->name('appointment');
Route::get('/myappointment' ,[HomeController::class,'myappointment'])->name('myappointment');
Route::delete('{id}/deletemyappointment' ,[HomeController::class,'deletemyappointment'])->name('deletemyappointment');



Route::get('/admin' ,[AdminController::class,'index'])->name('index.admin');
Route::get('/addDoctorView' ,[AdminController::class,'addDoctorView'])->name('addDoctorView');
Route::post('/addDoctor' ,[AdminController::class,'addDoctor'])->name('addDoctor');
Route::get('/showDoctor' ,[AdminController::class,'showDoctor'])->name('showDoctor');
Route::delete('{id}/deleteDoctor' ,[AdminController::class,'deleteDoctor'])->name('deleteDoctor');
Route::get('{id}/updateDoctorView' ,[AdminController::class,'updateDoctorView'])->name('updateDoctorView');
Route::put('{id}/updateDoctor' ,[AdminController::class,'updateDoctor'])->name('updateDoctor');
Route::get('/showappointment' ,[AdminController::class,'showappointment'])->name('showappointment');
Route::put('{id}/cancelAppointment' ,[AdminController::class,'cancelAppointment'])->name('cancelAppointment');
Route::put('{id}/approveAppointment' ,[AdminController::class,'approveAppointment'])->name('approveAppointment');
Route::get('{id}/emailView' ,[AdminController::class,'emailView'])->name('emailView');
Route::post('{id}/sendEmail' ,[AdminController::class,'sendEmail'])->name('sendEmail');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
