<?php

use App\Http\Controllers\PartnershipController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PartnershipController::class, 'index']);
Route::post('/partnership', [PartnershipController::class, 'store'])->name('partnership.store');
