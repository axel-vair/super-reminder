const showProfil = document.querySelector("#list-open")
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
          block_none = true
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
          block_none = false
    } else {
        block_none = false
    }
});

showProfil.addEventListener("click", function() {
  if (block_none) {
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
          block_none = false
  }
})


window.addEventListener("resize", () => {
    let screenSize = window.innerWidth

    if (screenSize > 700) {
        todoList.style.filter = "brightness(1)"
        profilSide.style.display = "block"
        block_none = false
    } else if  (screenSize < 700 && styleProfil.display === "block"){
        profilSide.style.display = "none"
        block_none = false
    } else {
        todoList.style.filter = "brightness(1)"
        block_none = false
    }
});