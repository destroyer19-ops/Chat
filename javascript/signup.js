const form  = document.querySelector(".signup form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-txt");


form.onsubmit = (e) =>{
    e.preventDefault();
}
continueBtn.onclick = () =>{
    // Ajax
    let xhr = new XMLHttpRequest(); //creatin an xml object
    xhr.open("POST", "php/signup.php", true);
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                console.log(data);
                
                if(data == "Registration successful!"){
                    location.href = "users.php";
                }else{
                    errorText.textContent = data;
                    errorText.classList.remove("d-none");
                    errorText.classList.add("d-block");
                }
            }
        }
    }
    //send form data through ajax to php
    let formData = new FormData(form); //form data object

    xhr.send(formData); //send form data to php
}
