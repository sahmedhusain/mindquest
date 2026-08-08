@extends('app')

@section('content')

<div class="nav-container">
    <div class="nav-links-left">
        <a class="btn btn-secondary" href="{{ route('home') }}">Back</a>
      </div>
</div>

<div class="form-card header-card">
    <h1 class="form-title">Login form</h1>
    <p class="form-description">Sign in to your account to play quizzes, check leaderboards, and view stats.</p>

    @if (session('status'))
    <div class="error-badge">
        <span>{{ session('status') }}</span>
    </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf

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

        <button class="btn btn-primary" type="submit">Login</button>
    </form>
    
    <a class="form-footer-link" href="{{ route('register') }}">Don't have an account? Register</a>
</div>

@endsection