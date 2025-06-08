<?php
use App\Http\Controllers\USSDController;
use App\Http\Controllers\SMSController;
use App\Http\Controllers\MpesaController;
use App\Http\Controllers\AdminController;

Route::post('/ussd', [USSDController::class, 'handleUSSD']);
Route::post('/sms/send', [SMSController::class, 'sendSMS']);
Route::post('/mpesa/stkpush', [MpesaController::class, 'initiateSTKPush']);
Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
?>