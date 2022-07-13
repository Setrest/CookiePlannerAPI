<?php

use App\Http\Contexts\Schedule\Controllers\ScheduleController;
use Illuminate\Support\Facades\Route;

Route::apiResource('schedule', ScheduleController::class);