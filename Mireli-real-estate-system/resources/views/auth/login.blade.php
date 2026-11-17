@extends('layouts.app')

@section('title', 'Log in | Mireli')

@section('content')
    <div class="auth-wrap">
        <div class="card">
            <div class="card-body">
                <h1>Log in</h1>
                <p class="text-muted">Welcome back. Enter your details to continue.</p>

                <form method="POST" action="{{ route('login') }}" novalidate>
                    @csrf

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" name="email" type="email" class="form-control" value="{{ old('email') }}" required autofocus autocomplete="email">
                        @error('email') <p class="field-error">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" name="password" type="password" class="form-control" required autocomplete="current-password">
                        @error('password') <p class="field-error">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-check" for="remember">
                            <input id="remember" name="remember" type="checkbox" value="1">
                            Remember me
                        </label>
                    </div>

                    <button type="submit" class="btn btn-block">Log in</button>
                </form>

                <p class="form-footer">No account yet? <a href="{{ route('register') }}">Register</a></p>
            </div>
        </div>
    </div>
@endsection
