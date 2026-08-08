@extends('app')

@section('content')

<div class="nav-container">
    <div class="nav-links-left">
        <a class="btn btn-secondary" href="{{ route('home') }}">Back</a>
    </div>
</div>

<div class="form-card header-card">
    <h1 class="form-title">Mister Quiz Challenge</h1>
    <p class="form-description">Please answer all questions below and click submit to verify your score. There is at least one question from each category.</p>
</div>

<form action="{{ route('quiz.submit', $quiz) }}" method="POST">
    @csrf

    @if ($quiz)
        <div class="radio-group">
            @foreach ($quiz['questions'] as $question)
                <x-question :question="$question" />
            @endforeach
        </div>
    @endif

    <button class="btn btn-primary" type="submit">Submit Quiz</button>
</form>

@endsection