@extends('layouts.main')

@section('page.title', 'Мои посты')

@section('main.content')
    <x-title>
        {{ __('Мои посты') }}

        <x-slot name="right">
            <x-button-link href="{{route('user.posts.create')}}">
                {{ __('Создать') }}
            </x-button-link>
        </x-slot>
    </x-title>

    <x-row>
        @if(empty($posts))
            <div class="col-12 col-md-4">
                {{ __('Нет ни одного поста') }}
            </div>
        @else
            @foreach($posts as $post)
                <div class="col-12 col-md-4">
                    <x-post.card href="{{route('user.posts.show', $post->id) }}"  :post="$post" />
                </div>
            @endforeach
        @endif
    </x-row>
@endsection