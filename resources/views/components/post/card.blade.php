@props(['href', 'post'])
<x-card>
    <x-card-body style="min-height: 157px">
        <h2 class="h5">
            <a href="{{ $href }}">
                {{$post->title}}
            </a>
        </h2>
        <div class="small text-muted">
{{--            {{ $post->published_at->format('d.m.y H:i') }}--}}
            {{$post->published_at?->diffForHumans()}}
        </div>
    </x-card-body>
    {{$post->id}}
</x-card>
