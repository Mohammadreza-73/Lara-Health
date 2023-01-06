<?php

use Illuminate\Support\Facades\Route;

Route::get('/health', 'HealthController@index');
