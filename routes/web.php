<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DoctorController;

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



Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/home', [HomeController::class, 'redirect']) ->middleware('auth', 'verified')->name('user.home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Check user type for not customer/user
Route::group(['middleware' => ['auth', 'checkUserType']], function () {
    Route::post('/upload_doctor', [AdminController::class, 'upload']);

    Route::get('/showappointmentdetails/{id}', [AdminController::class, 'showappointmentdetails'])->name('admin.showappointmentdetails');

    Route::get('/approved/{id}', [AdminController::class, 'approved']);

    Route::get('/cancelled/{id}', [AdminController::class, 'cancelled']);

    Route::get('/showalldoctors', [AdminController::class, 'showalldoctors'])->name('admin.showalldoctors');

    Route::get('/showdoctordetails/{id}', [AdminController::class, 'showdoctordetails'])->name('admin.showdoctordetails');

    Route::get('/createdoctor', [AdminController::class, 'createdoctor'])->name('admin.createdoctor');

    Route::post('/storedoctor', [AdminController::class, 'storedoctor'])->name('admin.storedoctor');

    Route::delete('/deletedoctor/{id}', [AdminController::class, 'deletedoctor'])->name('admin.deletedoctor');

    Route::put('/updatedoctor/{id}', [AdminController::class, 'updatedoctor'])->name('admin.updatedoctor');

    Route::get('/editdoctor/{id}', [AdminController::class, 'editdoctor'])->name('admin.editdoctor');

    Route::get('/showappointments', [AdminController::class, 'showappointments'])->name('admin.showappointments');

    Route::get('/showfollowup', [AdminController::class, 'showfollowup'])->name('admin.showfollowup');

    Route::get('/appointmentblocking', [AdminController::class, 'appointmentblocking'])->name('admin.appointmentblocking');

    Route::get('/emailview/{id}', [AdminController::class, 'emailview']);

    Route::post('/sendemail/{id}', [AdminController::class, 'sendemail']);

    Route::get('/admin', [AdminController::class, 'adminviewhome'])->name('admin.home');

    Route::get('export-excel-show-appointments', [AdminController::class, 'exportToExcel'])->name('export.excel-show-appointments');
    Route::get('export-csv-show-appointments', [AdminController::class, 'exportToCsv'])->name('export.csv-show-appointments');

    Route::get('export-pdf-show-appointments', [AdminController::class, 'exportPdf'])->name('export.pdf-show-appointments');
});

// routes/web.php
Route::get('/check-appointments', [App\Http\Controllers\HomeController::class, 'checkAppointments']);
Route::get('/get-available-slots', [App\Http\Controllers\HomeController::class, 'getAvailableSlots']);


Route::post('/store-appointment', [HomeController::class, 'store_appointment'])->name('store.appointment');

Route::get('/myappointment', [HomeController::class, 'myappointment']);

Route::put('/cancel_appointment/{id}', [HomeController::class, 'cancel_appointment'])->name('appointment.cancel');

Route::put('/followup_appointment/{id}', [HomeController::class, 'followup_appointment'])->name('appointment.followup');

Route::put('/complete_appointment/{id}', [HomeController::class, 'complete_appointment'])->name('appointment.complete');

Route::get('/add_customer', [CustomerController::class, 'add_customer']);
Route::post('/insert_customer', [CustomerController::class, 'Store']);

Route::get('/appointments', [CustomerController::class, 'appointments']);

Route::get('/deletecustomer/{id}', [CustomerController::class, 'deletecustomer']);

Route::get('/update_customer/{id}', [CustomerController::class, 'update_customer']);

Route::post('/edit_customer/{id}', [CustomerController::class, 'edit_customer']);

Route::get('/doctor', [DoctorController::class, 'adminviewhome']);

Route::get('export-excel-home-appointments', [HomeController::class, 'exportToExcel'])->name('export.excel-home-appointments');
Route::get('export-csv-home-appointments', [HomeController::class, 'exportToCsv'])->name('export.csv-home-appointments');

Route::get('export-pdf-home-appointments', [HomeController::class, 'exportPdf'])->name('export.pdf-home-appointments');

Route::get('/send-email-create-appointment', [HomeController::class, 'sendCreateAppointmentEmail'])->name('email.create-appointment');
