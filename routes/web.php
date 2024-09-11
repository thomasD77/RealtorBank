<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Inspection\InspectionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Situation\SituationController;
use App\Models\Contract;
use App\Models\Damage;
use App\Models\Document;
use App\Models\Floor;
use App\Models\Inspection;
use App\Models\Key;
use App\Models\Meter;
use App\Models\RentalClaim;
use App\Models\Room;
use App\Models\Situation;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=>[ 'auth', 'verified']], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/detail/{inspection}/{room}/{area}', [DashboardController::class, 'detail'])->name('area.detail');
    Route::get('/conform/{inspection}/{room}/{conform}', [DashboardController::class, 'conform'])->name('area.conform');
    Route::get('/specific/{inspection}/{room}/{specific}', [DashboardController::class, 'specific'])->name('area.specific');
    Route::get('/technique/{inspection}/{technique}', [DashboardController::class, 'technique'])->name('area.technique');
    Route::get('/outdoor/{inspection}/{outdoor}', [DashboardController::class, 'outdoor'])->name('area.outdoor');
    Route::get('/general/{inspection}/{room}/', [DashboardController::class, 'general'])->name('area.general');
    Route::get('/calculation/{inspection}/{floor}/{room}', [DashboardController::class, 'calculations'])->name('calculations');

    Route::get('/create/inspection', [InspectionController::class, 'create'])->name('create.inspection');
    Route::get('/generate/inspection/{inspection}/{situation}', [SituationController::class, 'genereatePDF'])->name('generate.inspection');
    Route::get('/create/situation/{inspection}', [SituationController::class, 'create'])->name('create.situation');
    Route::get('/create/document/{inspection}', [InspectionController::class, 'createDocument'])->name('create.document');
    Route::post('/create/signature/', [SituationController::class, 'signature'])->name('create.signature');
    Route::post('/toggle/contract', [SituationController::class, 'toggleContract'])->name('toggle.contract');
    Route::get('/print/contract/{inspection}/{contract}/{situation}', [SituationController::class, 'printContract'])->name('print.contract');

    Route::post('/create/signature/claim', [SituationController::class, 'signatureClaim'])->name('create.signature.claim');
    Route::post('/toggle/claim', [SituationController::class, 'toggleClaim'])->name('toggle.claim');
    Route::get('/print/claim/{inspection}/{claim}/{situation}', [SituationController::class, 'printClaim'])->name('print.claim');

    Route::view('/inspections', 'inspections.index')
        ->name('inspections.index');

    Route::view('/profile/overview', 'profile.index')
        ->name('profile');

    Route::view('/company/overview', 'company.index')
        ->name('company');

    Route::view('/update', 'profile.update')
        ->name('update.password');

    Route::view('/pricing', 'pricing.index')
        ->name('pricing');

    Route::view('/elements', 'ui-elements')
        ->name('elements');

    Route::get('/inspection/edit/{inspection}', function (Inspection $inspection) {
        return view('inspections.edit', compact('inspection'));
    })->name('inspection.edit')
        ->can('hasAccessCheckUser','inspection');

    Route::get('/situation/{inspection}', function (Inspection $inspection) {
        return view('situation.index', compact('inspection'));
    })->name('situation.index')
        ->can('hasAccessCheckUser','inspection');

    Route::get('/situation/edit/{inspection}/{situation}', function (Inspection $inspection, Situation $situation) {
        return view('situation.edit', compact('inspection', 'situation'));
    })->name('situation.edit')
        ->can('hasAccessCheckUser','inspection');

    Route::get('/damage/edit/{inspection}/{damage}/', function (Inspection $inspection, Damage $damage) {
        return view('damage.edit', compact('inspection', 'damage'));
    })->name('damage.edit')
        ->can('hasAccessCheckUser','inspection');

    Route::get('/documents/{inspection}', function (Inspection $inspection) {
        return view('documents.index', compact('inspection'));
    })->name('documents.index')
        ->can('hasAccessCheckUser','inspection');

    Route::get('/document/edit/{inspection}/{document}', function (Inspection $inspection, Document $document) {
        return view('documents.edit', compact('inspection','document'));
    })->name('document.edit')
        ->can('hasAccessCheckUser','inspection');

    Route::get('/keys/{inspection}', function (Inspection $inspection) {
        return view('keys.index', compact('inspection'));
    })->name('keys.index')
        ->can('hasAccessCheckUser','inspection');

    Route::get('/key/edit/{inspection}/{key}', function (Inspection $inspection, Key $key) {
        return view('keys.edit', compact('inspection','key'));
    })->name('key.edit')
        ->can('hasAccessCheckUser','inspection');

    Route::get('/meters/{inspection}', function (Inspection $inspection) {
        return view('meters.index', compact('inspection'));
    })->name('meters.index')
        ->can('hasAccessCheckUser','inspection');

    Route::get('/meter/edit/{inspection}/{meter}', function (Inspection $inspection, Meter $meter) {
        return view('meters.edit', compact('inspection','meter'));
    })->name('meter.edit')
        ->can('hasAccessCheckUser','inspection');

    Route::get('/contracts/{inspection}', function (Inspection $inspection) {
        return view('contracts.index', compact('inspection'));
    })->name('contracts.index')
        ->can('hasAccessCheckUser','inspection');

    Route::get('/contract/edit/{inspection}/{contract}', function (Inspection $inspection, Contract $contract) {
        return view('contracts.edit', compact('inspection','contract'));
    })->name('contract.edit')
        ->can('hasAccessCheckUser','inspection');

    Route::get('/claim/edit/{inspection}/{claim}', function (Inspection $inspection, RentalClaim $claim) {
        return view('claims.edit', compact('inspection','claim'));
    })->name('rentalClaim.edit')
        ->can('hasAccessCheckUser','inspection');
});

//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});

require __DIR__.'/auth.php';
