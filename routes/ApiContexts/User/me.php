<?php

use App\Http\Contexts\User\Controllers\MeController;
use Illuminate\Support\Facades\Route;

Route::get('me', [MeController::class, 'show']);
Route::patch('me/update', [MeController::class, 'update']);
