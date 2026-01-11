<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\upscOpenClassroom;
use App\Http\Controllers\uppcsopenclassroom;
use App\Http\Controllers\studentRegisterationController;
use App\Http\Controllers\classRoomController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\LatestVideoController;
use App\Http\Controllers\HandoutController;
use App\Http\Controllers\prelimsController;


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

Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/openclassroom', [upscOpenClassroom::class, 'index'])->name('openclassroom');
Route::get('/openuppcsclassroom', [uppcsopenclassroom::class, 'index'])->name('uppcsclassroom');

Route::get('/upsctestseries', [upscOpenClassroom::class, 'index'])->name('openclassroom');






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
    // Route::get('/admin/create-course', [classRoomController::class, 'showCreateCourseForm'])->name('admin.createCourseForm');
    // Route::get('/admin/create-lecture', [classRoomController::class, 'showCreateLectureForm'])->name('admin.createLectureForm');
    // Route::get('/admin/manage-courses', [classRoomController::class, 'showManageCourse'])->name('admin.manageCourses');
    // Route::get('/admin/manage-lectures', [classRoomController::class, 'showManageLecture'])->name('admin.manageLectures');
    Route::get('/admin/add-subject', [App\Http\Controllers\configController::class, 'loadAddSubjectForm'])->name('admin.addSubjectForm');
    Route::post('/admin/store-subject', [App\Http\Controllers\configController::class, 'storeSubject'])->name('admin.storeSubject');


    Route::get('/admin/manage-subject', [configController::class, 'manageSubject'])
    ->name('admin.manageSubject');

Route::delete('/admin/delete-subject/{id}', [configController::class, 'deleteSubject'])
    ->name('admin.deleteSubject');


     //  EDIT
    Route::get('/admin/edit-subject/{id}', [configController::class, 'editSubject'])
        ->name('admin.editSubject');

    Route::put('/admin/update-subject/{id}', [configController::class, 'updateSubject'])
        ->name('admin.updateSubject');



    //  Add Exam Type form
    Route::get('/admin/add-exam-type', [ConfigController::class, 'loadAddExamTypeForm'])
        ->name('admin.addExamType');

    // Store Exam Type
    Route::post('/admin/store-exam-type', [ConfigController::class, 'storeExamType'])
        ->name('admin.storeExamType');


        // Exam Type
Route::get('/admin/manage-exam-type', [ConfigController::class, 'manageExamType'])
    ->name('admin.manageExamType');

Route::delete('/admin/delete-exam-type/{id}', [ConfigController::class, 'deleteExamType'])
    ->name('admin.deleteExamType');


// Edit Exam Type (Form)
Route::get('/admin/edit-exam-type/{id}', [ConfigController::class, 'editExamType'])
    ->name('admin.editExamType');

// Update Exam Type
Route::put('/admin/update-exam-type/{id}', [ConfigController::class, 'updateExamType'])
    ->name('admin.updateExamType');

  // Course Type
    Route::get('/admin/add-course-type', [configController::class, 'loadAddCourseTypeForm'])
        ->name('admin.addCourseType');

    Route::post('/admin/store-course-type', [configController::class, 'storeCourseType'])
        ->name('admin.storeCourseType');

    Route::get('/admin/manage-course-type', [configController::class, 'manageCourseType'])
        ->name('admin.manageCourseType');

    Route::delete('/admin/delete-course-type/{id}', [configController::class, 'deleteCourseType'])
        ->name('admin.deleteCourseType');


          // Add Course Sub Type
    Route::get('/add-course-sub-type',
        [ConfigController::class, 'addCourseSubType']
    )->name('admin.addCourseSubType');

    // Store Course Sub Type
    Route::post('/store-course-sub-type',
        [ConfigController::class, 'storeCourseSubType']
    )->name('admin.storeCourseSubType');


     // Manage Course Sub Type
    Route::get('/manage-course-sub-type',
        [ConfigController::class, 'manageCourseSubType']
    )->name('admin.manageCourseSubType');

    // Delete Course Sub Type
    Route::delete('/delete-course-sub-type/{id}',
        [ConfigController::class, 'deleteCourseSubType']
    )->name('admin.deleteCourseSubType');


      // Edit Course Sub Type
    Route::get(
        '/edit-course-sub-type/{id}',
        [ConfigController::class, 'editCourseSubType']
    )->name('admin.editCourseSubType');

    // Update Course Sub Type
    Route::post(
        '/update-course-sub-type/{id}',
        [ConfigController::class, 'updateCourseSubType']
    )->name('admin.updateCourseSubType');



      // Counselling
    Route::get('/admin/add-counselling', [ConfigController::class, 'addCounsellingForm'])
        ->name('admin.addCounselling');

    Route::post('/admin/store-counselling', [ConfigController::class, 'storeCounselling'])
        ->name('admin.storeCounselling');

    Route::get('/admin/manage-counselling', [ConfigController::class, 'manageCounselling'])
        ->name('admin.manageCounselling');

        // DELETE COUNSELLING
Route::delete(
    '/admin/delete-counselling/{id}',
    [ConfigController::class, 'deleteCounselling']
)->name('admin.deleteCounselling');


    Route::get('/admin/edit-counselling/{id}', [ConfigController::class, 'editCounselling'])
    ->name('admin.editCounselling');

Route::post('/admin/update-counselling/{id}', [ConfigController::class, 'updateCounselling'])
    ->name('admin.updateCounselling');



//     /* ========= FRONTEND ========= */
// Route::get('/latest-video', [LatestVideoController::class, 'latestVideo'])
//     ->name('latest.video');



//     /* ========= ADMIN ========= */

//     Route::get('/add-latest-video', [LatestVideoController::class, 'create'])
//         ->name('admin.addLatestVideo');

//     Route::post('/store-latest-video', [LatestVideoController::class, 'store'])
//         ->name('admin.storeLatestVideo');

//     Route::get('/manage-latest-video', [LatestVideoController::class, 'index'])
//         ->name('admin.manageLatestVideo');

//     Route::delete('/delete-latest-video/{id}', [LatestVideoController::class, 'destroy'])
//         ->name('admin.deleteLatestVideo');



  // ADD FORM
    Route::get('/add-latest-video', [LatestVideoController::class, 'create'])
        ->name('admin.addLiveVideo');

    // STORE
    Route::post('/store-latest-video', [LatestVideoController::class, 'store'])
        ->name('admin.storeLiveVideo');
 // MANAGE
    Route::get('/manage-latest-video', [LatestVideoController::class, 'index'])
        ->name('admin.manageLiveVideo');

    // DELETE (optional but useful)
    Route::delete('/delete-latest-video/{id}', [LatestVideoController::class, 'destroy'])
        ->name('admin.deleteLiveVideo');


   Route::get('/create-course', [classRoomController::class, 'create'])
    ->name('admin.createCourse');

Route::post('/store-course', [classRoomController::class, 'store'])
    ->name('admin.storeCourse');

Route::get('/manage-course', [classRoomController::class, 'index'])
    ->name('admin.manageCourse');

    // EDIT FORM
Route::get('/edit-course/{id}', [classRoomController::class, 'edit'])
    ->name('admin.editCourse');

// UPDATE
Route::post('/update-course/{id}', [classRoomController::class, 'update'])
    ->name('admin.updateCourse');




    Route::get('/admin/create-lecture', [LectureController::class, 'create'])
    ->name('admin.createLecture');

Route::post('/admin/store-lecture', [LectureController::class, 'store'])
    ->name('admin.storeLecture');

// MANAGE LECTURE
Route::get('/admin/manage-lecture', [LectureController::class, 'index'])
    ->name('admin.manageLecture');

Route::get('/admin/edit-lecture/{id}', [LectureController::class, 'edit'])
    ->name('admin.editLecture');

Route::post('/admin/update-lecture/{id}', [LectureController::class, 'update'])
    ->name('admin.updateLecture');

Route::get(
    '/admin/lecture/{lectureId}/add-handout',
    [HandoutController::class, 'create']
)->name('admin.addHandout');

Route::post(
    '/admin/lecture/store-handout',
    [HandoutController::class, 'store']
)->name('admin.storeHandout');

//  (Optional) View Handouts of a Lecture
Route::get(
    '/admin/lecture/{lectureId}/handouts',
    [HandoutController::class, 'index']
)->name('admin.viewHandouts');


// Subjective Question
Route::post(
  '/admin/lecture/add-subjective-question',
  [HandoutController::class, 'storeSubjectiveQuestion']
)->name('admin.addSubjectiveQuestion');

// Objective Question
Route::post(
  '/admin/lecture/add-objective-question',
  [HandoutController::class, 'storeObjectiveQuestion']
)->name('admin.addObjectiveQuestion');




// prelims 

    Route::get(
        '/create-test-paper',
        [prelimsController::class, 'createTestPaper']
    )->name('admin.prelims.createTestPaper');

    Route::post(
        '/store-test-paper',
        [prelimsController::class, 'storeTestPaper']
    )->name('admin.prelims.storeTestPaper');



// Manage
Route::get(
    '/admin/prelims/manage-test-paper',
    [prelimsController::class, 'manageTestPaper']
)->name('admin.prelims.manageTestPaper');
// Delete Test Paper
Route::get(
    '/admin/prelims/delete-test-paper/{id}',
    [prelimsController::class, 'deleteTestPaper']
)->name('admin.prelims.deleteTestPaper');

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

