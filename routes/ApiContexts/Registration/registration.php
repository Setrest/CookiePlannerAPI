<?php

use App\Http\Contexts\Registration\Controllers\EmailController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'registration'], function () {
    Route::post('email', [EmailController::class, 'create']);
});
