@extends('layouts.app')

@php

@endphp

@section('content')
    <div class="flex flex-col items-center justify-center">
        <h3> {{ __('new.title') }} </h3>
    </div>

    <div class="w-2/3 m-auto flex flex-col items-center justify-center p-2">
        <div id='books-list' class="w-full grid grid-cols-[repeat(auto-fit,minmax(200px,1fr))] grid-auto-rows-min gap-4 ">
        </div>
    </div>
@endsection


@section('scripts')
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/js/new.js'])
    @endif
@endsection
