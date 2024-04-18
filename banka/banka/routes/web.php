<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\BankaController;
use App\Http\Controllers\KontokorentController;
use App\Http\Controllers\SporitelskyUverController;
Route::get('/', function () {
    return view('welcome');
});

Route::middleware([Authenticate::class])->group(function () {

    Route::get('potrebujesLogin/stav', [BankaController::class, 'show'])->name('stav');
    Route::put('potrebujesLogin/aktivovat', [BankaController::class, 'aktivovatUcet'])->name('aktivovat-ucet');
    Route::post('potrebujesLogin/vlozit-penize', [BankaController::class, 'vlozitPenize'])->name('vlozit-penize');
    Route::post('potrebujesLogin/vyber-penize', [BankaController::class, 'vyberPenize'])->name('vyber-penize');

    Route::get('potrebujesLogin/kontokorent', function () {
        return view('potrebujesLogin.kontokorent');
    })->name('kontokorent');
    Route::post('potrebujesLogin/nastavit-limit', [KontokorentController::class, 'setKontokorentLimit'])->name('nastavit-limit');
    Route::put('potrebujesLogin/aktivovat-kontokorent', [KontokorentController::class, 'aktivovatKontokorent'])->name('aktivovat-kontokorent');

    Route::get('potrebujesLogin/sporitelskyUver', function () {
        return view('potrebujesLogin.sporitelskyUver');
    })->name('sporitelskyUver');
    Route::post('potrebujesLogin/splatit-spor', [SporitelskyUverController::class, 'splatitSpor'])->name('splatit-spor');
    Route::post('potrebujesLogin/nastavit-spor', [SporitelskyUverController::class, 'nastavitSpor'])->name('nastavit-spor');
    Route::put('potrebujesLogin/aktivovat-spor', [SporitelskyUverController::class, 'aktivovatSpor'])->name('aktivovat-spor');

    Route::get('potrebujesLogin/vklad', function () {
        return view('potrebujesLogin.vklad');
    })->name('vklad');

    Route::get('potrebujesLogin/vyber', function () {
        return view('potrebujesLogin.vyber');
    })->name('vyber');

    Route::get('potrebujesLogin/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
