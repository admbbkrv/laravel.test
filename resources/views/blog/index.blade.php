@extends('layouts.main')

@section('page.title', 'Список постов')

@section('main.content')
    <x-title>
        {{ __('Список постов') }}
    </x-title>

    @include('blog.filter-form')

    <x-row>
        @if(empty($posts))
            {{ __('Нет ни одного поста') }}
        @else
            @foreach($posts as $post)
                <div class="col-12 col-md-4">
                    <x-post.card href="{{route('blog.show', $post->id)}}" :post="$post"/>
                </div>
            @endforeach
        @endif
    </x-row>
@endsection