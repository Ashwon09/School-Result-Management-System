<?php

use App\Http\Controllers\TemplateController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MailController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//mailing
Route::get('/email', [MailController::class, 'mail'])->name('mail');
Route::get('/form', [MailController::class, 'form'])->name('form');

   



Route::get('/view', [App\Http\Controllers\HomeController::class, 'resultForm'])->name('result');
Auth::routes();
Route::post('/login-custom', [App\Http\Controllers\Auth\LoginController::class, 'customLogin'])->name('login.custom.ajax');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/view-result', [App\Http\Controllers\viewResultController::class, 'resultView'])->name('viewResult');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/problem', [App\Http\Controllers\ProblemController::class, 'store'])->name('test');


// Route::middleware([AdminMiddleware::class])->group(function(){


Route::group(['middleware' => 'auth'], function () {

    Route::group(['as' => 'studenthome.'], function () {
        Route::get('/student-details', [App\Http\Controllers\StudentHomeController::class, 'details'])->name('details');
        Route::get('/student-status', [App\Http\Controllers\StudentHomeController::class, 'status'])->name('status');
        Route::get('/student-password', [App\Http\Controllers\StudentHomeController::class, 'password'])->name('password');
        Route::put('/student-password', [App\Http\Controllers\StudentHomeController::class, 'changePassword'])->name('changePassword');
        Route::get('/student-result', [App\Http\Controllers\StudentHomeController::class, 'result'])->name('result');

        Route::put('/student-update', [App\Http\Controllers\StudentHomeController::class, 'changeDetails'])->name('changeDetails');
    });

    Route::group(['middleware' => 'admin',  'prefix' => 'admin'], function () {

        Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
        Route::get('/reset-password', [App\Http\Controllers\AdminController::class, 'resetForm'])->name('resetForm');
        Route::get('/reset-password-done', [App\Http\Controllers\AdminController::class, 'resetPassword'])->name('resetPassword');
        Route::get('/teacher-subject', [App\Http\Controllers\AdminController::class, 'teacherSubject'])->name('teacherSubject');

        Route::get('/teacher-create', [App\Http\Controllers\AdminController::class, 'teacherCreate'])->name('teacherCreate');
        Route::post('/teacher-save', [App\Http\Controllers\AdminController::class, 'save'])->name('teacherSave');

        Route::get('/subject-create', [App\Http\Controllers\AdminController::class, 'subjectCreate'])->name('subjectCreate');
        Route::post('/subject-create', [App\Http\Controllers\AdminController::class, 'saveSubject'])->name('saveSubject');

        Route::get('/teacher-data', [App\Http\Controllers\AdminController::class, 'findTeacher'])->name('findTeacher');
        Route::get('/teacher-email', [App\Http\Controllers\AdminController::class, 'findTeacherEmail'])->name('findTeacherEmail');

        Route::post('/display', [App\Http\Controllers\AdminController::class, 'display'])->name('display');



        Route::get('/student-image',[App\Http\controllers\StudentImageController::class,'index'])->name('image.index');
        Route::get('/student-image-create',[App\Http\controllers\StudentImageController::class,'create'])->name('image.create');
        Route::post('/student-image-create',[App\Http\controllers\StudentImageController::class,'store'])->name('image.store');
        Route::get('/student-image-delete/{id}',[App\Http\controllers\StudentImageController::class,'destroy'])->name('image.delete');
        Route::get('/student-image-edit/{id}',[App\Http\controllers\StudentImageController::class,'edit'])->name('image.edit');
        Route::put('/student-image-create/{id}',[App\Http\controllers\StudentImageController::class,'update'])->name('image.update');

        




        Route::group(['as' => 'problem.'], function () {
            Route::get('/problem-view', [App\Http\Controllers\ProblemController::class, 'index'])->name('changeStatus');
            Route::get('/problem-delete/{id}', [App\Http\Controllers\ProblemController::class, 'destroy'])->name('deleteStatus');
            Route::put('problem-update/{id}', [App\Http\Controllers\ProblemController::class, 'update'])->name('updateProblem');
        });

        Route::group(['as' => 'tempstudent.', 'prefix' => 'tempstudent'], function () {
            Route::get('/view', [App\Http\Controllers\TempStudentController::class, 'index'])->name('view');
            Route::get('/create/{id}', [App\Http\Controllers\TempStudentController::class, 'create'])->name('create');
        });

        Route::group(['as' => 'student.', 'prefix' => 'student'], function () {
            Route::get('/create', [App\Http\Controllers\StudentController::class, 'create'])->name('create');
            Route::post('create', [App\Http\Controllers\StudentController::class, 'store'])->name('createStudent');
            Route::get('view', [App\Http\Controllers\StudentController::class, 'index'])->name('view');
            Route::get('edit/{id}', [App\Http\Controllers\StudentController::class, 'edit'])->name('edit');
            Route::put('update/{id}', [App\Http\Controllers\StudentController::class, 'update'])->name('updateStudent');
            Route::get('delete/{id}', [App\Http\Controllers\StudentController::class, 'destroy'])->name('delete');
        });

        Route::group(['as' => 'subject.', 'prefix' => 'subject'], function () {
            Route::get('/create', [App\Http\Controllers\SubjectController::class, 'create'])->name('create');
            Route::post('/create', [App\Http\Controllers\SubjectController::class, 'store'])->name('createSubject');
            Route::get('/view', [App\Http\Controllers\SubjectController::class, 'index'])->name('view');
            Route::get('/edit/{id}', [App\Http\Controllers\SubjectController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [App\Http\Controllers\SubjectController::class, 'update'])->name('updateSubject');
            Route::get('/delete/{id}', [App\Http\Controllers\SubjectController::class, 'destroy'])->name('delete');
        });

        Route::group(['as' => 'marks.', 'prefix' => 'marks'], function () {
            Route::get('/create', [App\Http\Controllers\MarksController::class, 'create'])->name('create');
            Route::post('/create', [App\Http\Controllers\MarksController::class, 'store'])->name('createMarks');
            Route::get('/view', [App\Http\Controllers\MarksController::class, 'index'])->name('view');
            Route::get('/edit/{id}', [App\Http\Controllers\MarksController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [App\Http\Controllers\MarksController::class, 'update'])->name('updateMarks');
            Route::get('/delete/{id}', [App\Http\Controllers\MarksController::class, 'destroy'])->name('delete');
        });

        Route::group(['as' => 'teacher.',  'prefix' => 'teacher'], function () {
            Route::get('/create', [App\Http\Controllers\TeachersController::class, 'create'])->name('create');
            Route::post('/create', [App\Http\Controllers\TeachersController::class, 'store'])->name('createTeacher');
            Route::get('/view', [App\Http\Controllers\TeachersController::class, 'index'])->name('view');
            Route::get('/edit/{id}', [App\Http\Controllers\TeachersController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [App\Http\Controllers\TeachersController::class, 'update'])->name('updateTeacher');
            Route::get('/delete/{id}', [App\Http\Controllers\TeachersController::class, 'destroy'])->name('delete');
        });
    });
});
