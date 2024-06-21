// gestion de l'affichage ou masquage des mdp + controle des conditions demandé pour les mot de passes

// récupération des élément et zone d'affichage
let oeilCrea = document.getElementById("oeil-crea");
let mdpCrea = document.getElementById("mdpCrea");
let oeilVerif = document.getElementById("oeil-verif");
let mdpVerif = document.getElementById("mdpVerif");
let mdpTot = document.getElementById("mdpTot")
let mdpMaj = document.getElementById("mdpMaj")
let mdpNbr = document.getElementById("mdpNbr")
let mdpSpe = document.getElementById("mdpSpe")

// gestion affichage/masquage
oeilCrea.addEventListener("click", (e) => {
    if(mdpCrea.type == "password"){
        mdpCrea.type = "text";
        oeilCrea.innerHTML = `<img src="assets/oeil_ouvert_blanc.svg" alt="image d'un oeil">`;
    }
    else{
        mdpCrea.type = "password";
        oeilCrea.innerHTML = `<img src="assets/oeil_ferme_blanc.svg" alt="image d'un oeil"></img>`;  
    } 
})
oeilVerif.addEventListener("click", (e) => {
    if(mdpVerif.type == "password"){
        mdpVerif.type = "text";
        oeilVerif.innerHTML = `<img src="assets/oeil_ouvert_blanc.svg" alt="image d'un oeil">`;
    }
    else{
        mdpVerif.type = "password";
        oeilVerif.innerHTML = `<img src="assets/oeil_ferme_blanc.svg" alt="image d'un oeil"></img>`;  
    } 
})

verifSaisie();
// surveillance du contenu du mdp
mdpCrea.addEventListener("input", (e) => {
     verifSaisie();
})


// fonction indépendante de surveillance du nombre total de caractère, et de la présence d'un chiffre, d'une lettre maj et d'un caractère spécial
// rend l'instruction vert ou rouge selon qu'elle soit respecté ou non
function verifTotal(){
    // Minimum de 8 caractère
    if(mdpCrea.value.length >= 8){
        mdpTot.classList.remove("rouge");
        mdpTot.classList.add("vert");
    }else{
        mdpTot.classList.remove("vert");
        mdpTot.classList.add("rouge");
    }
}
function verifMajuscule(){
    // mini 1 lettre MAJ
    let regMaj = /[A-Z]/;
    if(regMaj.test(mdpCrea.value)){
        mdpMaj.classList.remove("rouge");
        mdpMaj.classList.add("vert");
    }else{
        mdpMaj.classList.remove("vert");
        mdpMaj.classList.add("rouge");
    }
}
function verifChiffre(){
    // mini 1 chiffre
    let regNbr = /\d/;
    if(regNbr.test(mdpCrea.value)){
        mdpNbr.classList.remove("rouge");
        mdpNbr.classList.add("vert");
    }else{
        mdpNbr.classList.remove("vert");
        mdpNbr.classList.add("rouge");
    }
}
function verifSpecial(){
    // mini 1 caractère special
    let regSpe = /[\W_]/;
    if(regSpe.test(mdpCrea.value)){
        mdpSpe.classList.remove("rouge");
        mdpSpe.classList.add("vert");
    }else{
        mdpSpe.classList.remove("vert");
        mdpSpe.classList.add("rouge");
    }
}

function verifSaisie(){
    // lance toute les vérification de saisie du mdp
    verifTotal();
    verifMajuscule();
    verifChiffre();
    verifSpecial();
}


// génération d'un mdp à la dde
let generateur = document.getElementById("generateur");
let affichageMdp = document.getElementById("affichage-mdp");

// surveille le click sur le bouton de generation
generateur.addEventListener("click", (e) => {
    // lance la génération du pwd puisutilise le retour pour afficher le mdp dans la zone d'affichage
    genPwd();
})

function genPwd(){
    // fonction ajax : lance le controleur ajax de génération de mdp et l'affiche
    // parametre : aucun
    // retour : un fichier json {"mdp" => mdp}

    fetch("generer_mdp.php")
    .then(resp =>{
        return resp.json();
    })
    .then(retour => {
        afficheMdp(retour.mdpGen);
    })
}

function afficheMdp(mdp){
    // role : affiche le mot de passe dans sa zone d'affichage
    // parametre : le mot de passe a afficher
    // retour : aucun

    affichageMdp.innerText = mdp;
}