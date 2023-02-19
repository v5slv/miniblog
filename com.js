
// afficher les commentaires sur page billet
const btn = document.getElementById("btncom");
const com = document.querySelector(".com-cont");
btn.addEventListener("click", ()=>{
    com.classList.toggle("invisible");
});

