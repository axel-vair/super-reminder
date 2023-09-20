let formPopup = document.querySelector(".main-form")
let SignupBTN = document.querySelector("#sign-up")  
let container = document.querySelector(".container")
let header = document.querySelector(".header")
let Popup = false;

SignupBTN.addEventListener("click", displayForm)

function displayForm() {
    formPopup.style.display = "block"
    container.style.filter = "blur(3px)"
    Popup = true
}