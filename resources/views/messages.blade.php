
@extends('layouts.app')

@section('content')
    <div class="w-2/3 m-auto flex flex-col items-center justify-center p-2">
        <div class='w-full flex flex-row items-center justify-between p-2'>
            <h3 class="text-center">
                {{ __('messages.title') }}
            </h3>
            <p id='message-count' class="border border-highlight p-2">
                @if(isset($messages) && count($messages) > 0)
                    {{ count($messages) }}
                @else
                    0
                @endif
            </p>
        </div>
        <div id='messages-list' class="w-full flex flex-col gap-4">
            @if(!empty($messages) && count($messages) > 0)
                @foreach($messages as $message)
                    @include('components.message-component', ['message' => $message])
                @endforeach
            @else
                <div class="w-full flex flex-row items-center justify-center p-2 border border-primary">
                    <h3>::No messages::</h3>
                </div>
            @endif
        </div>
    </div>
@endsection
