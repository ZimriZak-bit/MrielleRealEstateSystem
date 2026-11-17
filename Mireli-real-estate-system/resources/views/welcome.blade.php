@extends('layouts.app')

@section('title', 'Mireli Real Estate')

@section('hero')
    <section class="hero">
        <div class="container">
            <h1>Find a home worth keeping</h1>
            <p>
                Browse houses, book a viewing, secure your home with a deposit and pay
                the balance in full or in monthly installments, all in one place.
            </p>
            <div class="hero-actions">
                @guest
                    <a href="{{ route('register') }}" class="btn btn-light">Create an account</a>
                    <a href="{{ route('login') }}" class="btn btn-outline-light">Log in</a>
                @endguest
                @auth
                    <a href="{{ route('dashboard') }}" class="btn btn-light">Go to my dashboard</a>
                @endauth
            </div>
        </div>
    </section>
@endsection

@section('content')
    <h2 class="section-title">How it works</h2>
    <div class="grid grid-4">
        <div class="card"><div class="card-body">
            <div class="step-number">1</div>
            <h3>Browse</h3>
            <p class="text-muted">Search houses by price and location and open any listing for details.</p>
        </div></div>
        <div class="card"><div class="card-body">
            <div class="step-number">2</div>
            <h3>View</h3>
            <p class="text-muted">Request a viewing. Our team approves it and confirms the time.</p>
        </div></div>
        <div class="card"><div class="card-body">
            <div class="step-number">3</div>
            <h3>Secure</h3>
            <p class="text-muted">Pay the deposit to reserve the house while you finish the purchase.</p>
        </div></div>
        <div class="card"><div class="card-body">
            <div class="step-number">4</div>
            <h3>Pay</h3>
            <p class="text-muted">Pay the balance in full or choose a monthly plan that suits you.</p>
        </div></div>
    </div>

    <h2 class="section-title">Recently launched</h2>
    {{-- PAIR 2: replace these three placeholder cards with the newest properties from the database --}}
    <div class="grid grid-3">
        @foreach ([['ph-1', 'Featured house'], ['ph-2', 'Featured house'], ['ph-3', 'Featured house']] as [$class, $label])
            <div class="card">
                <div class="card-image {{ $class }}"></div>
                <div class="card-body">
                    <p class="card-title">{{ $label }}</p>
                    <p class="text-muted">Listings will appear here once the catalogue is ready.</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
