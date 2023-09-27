const showProfil = document.querySelector("#profil-list")
const todoList = document.querySelector(".todo-list")
const profilSide = document.querySelector(".profil-side")
const styleProfil = window.getComputedStyle(profilSide);
let block_none = Boolean
todoList.addEventListener("click", function(event) {
    let screenSize = window.innerWidth

    if (event.target.id === 'list-open') {
        todoList.style.filter = "brightness(0.5)"
        profilSide.style.display = "block"
        profilSide.animate([
            { transform: 'translateX(-220px)' },
            { transform: 'translateX(0px)' }
          ], {
            duration: 250,
          });
    } else if ((screenSize < 700) && (styleProfil.display === "block")){
        todoList.style.filter = "brightness(1)"
        profilSide.animate([
            { transform: 'translateX(0px)' },
            { transform: 'translateX(-220px)' }
          ], {
            duration: 250,
          });
        setTimeout(function() {
            profilSide.style.display = "none";
          }, 220);
    } else {
        
    }
});


window.addEventListener("resize", () => {
    let screenSize = window.innerWidth

    if (screenSize > 700) {
        todoList.style.filter = "brightness(1)"
        profilSide.style.display = "block"
    } else if  (screenSize < 700 && styleProfil.display === "block"){
        profilSide.style.display = "none"
    } else {
        todoList.style.filter = "brightness(1)"
    }
});