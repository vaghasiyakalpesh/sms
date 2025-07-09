<?php

use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.login');
});
Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'admin.guest'], function () {
        Route::get('login', [AdminController::class, 'login'])
            ->name('admin.login');

        Route::get('register', [AdminController::class, 'register'])
            ->name('admin.register');

        Route::post('authenticate', [adminController::class, 'authenticate'])
            ->name('admin.authenticate');
    });

    Route::group(['middleware' => 'admin.auth'], function () {

        Route::get('logout', [AdminController::class, 'logout'])
            ->name('admin.logout');

        Route::get('dashboard', [AdminController::class, 'dashboard'])
            ->name('admin.dashboard');

        Route::get('form', [AdminController::class, 'form'])
            ->name('admin.form');

        Route::get('table', [AdminController::class, 'table'])
            ->name('admin.table');

        Route::group(['prefix' => 'academic-year'], function () {

            Route::get('create', [AcademicYearController::class, 'create'])
                ->name('academic-year.create');

            Route::post('store', [AcademicYearController::class, 'store'])
                ->name('academic-year.store');

            Route::get('index', [AcademicYearController::class, 'index'])
                ->name('academic-year.index');

            Route::get('delete/{id}', [AcademicYearController::class, 'destroy'])
                ->name('academic-year.delete');

            Route::get('edit/{id}', [AcademicYearController::class, 'edit'])
                ->name('academic-year.edit');

            Route::post('update', [AcademicYearController::class, 'update'])->name('academic-year.update');
        });

    });
});



