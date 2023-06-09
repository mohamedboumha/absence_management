<?php

use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Director;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\ProfController;
use App\Http\Controllers\PDFController;

use App\Http\Controllers\SchoolController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');

        // Handle Director
    Route::middleware(['checkRole:admin'])->group(function () {
        Route::get('admin/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');

        // directors
        Route::resource('admin/directors', DirectorController::class);

        //schools
        Route::resource('admin/schools', SchoolController::class);

        // profs
        Route::resource('admin/profs', ProfController::class);

        //PDF
        Route::get('/pdf/{data}', [PDFController::class,'generatePDF'])->name('pdf');   

    });

    Route::middleware(['checkRole:director'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'director'])->name('dashboard');

        Route::get('schools', [SchoolController::class, 'index_'])->name('director.schools.index');
        Route::get('schools/{school}', [SchoolController::class, 'show_'])->name('director.schools.show');
        Route::get('/profs', [ProfController::class, 'index_'])->name('director.profs.index');
        Route::get('/profs/{prof}', [ProfController::class, 'show'])->name('director.profs.show');

        // Absences
        Route::get('/{id}/absences', [AbsenceController::class, 'index'])->name('absences.index');
        Route::post('/{id}/absences', [AbsenceController::class, 'store'])->name('absences.store');
        Route::get('/{id}/absences/{absence}', [AbsenceController::class, 'edit'])->name('absences.edit');
        Route::put('/{id}/absences/{absence}', [AbsenceController::class, 'update'])->name('absences.update');
        Route::delete('/{id}/absences/{absence}', [AbsenceController::class, 'destroy'])->name('absences.destroy');
    });
});
