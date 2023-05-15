@extends('layouts.main')

@section('page.title', 'Просмотр поста')

@section('main.content')
    <x-title>
        <x-slot name="link">
            <a href="{{ route('user.posts.index') }}">
                {{ __('К моим постам') }}
            </a>
        </x-slot>

        {{ __('Просмотр поста') }}

        <x-slot name="right">
            <x-button-link href="{{route('user.posts.edit', $post->id)}}">
                {{ __('Изменить') }}
            </x-button-link>
        </x-slot>
    </x-title>

    <h2 class="h5">
        {{ $post->title }}
    </h2>
    <p>
        {!! $post->content !!}
    </p>
    <div class="small text-muted">
        {{ now()->format('d.m.y h:i') }}
    </div>
@endsection