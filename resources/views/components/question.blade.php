@props(['question'=>$question])

<div class="mb4">
    <p class="center title" style="font-size: 28px; color: #7B68EE; margin-bottom: 5px;">{{ $question->question }}</p>
    <p class="center" style="color: #5e76fa; font-style: italic; font-size: 16px; margin-bottom: 20px;">Category: {{ $question->category }} ({{ $question->xp }} XP)</p>

    <div class="checkboxes-wrapper" class="center">
        @foreach ($question->answers as $answer)
        <div class="checkbox">
            <label style="cursor: pointer;">
                <input type="radio" name="{{ $question->id }}" value="{{ $answer->answer }}" required>
                <span>{{ $answer->answer }}</span>
            </label>
        </div>
        @endforeach
    </div>

    <div class="center line"></div>
</div>