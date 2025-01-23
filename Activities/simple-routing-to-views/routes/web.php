<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GreetController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Simple route that returns a message
Route::get('/hello', function () {
    return 'Hello, Laravel!';
});

// Route that returns the blade view through controller
Route::get('/greet', [GreetController::class, 'showGreeting']);
