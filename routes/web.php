<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChildController;
use App\Http\Controllers\RhuBhwController;
use App\Http\Controllers\HealthTipsController;
use App\Http\Controllers\HealthCategoryController;
use App\Http\Controllers\ChildMedicalDataController;
use App\Http\Controllers\ChildListMedicalRecordsController;
use App\Http\Controllers\ChildRegistrationController;

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
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('/')
    ->middleware('auth')
    ->group(function () {
        Route::resource('children', ChildController::class);
        Route::resource('view-medical', ChildListMedicalRecordsController::class);

        Route::get('child-check-up-infos', [
            ChildMedicalDataController::class,
            'index',
        ])->name('all-child-medical-data.index');
        Route::post('child-check-up-infos', [
            ChildMedicalDataController::class,
            'store',
        ])->name('all-child-medical-data.store');
        Route::get('child-check-up-infos/create', [
            ChildMedicalDataController::class,
            'create',
        ])->name('all-child-medical-data.create');
        Route::get('child-check-up-infos/{childMedicalData}', [
            ChildMedicalDataController::class,
            'show',
        ])->name('all-child-medical-data.show');
        Route::get('child-check-up-infos/{childMedicalData}/edit', [
            ChildMedicalDataController::class,
            'edit',
        ])->name('all-child-medical-data.edit');
        Route::put('child-check-up-infos/{childMedicalData}', [
            ChildMedicalDataController::class,
            'update',
        ])->name('all-child-medical-data.update');
        Route::delete('child-check-up-infos/{childMedicalData}', [
            ChildMedicalDataController::class,
            'destroy',
        ])->name('all-child-medical-data.destroy');

        Route::get('all-health-tips', [
            HealthTipsController::class,
            'index',
        ])->name('all-health-tips.index');
        Route::post('all-health-tips', [
            HealthTipsController::class,
            'store',
        ])->name('all-health-tips.store');
        Route::get('all-health-tips/create', [
            HealthTipsController::class,
            'create',
        ])->name('all-health-tips.create');
        Route::get('all-health-tips/{healthTips}', [
            HealthTipsController::class,
            'show',
        ])->name('all-health-tips.show');
        Route::get('all-health-tips/{healthTips}/edit', [
            HealthTipsController::class,
            'edit',
        ])->name('all-health-tips.edit');
        Route::put('all-health-tips/{healthTips}', [
            HealthTipsController::class,
            'update',
        ])->name('all-health-tips.update');
        Route::delete('all-health-tips/{healthTips}', [
            HealthTipsController::class,
            'destroy',
        ])->name('all-health-tips.destroy');

        Route::resource('health-categories', HealthCategoryController::class);
        Route::resource('rhu-bhws', RhuBhwController::class);
        Route::resource('users', UserController::class);
    });


Route::get('/register',[ChildRegistrationController::class, 'create'])->name('register');
Route::post('register',[ChildRegistrationController::class, 'store'])->name('child-register');
Route::get('/activation',[ChildRegistrationController::class, 'index'])->name('activation');


// Route::get('/login', 'SessionsController@create');
// Route::post('/login', 'SessionsController@store');
// Route::get('/logout', 'SessionsController@destroy');
