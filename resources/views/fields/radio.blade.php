<div class="mb-5">
    <label for="{{ $name }}" class="font-bold mb-1 text-gray-700 block">
        {{ __($label) }}
    </label>

    @foreach($options as $val => $radioLabel)
        <label for="{{ $name . '_' . $val }}">
            <input type="radio" name="{{ $name }}" id="{{ $name . '_' . $val }}" value="{{ $val }}" @if ($value == $val) checked @endif />
            {{ __($radioLabel) }}
        </label>
    @endforeach

    @error($name)
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
