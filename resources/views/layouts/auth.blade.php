@extends('layouts.base')

@section('content')
    <section>
        <x-container>
            <x-row>
                <div class="col-12 col-md-6 offset-md-3">
                    @yield('auth.content')
                </div>
            </x-row>
        </x-container>
    </section>
@endsection