@extends('layouts.app')

@section('content')
    <div class="flex flex-col items-center justify-center w-2/3 p-2 m-auto">
        <div class="flex flex-row items-center justify-between w-full p-2">
            <h3 class="text-left"> {{ __('form.title') }} </h3>
            <button id="fill-form" class="flex flex-row items-center gap-2 p-2 hover:bg-primary hover:text-secondary hover:fill-secondary">
                + {{ __('form.fill') }}
            </button>
        </div>
        <div id='form-list' class="w-full grid grid-cols-[repeat(auto-fit,minmax(200px,1fr))] grid-auto-rows-min gap-4">
            <form method="POST" class="flex flex-col gap-2">
                <input id="isbn" type="text" name="isbn" placeholder="ISBN">
                <input id="title" type="text" name="title" placeholder="Title">
                <input id="year" type="number" name="year" placeholder="Year">
                <input id="subtitle" type="text" name="subtitle" placeholder="Subtitle">
                <input id="author" type="text" name="author" placeholder="Author">
                <input id="publisher" type="text" name="publisher" placeholder="Publisher">
                <input id="published" type="text" name="published" placeholder="Published">
                <input id="pages" type="text" name="pages" placeholder="Pages">
                <input id="description" type="textarea" name="description" placeholder="Description">
                <input id="image" type="text" name="image" placeholder="Image">
                <input id="price" type="text" name="price" placeholder="Price">
                <button type="submit">{{ __('form.actions.submit') }}</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/js/form.js'])
    @endif
@endsection
