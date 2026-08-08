@extends('app')

@section('content')

<div class="nav-container">
    <div class="nav-links-left">
        <a class="btn btn-secondary" href="{{ route('home') }}">Back</a>
    </div>
</div>

<div class="form-card header-card">
    <h1 class="form-title">Register form</h1>
    <p class="form-description">Create a new account to join the quiz challenges and start earning XP.</p>

    <form action="{{ route('register') }}" method="POST">
        @csrf

        <div class="form-group">
            <label class="form-label" for="username">Username</label>
            <input class="form-input" type="text" name="username" id="username" placeholder="Enter username" value="{{ old('username') }}">
            @error('username')
            <div class="field-error">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="email">Email address</label>
            <input class="form-input" type="text" name="email" id="email" placeholder="Enter email" value="{{ old('email') }}">
            @error('email')
            <div class="field-error">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="password">Password</label>
            <input class="form-input" type="password" name="password" id="password" placeholder="Enter password">
            @error('password')
            <div class="field-error">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="password_confirmation">Confirm password</label>
            <input class="form-input" type="password" name="password_confirmation" id="password_confirmation" placeholder="Enter password confirmation">
            @error('password_confirmation')
            <div class="field-error">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button class="btn btn-primary" type="submit">Register</button>
    </form>

    <a class="form-footer-link" href="{{ route('login') }}">Already have an account? Login</a>
</div>

@endsection