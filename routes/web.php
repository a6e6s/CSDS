<?php

use App\Http\Controllers\Admin\AvailableAppointmentController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\HospitalController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\SpecialtyController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\DoctorController as ControllersDoctorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfferController as ControllersOfferController;
use App\Http\Controllers\PageController as ControllersPageController;
use Illuminate\Support\Facades\Route;

//home routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('doctors', [ControllersDoctorController::class, 'index'])->name('doctors');
Route::get('offers', [ControllersOfferController::class, 'index'])->name('offers');
Route::get('contact-us', [ContactController::class, 'index'])->name('contactus');
Route::get('pages', [PageController::class, 'index'])->name('pages');
Route::get('page/{page}', [ControllersPageController::class, 'show'])->name('page');


// admin routes
Route::group(['prefix' => 'admin'], function () {
    // Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::view('/', 'admin.layouts.backend')->name('dashboard');

    Route::patch('pages/actions', [PageController::class, 'actions'])->name('pages.actions');
    Route::resource('pages', PageController::class);

    Route::patch('users/actions', [UserController::class, 'actions'])->name('users.actions');
    Route::resource('users', UserController::class);

    Route::patch('hospitals/actions', [HospitalController::class, 'actions'])->name('hospitals.actions');
    Route::resource('hospitals', HospitalController::class);

    Route::patch('doctors/actions', [DoctorController::class, 'actions'])->name('doctors.actions');
    Route::resource('doctors', DoctorController::class);

    Route::patch('cities/actions', [CityController::class, 'actions'])->name('cities.actions');
    Route::resource('cities', CityController::class);

    Route::patch('specialties/actions', [SpecialtyController::class, 'actions'])->name('specialties.actions');
    Route::resource('specialties', SpecialtyController::class);

    Route::patch('slides/actions', [SlideController::class, 'actions'])->name('slides.actions');
    Route::resource('slides', SlideController::class);

    Route::patch('contacts/actions', [ContactController::class, 'actions'])->name('contacts.actions');
    Route::resource('contacts', ContactController::class);

    Route::patch('offers/actions', [OfferController::class, 'actions'])->name('offers.actions');
    Route::resource('offers', OfferController::class);

    Route::patch('available-appointments/actions', [AvailableAppointmentController::class, 'actions'])->name('available-appointments.actions');
    Route::resource('available-appointments', AvailableAppointmentController::class);

    Route::patch('reviews/actions', [ReviewController::class, 'actions'])->name('reviews.actions');
    Route::resource('reviews', ReviewController::class);

    Route::patch('orders/actions', [OrderController::class, 'actions'])->name('orders.actions');
    Route::resource('orders', OrderController::class);
});


Route::get('ckeditor', [CkeditorController::class, 'index']);
Route::post('ckeditor/upload', [CkeditorController::class, 'upload'])->name('ckeditor.upload');
