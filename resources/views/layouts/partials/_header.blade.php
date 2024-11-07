<header class="flex flex-row items-center justify-between p-2">
    <div class='flex flex-row no-wrap justify-between items-center gap-4 p-2'>
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
            {{ '/' . __('messages.nav') }}
        </a>
        <a class="flex-1 text-primary border-b-2 border-primary cursor-pointer hover:text-highlight hover:border-highlight"
            href="{{ route('new') }}"
        >
            {{ '/' . __('new.nav') }}
        </a>
    </div>
    <div>
        <a href="{{ route('local.settings', App::currentLocale() == 'fr' ? 'en' : 'fr') }}" class="border border-primary p-2 hover:bg-primary hover:text-secondary hover:fill-secondary">
            {{ App::currentLocale()}}
        </a>
    </div>
</header>
