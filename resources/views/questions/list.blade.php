@extends('app')

@section('content')

<div class="nav-container">
    <div class="nav-links-left">
        <a class="btn btn-secondary" href="{{ route('home') }}">Back</a>
    </div>
</div>

@if (session('error'))
<div class="error-badge">
    <span>{{ session('error') }}</span>
</div>
@endif

<div class="form-card header-card">
    <h1 class="form-title">Mister Quiz Challenge</h1>
    <p class="form-description">Please answer all questions below and click submit to verify your score. There is at least one question from each category.</p>
    
    <div class="quiz-progress-section">
        <div class="progress-bar-label">
            <span>Quiz Progress</span>
            <span id="progress-text">0 / 20 answered</span>
        </div>
        <div class="progress-bar-outer">
            <div class="progress-bar-inner" id="progress-bar"></div>
        </div>
    </div>
</div>

<form action="{{ route('quiz.submit', $quiz) }}" method="POST">
    @csrf

    @if ($quiz)
        <div class="questions-list">
            @foreach ($quiz['questions'] as $question)
                <x-question :question="$question" />
            @endforeach
        </div>
    @endif

    <button class="btn btn-primary" type="submit">Submit Quiz</button>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        const progressBar = document.getElementById('progress-bar');
        const progressText = document.getElementById('progress-text');
        const questionCards = document.querySelectorAll('.questions-list .form-card');
        const totalQuestions = questionCards.length;

        function updateProgress() {
            // Count unique names of checked radio inputs
            const checkedRadios = form.querySelectorAll('input[type="radio"]:checked');
            const answeredCount = checkedRadios.length;
            const percentage = totalQuestions > 0 ? (answeredCount / totalQuestions) * 100 : 0;
            
            progressBar.style.width = percentage + '%';
            progressText.textContent = answeredCount + ' / ' + totalQuestions + ' answered';
        }

        form.addEventListener('change', updateProgress);
        updateProgress(); // Initial check
    });
</script>

@endsection