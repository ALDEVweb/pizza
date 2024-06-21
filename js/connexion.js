// gestion de l'affichage ou masquage du mdp

// récupération des élément et zone d'affichage
let oeilConnect = document.getElementById("oeil-connect");
let mdp = document.getElementById("mdp");

oeilConnect.addEventListener("click", (e) => {
    if(mdp.type == "password"){
        mdp.type = "text";
        oeilConnect.innerHTML = `<img src="assets/oeil_ouvert_blanc.svg" alt="image d'un oeil">`;
    }
    else{
        mdp.type = "password";
        oeilConnect.innerHTML = `<img src="assets/oeil_ferme_blanc.svg" alt="image d'un oeil"></img>`;  
    } 
})


// gestion mdp oublié
// récupé bouton mdp-oubli
let btnMdpOubli = document.getElementById("mdp-oubli");
// récupération de la div à afficher
let popOubli = document.getElementById("pop-oubli");
// surveillance du bouton d'ouverture
btnMdpOubli.addEventListener("click", (e) => {
    // au clic, j'enleve d-none de la pop
    popOubli.classList.remove("d-none");
})