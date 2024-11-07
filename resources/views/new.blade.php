@extends('layouts.app')

@php

@endphp

@section('content')
    <div class="flex flex-col items-center justify-center">
        <h3> {{ __('new.title') }} </h3>
    </div>

    <div class="flex flex-col items-center justify-center p-2">
        <div id='books-list' class="grid grid-cols-4 gap-4 grid-auto-rows-min">
        </div>
    </div>

@endsection
