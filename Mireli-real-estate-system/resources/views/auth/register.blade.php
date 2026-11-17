@extends('layouts.app')

@section('title', 'Register | Mireli')

@section('content')
    <div class="auth-wrap">
        <div class="card">
            <div class="card-body">
                <h1>Create an account</h1>
                <p class="text-muted">Register as a client to browse houses and book viewings.</p>

                <form method="POST" action="{{ route('register') }}" novalidate>
                    @csrf

                    <div class="form-group">
                        <label for="name">Full name</label>
                        <input id="name" name="name" type="text" class="form-control" value="{{ old('name') }}" required autofocus autocomplete="name">
                        @error('name') <p class="field-error">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" name="email" type="email" class="form-control" value="{{ old('email') }}" required autocomplete="email">
                        @error('email') <p class="field-error">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone (optional)</label>
                        <input id="phone" name="phone" type="tel" class="form-control" value="{{ old('phone') }}" autocomplete="tel" placeholder="0712 345 678">
                        @error('phone') <p class="field-error">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" name="password" type="password" class="form-control" required autocomplete="new-password">
                        <p class="text-muted" style="font-size:0.8rem;margin:0.35rem 0 0;">At least 8 characters.</p>
                        @error('password') <p class="field-error">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" required autocomplete="new-password">
                    </div>

                    <button type="submit" class="btn btn-block">Create account</button>
                </form>

                <p class="form-footer">Already registered? <a href="{{ route('login') }}">Log in</a></p>
            </div>
        </div>
    </div>
@endsection
