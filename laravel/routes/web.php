<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/logs', function () {
    $response = [
        time(),
        "hello world",
        "I wanna say thank you for signing up!",
    ];

    \Illuminate\Support\Facades\Log::info(
        json_encode($response, true)
    );
    \Illuminate\Support\Facades\Log::debug(
        json_encode($response, true)
    );
    \Illuminate\Support\Facades\Log::alert(
        json_encode($response, true)
    );
    \Illuminate\Support\Facades\Log::error(
        json_encode($response, true)
    );
    \Illuminate\Support\Facades\Log::emergency(
        json_encode($response, true)
    );

    echo $a;

    return response()->json($response);
});
