
@extends('layouts.app')

@section('content')
    <div class="w-2/3 m-auto flex flex-col items-center justify-center p-2">
        <div id='messages-list' class="w-full grid grid-cols-[repeat(auto-fit,minmax(200px,1fr))] grid-auto-rows-min gap-4">
        </div>
    </div>
@endsection
