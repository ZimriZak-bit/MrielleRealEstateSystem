<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| PAIR 3: Viewings and customization
|--------------------------------------------------------------------------
| Placeholders from Pair 1. Replace each closure with your real controller.
| KEEP THE ROUTE NAMES: viewings.create is linked from the property page (I4).
*/

Route::middleware(['auth', 'role:client'])->group(function () {
    Route::get('/viewings', fn () => view('placeholder', [
        'title' => 'My viewings',
        'pair' => 'Pair 3',
        'description' => 'The client\'s viewing requests and their status, with cancel and reschedule.',
    ]))->name('viewings.index');

    Route::get('/viewings/create/{property}', fn ($property) => view('placeholder', [
        'title' => 'Request a viewing',
        'pair' => 'Pair 3',
        'description' => "Choose a date and time to view property {$property}.",
    ]))->name('viewings.create');

    Route::get('/customizations', fn () => view('placeholder', [
        'title' => 'Customization',
        'pair' => 'Pair 3',
        'description' => 'Furniture arrangement, colour scheme and furnishing status (stretch goal).',
    ]))->name('customizations.index');
});

Route::middleware(['auth', 'role:management'])->prefix('management')->group(function () {
    Route::get('/viewings', fn () => view('placeholder', [
        'title' => 'Manage viewings',
        'pair' => 'Pair 3',
        'description' => 'Approve, reject or reschedule requests, and mark a viewing as completed.',
    ]))->name('management.viewings.index');
});
