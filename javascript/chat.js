const form = document.querySelector(".typing-area"),
    inputField = form.querySelector(".input-field"),
    sentBtn = form.querySelector("button"),
    chatBox = document.querySelector(".chat-box");


form.onsubmit = (e) => {
    e.preventDefault();
}
sentBtn.onclick = () => {
    let xhr = new XMLHttpRequest(); //creatin an xml object
    xhr.open("POST", "php/insert-chat.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {

                inputField.value = "";

            }
        }
    }
    //send form data through ajax to php
    let formData = new FormData(form); //form data object

    xhr.send(formData); //send form data to php
}

setInterval(() => {
    let xhr = new XMLHttpRequest(); //creatin an xml object
    xhr.open("POST", "php/get-chat.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                chatBox.innerHTML = data;

            }
        }
    } 
    let formData = new FormData(form); //form data object

    xhr.send(formData); //send form data to php
}, 500);
