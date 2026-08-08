@extends('app')

@section('content')

<div class="nav-container">
    <div class="nav-links-left">
        <a class="btn btn-secondary" href="{{ route('home') }}">Back to Home</a>
    </div>
    <div class="nav-links-right">
        <a class="btn btn-secondary" href="{{ route('profile') }}">View Profile</a>
    </div>
</div>

<div class="form-card header-card">
    <h1 class="form-title">Quiz Results</h1>
    <p class="form-description">Thank you for completing the quiz! Here is your score breakdown.</p>
</div>

<div class="form-card">
    <h2 class="card-title">Overall Score</h2>
    <div class="welcome-center">
        <div class="welcome-title">{{ $results['overall'] }} / {{ $results['total'] }}</div>
        <p class="welcome-desc">Your answers have been checked and your statistics have been updated successfully.</p>
    </div>
</div>

<div class="form-card">
    <h2 class="card-title">Category Breakdown</h2>
    <p class="card-subtitle">Number of correct answers per category.</p>

    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-title">Art</div>
            <div class="stat-value">{{ $results['art'] }} / {{ $results['category_totals']['art'] }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-title">Geography</div>
            <div class="stat-value">{{ $results['geography'] }} / {{ $results['category_totals']['geography'] }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-title">History</div>
            <div class="stat-value">{{ $results['history'] }} / {{ $results['category_totals']['history'] }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-title">Science</div>
            <div class="stat-value">{{ $results['science'] }} / {{ $results['category_totals']['science'] }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-title">Sports</div>
            <div class="stat-value">{{ $results['sports'] }} / {{ $results['category_totals']['sports'] }}</div>
        </div>
    </div>
</div>

@endsection