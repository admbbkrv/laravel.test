@props(['href', 'post'])
<x-card>
    <x-card-body>
        <h2 class="h5">
            <a href="{{ $href }}">
                {{$post->title}}
            </a>
        </h2>
        <div class="small text-muted">
            {{ now()->format('d.m.y H:i') }}
        </div>
    </x-card-body>
</x-card>