<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ResearchController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\DatasetController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\CollaborationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GalleryController;

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// About Routes
Route::prefix('about')->name('about.')->group(function () {
    Route::get('/profile', [AboutController::class, 'profile'])->name('profile');
    Route::get('/members', [AboutController::class, 'members'])->name('members');
    Route::get('/facilities', [AboutController::class, 'facilities'])->name('facilities');
});

// Research Routes
Route::prefix('research')->name('research.')->group(function () {
    Route::get('/topics', [ResearchController::class, 'topics'])->name('topics');
    Route::get('/publications', [ResearchController::class, 'publications'])->name('publications');
});

// Other Pages
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/gallery/{gallery}', [GalleryController::class, 'show'])->name('gallery.show');
Route::get('/dataset', [DatasetController::class, 'index'])->name('dataset');
Route::get('/reservation', [ReservationController::class, 'index'])->name('reservation');
Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');
Route::get('/collaboration', [CollaborationController::class, 'index'])->name('collaboration');
Route::get('/career', [CareerController::class, 'index'])->name('career');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// Auth Routes
Route::get('/login', [App\Http\Controllers\Auth\AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\AuthController::class, 'login']);
Route::get('/register', [App\Http\Controllers\Auth\AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\AuthController::class, 'register']);
Route::post('/logout', [App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout');

// Google OAuth Routes
Route::get('/auth/google', [App\Http\Controllers\Auth\AuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [App\Http\Controllers\Auth\AuthController::class, 'handleGoogleCallback']);

// Profile Routes (Protected)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('news', App\Http\Controllers\Admin\NewsController::class);
    Route::resource('gallery', App\Http\Controllers\Admin\GalleryController::class);
    Route::resource('jobs', App\Http\Controllers\Admin\JobController::class);
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
    
    // Research Routes
    Route::prefix('research')->name('research.')->group(function () {
        Route::resource('topics', App\Http\Controllers\Admin\ResearchTopicController::class);
        Route::resource('publications', App\Http\Controllers\Admin\PublicationController::class);
        Route::resource('projects', App\Http\Controllers\Admin\ResearchProjectController::class);
    });
});
