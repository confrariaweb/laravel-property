<?php

use ConfrariaWeb\Property\Controllers\LocationController;
use Illuminate\Support\Facades\Route;

Route::prefix('api')
    ->name('api.')
    ->middleware(['api'])
    ->group(function () {

        Route::get('countries', [LocationController::class, 'countries'])->name('countries');
        Route::get('states/{country_id}', [LocationController::class, 'states'])->name('states');
        Route::get('cities/{state_id}', [LocationController::class, 'cities'])->name('cities');
        Route::get('districts/{city_id}', [LocationController::class, 'districts'])->name('districts');
        
    });
