<?php

use App\Http\Contexts\Authenticate\Controllers\EmailController;
use Illuminate\Support\Facades\Route;

Route::post('email', [EmailController::class, 'auth']);