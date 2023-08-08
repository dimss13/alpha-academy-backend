<?php

use App\Http\Controllers\BabController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\FreemiumBankSoalController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\SoalPilganController;
use App\Http\Controllers\SubBabController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// User Routes
Route::prefix('user')->group(function () {
    Route::post('/register', [UserController::class, 'register']);
    Route::post('/login', [UserController::class, 'login']);
    Route::get('/logout', [UserController::class, 'logout'])->middleware('auth:sanctum');
    Route::get('/users', [UserController::class, 'index']);
    Route::patch('/update/{id}', [UserController::class, 'update'])->middleware(['auth:sanctum', 'user-middleware']);
    Route::get('/{id}', [UserController::class, 'show'])->middleware(['auth:sanctum', 'user-middleware']);
});

// Tutor Routes
Route::prefix('tutor')->group(function () {
    Route::get('/tutors', [TutorController::class, 'index']);
    Route::post('/login', [TutorController::class, 'login']);
    Route::get('/logout', [TutorController::class, 'logout'])->middleware('auth:sanctum');
    Route::get('/user/{id}', [TutorController::class, 'show'])->middleware(['auth:sanctum', 'tutor-middleware']);
});

// Bidang Routes
Route::prefix('bidang')->group(function () {
    Route::get('/bidangs', [BidangController::class, 'index']);
    Route::get('/{id}', [BidangController::class, 'show']);
    Route::patch('/update/{id}', [BidangController::class, 'update'])->middleware(['auth:sanctum', 'tutor-bidang-middleware']);
});

// Materi Routes
Route::prefix('materi')->group(function () {
    Route::get('/materis', [MateriController::class, 'index']);
    Route::get('/{id}', [MateriController::class, 'show']);
    Route::post('/create', [MateriController::class, 'store'])->middleware(['auth:sanctum']);
    Route::patch('/update/{id}', [MateriController::class, 'update'])->middleware(['auth:sanctum', 'materi-middleware']);
    Route::delete('/delete/{id}', [MateriController::class, 'destroy'])->middleware(['auth:sanctum', 'materi-middleware']);
});

// Bab Routes
Route::prefix('/bab')->group(function () {
    Route::get('/babs', [BabController::class, 'index']);
    Route::get('/{id}', [BabController::class, 'show']);
    Route::post('/create', [BabController::class, 'store'])->middleware(['auth:sanctum', 'bab-middleware']);
    Route::patch('/update/{id}', [BabController::class, 'update'])->middleware(['auth:sanctum', 'bab-update-middleware']);
    Route::delete('/delete/{id}', [BabController::class, 'destroy'])->middleware(['auth:sanctum', 'bab-update-middleware']);
});

// SubBaby Routes
Route::prefix('/subbab')->group(function () {
    Route::get('/subbabs', [SubBabController::class, 'index']);
    Route::get('/{id}', [SubBabController::class, 'show']);
    Route::post('/create', [SubBabController::class, 'store'])->middleware(['auth:sanctum', 'subbab-middleware']);
    Route::patch('/update/{id}', [SubBabController::class, 'update'])->middleware(['auth:sanctum', 'subbab-auth-middleware']);
    Route::delete('/delete/{id}', [SubBabController::class, 'destroy'])->middleware(['auth:sanctum', 'subbab-auth-middleware']);
});

// FreemiumBankSoal Routes
Route::prefix('/freemiumbanksoal')->group(function () {
    Route::get('', [FreemiumBankSoalController::class, 'index']);
    Route::get('/{id}', [FreemiumBankSoalController::class, 'show']);
    Route::post('/create', [FreemiumBankSoalController::class, 'store'])->middleware(['auth:sanctum']);
    Route::patch('/update/{id}', [FreemiumBankSoalController::class, 'update'])->middleware(['auth:sanctum', 'freemiumbanksoal-middleware']);
    Route::delete('/delete/{id}', [FreemiumBankSoalController::class, 'destroy'])->middleware(['auth:sanctum', 'freemiumbanksoal-middleware']);
});

// SoalPilgan Routes
Route::prefix('/soalpilgan')->group(function () {
    Route::get('', [SoalPilganController::class, 'index']);
    Route::get('/{id}', [SoalPilganController::class, 'show']);
    Route::get('/image/{id}', [SoalPilganController::class, 'showImage']);
    Route::post('/create', [SoalPilganController::class, 'store'])->middleware(['auth:sanctum', 'soalpilgan-middleware']);
    Route::post('/update/{id}', [SoalPilganController::class, 'update'])->middleware(['auth:sanctum', 'soalpilgan-auth-middleware']);
    Route::post('/update-image/{id}', [SoalPilganController::class, 'updateImage'])->middleware(['auth:sanctum', 'soalpilgan-auth-middleware']);
    Route::delete('/delete/{id}', [SoalPilganController::class, 'destroy'])->middleware(['auth:sanctum', 'soalpilgan-auth-middleware']);
});

// SoalEssay Routes
Route::prefix('/soalessay')->group(function () {
    Route::get('', [SoalEssayController::class, 'index']);
    Route::get('/{id}', [SoalEssayController::class, 'show']);
    Route::get('/image/{id}', [SoalEssayController::class, 'showImage']);
    Route::post('/create', [SoalEssayController::class, 'store'])->middleware(['auth:sanctum', 'soalessay-middleware']);
    Route::post('/update/{id}', [SoalEssayController::class, 'update'])->middleware(['auth:sanctum', 'soalessay-auth-middleware']);
    Route::post('/update-image/{id}', [SoalEssayController::class, 'updateImage'])->middleware(['auth:sanctum', 'soalessay-auth-middleware']);
    Route::delete('/delete/{id}', [SoalEssayController::class, 'destroy'])->middleware(['auth:sanctum', 'soalessay-auth-middleware']);
});