@extends('app')

@section('content')

<div class="nav-container">
    <div class="nav-links-left">
        <a class="btn btn-secondary" href="{{ route('home') }}">Back</a>
    </div>
</div>

<div class="form-card header-card">
    <h1 class="form-title">Leaderboard</h1>
    <p class="form-description">Top 10 players ranked by their earned Experience Points (XP).</p>
</div>

<div class="form-card">
    <div class="data-table-container">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>Username</th>
                    <th>XP</th>
                    <th>Total Correct</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $index => $user)
                <tr>
                    <td class="rank-badge">#{{ $index + 1 }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->xp }}</td>
                    <td>{{ $user->total_correct }}</td>
                </tr>
                @empty
                <tr class="empty-row">
                    <td colspan="4">No players on the leaderboard yet!</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection