<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\TimesheetController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\BusinessUnitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KeyResultAreaController;


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

Route::get('/', function () {
    return view('auth.login');
});


Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');

Route::get('password-reset', [AuthController::class, 'viewPasswordReset'])->name('password.rest');

Route::post('password-post', [AuthController::class, 'passwordReset'])->name('password.post'); 

Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 

Route::get('dashboard', [AuthController::class, 'dashboard']); 

Route::group(['middleware' => 'auth' ], function () {

    // Route::get('dashboard', [AuthController::class, 'dashboard']); 
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    //timesheet
    Route::get('/timesheet', [TimesheetController::class, 'index'])->name('timesheet.index');
    Route::get('/user/timesheet', [TimesheetController::class, 'userTimesheet'])->name('timesheet.index');
    Route::post('/timesheet/update', [TimesheetController::class, 'updateTimesheet'])->name('timesheet.update');
    Route::post('/timesheet/delete', [TimesheetController::class, 'create'])->name('timesheet.delete');
    Route::post('/timesheet/create', [TimesheetController::class, 'create'])->name('timesheet.create');

    //Employee
    Route::group(['prefix' => 'employee'], function () {
        Route::get('/', [EmployeeController::class, 'index'])->name('employee.index');
        Route::post('/create', [EmployeeController::class, 'create'])->name('employee.create');
        Route::post('/update', [EmployeeController::class, 'editEmployee'])->name('employee.update');
        Route::post('/delete', [EmployeeController::class, 'create'])->name('employee.delete');
        Route::post('/{id}', [EmployeeController::class, 'show'])->name('employee.details');
    });

    //BusinessUnit
    Route::group(['prefix' => 'businessUnit'], function () {
        Route::get('/', [BusinessUnitController::class, 'index'])->name('businessUnit.index');
        Route::post('/create', [BusinessUnitController::class, 'create'])->name('businessUnit.create');
        Route::post('/update', [BusinessUnitController::class, 'update'])->name('businessUnit.update');
        Route::post('/delete', [BusinessUnitController::class, 'create'])->name('businessUnit.delete');
    });

    //KeyResultArea
    Route::group(['prefix' => 'keyResultArea'], function () {
        Route::get('/', [KeyResultAreaController::class, 'index'])->name('keyResultArea.index');
        Route::post('/create', [KeyResultAreaController::class, 'create'])->name('keyResultArea.create');
        Route::post('/update', [KeyResultAreaController::class, 'update'])->name('keyResultArea.update');
        Route::post('/delete', [KeyResultAreaController::class, 'create'])->name('keyResultArea.delete');
    });

    //My profile    view/leave  user/timesheet
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/create', [ProfileController::class, 'create'])->name('profile.create');
    Route::post('/profile/update', [ProfileController::class, 'create'])->name('profile.update');
    Route::post('/profile/delete', [ProfileController::class, 'create'])->name('profile.delete');

});
