@extends('layouts.app')

@section('title', 'Management | Mireli')

@section('content')
    <h1 class="page-title">Management dashboard</h1>
    <p class="page-lead">Signed in as {{ auth()->user()->name }}. Manage houses, viewings and payments.</p>

    <div class="grid">
        <a class="card card-link" href="{{ route('management.properties.index') }}"><div class="card-body">
            <p class="card-title">Properties</p>
            <p class="text-muted">Add and edit houses, prices, deposits and photos.</p>
            <span class="more">Manage &rarr;</span>
        </div></a>
        <a class="card card-link" href="{{ route('management.viewings.index') }}"><div class="card-body">
            <p class="card-title">Viewings</p>
            <p class="text-muted">Approve, reschedule and complete viewing requests.</p>
            <span class="more">Manage &rarr;</span>
        </div></a>
        <a class="card card-link" href="{{ route('management.payments.index') }}"><div class="card-body">
            <p class="card-title">Payments</p>
            <p class="text-muted">Confirm or cancel pending payments.</p>
            <span class="more">Manage &rarr;</span>
        </div></a>
        <a class="card card-link" href="{{ route('management.interest-rates.index') }}"><div class="card-body">
            <p class="card-title">Interest rates</p>
            <p class="text-muted">Set the rate for each payment plan duration.</p>
            <span class="more">Manage &rarr;</span>
        </div></a>
    </div>
@endsection
