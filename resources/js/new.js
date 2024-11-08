import { popup } from "./functionalities.js";

const booksList = document.getElementById("books-list");

function fetchBooksSorted() {
    const api = "http://api.library-laravel.test";
    fetch(`${api}/v1/books/sort/year`)
        .then((res) => res.json())
        .then((res) => {
            const data = res.data;
            displayBooks(data);
        })
        .catch((error) => {
            popup("error", error);
            displayBooks({});
        });
}

function displayBooks(books) {
    const booksCount = Object.keys(books).length;
    const booksList = document.getElementById("books-list");
    booksList.innerHTML = "";
    if (booksCount === 0) {
        booksList.innerHTML = /*html*/ `
        <div class='absolute w-full flex flex-row items-center justify-center p-2 border border-primary'>
            <h3 class='wtext-center'>::No books::</h3>
        </div>
        `;
        return;
    } else {
        Object.entries(books).forEach(([isbn, book]) => {
            const bookCard = document.createElement("a");
            bookCard.classList.add(
                "flex",
                "flex-col",
                "items-center",
                "justify-center",
                "p-2",
                "hover:bg-primary",
                "hover:text-secondary",
                "hover:fill-secondary"
            );
            bookCard.href = `/book/${isbn}`;
            bookCard.innerHTML = /*html*/ `
            <div class="text-xs text-left w-full opacity-50 px-2">
                <p>::${book.updateDate}</p>
            </div>
            <div class="flex flex-col items-center gap-2">
                <img src="placeholder.webp" alt="${book.title}" class="w-full h-40 cursor-pointer">
                <h2 class="text-left w-full">
                    > ${book.title}
                </h2>
            </div>
        `;
            booksList.appendChild(bookCard);
        });
    }
}

fetchBooksSorted();
