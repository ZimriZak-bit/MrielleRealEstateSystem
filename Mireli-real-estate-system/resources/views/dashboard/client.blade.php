@extends('layouts.app')

@section('title', 'Dashboard | Mireli')

@section('content')
    <h1 class="page-title">Welcome, {{ auth()->user()->name }}</h1>
    <p class="page-lead">Your journey from browsing to owning, step by step.</p>

    <div class="grid">
        <a class="card card-link" href="{{ route('properties.index') }}"><div class="card-body">
            <p class="card-title">Properties</p>
            <p class="text-muted">Search and filter houses, and open a listing for details.</p>
            <span class="more">Browse &rarr;</span>
        </div></a>
        <a class="card card-link" href="{{ route('viewings.index') }}"><div class="card-body">
            <p class="card-title">My viewings</p>
            <p class="text-muted">Track your viewing requests, or ask to reschedule.</p>
            <span class="more">Open &rarr;</span>
        </div></a>
        <a class="card card-link" href="{{ route('payments.index') }}"><div class="card-body">
            <p class="card-title">My payments</p>
            <p class="text-muted">Deposits, installments and the status of each payment.</p>
            <span class="more">Open &rarr;</span>
        </div></a>
        <a class="card card-link" href="{{ route('customizations.index') }}"><div class="card-body">
            <p class="card-title">Customization</p>
            <p class="text-muted">Choose furniture, colours and furnishing for your house.</p>
            <span class="more">Open &rarr;</span>
        </div></a>
    </div>
@endsection
