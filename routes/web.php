<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'redirect']) ->middleware('auth', 'verified');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/add_doctor_view', [AdminController::class, 'addview']);

Route::post('/upload_doctor', [AdminController::class, 'upload']);

Route::post('/appointment', [HomeController::class, 'appointment']);

Route::get('/myappointment', [HomeController::class, 'myappointment']);

Route::get('/cancel_appoint/{id}', [HomeController::class, 'cancel_appoint']);

Route::get('/showappointment', [AdminController::class, 'showappointment']);
// approved and disapproved
Route::get('/show/{status}', [AdminController::class, 'show']);

Route::get('/approved/{id}', [AdminController::class, 'approved']);

Route::get('/cancelled/{id}', [AdminController::class, 'cancelled']);

Route::get('/showdoctor', [AdminController::class, 'showdoctor']);

Route::get('/deletedoctor/{id}', [AdminController::class, 'deletedoctor']);

Route::get('/updatedoctor/{id}', [AdminController::class, 'updatedoctor']);

Route::post('/editdoctor/{id}', [AdminController::class, 'editdoctor']);

Route::get('/emailview/{id}', [AdminController::class, 'emailview']);

Route::post('/sendemail/{id}', [AdminController::class, 'sendemail']);

Route::get('/add_customer', [CustomerController::class, 'add_customer']);
Route::post('/insert_customer', [CustomerController::class, 'Store']);

Route::get('/appointments', [CustomerController::class, 'appointments']);

Route::get('/deletecustomer/{id}', [CustomerController::class, 'deletecustomer']);

Route::get('/update_customer/{id}', [CustomerController::class, 'update_customer']);

Route::post('/edit_customer/{id}', [CustomerController::class, 'edit_customer']);

Route::get('/admin', [AdminController::class, 'adminviewhome']);
