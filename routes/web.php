<?php

use App\Http\Controllers\USSDController;

Route::post('/ussd', [USSDController::class, 'handle']);
Route::post('/send-sms', [USSDController::class, 'sendSMS']);

