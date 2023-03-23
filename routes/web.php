<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Inspection\InspectionController;
use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\Situation\SituationController;
    use App\Models\Contract;
    use App\Models\Document;
    use App\Models\Inspection;
    use App\Models\Key;
    use App\Models\Meter;
    use App\Models\Situation;
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
    Route::get('/inspection/conform/{inspection}/{room}/{conform}', [DashboardController::class, 'conform'])->name('area.conform');
    Route::get('/inspection/specific/{inspection}/{room}/{specific}', [DashboardController::class, 'specific'])->name('area.specific');
    Route::get('/inspection/technique/{inspection}/{technique}', [DashboardController::class, 'technique'])->name('area.technique');
    Route::get('/inspection/outdoor/{inspection}/{outdoor}', [DashboardController::class, 'outdoor'])->name('area.outdoor');

    Route::get('/inspection/general/{inspection}/{room}/', [DashboardController::class, 'general'])->name('general.detail');


    Route::get('/create/inspection', [InspectionController::class, 'create'])->name('create.inspection');
    Route::get('/generate/inspection/{inspection}', [InspectionController::class, 'genereatePDF'])->name('generate.inspection');
    Route::get('/create/situation/{inspection}', [SituationController::class, 'create'])->name('create.situation');
    Route::get('/create/document/{inspection}', [InspectionController::class, 'createDocument'])->name('create.document');
    Route::post('/create/signature', [SituationController::class, 'signature'])->name('create.signature');
    Route::post('/toggle/contract', [SituationController::class, 'toggleContract'])->name('toggle.contract');

    Route::view('/inspections', 'inspections.index')
        ->name('inspections.index');

    Route::view('/profile/overview', 'profile.index')
        ->name('profile');

    Route::view('/company/overview', 'company.index')
        ->name('company');

    Route::view('/update', 'profile.update')
        ->name('update.password');

    Route::view('/elements', 'ui-elements')
        ->name('elements');

    Route::get('/inspection/edit/{inspection}', function (Inspection $inspection) {
        return view('inspections.edit', compact('inspection'));
    })->name('inspection.edit');

    Route::get('/situation/inspection/{inspection}', function (Inspection $inspection) {
        return view('situation.index', compact('inspection'));
    })->name('situation.index');

    Route::get('/situation/inspection/edit/{inspection}/{situation}', function (Inspection $inspection, Situation $situation) {
        return view('situation.edit', compact('inspection', 'situation'));
    })->name('situation.edit');

    Route::get('/inspection/documents/{inspection}', function (Inspection $inspection) {
        return view('documents.index', compact('inspection'));
    })->name('documents.index');

    Route::get('/document/edit/{inspection}/{document}', function (Inspection $inspection, Document $document) {
        return view('documents.edit', compact('inspection','document'));
    })->name('document.edit');

    Route::get('/inspection/keys/{inspection}', function (Inspection $inspection) {
        return view('keys.index', compact('inspection'));
    })->name('keys.index');

    Route::get('/key/edit/{inspection}/{key}', function (Inspection $inspection, Key $key) {
        return view('keys.edit', compact('inspection','key'));
    })->name('key.edit');

    Route::get('/inspection/meters/{inspection}', function (Inspection $inspection) {
        return view('meters.index', compact('inspection'));
    })->name('meters.index');

    Route::get('/meter/edit/{inspection}/{meter}', function (Inspection $inspection, Meter $meter) {
        return view('meters.edit', compact('inspection','meter'));
    })->name('meter.edit');

    Route::get('/inspection/contracts/{inspection}', function (Inspection $inspection) {
        return view('contracts.index', compact('inspection'));
    })->name('contracts.index');

    Route::get('/contract/edit/{inspection}/{contract}', function (Inspection $inspection, Contract $contract) {
        return view('contracts.edit', compact('inspection','contract'));
    })->name('contract.edit');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
