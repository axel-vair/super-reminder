let formLogin = document.getElementById('form-connection');
let inputEmailLogin = document.getElementById('email-login');
let inputPasswordLogin = document.getElementById('password-login');

async function handleFormSubmit(event) {
    event.preventDefault();
    if (!inputEmailLogin.validity.valid ||
        !inputPasswordLogin.validity.valid) {
        return;
    }
    let form = new FormData(event.currentTarget);
    let url = "login.php";
    let request = new Request(url, {method: 'POST', body: form});
    let response = await fetch(request);
    let responseData = await response.json();
    if (responseData.success === "ok") {
        let error = document.getElementById('error-container-login');
        error.textContent = "Connexion réussie"
    }else{
        let error = document.getElementById('error-container-login');
        error.textContent = "Erreur lors de la connexion"
    }
}

formLogin.addEventListener('submit', (event) => handleFormSubmit(event));
inputEmailLogin.addEventListener('input', (ev) => {
    let element = ev.target;
    if(element.validity.valid){
        emailError = document.getElementById('email-error-login');
        emailError.textContent = ""
    }else if(element.validity.tooShort){
        emailError = document.getElementById('email-error-login');
        emailError.textContent = "Votre email est trop court ! (4 caractères minimum)"
    }else if(element.validity.patternMismatch) {
        emailError = document.getElementById('email-error-login');
        emailError.textContent = "Ce n'est pas un email valide!"
    }
})

inputEmailLogin.addEventListener('blur', (ev) => {
    let element = ev.target;
    if(element.validity.valueMissing){
        emailError = document.getElementById('email-error-login');
        emailError.textContent = "Veuillez renseigner votre email !"
    }
})

inputPasswordLogin.addEventListener('input', (ev) => {
    let element = ev.target;
    if(element.validity.valid){
        passwordError = document.getElementById('password-error-login');
        passwordError.textContent = ""
    }else if(element.validity.tooShort){
        passwordError = document.getElementById('password-error-login');
        passwordError.textContent = "Votre mot de passe est trop court !"
    }
})

inputPasswordLogin.addEventListener('blur', (ev) => {
    let element = ev.target;
    if(element.validity.valueMissing){
        passwordError = document.getElementById('password-error-login');
        passwordError.textContent = "Veuillez entrer un mot de passe !"    }
})