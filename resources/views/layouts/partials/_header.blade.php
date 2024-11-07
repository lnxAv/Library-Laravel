<header>
    <div class='flex no-wrap justify-between items-center gap-4 p-2'>
        <a class="flex-1 text-primary border-b-2 border-primary cursor-pointer hover:text-highlight hover:border-highlight"
            href="{{ route('home') }}"
        >
            {{ __('home.nav') }}
        </a>
        <a class="flex-1 text-primary border-b-2 border-primary cursor-pointer hover:text-highlight hover:border-highlight"
            href="{{ route('contact') }}"
        >
            {{ '/' . __('contact.nav') }}
        </a>
        <a class="flex-1 text-primary border-b-2 border-primary cursor-pointer hover:text-highlight hover:border-highlight"
            href="{{ route('message') }}"
        >
            {{ '/' . __('message.nav') }}
        </a>
        <a class="flex-1 text-primary border-b-2 border-primary cursor-pointer hover:text-highlight hover:border-highlight"
            href="{{ route('new') }}"
        >
            {{ '/' . __('new.nav') }}
        </a>
    </div>
</header>
