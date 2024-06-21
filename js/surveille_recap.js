// gestion fermeture des popup

// gestion de la fermeture de la div lessOpt
let lessOpt = document.getElementById("lessOpt");
let fermLessOpts = document.querySelectorAll(".fermLessOpt");
fermLessOpts.forEach(fermLessOpt => {
    fermLessOpt.addEventListener("click", (e) => {
        lessOpt.classList.add("d-none");
    })
})

// gestion de la fermeture de la div error
let error = document.getElementById("error");
let fermErrors = document.querySelectorAll(".fermError");
fermErrors.forEach(fermError => {
    fermError.addEventListener("click", (e) => {
        console.log("ferme");
        error.classList.add("d-none");
    })
})

// Gestion de l'affichage du recap des options de l apizza

// implémentation de la fonction
function afficheRecap(){
    // lance le controleur ajax d'affichage des options selectionné
    // parametre : aucun
    // retour, l'html à afficher

    fetch("afficher_recap.php")
    .then(resp =>{
        return resp.text();
    })
    .then(retour => {
        recap.innerHTML = retour;
    })
}

// récupération de la zone d'affichage du recap
let recap = document.getElementById("recap");

// lancement de la fonction au chargement de la page
afficheRecap();
setInterval(afficheRecap, 100);


// Gestion de l'ajout/suppression d'une option dans la base de donné

// implémentation de la fonction 
function ajoutOption(option, categorie, idOption){
    // role : lance le controleur ajax d'ajout d'une option en lui applicant les parametres
    // parametres : option - l'option concerné
    //              categorie - categorie de l'option selectionné
    //              idOption - id de l'option selectionné
    // retour : aucun

    option.classList.add("opt-select");
    fetch(`surveiller_action.php?action=ajout&categorie=${categorie}&idOption=${idOption}`)
}
function supOption(option, categorie, idOption){
    // role : lance le controleur ajax de suppression d'une option en lui applicant les parametres
    // parametres : option - l'option concerné
    //              categorie - categorie de l'option selectionné
    //              idOption - id de l'option selectionné
    // retour : aucun

    option.classList.remove("opt-select");
    fetch(`surveiller_action.php?action=suppression&categorie=${categorie}&idOption=${idOption}`)
}

function removeUnselects(){
    // role : enleve les classe opt-unselect sur les element qui l'ont
    // parametre : aucun
    // retour : aucun

    let unselects = document.querySelectorAll(".opt-unselect");
    unselects.forEach(unselect =>{
        unselect.classList.remove("opt-unselect");
    })
}

async function ingredientSelect(){
    // role : récupère le nombre d'ingrédient selectionné (nbre de composition)
    // porametre : aucun
    // retour : un fichier json du type {nombre => valeur}

    return fetch("calculer_nombre_ingredient.php")
    .then(resp => {
        return resp.json();
    })
    .then(retour => {
        return retour;
    })
}

function recupIngredientMaxi(idOption){
    // role : retourne le nbre d'ingrédient maxi d'une pizza 
    // parametre : idOption - id de l'option selectionné
    // retour : maxi - le nbre d'ingredient maxi selectionnable

    if(idOption == 1) return 5;
    else if(idOption == 2) return 7;
    else if(idOption == 3) return 9;
}

function recupTaille(idOption){
    // role : retourne le nbre d'ingrédient maxi d'une pizza 
    // parametre : idOption - id de l'option selectionné
    // retour : maxi - le nbre d'ingredient maxi selectionnable

    if(idOption == 1) return "petite";
    else if(idOption == 2) return "moyenne";
    else if(idOption == 3) return "grande";
}

function afficheMsgRetrait(idOption, nbr){
    // role : affiche la div annoncant qu'il y a trop d'ingrédient pour la pizza
    // parametre : aucun
    // retour : aucun

    // récupération de la zone d'affichage du message
    let msgRetrait = document.getElementById("msgRetrait");
    let msgTaille = document.getElementById("msgTaille");
    // retrait de la classe d-none de ladiv contenant l'affichage
    lessOpt.classList.remove("d-none");
    // modification du texte d'affichage
    let taille = recupTaille(idOption);
    msgTaille.innerText = `Attention, il y a trop d'ingrédient pour une ${taille} pizza`;
    msgRetrait.innerText = `Veuillez en retirer au moins ${nbr}`;
}

async function handleClick(option, categorie, idOption){
    // role : gère les actions suite à un click
    // parametre : option - l'option concerné
    //             categorie - la categorie de l'option
    //             idOption - l'id de l'option
    // retour : aucun

    // si ingredient
    if(categorie == "ingredient"){
        // si l'option est select
        if(option.classList.contains("opt-select")){
            // récupère le nombre d'ingrédient selectionné
            let ingredients = await ingredientSelect();
            // j'enleve la classe select et supOpption
            supOption(option, categorie, idOption);
            // si nbrSelect = 9
            if(ingredients.nombre == ingredients.maxi){
                // j'enleve classe select sur toutes les option qui ont la class unselect
                removeUnselects();
            }else if(ingredients.nombre > ingredients.maxi){
                option.classList.add("opt-unselect");
            }
        }else if(!option.classList.contains("opt-select") && !option.classList.contains("opt-unselect")){
        // si l'option n'est pas select, et n'est pas unselect 
            // récupère le nombre d'ingrédient selectionné  
            let ingredients = await ingredientSelect();    
            // si nbreSelect = 8
            if(ingredients.nombre == (ingredients.maxi-1)){
                // je grise tout les ingredient qui ne sont pas select
                options.forEach(option =>{
                    let categorie = option.dataset.categorie;
                    if(!option.classList.contains("opt-select") && categorie == "ingredient"){
                        option.classList.add("opt-unselect")
                    }
                })
                // j'enleve la classe unselect que l'on vient d'appliquer
                option.classList.remove("opt-unselect");
            }
            // j'ajoute l'option select ajoutOption
            ajoutOption(option, categorie, idOption);
        }
    }else{
    // sinon
        // si l'option est select
        if(option.classList.contains("opt-select")){
            // j'enleve la classe select et supOption
            supOption(option, categorie, idOption);
        }else{
        // si l'option n'est pas select
            // je supprime la classe select si une option est coché dans la catégorie
            options.forEach(option => {
                if(option.dataset.categorie === categorie && option.classList.contains("opt-select")){
                    option.classList.remove("opt-select");
                }
            })
            // j'ajoute la classe select et ajoutOption
            ajoutOption(option, categorie, idOption);
            // si la categorie est taille
            if(categorie == "taille"){
                // on récupère le nombre d'ingrédient selectionné
                let ingredients = await ingredientSelect();
                // on récupère le nombre d'ingrédient maximum pour la taille
                let maxi = recupIngredientMaxi(idOption);
                // si le nombre maxi est inférieur au nombre select
                if(ingredients.nombre < maxi){
                    // on efface les opt-unselect
                    options.forEach(option =>{
                        let categorie = option.dataset.categorie;
                        if(!option.classList.contains("opt-select") && categorie == "ingredient"){
                            option.classList.remove("opt-unselect")
                        }
                    })
                }else if(ingredients.nombre > maxi){
                // sinon, si nbr select > à nbre maxi
                    // on affiche un pop up pour dire qu'il faut sélectionner x ingredient (la difference entre maxi et nbre select)
                    afficheMsgRetrait(idOption, ingredients.nombre - maxi);
                }
            }
        }
    }
}

// récupération des élément à surveiller
let options = document.querySelectorAll(".option");

// lance l'action par option
options.forEach(option => {
    // on récupère data-catégorie
    let categorie = option.dataset.categorie;
    let idOption = option.dataset.ref;
    // je surveille le clic
    option.addEventListener("click", (e) =>{
        handleClick(option, categorie, idOption);
    });
})


// affichage du prix de la pizza en direct
// récupération de la zone d'affichage
let prixDirect = document.getElementById("prixDirect");
// fonction ajax de récupération du prix
function affichePrix(){
    // role : récupère le prix de la pizza via controleur ajac
    // parametre : aucun 
    // retour : aucun
    fetch("calculer_prix.php")
    .then(resp => {
        console.log(resp)
        return resp.json();
    })
    .then(retour => {
        prixDirect.innerHTML = `<b>Prix : ${retour.prix} €</b>`;
    })
}
// affichage du prix au lancement de la page
affichePrix();
// lancement récurent de la pizza
setInterval(affichePrix, 100);