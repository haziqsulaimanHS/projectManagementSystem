<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\LeadDeveloperController;
use App\Http\Controllers\ProjectController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth'], function () {
    Route::resource('developer', DeveloperController::class);
    Route::resource('leadDeveloper', LeadDeveloperController::class);
    //Route::resource('project', ProjectController::class);
    // only userLevel ==0 can access this route
    Route::resource('project', ProjectController::class)->middleware('can:isManager');
    Route::post('addToProject/{developer}',[DeveloperController::class,'addToProject'])->name('addToProject');
    Route::post('dropProject/{developer}',[DeveloperController::class,'dropProject'])->name('dropProject');
    Route::post('addToProject/{leadDeveloper}',[LeadDeveloperController::class,'addToProject'])->name('addToProject');
    Route::post('dropProject/{leadDeveloper}',[LeadDeveloperController::class,'dropProject'])->name('dropProject');

});
