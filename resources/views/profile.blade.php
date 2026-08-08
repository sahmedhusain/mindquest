@extends('app')

@section('content')

<a class="top-right-corner red-btn" href="{{ route('home') }}">Back ></a>

<div style="margin-top:100px">
    <div class="profile-header">
        <p class="title profile-name">{{ auth()->user()->username }}</p>
        <p class="title profile-email">{{ auth()->user()->email }}</p>
    </div>

    <div class="profile-header">
        <p class="title profile-xp">{{ auth()->user()->xp }} XP</p>
        <p class="title profile-email" style="margin-left: 40px; margin-top: 10px; color: #7B68EE;">{{ $rank }}</p>
    </div>
</div>

<div class="center text-center" style="margin-top: 50px;">
    <p class="title" style="font-size: 30px; margin-bottom: 20px;">Category Stats</p>
    <div class="results-wrapper" style="margin-top: 0; display: flex; flex-wrap: wrap; justify-content: center; gap: 20px;">
        <div class="result" style="margin: 10px; min-width: 180px;">
            <p style="font-size: 20px;">Art</p>
            <p class="title" style="font-size: 30px;">{{ $art['correct'] }} / {{ $art['total'] }}</p>
            <p style="color: white; font-size: 18px; margin-top: 5px;">{{ $art['percentage'] }}%</p>
        </div>
        <div class="result" style="margin: 10px; min-width: 180px;">
            <p style="font-size: 20px;">Geography</p>
            <p class="title" style="font-size: 30px;">{{ $geography['correct'] }} / {{ $geography['total'] }}</p>
            <p style="color: white; font-size: 18px; margin-top: 5px;">{{ $geography['percentage'] }}%</p>
        </div>
        <div class="result" style="margin: 10px; min-width: 180px;">
            <p style="font-size: 20px;">History</p>
            <p class="title" style="font-size: 30px;">{{ $history['correct'] }} / {{ $history['total'] }}</p>
            <p style="color: white; font-size: 18px; margin-top: 5px;">{{ $history['percentage'] }}%</p>
        </div>
        <div class="result" style="margin: 10px; min-width: 180px;">
            <p style="font-size: 20px;">Science</p>
            <p class="title" style="font-size: 30px;">{{ $science['correct'] }} / {{ $science['total'] }}</p>
            <p style="color: white; font-size: 18px; margin-top: 5px;">{{ $science['percentage'] }}%</p>
        </div>
        <div class="result" style="margin: 10px; min-width: 180px;">
            <p style="font-size: 20px;">Sports</p>
            <p class="title" style="font-size: 30px;">{{ $sports['correct'] }} / {{ $sports['total'] }}</p>
            <p style="color: white; font-size: 18px; margin-top: 5px;">{{ $sports['percentage'] }}%</p>
        </div>
    </div>
</div>

@endsection