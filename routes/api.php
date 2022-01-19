<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiControler;

Route::get('/', [ApiControler::class, 'index']);
Route::get('/{id}', [ApiControler::class, 'show']);
Route::post('/register', [ApiControler::class, 'register']);
