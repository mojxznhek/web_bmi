<?php

use Illuminate\Support\Facades\Auth;
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
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\Request;
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

Auth::routes(
    ['register' => false],
);

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route::prefix('/')
//     ->middleware('auth')
//     ->group(function () {
Route::group(['middleware' => 'auth:web','auth'], function () {
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

/*
*Pre Registration
*/
Route::get('/register',[ChildRegistrationController::class, 'create'])->name('register'); //form of registration
Route::post('register',[ChildRegistrationController::class, 'store'])->name('child-register'); //saving route for registration
Route::get('/activation',[ChildRegistrationController::class, 'activation'])->name('activation'); // redirect to thank you page

/*
*View Login Form and Submit Parent/Child
*/
Route::get('/login/parent',[LoginController::class, 'showParentLoginForm'])->name('login-form'); //show form
Route::post('parent',[LoginController::class,'parentLogin'])->name('parent'); //Route to authenticate parent/child login


/*
*Middleware for child view
*/
Route::group(['middleware' => 'auth:child'], function () {
    Route::get('/parent/home', [ChildRegistrationController::class, 'childDashboard'])->name('parent-home');
});




Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');

    return "Cleared!";

});