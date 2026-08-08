@extends('app')

@section('content')

<div class="nav-container">
    <div class="nav-links-left">
        <a class="btn btn-secondary" href="{{ route('home') }}">Back to Home</a>
    </div>
</div>

<div class="form-card header-card">
    <h1 class="form-title">Player Profile</h1>
    <p class="form-description">Track your statistics, performance, and current rank class.</p>
</div>

<div class="form-card">
    <h2 class="card-title">{{ $user->username }}</h2>
    <p class="card-subtitle">{{ $user->email }}</p>

    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-title">Experience Points</div>
            <div class="stat-value">{{ $user->xp }} XP</div>
            <div class="stat-desc">Accumulated from correct answers</div>
        </div>
        <div class="stat-card">
            <div class="stat-title">Current Rank</div>
            <div class="stat-value-text">{{ $rank }}</div>
            <div class="stat-desc">Based on your total XP</div>
        </div>
    </div>
</div>

<div class="form-card">
    <h2 class="card-title">Category breakdown</h2>
    <p class="card-subtitle">Performance breakdown by category, showing correct answers, total questions answered, and percentage.</p>

    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-title">Art</div>
            <div class="stat-value">{{ $art['correct'] }} / {{ $art['total'] }}</div>
            <div class="stat-desc">Score &middot; {{ $art['percentage'] }}%</div>
        </div>
        <div class="stat-card">
            <div class="stat-title">Geography</div>
            <div class="stat-value">{{ $geography['correct'] }} / {{ $geography['total'] }}</div>
            <div class="stat-desc">Score &middot; {{ $geography['percentage'] }}%</div>
        </div>
        <div class="stat-card">
            <div class="stat-title">History</div>
            <div class="stat-value">{{ $history['correct'] }} / {{ $history['total'] }}</div>
            <div class="stat-desc">Score &middot; {{ $history['percentage'] }}%</div>
        </div>
        <div class="stat-card">
            <div class="stat-title">Science</div>
            <div class="stat-value">{{ $science['correct'] }} / {{ $science['total'] }}</div>
            <div class="stat-desc">Score &middot; {{ $science['percentage'] }}%</div>
        </div>
        <div class="stat-card">
            <div class="stat-title">Sports</div>
            <div class="stat-value">{{ $sports['correct'] }} / {{ $sports['total'] }}</div>
            <div class="stat-desc">Score &middot; {{ $sports['percentage'] }}%</div>
        </div>
    </div>
</div>

@endsection