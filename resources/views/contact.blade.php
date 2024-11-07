@extends('layouts.app')

@section('content')
    <div class="w-2/3 m-auto flex flex-col items-center justify-center p-2">
        <div class="w-full flex flex-row items-center justify-between p-2">
            <h3 class="text-left"> {{ __('contact.title') }} </h3>
        </div>
        <div id='form-list' class="w-full grid grid-cols-[repeat(auto-fit,minmax(200px,1fr))] grid-auto-rows-min gap-4">
            <form method="POST" class="flex flex-col gap-2">
                <input id="name" type="text" name="nom" placeholder="{{ __('contact.name-placeholder') }}">
                <input id="email" type="email" name="email" placeholder="{{ __('contact.email-placeholder') }}">
                <input id="subject" type="text" name="subject" placeholder="{{ __('contact.subject-placeholder') }}">
                <textarea id="message" name="message" placeholder="{{ __('contact.message-placeholder') }}"></textarea>
                <button type="submit">{{ __('contact.button')}}</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite([  'resources/js/functionalities.js'])
    @endif

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite([  'resources/js/contact.js'])
    @endif
@endsection
