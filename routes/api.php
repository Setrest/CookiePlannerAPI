<?php

use App\Domain\Recipe\Repositories\RecipeRepository;
use App\Infrastructure\Helpers\RouteHelper as RH;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(RH::routes('registration'));
Route::prefix('/auth')->group(RH::routes('authenticate', 'auth'));
Route::prefix('/')->middleware('auth')->group(RH::routes('recipe'));
Route::prefix('/')->middleware('auth')->group(RH::routes('schedule'));
Route::prefix('/')->middleware('auth')->group(RH::routes('stages'));

Route::get('me', function() {
    return response()->json(Auth::user());
    // $reslt = \Carbon\Carbon::now()->addDays(10)->unix();
    // dd($reslt);
    // dd(Schedule::all()->toArray());
})->middleware('auth');
