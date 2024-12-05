<a class="flex flex-col justify-center p-2 hover:bg-primary hover:text-secondary hover:fill-secondary cursor-pointer" href="{{route('display-book', ['id' => $book['id']])}}">
    <div>
        <img class="w-full h-64 object-cover bg-offset" src="{{
            $book['image'] ?? '/placeholder.webp'
        }}" alt="{{ $book['title'] }}">
    </div>
    <div>
        <h1 class="text-xl font-bold truncate">
            {{'>' . $book['title'] }}
        </h1>
    </div>
</a>
