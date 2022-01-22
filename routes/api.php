<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiControler;

Route::get('/{cpf}', [ApiControler::class, 'show']);
Route::post('/register', [ApiControler::class, 'store']);
