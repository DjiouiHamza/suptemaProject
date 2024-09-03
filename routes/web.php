<?php

use Illuminate\Support\Facades\Route;
use App\Models\student;

Route::get('/', function () {
    return view('Welcome');
});

Auth::routes();


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');








Route::middleware([auth::class, user::class])->group(function(){

    Route::PUT('/adminhome/update_teacher_password/', [App\Http\Controllers\Teacher\TeacherController::class, 'updatePassword'])
    ->name('password.teacher.update');
    
     Route::get('/teacherhome', [App\Http\Controllers\Teacher\TeacherController::class, 'index'])
     ->name('TeacherHome');
     Route::get('/teacherhome/timetable/{id}', [App\Http\Controllers\Teacher\TeacherController::class, 'timetable'] )
     ->name('TimeTable');
     Route::get('/teacherhome/classes', [App\Http\Controllers\Teacher\TeacherController::class, 'classes'] )
     ->name('Classes');
     Route::get('/teacherhome/classes_list/{id}', [App\Http\Controllers\Teacher\TeacherController::class, 'class_show'])
    ->name('class__show');
    Route::get('/teacherhome/classes_list/absence/{id}/{day}/{timing}', [App\Http\Controllers\Teacher\TeacherController::class, 'class_absence'])
    ->name('class_absence');
    Route::post('/teacherhome/classes_absence/send', [App\Http\Controllers\Teacher\TeacherController::class, 'class_absence_sent'])
    ->name('class_absence_sent');
});


Route::middleware([auth::class, admin::class])->group(function(){

    Route::PUT('/adminhome/update_admin_password/', [App\Http\Controllers\admin\AdminController::class, 'updatePassword'])
    ->name('password.admin.update');

    Route::get('/adminhome/timetable/create', [App\Http\Controllers\TimetableController::class, 'create'])
    ->name('timetable.create');

    Route::post('/adminhome/timetable/store', [App\Http\Controllers\TimetableController::class, 'store'])
    ->name('timetable.store');

    Route::POST('/adminhome/timetable/{id}', [App\Http\Controllers\TimetableController::class, 'edit'])
    ->name('editTimeTable');

    Route::get('/timetable/confirmation', function () {
        return view('admin.timeTableConfirmation');
    })->name('timetable.confirmation');

    Route::get('/adminhome/classes_list/timetable/{id}', [App\Http\Controllers\TimetableController::class, 'sectionTimeTable'])
    ->name('sectionTimeTable');
    
    Route::post('/timetable/update-existing', [App\Http\Controllers\TimetableController::class, 'updateExisting'])
    ->name('timetable.updateExisting');
    

    Route::get('/adminhome', [App\Http\Controllers\admin\AdminController::class, 'index'])
    ->name('AdminHome');
    
    Route::get('/adminhome/teachers_list', [App\Http\Controllers\admin\AdminController::class, 'teachers_list'])
    ->name('teachers_list');

    Route::post('/adminhome/teachers_list/store', [App\Http\Controllers\admin\AdminController::class, 'storeTeachers'])
    ->name('teacher.store');

    Route::get('/adminhome/teacher_list/{id}', [App\Http\Controllers\admin\AdminController::class, 'teacherUpdateForm'])
    ->name('teacher.update.form');

    Route::put('/adminhome/teacher_list/{id}', [App\Http\Controllers\admin\AdminController::class, 'updateTeacher'])
    ->name('teacher.update');

    Route::DELETE('/adminhome/teacher_list/delete-teacher/{id}', [App\Http\Controllers\admin\AdminController::class, 'deleteTeacher'])
    ->name('teacher.destroy');

    Route::get('/adminhome/students_list', [App\Http\Controllers\admin\AdminController::class, 'students_list'])
    ->name('students_list');

    Route::post('/adminhome/students_list/store', [App\Http\Controllers\admin\AdminController::class, 'storeStudents'])
    ->name('student.store');

    Route::DELETE('/adminhome/students_list/delete-student/{id}', [App\Http\Controllers\admin\AdminController::class, 'deleteStudent'])
    ->name('student.destroy');

    Route::get('/adminhome/students_list/{id}', [App\Http\Controllers\admin\AdminController::class, 'studentUpdateForm'])
    ->name('student.update.form');

    Route::put('/adminhome/students_list/{id}', [App\Http\Controllers\admin\AdminController::class, 'updateStudent'])
    ->name('student.update');

    Route::get('/adminhome/class_absence_display', [App\Http\Controllers\admin\AdminController::class, 'class_absence_display'])
    ->name('class_absence_display');

    Route::post('/adminhome/class_absence_display', [App\Http\Controllers\admin\AdminController::class, 'class_absence_display'])
    ->name('admin.absences.filter');

    Route::get('/adminhome/classes_list', [App\Http\Controllers\admin\AdminController::class, 'classes_list'])
    ->name('classes_list');

    Route::get('/adminhome/classes_list/{id}', [App\Http\Controllers\admin\AdminController::class, 'class_show'])
    ->name('class_show');

    Route::POST('/adminhome/classeslist/add', [App\Http\Controllers\admin\AdminController::class, 'storeClasses'])
    ->name('store_classes');

    Route::get('/adminhome/classes_list/edit/{id}', [App\Http\Controllers\admin\AdminController::class, 'class_edit_form'])
    ->name('class_edit_form');

    Route::PUT('/adminhome/classes_list/{id}', [App\Http\Controllers\admin\AdminController::class, 'class_update'])
    ->name('class_update');

    Route::DELETE('/adminhome/classes_list/delete/{id}', [App\Http\Controllers\admin\AdminController::class, 'class_delete'])
    ->name('class_delete');

});


