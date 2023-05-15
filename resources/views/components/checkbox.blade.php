<div class="form-check">
    <x-label class="form-check-label" for="{{ $id }}">
        {{ $slot }}
    </x-label>
    <input type="checkbox" {{ $attributes->merge([
        'value' => 1,
        'checked' => false
    ]) }} class="form-check-input" id="{{ $id }}">
</div>