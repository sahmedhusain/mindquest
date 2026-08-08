@extends('app')

@section('content')

<a class="top-right-corner red-btn" href="{{ route('home') }}">Back ></a>

<div class="content" style="margin-top: 100px; padding-bottom: 100px;">
    <p class="title" style="margin-bottom: 50px;">Mister Quiz Challenge</p>

    <form action="{{ route('quiz.submit', $quiz) }}" method="post">
        @csrf

        @if ($quiz)
            @foreach ($quiz['questions'] as $question)
                <x-question :question="$question" />
            @endforeach
        @endif

        <button type="submit" class="center green-btn" style="cursor: pointer; margin-top: 40px;">Submit Quiz</button>
    </form>
</div>

@endsection