
@extends('layouts.app')

@section('content')
    <div class="w-2/3 m-auto flex flex-col items-center justify-center p-2">
        <div class='w-full flex flex-row items-center justify-between p-2'>
            <h3 class="text-center">
                {{ __('messages.title') }}
            </h3>
            <p id='message-count' class="border border-highlight p-2">0</p>
        </div>
        <div id='messages-list' class="w-full flex flex-col gap-4">
        </div>
    </div>
@endsection

@section('scripts')
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/js/messages.js'])
        @endif
@endsection
