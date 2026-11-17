<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| PAIR 4: Payments
|--------------------------------------------------------------------------
| Placeholders from Pair 1. Replace each closure with your real controller.
| KEEP THE ROUTE NAMES: payments.deposit.create is linked from the property page (I4).
*/

Route::middleware(['auth', 'role:client'])->group(function () {
    Route::get('/payments', fn () => view('placeholder', [
        'title' => 'My payments',
        'pair' => 'Pair 4',
        'description' => 'The client\'s payments, statuses and payment plan progress.',
    ]))->name('payments.index');

    Route::get('/payments/deposit/{property}', fn ($property) => view('placeholder', [
        'title' => 'Pay deposit',
        'pair' => 'Pair 4',
        'description' => "Deposit page for property {$property}: shows the reference to use and a box to paste the M-PESA message.",
    ]))->name('payments.deposit.create');
});

Route::middleware(['auth', 'role:management'])->prefix('management')->group(function () {
    Route::get('/payments', fn () => view('placeholder', [
        'title' => 'Manage payments',
        'pair' => 'Pair 4',
        'description' => 'Pending payments to confirm or cancel (bank, cheque and M-PESA mismatches).',
    ]))->name('management.payments.index');

    Route::get('/interest-rates', fn () => view('placeholder', [
        'title' => 'Interest rates',
        'pair' => 'Pair 4',
        'description' => 'Set the interest rate for each payment plan duration.',
    ]))->name('management.interest-rates.index');
});
