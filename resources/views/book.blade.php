@extends('layouts.app')

@section('content')
    <div class="w-full flex flex-row justify-end">
        <a href="/" class="w-1/3 flex flex-row items-center justify-start gap-2 p-2 hover:bg-primary hover:text-secondary hover:fill-secondary">
            < Retour
        </a>
    </div>
    <div class="flex flex-row items-center justify-center p-2 gap-7">
        <div class="flex flex-col items-center justify-center w-full max-w-2xl">
            <img src="/placeholder.webp" alt="{{ $book->title }}" class="w-full h-40 cursor-pointer object-cover">
            <h2 class="text-left w-full">
                > {{ $book->title }}
            </h2>
        </div>
        <div class="flex flex-col items-center justify-center w-full max-w-2xl">
            <p class="text-left w-full">
                {{ $book->description }}
            </p>
        </div>
    </div>
    <div class="h-full w-full flex flex-row p-2">
        <div class="flex flex-col w-full h-full">
            <div>
                //__Informations
            </div>
            <div class="flex-1">
                <ul>
                    @if($book->subtitle)
                        <li>Subtitle: {{ $book->subtitle }}</li>
                    @endif
                    <li>Publisher: {{ $book->publisher }}</li>
                    <li>Published: {{ $book->published }}</li>
                    <li>Pages: {{ $book->pages }}</li>
                </ul>
            </div>
        </div>
        <div class="flex-1 flex flex-col items-center justify-end w-full">
            <div>
                <div>
                    //__Author
                </div>
                <div class="relative flex flex-col items-center justify-center w-full">
                    <div class="text-left w-full absolute bottom-0 left-0">
                        {{ $book->author }}
                    </div>
                    <img src="/placeholder.webp" alt="{{ $book->author }}" class="w-full h-40 cursor-pointer object-cover">
                </div>
            </div>
        </div>
    </div>
@endsection
