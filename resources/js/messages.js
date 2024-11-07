import { popup } from './functionalities.js';

const messagesList = document.getElementById('messages-list')
const messageCount = document.getElementById('message-count')

function deleteMessage(id){
    const api='http://api.library-laravel.test'
    fetch(`${api}/v1/messages/${id}`, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
        },
    })
    .then((res) => res.json())
    .then((res)=>{
        popup(res.error ? 'error' : 'success', res.message)
        getAllMessages()
    })

}

function getAllMessages(){
    const api='http://api.library-laravel.test'
    fetch(`${api}/v1/messages`)
    .then((res) => res.json())
    .then((res)=>{
        const data = res.data
        showMessages(data)
    })
}

function showMessages(data){
    const amounts = Object.keys(data).length
    messageCount.innerHTML = `${amounts}`
    messagesList.innerHTML = ''
    if(amounts === 0){
        messagesList.innerHTML = /*html*/`
            <div class='flex flex-col items-center justify-center p-2 border border-primary'>
                <h3>::No messages::</h3>
            </div>
        `
        return
    } else {
        Object.entries(data).forEach(([id, message]) => {
            const div = document.createElement('div')
            const test = ()=>{hello()}
            div.innerHTML = /*html*/`
                <div class='border border-primary'>
                    <div class='flex flex-row item-center border-b border-primary p-2 gap-2'>
                        <div class='flex flex-col flex-1'>
                            <p>> ${message.nom}</p>
                            <p class='opacity-50'>::${message.email}::</p>
                        </div>
                        <div>
                            <button data-message-id='${message.id}'>x</button>
                        </div>
                    </div>
                    <div class='p-2'>
                        <div class='truncate w-full'>
                            ${message.subject}
                        </div>
                        <div>
                            ${message.message}
                        </div>
                    </div>
                </div>
            `
            messagesList.appendChild(div)
        })
        document.querySelectorAll('button').forEach((button) => {
            button.addEventListener('click', (e) => {
                const messageId = e.target.dataset.messageId
                deleteMessage(messageId)
            })
        })
    }
}

getAllMessages()
