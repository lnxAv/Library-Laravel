import { popup } from './functionalities.js';

const form = document.getElementById('form-list');
// const fillFormButton = document.getElementById('fill-form');

function handlePostMessage(e) {
    e.preventDefault();
    const formData = {}
    for (const key of form.querySelectorAll('input, textarea')) {
        formData[key.name] = key.value;
    }
    const api='http://api.library-laravel.test'
    fetch(`${api}/v1/messages`, {
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

form.addEventListener('submit', handlePostMessage);
//fillFormButton.addEventListener('click', fillForm);
