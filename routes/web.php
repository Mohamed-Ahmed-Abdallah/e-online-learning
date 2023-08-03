<?php

use Illuminate\Support\Facades\Route;

// admin controllers
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\InstructorController;
use App\Http\Controllers\admin\CourseController;
use App\Http\Controllers\admin\StudentController;
use App\Http\Controllers\admin\ScheduleController;

// instructor controllers
use App\Http\Controllers\instructor\InstructorController as InstructorLogin;
use App\Http\Controllers\instructor\VideoController;

session_start();

// Routes for admin dashboard

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::middleware('checkadminlogin')->group(function () {
        Route::view('/home', 'admin.pages.home')->name('admin.home');

        Route::prefix('student')->group(function () {
            Route::get('/', [StudentController::class, 'list'])->name('admin.student.list');
            Route::get('/create', [StudentController::class, 'create'])->name('admin.student.create');
            Route::post('/store', [StudentController::class, 'store'])->name('admin.student.store');
            Route::get('/delete/{id}', [StudentController::class, 'destroy'])->name('admin.student.destroy');
        });

        Route::prefix('instructor')->group(function () {
            Route::get('/', [InstructorController::class, 'list'])->name('admin.instructor.list');
            Route::get('/create', [InstructorController::class, 'create'])->name('admin.instructor.create');
            Route::post('/store', [InstructorController::class, 'store'])->name('admin.instructor.store');
            Route::get('/delete/{id}', [InstructorController::class, 'destroy'])->name('admin.instructor.destroy');
        });

        Route::prefix('course')->group(function () {
            Route::get('/', [CourseController::class, 'list']);
            Route::get('/create', [CourseController::class, 'create'])->name('admin.course.create');
            Route::post('/store', [CourseController::class, 'store'])->name('admin.course.store');
            Route::get('/list', [CourseController::class, 'list'])->name('admin.course.list');
            Route::get('/delete/{id}', [CourseController::class, 'destroy'])->name('admin.course.destroy');
        });

        Route::prefix('schedule')->group(function () {
            Route::get('/create', [ScheduleController::class, 'create'])->name('admin.schedule.create');
            Route::post('/store', [ScheduleController::class, 'store'])->name('admin.schedule.store');
        });
    });

    Route::any('{query}', function () {
        return redirect()->route('admin.index');
    })->where('query', '.*');
});

// Routes for instructor dashboard

Route::prefix('instructor')->group(function () {
    Route::get('/', [InstructorLogin::class, 'index'])->name('instructor.index');
    Route::post('/login', [InstructorLogin::class, 'login'])->name('instructor.login');
    Route::get('/logout', [InstructorLogin::class, 'logout'])->name('instructor.logout');

    Route::middleware('checkinstructorlogin')->group(function () {
        Route::view('/home', 'instructor.pages.home')->name('instructor.home');

        Route::prefix('video')->group(function () {
            Route::get('/', [VideoController::class, 'list']);
            Route::get('/create', [VideoController::class, 'create'])->name('instructor.video.create');
            Route::post('/store', [VideoController::class, 'store'])->name('instructor.video.store');
            Route::get('/list', [VideoController::class, 'list'])->name('instructor.video.list');
            Route::get('/delete/{id}', [VideoController::class, 'destroy'])->name('instructor.video.destroy');
        });
    });

    Route::any('{query}', function () {
        return redirect()->route('instructor.index');
    })->where('query', '.*');
});

// Routes for frontend ( Student )

Route::get('/', [App\Http\Controllers\student\StudentController::class, 'index'])->name('student.index');
Route::post('/login', [App\Http\Controllers\student\StudentController::class, 'login'])->name('student.login');
Route::get('/logout', [App\Http\Controllers\student\StudentController::class, 'logout'])->name('student.logout');

Route::middleware('checkstudentlogin')->group(function () {

    Route::get('/info', [App\Http\Controllers\student\StudentController::class, 'info'])->name('student.info');
    Route::view('/home', 'student.pages.home')->name('student.home');
    Route::view('/about', 'student.pages.about')->name('student.about');

    Route::prefix('course')->group(function () {
        Route::get('/', [App\Http\Controllers\student\CourseController::class, 'list']);
        Route::get('/create', [App\Http\Controllers\student\CourseController::class, 'create'])->name('course.create');
        Route::post('/store', [App\Http\Controllers\student\CourseController::class, 'store'])->name('course.store');
        Route::get('/list', [App\Http\Controllers\student\CourseController::class, 'list'])->name('course.list');
        Route::get('/{id}/{title}/videos', [App\Http\Controllers\student\CourseController::class, 'showVideos'])->name('course.videos');
    });

    Route::prefix('schedule')->group(function () {
        Route::get('/', [App\Http\Controllers\student\ScheduleController::class, 'list']);
        Route::get('/list', [App\Http\Controllers\student\ScheduleController::class, 'list'])->name('schedule.list');
    });

    Route::any('{query}', function () {
        return redirect()->route('student.index');
    })->where('query', '.*');
});
