<?php

use App\Http\Contexts\Stage\Controllers\StagesController;
use Illuminate\Support\Facades\Route;

Route::apiResource('stages', StagesController::class)->only('store', 'index');
