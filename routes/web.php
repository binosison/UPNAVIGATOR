<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\ExportController;



use Illuminate\Support\Facades\Storage;

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Public Routes (accessible without login)
Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/', [HomeController::class, 'index'])->name('home'); //homepageee


Route::get('/about', [UserController::class, 'about'])->name('about');
Route::get('/contact', [UserController::class, 'contact'])->name('contact');
Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');

//for cite-details
Route::get('/cite', [UserController::class, 'cite'])->name('cite');
Route::get('/riverside', [UserController::class, 'riverside'])->name('riverside');
Route::get('/cma', [UserController::class, 'cma'])->name('cma');
Route::get('/ccje', [UserController::class, 'ccje'])->name('ccje');
Route::get('/cea', [UserController::class, 'cea'])->name('cea');


//MapController
Route::get('/student-plaza', [MapController::class, 'studentPlaza'])->name('student.plaza');
Route::get('/ptc-builidng', [MapController::class, 'ptcBuilding'])->name('ptc.building');



Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});


// Normal Users Routes List (protected by auth middleware)
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/profile', [UserController::class, 'userprofile'])->name('profile');
    Route::post('/review/submit', [ReviewController::class, 'submit'])->name('reviews.submit');
});

//dept-details




// Admin Routes List (protected by auth middleware)
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin/home');

    Route::get('/admin/profile', [AdminController::class, 'profilepage'])->name('admin/profile');
    Route::put('/admin/profile/update', [AdminController::class, 'updateProfile'])->name('admin/profile/update');

    Route::get('/admin/places', [PlaceController::class, 'index'])->name('admin/places');
    Route::get('/admin/places/create', [PlaceController::class, 'create'])->name('admin/places/create');
    Route::post('/admin/places/store', [PlaceController::class, 'store'])->name('admin/places/store');
    Route::get('/admin/places/show/{id}', [PlaceController::class, 'show'])->name('admin/places/show');
    Route::get('/admin/places/edit/{id}', [PlaceController::class, 'edit'])->name('admin/places/edit');
    Route::put('/admin/places/edit/{id}', [PlaceController::class, 'update'])->name('admin/places/update');
    Route::delete('/admin/places/destroy/{id}', [PlaceController::class, 'destroy'])->name('admin/places/destroy');

    Route::get('/places/{id}/map', [PlaceController::class, 'showMap'])->name('admin/places/showMap')->middleware('auth');


    // Routes for Department Management with 'admin' prefix
    Route::get('/admin/departments', [DepartmentController::class, 'index'])->name('admin/departments'); // List all departments
    Route::get('/admin/departments/create', [DepartmentController::class, 'create'])->name('admin/departments/create'); // Show form to create a department
    Route::post('/admin/departments/store', [DepartmentController::class, 'store'])->name('admin/departments/store'); // Store new department
    Route::get('/admin/departments/{id}/edit', [DepartmentController::class, 'edit'])->name('admin/departments/edit'); // Show form to edit department
    Route::put('/admin/departments/{id}', [DepartmentController::class, 'update'])->name('admin/departments/update'); // Update department
    Route::get('/admin/departments/{id}', [DepartmentController::class, 'show'])->name('admin/departments/show'); // Show department details
    Route::delete('/admin/departments/{id}', [DepartmentController::class, 'destroy'])->name('admin/departments/destroy'); // Delete department

    //for gsd
    Route::get('/facilities', [FacilityController::class, 'index'])->name('admin/facilities');
    Route::get('/admin/facilities/create', [FacilityController::class, 'create'])->name('admin/facilities/create'); // Show form to create a department
    Route::post('/admin/facilities/store', [FacilityController::class, 'store'])->name('admin/facilities/store'); // Store new department
    Route::get('/admin/facilities/{id}/edit', [FacilityController::class, 'edit'])->name('admin/facilities/edit'); // Show form to edit department
    Route::put('/admin/facilities/{id}', [FacilityController::class, 'update'])->name('admin/facilities/update'); // Update department
    Route::get('/admin/facilities/{id}', [FacilityController::class, 'show'])->name('admin/facilities/show'); // Show department details
    Route::delete('/admin/facilities/{id}', [FacilityController::class, 'destroy'])->name('admin/facilities/destroy'); // Delete department



    // Review Management Route
    Route::get('/admin/reviews', [ReviewController::class, 'index'])->name('admin/reviews');
    Route::delete('/admin/reviews/destroy/{id}', [ReviewController::class, 'destroy'])->name('admin/reviews/destroy');

    // For managing user queries
    Route::get('/admin/contacts', [ContactController::class, 'index'])->name('admin/contacts');
    Route::get('/admin/contacts/create', [ContactController::class, 'create'])->name('admin/contacts/create');
    Route::delete('/admin/contacts/destroy/{id}', [ContactController::class, 'destroy'])->name('admin/contacts/destroy');

    // For managing users account
    Route::get('admin/users', [UserController::class, 'index'])->name('admin/users/index');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin/users/create');
    Route::post('/admin/users/store', [UserController::class, 'store'])->name('admin/users/store');
    Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin/users/edit');
    Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('admin/users/update');
    Route::delete('/admin/users/destroy/{id}', [UserController::class, 'destroy'])->name('admin/users/destroy');

    Route::get('/export', [ExportController::class, 'export'])->name('export');

});



