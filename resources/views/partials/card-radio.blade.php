<div class="flex flex-col focus:outline-4">
    <input class="hidden" id="radio_{{ $key }}" type="radio" name="starter_kit" value="{{ $theme_key }}">
    <label class="flex flex-col border-2 border-gray-100 cursor-pointer rounded-lg shadow-lg starter-kit" for="radio_{{ $key }}">
        <img src="{{ $kit['image'] }}" alt="{{ $kit['title'] }}" class="rounded-t-lg rounded-t-lg object-contain h-60">
        <div class="p-5">
            <h5 class="text-gray-900 font-bold text-xl tracking-tight mb-2">{{ $kit['title'] }}</h5>
        </div>
    </label>
</div>
