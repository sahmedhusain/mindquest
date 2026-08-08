@extends('app')

@section('content')

<div class="nav-container">
    <div class="nav-links-left">
        @auth
            <a class="btn btn-secondary" href="{{ route('profile') }}">Profile ({{ auth()->user()->username }})</a>
        @else
            <a class="btn btn-secondary" href="{{ route('login') }}">Login</a>
        @endauth
    </div>
    <div class="nav-links-right">
        <a class="btn btn-secondary" href="{{ route('leaderboard') }}">Leaderboard</a>
        @auth
            <a class="btn btn-danger" href="{{ route('logout') }}">Logout</a>
        @endauth
    </div>
</div>

<div class="form-card header-card">
    <div class="welcome-center">
        <img class="welcome-logo" src="{{ asset('images/mister_quiz.png') }}" alt="Mister Quiz Logo">
        <h1 class="welcome-title">Mister Quiz</h1>
        <p class="welcome-desc">Test your knowledge across History, Art, Geography, Science, and Sports to earn XP and level up your rank!</p>
        <a class="btn btn-primary" href="{{ route('quiz') }}">Start Quiz</a>
    </div>
</div>

@endsection