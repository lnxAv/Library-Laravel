@extends('layouts.app')

@section('content')
    <div class="flex flex-col items-center justify-center">
        <form id='search-results' class="flex flex-no-wrap flex-row items-center gap-4" action="handleBookFetch" method="GET">
            <div class="flex flex-row items-center gap-2">
                <input form='search-result' id="search-input" type="text" name="r" placeholder="{{ __('home.search-placeholder') }}">
                <svg width="19" height="19" viewBox="0 0 19 19" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.5 18.5H16.5V17.5H15.5V16.5H14.5V15.5H13.5V14.5H12.5V13.5H11.5V12.5H9.5V13.5H4.5V12.5H2.5V11.5H1.5V9.5H0.5V4.5H1.5V2.5H2.5V1.5H4.5V0.5H9.5V1.5H11.5V2.5H12.5V4.5H13.5V9.5H12.5V11.5H13.5V12.5H14.5V13.5H15.5V14.5H16.5V15.5H17.5V16.5H18.5V17.5H17.5M9.5 11.5V10.5H10.5V9.5H11.5V4.5H10.5V3.5H9.5V2.5H4.5V3.5H3.5V4.5H2.5V9.5H3.5V10.5H4.5V11.5H9.5Z"/>
                </svg>
            </div>
            <div class="flex flex-row items-center gap-2">
                <input form='search-result' id="search-year" type="number" name="y" placeholder="{{ __('home.year-placeholder') }}">
                <svg width="18" height="21" viewBox="0 0 18 21" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 0.5H14V2.5H18V10.5H16V8.5H2V18.5H8V20.5H0V2.5H4V0.5H6V2.5H12V0.5ZM6 4.5H2V6.5H16V4.5H6ZM14 10.5V12.5H10V10.5H14ZM10 16.5H8V12.5H10V16.5ZM14 16.5H10V18.5H16V20.5H18V18.5H16V12.5H14V16.5Z"/>
                </svg>
            </div>
            <div>
                <a href="{{ route('form-book') }}" class="flex flex-row items-center gap-2 p-2 border border-primary hover:bg-primary hover:text-secondary hover:fill-secondary">
                    +
                    <svg width="35" height="21" viewBox="0 0 35 21" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3.18182 0.5H15.9091V2.72222H3.18182V16.0556H15.9091V2.72222H19.0909V16.0556H31.8182V2.72222H19.0909V0.5H35V18.2778H19.0909V20.5H15.9091V18.2778H0V0.5H3.18182ZM28.6364 8.27778H22.2727V10.5H28.6364V8.27778ZM22.2727 4.94444H28.6364V7.16667H22.2727V4.94444ZM25.4545 11.6111H22.2727V13.8333H25.4545V11.6111Z"/>
                    </svg>
                </a>
            </div>
        </form>
    </div>

    <div class="w-2/3 m-auto flex flex-col items-center justify-center p-2">
        <div id='books-list' class="relative w-full grid grid-cols-[repeat(auto-fill,minmax(200px,1fr))] grid-auto-rows-min gap-4 ">
        </div>
    </div>
@endsection

@section('scripts')
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/js/home.js'])
    @endif
@endsection
