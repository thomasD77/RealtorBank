<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Inspection\InspectionController;
use App\Http\Controllers\ProfileController;
use App\Models\Inspection;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware'=>[ 'auth', 'verified']], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/inspection/detail/{inspection}/{room}/{area}', [DashboardController::class, 'detail'])->name('area.detail');

    Route::get('/create/inspection', [InspectionController::class, 'create'])->name('create.inspection');

    Route::view('/inspections', 'inspections.index')
        ->name('inspections.index');

    Route::view('/profile/overview', 'profile.index')
        ->name('profile');

    Route::view('/update', 'profile.update')
        ->name('update.password');

    Route::view('/elements', 'ui-elements')
        ->name('elements');

    Route::get('/inspection/edit/{inspection}', function (Inspection $inspection) {
        return view('inspections.edit', compact('inspection'));
    })->name('inspection.edit');


});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
