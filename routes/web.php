<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;

Auth::routes();


Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth'])->group(function () {


    Route::get('/admin/dashboard', [HomeController::class, 'index'])
        ->name('admin.dashboard');


    Route::resource('student', StudentController::class);

    Route::get('student-cards', [StudentController::class, 'printCards'])
        ->name('student.cards');

    Route::resource('class', ClassesController::class);


    Route::resource('section', SectionsController::class);



    Route::get('/settings', [SettingController::class, 'index'])
        ->name('settings');

    Route::post('/settings/save', [SettingController::class, 'save'])
        ->name('settings.save');

    Route::resource('role', RoleController::class);

    Route::post('role/store', [RoleController::class, 'store'])
        ->name('role.store');

    Route::get('/staff/dashboard', function () {
        return view('backend.index');
    })->name('staff.dashboard');

    Route::resource('staff', StaffController::class);
});
