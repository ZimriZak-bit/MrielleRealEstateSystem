@extends('layouts.app')

@section('title', 'Admin | Mireli')

@section('content')
    <h1 class="page-title">Admin dashboard</h1>
    <p class="page-lead">Signed in as {{ auth()->user()->name }}. The admin generates the system reports.</p>

    <div class="grid">
        <a class="card card-link" href="{{ route('admin.reports.index') }}"><div class="card-body">
            <p class="card-title">Reports</p>
            <p class="text-muted">Properties, viewings, deposits, successful payments and payment plans.</p>
            <span class="more">Open &rarr;</span>
        </div></a>
    </div>
@endsection
