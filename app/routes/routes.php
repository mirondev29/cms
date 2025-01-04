<?php

use App\Controllers\HomeController;
use App\Controllers\Test1Controller;

use Engine\Router\Route;

return [
    Route::get('/', [HomeController::class, 'index']),
    Route::get('/test1', [Test1Controller::class, 'index']),
];
