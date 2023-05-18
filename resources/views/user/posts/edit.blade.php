@extends('layouts.main')

@section('page.title', 'Изменить пост')

@section('main.content')
    <x-row>
        <div class="col-12">
            <x-title>
                <x-slot name="link">
                    <a href="{{route('user.posts.index')}}">
                        {{__('Назад к постам')}}
                    </a>
                </x-slot>
                {{__('Изменить пост')}}
            </x-title>

            <x-form action="{{route('user.posts.update', $post->id)}}" method="PUT">
                @csrf
                <x-form-item>
                    <x-label required>
                        {{__('Название поста')}}
                    </x-label>
                    <x-input name="title" value="{{$post->title}}"></x-input>
                    <x-error name="title" />
                </x-form-item>

                <x-form-item>
                    <x-label required>
                        {{__('Содержимое поста')}}
                    </x-label>
                    <input id="x" type="hidden" name="content" value="{{$post->content}}">
                    <trix-editor input="x"></trix-editor>
                    <x-error name="content" />
                </x-form-item>

                <x-button type="submit">
                    {{__('Изменить пост')}}
                </x-button>
            </x-form>
        </div>
    </x-row>
@endsection
@push('css')
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
@endpush
@push('js')
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
@endpush
