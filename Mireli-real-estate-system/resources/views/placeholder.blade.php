@extends('layouts.app')

@section('title', $title.' | Mireli')

@section('content')
    <h1 class="page-title">{{ $title }}</h1>
    <p class="page-lead">{{ $description }}</p>

    <div class="placeholder-box">
        <span class="badge">Coming soon</span>
        <h3>This page is being built by {{ $pair }}</h3>
        <p class="text-muted">
            Placeholder from Pair 1. The owning pair replaces this route with their real page
            and keeps the route name.
        </p>
    </div>
@endsection
