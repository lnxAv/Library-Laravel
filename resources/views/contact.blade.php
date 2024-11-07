@extends('layouts.app')

@section('content')
    <div class="w-2/3 m-auto flex flex-col items-center justify-center p-2">
        <div class="w-full flex flex-row items-center justify-between p-2">
            <h3 class="text-left"> Contact Form </h3>
        </div>
        <div id='form-list' class="w-full grid grid-cols-[repeat(auto-fit,minmax(200px,1fr))] grid-auto-rows-min gap-4">
            <form method="POST" class="flex flex-col gap-2">
                <input id="name" type="text" name="name" placeholder="Name">
                <input id="email" type="email" name="email" placeholder="Email">
                <textarea id="message" name="message" placeholder="Message"></textarea>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection
