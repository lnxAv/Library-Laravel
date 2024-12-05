<div class='border border-primary'>
    <div class='flex flex-row item-center border-b border-primary p-2 gap-2'>
        <div class='flex flex-col flex-1'>
            <p>> {{ $message->name }}</p>
            <p class='opacity-50'>::{{$message->email}}::{{$message->createdAt}}</p>
        </div>
        <div>

            <form method="post" action="{{ route('delete-message', ['id' => $message->id]) }}" class="flex flex-row items-center gap-2">
                @csrf
                {{ method_field('DELETE') }}
                <button type="submit">x</button>
            </form>
        </div>
    </div>
    <div class='p-2'>
        <div class='truncate w-full'>
            {{$message->subject}}
        </div>
        <div>
            {{$message->message}}
        </div>
    </div>
</div>
