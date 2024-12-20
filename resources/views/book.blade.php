@extends('layouts.app')

@php
    $title = $book->title;
@endphp

@section('content')
    <div class="w-full flex flex-row justify-between p-2 gap-4">
        <div class="border-4 border-primary flex-1 special-bg-diag" >
        </div>
        <a href="/" class="w-1/3 flex flex-row items-center justify-start gap-2 p-2 border border-primary hover:bg-primary hover:text-secondary hover:fill-secondary">
            < {{ __('book.actions.back') }}
        </a>
    </div>
    <div class="relative flex flex-row items-start justify-between p-2 gap-7">
        <div class="flex-1 flex flex-col items-center justify-center w-auto">
            <img src="/placeholder.webp" alt="{{ $book->title }}" class="w-full h-40 cursor-pointer object-cover">
            <div class="flex flex-row items-end gap-8">
                <h1 class="text-left w-full text-nowrap">
                    > {{ $book->title }}
                </h1>
                <p class="text-left w-full text-nowrap">
                    {{ $book->price }}$
                </p>
            </div>

        </div>
        <div class="flex flex-col w-full max-w-full h-full overflow-x-hidden overflow-y-auto">
            <p class="text-left w-full max-w-full h-full break-words">
                {{ $book->description }}
            </p>
        </div>
    </div>
    <div class="flex-1 h-full w-full flex flex-row p-2">
        <div class="flex-1 flex flex-col h-fill border border-primary">
            <div class="border-b border-primary">
                <h3 class="px-2">
                    // {{ __('book.informations') }}
                </h3>
            </div>
            <div class="flex-1 p-2">
                <ul>
                    @if($book->year)
                        <li>
                            <div class="flex flex-row items-center justify-between">
                                <p>::{{ __('book.year') }}</p>
                                <div class="flex-1 self-end border-b border-dotted border-primary"></div>
                                <p> {{ $book->year }} </p>
                            </div>
                        </li>
                    @endif
                    @if($book->pages)
                        <li>
                            <div class="flex flex-row items-center justify-between">
                                <p>::{{ __('book.pages') }}</p>
                                <div class="flex-1 self-end border-b border-dotted border-primary"></div>
                                <p> {{ $book->pages }} </p>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="flex-1 flex flex-row items-start gap-2 justify-end w-full">
            <div class="flex flex-col items-center gap-2">
                <div class="w-4 h-4 bg-primary"></div>
                <div class="w-4 h-4 bg-primary"></div>
            </div>
            <div>
                <div class="border border-primary">
                    <h3 class="px-2">
                        // {{ __('book.author') }}
                    </h3>
                </div>
                <div class="relative flex flex-col items-center justify-center w-full">
                    <div class="text-left w-full absolute bottom-0 left-0 p-2">
                        {{ $book->author }}
                    </div>
                    <img src="/placeholder.webp" alt="{{ $book->author }}" class="w-full h-40 cursor-pointer object-cover">
                </div>
            </div>
        </div>
    </div>
@endsection
