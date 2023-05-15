<div class="mb-2">
    @isset($link)
        {{ $link }}
    @endisset
</div>

<div class="d-flex justify-content-between border-bottom pb-3 mb-3">
    <div>
        <h1 class="h2">
            {{ $slot }}
        </h1>
    </div>

    @isset( $right )
        <div>
            {{ $right }}
        </div>
    @endisset
</div>