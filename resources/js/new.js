const booksList = document.getElementById('books-list')

function fetchBooksSorted(){
    const api='http://api.library-laravel.test'
    fetch(`${api}/v1/books/sort/year`)
    .then((res) => res.json())
    .then((res)=>{
        const data = res.data
        displayBooks(data)
    })
}

function displayBooks(books) {
    const booksList = document.getElementById('books-list');
    booksList.innerHTML = '';
    Object.entries(books).forEach(([isbn, book]) => {
        const bookCard = document.createElement('a');
        bookCard.classList.add('flex', 'flex-col', 'items-center', 'justify-center', 'p-2', 'hover:bg-primary', 'hover:text-secondary', 'hover:fill-secondary');
        bookCard.href = `/book/${isbn}`;
        bookCard.innerHTML = /*html*/`
            <div class="text-xs text-left w-full opacity-50 px-2">
                <p>u::${book.updateDate}</p>
            </div>
            <div class="flex flex-col items-center gap-2">
                <img src="placeholder.webp" alt="${book.title}" class="w-full h-40 cursor-pointer">
                <h2 class="text-left w-full">
                    > ${book.title}
                </h2>
            </div>
        `
        booksList.appendChild(bookCard);
    });
}

fetchBooksSorted()
