let formLogin = document.getElementById('form-login');
let inputEmail = document.getElementById('email');
let inputPassword = document.getElementById('password');

async function handleFormSubmit(event) {
    event.preventDefault();
    if (!inputEmail.validity.valid ||
        !inputPassword.validity.valid) {
        return;
    }
    let form = new FormData(event.currentTarget);
    let url = "index.php";
    let request = new Request(url, {method: 'POST', body: form});
    let response = await fetch(request);
    let responseData = await response.json();
    if (responseData.success === 'ok') {
        let error = document.getElementById('error-container');
        error.textContent = "Connexion réussie"
    }
}