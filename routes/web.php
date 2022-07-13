<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Request;

Route::get('/', function () {
    // dd(User::all()->toArray());
    // $client = new Client();
    // $res = $client->get(Request::getClientIp() . ':8000');
    // dd($res);
    // dd(Request::getClientIp());
});
