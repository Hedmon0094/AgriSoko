<?php

use App\Http\Controllers\USSDController;
use App\Http\Controllers\AdminController;

Route::post('/ussd', [USSDController::class, 'handle']);
Route::post('/send-sms', [USSDController::class, 'sendSMS']);
Route::get('/admin', [AdminController::class, 'dashboard']);
