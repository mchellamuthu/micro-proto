<?php

use Illuminate\Support\Facades\Route;

Route::prefix('customers')->group(function () {
       Route::get('/', function(){
           return 'test';
       });
});
