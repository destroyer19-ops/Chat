const pswrdField = document.querySelector("form input[type='password']"),
    toggleBtn = document.querySelector("form .fa-eye");

toggleBtn.onclick = () => {
    if (pswrdField.type == 'password') {
        pswrdField.type = 'text';
        toggleBtn.classList.remove("fa-eye")
        toggleBtn.classList.add("fa-eye-slash")
        toggleBtn.classList.add("active")
    } else {
        pswrdField.type = 'password'
        toggleBtn.classList.remove("active")
        toggleBtn.classList.remove("fa-eye-slash")
        toggleBtn.classList.add("fa-eye")


    }
}

