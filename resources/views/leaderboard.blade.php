@extends('app')

@section('content')

<a class="top-right-corner red-btn" href="{{ route('home') }}">Back ></a>

<div class="content" style="margin-top: 100px;">
    <p class="title" style="margin-bottom: 50px;">Leaderboard</p>

    <table class="center" style="width: 70%; border-collapse: collapse; color: white; font-size: 20px; box-shadow: 0px 0px 23px 33px #8080802c; background-color: #8080802c; border-radius: 15px; overflow: hidden; margin-bottom: 100px;">
        <thead>
            <tr style="background-color: #7B68EE; color: white; height: 60px; font-size: 22px;">
                <th style="padding: 15px; text-align: center; font-variant: small-caps; width: 15%;">Rank</th>
                <th style="padding: 15px; text-align: left; font-variant: small-caps; width: 45%;">Username</th>
                <th style="padding: 15px; text-align: center; font-variant: small-caps; width: 20%;">XP</th>
                <th style="padding: 15px; text-align: center; font-variant: small-caps; width: 20%;">Total Correct</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $index => $user)
            <tr style="border-bottom: 1px solid #3a96ff36; height: 55px;">
                <td style="padding: 15px; text-align: center; font-weight: bold; color: rgb(78, 183, 243);">#{{ $index + 1 }}</td>
                <td style="padding: 15px; text-align: left;">{{ $user->username }}</td>
                <td style="padding: 15px; text-align: center;">{{ $user->xp }}</td>
                <td style="padding: 15px; text-align: center;">{{ $user->total_correct }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4" style="padding: 30px; text-align: center; color: #a2d4ff;">No players on the leaderboard yet!</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection