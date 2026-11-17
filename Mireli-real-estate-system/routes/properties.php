<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| PAIR 2: Properties and catalogue
|--------------------------------------------------------------------------
| These are placeholders from Pair 1. Replace each closure with your real
| controller. KEEP THE ROUTE NAMES: other pairs link to them.
*/

Route::middleware(['auth', 'role:client'])->group(function () {
    Route::get('/properties', fn () => view('placeholder', [
        'title' => 'Properties',
        'pair' => 'Pair 2',
        'description' => 'Listing with search and filters (price, location, status).',
    ]))->name('properties.index');

    Route::get('/properties/{property}', fn ($property) => view('placeholder', [
        'title' => 'Property details',
        'pair' => 'Pair 2',
        'description' => "Detail page for property {$property}, with the Request viewing and Pay deposit buttons (interface I4).",
    ]))->name('properties.show');
});

Route::middleware(['auth', 'role:management'])->prefix('management')->group(function () {
    Route::get('/properties', fn () => view('placeholder', [
        'title' => 'Manage properties',
        'pair' => 'Pair 2',
        'description' => 'Create, edit and delete properties, including photos and the deposit amount.',
    ]))->name('management.properties.index');
});
