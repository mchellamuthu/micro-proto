<?php

use Illuminate\Support\Facades\Route;
use App\Domains\Customers\Http\Controllers\CustomerController;

Route::apiResource('customers',CustomerController::class);
