
// afficher seulement les premiers caractères du contenu des billets

const backTextes = document.querySelectorAll(".b-contenu");
const frontTextes = document.querySelectorAll(".bill-contenu");

backTextes.forEach(t=>Coupe(t,80));
frontTextes.forEach(b=>Coupe(b,200));

function Coupe(n, c){
    n.innerHTML=n.innerHTML=`${n.innerHTML.substring(0,c)}...`
};

if(document.contains(document.getElementById("ajoutbtn"))){
    const ajoutbtn = document.getElementById("ajoutbtn");
    const fermebtn = document.getElementById("fermebtn");
    const aj = document.querySelector(".aj-cont");
    ajoutbtn.addEventListener("click", ()=>{
        aj.classList.remove("invisible");
    });
    fermebtn.addEventListener("click", ()=>{
        aj.classList.add("invisible");
    })
}

