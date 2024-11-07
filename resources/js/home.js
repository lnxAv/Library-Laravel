//Elements
const searchForm = document.getElementById('search-results');
const booksList = document.getElementById('books-list');
const searchInput = document.getElementById('search-input');
const searchYear = document.getElementById('search-year');
//Functions
function handleBookFetch(e) {
    e.preventDefault();
}

function handleOnChange(e) {
    e.preventDefault();
    const search = searchInput.value;
    const year = searchYear.value;
    fetchBooks(search, year);
}

function fetchBooks(search, year) {
    const api= new URL('http://api.library-laravel.test/v1/books');
    if (search) {
        api.searchParams.append('search', search);
    }
    if (year) {
        api.searchParams.append('year', year);
    }
    fetch(api)
        .then((response) => response.json())
        .then((data) => displayBooks(data));
}

function displayBooks(books) {
    const booksList = document.getElementById('books-list');
    booksList.innerHTML = '';
    Object.entries(books).forEach(([isbn, book]) => {
        const bookCard = document.createElement('a');
        bookCard.classList.add('flex', 'flex-col', 'items-center', 'justify-center', 'p-2', 'hover:bg-primary', 'hover:text-secondary', 'hover:fill-secondary');
        bookCard.href = `/book/${isbn}`;
        bookCard.innerHTML = /*html*/`
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

//Event Listeners
searchForm.addEventListener('submit', handleBookFetch);
searchForm.addEventListener('change', handleOnChange);

// INIT
fetchBooks();
