@props([
    'label_for' => uniqid(),
    'label' => null,
    'value' => null,
    'placeholder' => null,
    'error' => null,
])

<div class="mb-5">
    <label for="{{ $label_for }}" class="font-bold mb-1 text-gray-700 block">{{ __($label) }}</label>
    <input type="number" id="{{ $label_for }}" {!! $attributes !!} value="{{ $value }}"
           class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium border-gray-300 bg-gray-100 @error($errors) border border-red-300 text-red-900 focus:border-red-300 focus:shadow-outline-red @enderror"
           placeholder="{{ __($placeholder) }}">

    @error($error)
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
