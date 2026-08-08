@props(['question'=>$question])

<div class="form-card">
    <h2 class="question-text">
        {{ $question->question }}
        <div class="question-meta">Category: {{ $question->category }} &middot; {{ $question->xp }} XP</div>
    </h2>

    <div class="radio-group">
        @foreach ($question->answers as $answer)
        <label class="radio-option">
            <input type="radio" name="{{ $question->id }}" value="{{ $answer->answer }}" required>
            <span>{{ $answer->answer }}</span>
        </label>
        @endforeach
    </div>
</div>