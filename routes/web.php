<?php

use App\Http\Controllers\Admin\AvailableAppointmentController as AdminAvailableAppointmentController;
use App\Http\Controllers\Admin\CityController as AdminCityController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\DoctorController as AdminDoctorController;
use App\Http\Controllers\Admin\HospitalController as AdminHospitalController;
use App\Http\Controllers\Admin\OfferController as AdminOfferController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Admin\SlideController as AdminSlideController;
use App\Http\Controllers\Admin\SpecialtyController as AdminSpecialtyController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\DoctorIsAuthenticated;
use App\Models\Hospital;
use Illuminate\Support\Facades\Route;

//home routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('doctor/hospital/{hospital}', [DoctorController::class, 'hospital'])->name('doctor.hospital');
Route::get('doctors/search', [DoctorController::class, 'search'])->name('doctors.search');
Route::get('doctors', [DoctorController::class, 'index'])->name('doctors');
Route::get('doctor/show/{doctor}', [DoctorController::class, 'show'])->name('doctor.show');
Route::get('offers', [OfferController::class, 'index'])->name('offers');
Route::get('offer/show/{offer}', [OfferController::class, 'show'])->name('offer.show');
Route::get('contact-us', [ContactController::class, 'create'])->name('contactus');
Route::post('contact-us', [ContactController::class, 'store'])->name('contact.submit');
Route::post('order', [OrderController::class, 'store'])->name('order.store');
// Route::get('pages', [PageController::class, 'index'])->name('pages');
Route::get('page/{page}', [PageController::class, 'show'])->name('page');

// admin routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth', AdminMiddleware::class]], function () {
    Route::view('/', 'admin.layouts.backend')->name('dashboard');

    Route::patch('slides/actions', [AdminSlideController::class, 'actions'])->name('slides.actions');
    Route::resource('slides', AdminSlideController::class);

    Route::patch('pages/actions', [AdminPageController::class, 'actions'])->name('pages.actions');
    Route::resource('pages', AdminPageController::class);

    Route::patch('users/actions', [AdminUserController::class, 'actions'])->name('users.actions');
    Route::resource('users', AdminUserController::class);

    Route::patch('hospitals/actions', [AdminHospitalController::class, 'actions'])->name('hospitals.actions');
    Route::resource('hospitals', AdminHospitalController::class);

    Route::patch('doctors/actions', [AdminDoctorController::class, 'actions'])->name('doctors.actions');
    Route::resource('doctors', AdminDoctorController::class);

    Route::patch('cities/actions', [AdminCityController::class, 'actions'])->name('cities.actions');
    Route::resource('cities', AdminCityController::class);

    Route::patch('specialties/actions', [AdminSpecialtyController::class, 'actions'])->name('specialties.actions');
    Route::resource('specialties', AdminSpecialtyController::class);

    Route::patch('contacts/actions', [AdminContactController::class, 'actions'])->name('contacts.actions');
    Route::resource('contacts', AdminContactController::class);

    Route::patch('offers/actions', [AdminOfferController::class, 'actions'])->name('offers.actions');
    Route::resource('offers', AdminOfferController::class);

    Route::patch('available-appointments/actions', [AdminAvailableAppointmentController::class, 'actions'])->name('available-appointments.actions');
    Route::resource('available-appointments', AdminAvailableAppointmentController::class);

    Route::patch('reviews/actions', [AdminReviewController::class, 'actions'])->name('reviews.actions');
    Route::resource('reviews', AdminReviewController::class);

    Route::patch('orders/actions', [AdminOrderController::class, 'actions'])->name('orders.actions');
    Route::resource('orders', AdminOrderController::class);
});

// doctor routs
Route::group(['prefix' => 'doctor'], function () {
    Route::get('login', [DoctorController::class, 'login'])->name("doctor.login");
    Route::post('signin', [DoctorController::class, "signin"])->name('doctor.signin');

    Route::get('register', [DoctorController::class, 'register'])->name("doctor.register");
    Route::post('signup', [DoctorController::class, "signup"])->name('doctor.signup');

// doctor only area
    Route::middleware(DoctorIsAuthenticated::class)->group(function () {
        Route::get('dashboard', [DoctorController::class, 'dashboard'])->name("doctor.dashboard");

        Route::get('appointment', [DoctorController::class, 'appointment'])->name("doctor.appointment");
        Route::post('appointment.store', [DoctorController::class, 'store'])->name("doctor.appointment.store");
    });
});


Route::view('login', 'auth.login')->name("login");
Route::post('signin', [UserController::class, "signin"])->name('signin');
Route::view('register', 'auth.register')->name("register");
Route::post('signup', [UserController::class, "signup"])->name('signup');
Route::post('logout', [UserController::class, 'logout'])->name('logout');

Route::get('ckeditor', [CkeditorController::class, 'index']);
Route::post('ckeditor/upload', [CkeditorController::class, 'upload'])->name('ckeditor.upload');
