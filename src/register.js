let formRegister = document.getElementById('form-register');
let inputEmail = document.getElementById('email');
let inputLastname = document.getElementById('lastname');
let inputFirstname = document.getElementById('firstname');
let inputPassword = document.getElementById('password');
async function handleFormSubmit(event) {
    event.preventDefault();
    if(!inputFirstname.validity.valid ||
        !inputLastname.validity.valid ||
        !inputEmail.validity.valid ||
        !inputPassword.validity.valid){
        return;
    }

    let form = new FormData(event.currentTarget);
    let url = "index.php";
    let request = new Request(url, {method: 'POST', body: form});
    let response = await fetch(request);
    let responseData = await response.json();
    if(responseData.success){
        {"L'inscription a réussi !"}
    }
}

formRegister.addEventListener('submit', (event) => handleFormSubmit(event));
inputFirstname.addEventListener('input', (ev) => {
    let element = ev.target;
    if(element.validity.valid){
        firstnameError = document.getElementById('firstname-error');
        firstnameError.textContent = ""
    }else if(element.validity.tooShort){
        firstnameError = document.getElementById('firstname-error');
        firstnameError.textContent = "Votre prénom est trop court !"
    }
})

inputFirstname.addEventListener('blur', (ev) => {
    let element = ev.target;
    if(element.validity.valueMissing){
        firstnameError = document.getElementById('firstname-error');
        firstnameError.textContent = "Veuillez renseigner votre prénom !"
    }
})


inputLastname.addEventListener('input', (ev) => {
    let element = ev.target;
    if(element.validity.valueMissing){
        lastnameError = document.getElementById('lastname-error');
        lastnameError.textContent = "Veuillez renseigner votre nom !"
    }else if(element.validity.tooShort){
        lastnameError = document.getElementById('lastname-error');
        lastnameError.textContent = "Votre nom est trop court !"
    }
})

inputLastname.addEventListener('blur', (ev) => {
    let element = ev.target;
    if(element.validity.valueMissing){
        lastnameError = document.getElementById('lastname-error');
        lastnameError.textContent = "Veuillez renseigner votre nom !"
    }
})

inputEmail.addEventListener('input', (ev) => {
    let element = ev.target;
    if(element.validity.valid){
        emailError = document.getElementById('email-error');
        emailError.textContent = ""
    }else if(element.validity.tooShort){
        emailError = document.getElementById('email-error');
        emailError.textContent = "Votre email est trop court !"
    }else if(element.validity.patternMismatch) {
        emailError = document.getElementById('email-error');
        emailError.textContent = "Ce n'est pas un email valide!"
    }
})

inputEmail.addEventListener('blur', (ev) => {
    let element = ev.target;
    if(element.validity.valueMissing){
        emailError = document.getElementById('email-error');
        emailError.textContent = "Veuillez renseigner votre email !"
    }
})

inputPassword.addEventListener('input', (ev) => {
    let element = ev.target;
    if(element.validity.valid){
        passwordError = document.getElementById('password-error');
        passwordError.textContent = "Veuillez renseigner votre mot de passe !"
    }else if(element.validity.tooShort){
        passwordError = document.getElementById('password-error');
        passwordError.textContent = "Votre mot de passe est trop court !"
    }else if(element.validity.patternMismatch) {
        passwordError = document.getElementById('password-error');
        passwordError.textContent = "Ce n'est pas un mot de passe valide!"
    }
})

inputPassword.addEventListener('blur', (ev) => {
    let element = ev.target;
    if(element.validity.valueMissing){
        passwordError = document.getElementById('password-error');
        passwordError.textContent = "Ce n'est pas un mot de passe valide!"    }
})
