<?php

use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\SystemSettingsController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',function () {
    return view('index');
})->name('index');


Route::get('shipment-tracking', [ShipmentController::class,'track'])->name('shipments.tracking');

Route::get('/our-services',function () {
    return view('services');
})->name('services');

Route::get('/about-us',function () {
    return view('about');
})->name('about');


Route::get('/contact-us',function () {
    return view('contact');
})->name('contact');


Route::group(
    [
        'middleware' => ['auth']
    ], function() {

        Route::resource('shipments', ShipmentController::class);
        Route::get('recent-shipments', [ShipmentController::class,'recent_shipments'])->name('shipments.recent-shipments');
        Route::get('posted-shipments', [ShipmentController::class,'posted_shipments'])->name('shipments.posted-shipments');
        Route::get('publish-shipment/{shipment}', [ShipmentController::class,'publish_shipment'])->name('shipments.publish');

        Route::resource('regions', RegionController::class)->except('create');
        Route::get('regions/create/{shipment_id}', [RegionController::class, 'create'])->name('regions.create');

        Route::resource('actions', ActionController::class)->except('create');
        Route::get('actions/create/{region_id}', [ActionController::class, 'create'])->name('actions.create');
        Route::post('active-actions/{action}', [ActionController::class,'active_action'])->name('actions.active');

        Route::get('dashboard',function () {
            return view('dashboard');
        })->name('dashboard');

        Route::get('/home',function () {
            return redirect('dashboard');
        });


        Route::get('/settings', [SystemSettingsController::class, 'create'])->name('settings.create');
        Route::post('/settings', [SystemSettingsController::class, 'store'])->name('settings.update');
        Route::post('logout', [LoginController::class,'logout'])->name('logout');
});


// Authentication Routes...
Route::get('login', [LoginController::class,'showLoginForm'])->name('login');
Route::post('login', [LoginController::class,'login']);


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
