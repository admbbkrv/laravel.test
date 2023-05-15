<form {{ $attributes->merge([
    'method' => $isHtmlMethod ? $method : 'POST',
]) }}>
    @unless($isHtmlMethod)
        @method($method)
    @endunless
    @if($method != 'GET')
        @csrf
    @endif
    {{ $slot }}
</form>