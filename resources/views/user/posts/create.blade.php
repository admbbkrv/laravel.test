@extends('layouts.main')

@section('page.title', 'Созадть пост')

@section('main.content')
    <x-row>
        <div class="col-12">
            <x-title>
                <x-slot name="link">
                    <a href="{{route('user.posts.index')}}">
                        {{__('Назад к постам')}}
                    </a>
                </x-slot>
                {{__('Создать пост')}}
            </x-title>

            <x-form action="{{route('user.posts.store')}}" method="POST">
                @csrf
                <x-form-item>
                    <x-label required>
                        {{__('Название поста')}}
                    </x-label>
                    <x-input name="title"></x-input>
                </x-form-item>

                <x-form-item>
                    <x-label required>
                        {{__('Содержимое поста')}}
                    </x-label>
                    <input id="x" type="hidden" name="content">
                    <trix-editor input="x"></trix-editor>
                </x-form-item>

                <x-button type="submit">
                    {{__('Создать пост')}}
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