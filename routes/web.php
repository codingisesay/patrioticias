<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\studentRegisterationController;
use App\Http\Controllers\classRoomController;

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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/courses', function () {
    return view('course');
})->name('courses');

Route::get('/course-details', function () {
    return view('detail');
})->name('detail');

Route::get('/feature', function () {
    return view('feature');
})->name('feature');

Route::get('/team', function () {
    return view('team');
})->name('team');

Route::get('/testimonial', function () {
    return view('testimonial');
})->name('testimonial');

Route::get('/loginpage', function () {
    return view('login');
})->name('loginPage');

Route::post('/login', [LoginController::class, 'login'])->name('login.post');

Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::middleware('auth')->group(function () {

    // Notice page
    Route::get('/email/verify', function () {
        return view('auth.verify-email'); // create this blade
    })->name('verification.notice');

    // Verify link callback
    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        // after verify, send to role dashboard
        $role = auth()->user()->role?->name;
        return $role === 'admin'
            ? redirect()->route('admin.dashboard')
            : redirect()->route('student.dashboard');
    })->middleware(['signed'])->name('verification.verify');

    // Resend verification email
    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('status', 'Verification link sent!');
    })->middleware('throttle:6,1')->name('verification.send');
});






Route::middleware(['auth', 'active', 'verified', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', fn() => view('adminEnd.adminDashboard'))->name('admin.dashboard');
    Route::get('/admin/register-student', [studentRegisterationController::class, 'showRegistrationForm'])->name('admin.registerStudentForm');
    Route::get('/admin/load-students', [studentRegisterationController::class, 'showStudentLists'])->name('admin.loadStudents');
    Route::get('/admin/create-course', [classRoomController::class, 'showCreateCourseForm'])->name('admin.createCourseForm');
    Route::get('/admin/create-lecture', [classRoomController::class, 'showCreateLectureForm'])->name('admin.createLectureForm');
    Route::get('/admin/manage-courses', [classRoomController::class, 'showManageCourse'])->name('admin.manageCourses');
    Route::get('/admin/manage-lectures', [classRoomController::class, 'showManageLecture'])->name('admin.manageLectures');
    Route::get('/admin/add-subject', [App\Http\Controllers\configController::class, 'loadAddSubjectForm'])->name('admin.addSubjectForm');
    Route::post('/admin/store-subject', [App\Http\Controllers\configController::class, 'storeSubject'])->name('admin.storeSubject');
});







Route::middleware(['auth', 'active', 'verified', 'role:student'])->group(function () {
    Route::get('/student/dashboard', fn() => view('studentEnd.studentDashboard'))->name('student.dashboard');
});



// Forgot password form
Route::get('/forgot-password', [PasswordResetController::class, 'requestForm'])
    ->middleware('guest')
    ->name('password.request');

// Send reset link email
Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLink'])
    ->middleware('guest')
    ->name('password.email');

// Reset password form (from email link)
Route::get('/reset-password/{token}', [PasswordResetController::class, 'resetForm'])
    ->middleware('guest')
    ->name('password.reset');

// Update password
Route::post('/reset-password', [PasswordResetController::class, 'updatePassword'])
    ->middleware('guest')
    ->name('password.update');

