<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SkillController;
use App\Http\Controllers\Backend\SportController;
use App\Http\Controllers\Backend\TermsController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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



// Guest Users
Route::middleware('guest')->group(function () {
    Route::get('/', function(){
        return view('welcome');
    });
    Route::get('/dashboard/login', [AuthController::class, 'create'])->name('dashboard.login');
    Route::post('/dashboard/login', [AuthController::class, 'store'])->name('dashboard.store');
});

// Middleware to check if the user is an admin
Route::prefix('/dashboard')->middleware(['jwt.from.cookie', 'isAdmin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('dashboard.logout');
    Route::get('/users', [ProfileController::class, 'users'])->name('dashboard.users');
    Route::get('/gallery', [ProfileController::class, 'gallery'])->name('dashboard.gallery');

    // Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('dashboard.profile');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password/update', [ProfileController::class, 'updatePassword'])->name('password.update');


    // sport module
    Route::get('/sport', [SportController::class, 'index'])->name('sport.index');
    Route::post('/sport/create', [SportController::class, 'store'])->name('sport.store');
    Route::put('/sport/{id}', [SportController::class, 'update'])->name('sport.update');
    Route::delete('/sport/{id}', [SportController::class, 'destroy'])->name('sport.destroy');

    // skill module
    Route::get('/skill', [SkillController::class, 'index'])->name('skill.index');
    Route::post('/skill/create', [SkillController::class, 'store'])->name('skill.store');
    Route::put('/skill/{id}', [SkillController::class, 'update'])->name('skill.update');
    Route::delete('/skill/{id}', [SkillController::class, 'destroy'])->name('skill.destroy');

    // terms module
    Route::get('/terms', [TermsController::class, 'index'])->name('terms.index');
    Route::post('/terms/create', [TermsController::class, 'store'])->name('terms.store');
    Route::put('/terms/{id}', [TermsController::class, 'update'])->name('terms.update');
    Route::delete('/terms/{id}', [TermsController::class, 'destroy'])->name('terms.destroy');

});


