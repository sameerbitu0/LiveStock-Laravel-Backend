<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

 Route::get('/add', [user::class, 'index']);

     // <--Sign-up Api Route-->//

 Route::post('/signup', [user::class, 'signup']);

    // <--Sign-up Api Route End-->//

    // <--Login Api Route-->//

 Route::post('/login', [user::class, 'login']);

    // <--Login Api Route End-->//

    // <--Add Api Route-->//

 Route::post('/add', [user::class, 'add']);

    // <--Add Api Route End-->//
