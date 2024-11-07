import { popup } from './functionalities.js';

const form = document.getElementById('form-list');
const fillFormButton = document.getElementById('fill-form');

function handlePostBook(e) {
    e.preventDefault();
    const formData = {}
    for (const key of form.querySelectorAll('input, textarea')) {
        formData[key.name] = key.value;
    }
    const api='http://api.library-laravel.test'
    fetch(`${api}/v1/books`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(formData),
    })
        .then((response) => response.json())
        .then((data) => {
            popup(data.error ? 'error' : 'success', data.message);
        });
}

function randomString(fixedLength, hasSpaces) {
    const length = fixedLength ? fixedLength : Math.max(Math.floor(Math.random() * 10), 4);
    let result = '';
    let characters = 'abcdefghijklmnopqrstuvwxyz';
    if (hasSpaces) { characters += ' '; }
    const charactersLength = characters.length;
    for ( let i = 0; i < length; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
}

function randomNumber(length) {
    return Array.from({length: length}, () => Math.floor(Math.random() * 10)).join('');
}

function fillForm() {
    const isbn = randomNumber(13);
    const title = randomString();
    const subtitle = randomString();
    const author = `${randomString()} ${randomString()}`;
    const publisher = randomString();
    const published = randomString();
    const pages = randomString();
    const description = randomString(200, true);
    const image = randomString();
    const price = randomString();
    const year = randomNumber(4);
    document.getElementById('isbn').value = isbn;
    document.getElementById('title').value = title;
    document.getElementById('subtitle').value = subtitle;
    document.getElementById('author').value = author;
    document.getElementById('publisher').value = publisher;
    document.getElementById('published').value = published;
    document.getElementById('pages').value = pages;
    document.getElementById('description').value = description;
    document.getElementById('image').value = image;
    document.getElementById('price').value = price;
    document.getElementById('year').value = year;
}

form.addEventListener('submit', handlePostBook);
fillFormButton.addEventListener('click', fillForm);
