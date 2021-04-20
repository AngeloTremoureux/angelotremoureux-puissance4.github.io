/**
 * Fonction qui retourne la taille d'une liste
 * @param {Array} liste - Liste a vérifier
 * @returns int - Taille de la liste
 */

function GetTailleListe(liste) {
    return liste.length;
}
/**
 * Fonction qui retourne une liste vide
 * @returns Array - Liste vide
 */
function GetListeVide() {
    return [];
}
/**
 * Fonction qui vérifie si la taille de la liste > 4
 * @param {Array} listeJetonAllignes - Liste à vérifier
 * @returns 
 */
function APlusDe4PionsAlignes(listeJetonAllignes) {
    return GetTailleListe(listeJetonAllignes) >= 4;
}
/**
 * Fonction qui vérifie si le pion est à gauche
 * du dernier pion d'une liste
 * @param {Array} listeJetonAllignes - Liste de pions
 * @param {Array} pion - Pion à vérifier
 * @returns Boolean - Vrai s'il est à gauche, Faux s'il ne l'est pas
 */
function LePionEstIlAGaucheDuDernierPion(listeJetonAllignes, pion) {
    if (RecupDernierJeton(listeJetonAllignes)[1] != null) {
        // La liste contient plusieurs sous-listes
        return RecupDernierJeton(listeJetonAllignes)[1] + 1 == pion[1]
    }
    else {
        // La liste contient uniquement 1 sous-liste
        return listeJetonAllignes[1] + 1 == pion[1]
    }
}
/**
 * Fonction qui vérifie si le pion est en dessous
 * du dernier pion d'une liste
 * @param {Array} listeJetonAllignes - Liste de pions
 * @param {Array} pion - Pion à vérifier
 * @returns Boolean - Vrai s'il est en dessous, Faux s'il ne l'est pas
 */
function LePionEstIlEnBasDuDernierPion(listeJetonAllignes, pion) {
    if (RecupDernierJeton(listeJetonAllignes)[0] != null) {
        // La liste contient plusieurs sous-listes
        return RecupDernierJeton(listeJetonAllignes)[0] + 1 == pion[0]
    }
    else {
        // La liste contient uniquement 1 sous-liste
        return listeJetonAllignes[0] + 1 == pion[0]
    }
}
/**
 * Fonction qui récupère le dernier pion
 * d'une liste de pions
 * @param {Array} listeJetonAllignes - Liste
 * @returns Boolean
 */
function RecupDernierJeton(listeJetonAllignes) {
    return listeJetonAllignes[listeJetonAllignes.length-1];
}
/**
 * Fonction qui vérifie si le dernier pion d'une liste
 * est sur la même colonne (Y) qu'un pion donné
 * @param {Array} listeJetonAllignes 
 * @param {Array} pion 
 * @returns Boolean
 */
function EstSurLaMemeColonne(listeJetonAllignes, pion) {
    // Si la liste est une liste a 1 dimension
    if (RecupDernierJeton(listeJetonAllignes)[0] != undefined) {
        return RecupDernierJeton(listeJetonAllignes)[0] == pion[0]
    }
    else {
        return listeJetonAllignes[0] == pion[0]
    }
}
/**
 * Fonction qui vérifie si le dernier pion d'une liste
 * est sur la même ligne (X) qu'un pion donné
 * @param {Array} listeJetonAllignes 
 * @param {Array} pion 
 * @returns Boolean
 */
function EstSurLaMemeLigne(listeJetonAllignes, pion) {
    // Si la liste est une liste a 1 dimension
    if (RecupDernierJeton(listeJetonAllignes)[1] != undefined) {
        return RecupDernierJeton(listeJetonAllignes)[1] == pion[1]
    }
    else {
        return listeJetonAllignes[1] == pion[1]
    }
}
function EstVide(liste){
    return GetTailleListe(liste) == 0;
}
/**
 * Fonction qui compare la 2ème valeur d'une liste
 * avec 2 dimensions (utilisé dans une fonction de tri : sort)
 * @param {BigInteger} a 
 * @param {BigInteger} b 
 * @returns {Boolean}
 */
function CompareSecondeColonne(a, b) {
    if (a[1] === b[1]) {
        return 0;
    }
    else {
        return (a[1] < b[1]) ? -1 : 1;
    }
}
/**
 * Fonction qui vérifie si une liste contient
 * une autre liste
 * @param {Array} arr Liste principale : contenant
 * @param {Array} subarr Liste qui est contenue
 * @returns {Boolean}
 */
function ListeContientElleListe(arr, subarr){
    for(var i = 0; i<arr.length; i++){
        let checker = false
        for(var j = 0; j<arr[i].length; j++){
            if(arr[i][j] === subarr[j]){
                checker = true
            } else {
                checker = false
                break;
            }
        }
        if (checker){
            return true
        }
    }
    return false
}
/**
 * Fonction qui vérifie s'il y a un gagnant
 * au Puissance 4 en vérifiant seulement horizontalement
 * (Nombre de pions >= 4 sur la même colonne)
 * @param {BigInteger} Px - Largeur du tableau
 * @param {BigInteger} Py - Hauteur du tableau
 * @param {BigInteger} Color - Couleur de l'équipe
 * @returns {Boolean} - Vrai si l'équipe est gagnante - Faux si elle ne l'est pas.
 */

function isWinner_horizontal(Px, Py, Color) {
    let couleur;
    let retour = false;
    const maListeDePions = jeton.get(Color);

    let listeJetonAllignes = GetListeVide();

    maListeDePions.forEach(unPion => {
        // Si la liste est vide, on entre le jeton
        if (EstVide(listeJetonAllignes)) {
            listeJetonAllignes.push(unPion);
        }
        else {
            // Si la liste n'est pas vide, et que le jeton est sur la meme colonne
            // que le jeton précedent
            if (EstSurLaMemeColonne(listeJetonAllignes, unPion)) {
                // Si le pion est a gauche du dernier pion, alors on l'ajoute a la liste
                if (LePionEstIlAGaucheDuDernierPion(listeJetonAllignes, unPion)) {
                    listeJetonAllignes.push(unPion);
                    if (APlusDe4PionsAlignes(listeJetonAllignes)) {
                        // On ne peux pas faire de return car nous sommes dans une
                        // fonction foreach qui ne retourne rien, alors on
                        // attribut la valeur de retour à la variable retour
                        retour = listeJetonAllignes;
                    }
                }
                else {
                    listeJetonAllignes = GetListeVide();
                    listeJetonAllignes = unPion;
                }
            }
            // Si le pion est sur une colonne différente (Y différent), alors on
            // réinitialise la liste et on insère un nouveau pion
            else {
                listeJetonAllignes = GetListeVide();
                // Ne pas oublier d'inséré le pion en tant que liste "[ ]"
                // Sinon la liste deviendra une liste a 1 dimension
                listeJetonAllignes = [unPion];
            }
        }
    });
    if (retour) {
        return retour;
    }
    else {
        return false;
    }
}
/**
 * Fonction qui vérifie s'il y a un gagnant
 * au Puissance 4 en vérifiant seulement verticalement
 * (Nombre de pions >= 4 sur la même ligne)
 * @param {BigInteger} Px - Largeur du tableau
 * @param {BigInteger} Py - Hauteur du tableau
 * @param {BigInteger} Color - Couleur de l'équipe
 * @returns {Boolean} - Vrai si l'équipe est gagnante - Faux si elle ne l'est pas.
 */
function isWinner_vertical(Px, Py, Color) {
    let couleur;
    let retour = false;
    const maListeDePions = jeton.get(Color);
    // Tri la liste en fonction de leur X
    maListeDePions.sort(CompareSecondeColonne);

    let listeJetonAllignes = GetListeVide();
    console.log("iswinner vertical : " + Color + " : " + maListeDePions);
    maListeDePions.forEach(unPion => {
        // Si la liste est vide, on entre le jeton
        if (EstVide(listeJetonAllignes)) {
            listeJetonAllignes.push(unPion);
        }
        else {
            // Si la liste n'est pas vide, et que le jeton est sur la meme ligne
            // que le jeton précedent
            if (EstSurLaMemeLigne(listeJetonAllignes, unPion)) {
                // Si le pion est en dessous du dernier pion, alors on l'ajoute a la liste
                if (LePionEstIlEnBasDuDernierPion(listeJetonAllignes, unPion)) {
                    listeJetonAllignes.push(unPion);
                    console.log("XPUSH " + Color + " : " + unPion + " [Liste: " + listeJetonAllignes)
                    if (APlusDe4PionsAlignes(listeJetonAllignes)) {
                        // On ne peux pas faire de return car nous sommes dans une
                        // fonction foreach qui ne retourne rien, alors on
                        // attribut la valeur de retour à la variable retour
                        retour = listeJetonAllignes;
                    }
                }
                else {
                    listeJetonAllignes = GetListeVide();
                    listeJetonAllignes = [unPion];
                    console.log("NO PUSH FOR " + Color + " : " + unPion)
                }
            }
            // Si le pion est sur une ligne différente (X différent), alors on
            // réinitialise la liste et on insère un nouveau pion
            else {
                listeJetonAllignes = GetListeVide();
                listeJetonAllignes = [unPion];
            }
        }
    });
    if (retour) {
        return retour;
    }
    else {
        return false;
    }
}
/**
 * Fonction qui vérifie s'il y a un gagnant
 * au Puissance 4 en vérifiant seulement en diagonale
 * en commencant par la case en haut a gauche
 * (Nombre de pions >= 4 sur la même diagonale croissante)
 * @param {BigInteger} Px - Largeur du tableau
 * @param {BigInteger} Py - Hauteur du tableau
 * @param {BigInteger} Color - Couleur de l'équipe
 * @returns {Boolean} - Vrai si l'équipe est gagnante - Faux si elle ne l'est pas.
 */
function isWinner_diagonalTopLeft(Px, Py, Color) {
    // On souhaite manipuler les pions, on clone alors la liste
    // pour éviter de modifier les valeurs de celle-ci
    // (Les paramètres sont passés par références)
    let maListeDePionsVariable = JSON.parse(JSON.stringify(jeton.get(Color)));
    let localisationYDeLaPiecePiece = 4, nombreDePieceAVerifier = 4;
    let localisationXDeLaPiece = 1;
    let unPion;
    let retour = false;
    let listeJetonAllignes = [];
    // Nombre de boucles à faire :
    // Hauteur du tableau - 3
    // On ne compte pas les 3 premiers et 3 derniers car au minimum
    // ils ne peuvent pas contenir 4 jetons et donc être gagnants
    const nombreDeBoucleAFaireVerticale = Py - 3;
    // Il faut enlever 1 de plus car la ligne diagonale du milieu
    // (où Y = 1) est prise en compte par la boucle verticale.
    const nombreDeBoucleAFaireHorizontale = Px - 4;
    let i = 0;
    while(i < nombreDeBoucleAFaireVerticale && nombreDePieceAVerifier >= 4 && !retour) {
        // Cas où nous sommes en train de vérifier
        // la partie gauche du tableau
        for (let j = 0; j < nombreDePieceAVerifier; j++) {
            unPion = [localisationYDeLaPiecePiece, localisationXDeLaPiece];
            if (ListeContientElleListe(maListeDePionsVariable, unPion)) {
                listeJetonAllignes.push(unPion);
                if (APlusDe4PionsAlignes(listeJetonAllignes)) {
                    retour = listeJetonAllignes;
                }
            }
            // Le pion n'est pas en diagonale, on vide la liste
            else {
                listeJetonAllignes = GetListeVide();
            }
            localisationYDeLaPiecePiece--;
            localisationXDeLaPiece++;
        }
        // On change de colonne, alors :
        // On change la position X à 1
        localisationXDeLaPiece = 1;
        // On incrémente de 1 le nombre de pièces à vérifier
        nombreDePieceAVerifier++;
        // La localisation Y est égale au nombre de pièces à vérifier
        // Si nous avons 5 pièces à vérifier, c'est que la position Y
        // est égale à 5.
        localisationYDeLaPiecePiece = nombreDePieceAVerifier;
        i++;
    }
    nombreDePieceAVerifier = Px - 2;
    // Localisation X de la pièce qui permettra de vérifier
    // la diagonale en s'éincrémentant a chaque fois
    localisationXDeLaPiece = 2;
    // Localisation X de la pièce qui restera sur la ligne
    // du bas permettant de revenir au début d'une diagonale
    let tempLocalisationBaseXDeLaPiece = 2;
    i = 0;
    // Cas où nous sommes en train de vérifier
    // la partie du basse du tableau
    // Boucle de chaque diagonale
    while (i < nombreDeBoucleAFaireHorizontale && nombreDePieceAVerifier >= 4 && !retour) {
        // La localisation X de la pièce est égale à 2 au départ
        // et s'incrémente à chaque fois
        listeJetonAllignes = GetListeVide();
        // On pars toujours de la pièce qui est sur la ligne du bas
        localisationYDeLaPiecePiece = Py;
        // Pour chaque pièce à vérifier :
        for (let j = 0; j < nombreDePieceAVerifier; j++) {
            unPion = [localisationYDeLaPiecePiece, localisationXDeLaPiece];
            if (ListeContientElleListe(maListeDePionsVariable, unPion)) {
                listeJetonAllignes.push([localisationYDeLaPiecePiece, localisationXDeLaPiece]);
                if (APlusDe4PionsAlignes(listeJetonAllignes)) {
                    retour = listeJetonAllignes;
                }
            }
            else {
                listeJetonAllignes = GetListeVide();
            }
            // On change de pion : on passe sur le pion du dessus
            // Donc on décrémente la localisation Y de la pièce actuelle
            localisationYDeLaPiecePiece--;
            // et on incrémente la localisation X de la pièce actuelle
            localisationXDeLaPiece++;
        }
        // On a finit de vérifier une diagonale
        // on passe a la suivante :
        // On décrémente le nombre de pièces à vérifier de 1
        nombreDePieceAVerifier--;
        // On incrémente la localisation X de la base de 1
        tempLocalisationBaseXDeLaPiece++;
        // On reviens en bas du puissance 4
        localisationXDeLaPiece = tempLocalisationBaseXDeLaPiece;
        // Incrémente le compteur
        i++;
        
    }
    if (retour) {
        return retour;
    }
    else {
        return false;
    }
    
}

function isWinner_diagonalTopRight(Px, Py, Color) {
    let parseVal = 4, returnParseVal = 4;
    let parseCase = Px;
    let parseCase2, returnParseCase = Px - 1;
    let couleur, count;
    let Surbrillance = [];
    const nombreDeBoucle = Px + Py - 7;
    for (let i = 0; i < nombreDeBoucle; i++) {
        count = 0;
        if (parseVal <= Py) {
            // Vérifier la ligne en diagonale
            for (let j = 0; j < returnParseVal; j++) {
                couleur = $('.row[val="' + parseVal + '"] .icon[case="' + parseCase + '"]').attr('team');
                if (couleur == Color) {
                    Surbrillance.push([parseVal, parseCase]);
                    count++;
                    if (count >= 4) {
                        return Surbrillance;
                    }
                } else {
                    count = 0;
                    Surbrillance = [];
                }
                parseVal--;
                parseCase--;
            }
            parseCase = Px;
            returnParseVal++;
            Surbrillance = [];
            parseVal = returnParseVal;
        } else {
            parseCase2 = returnParseCase;
            Surbrillance = [];
            count = 0;
            CombienDeMonter = Px - 1;
            parseVal = Py;
            if (CombienDeMonter >= 4) {
                // Vérifier la ligne en diagonale
                for (let j = 0; j < CombienDeMonter; j++) {
                    couleur = $('.row[val="' + parseVal + '"] .icon[case="' + parseCase2 + '"]').attr('team');
                    if (couleur == Color) {
                        Surbrillance.push([parseVal, parseCase2]);
                        count++;
                        if (count >= 4) {
                            return Surbrillance;
                        }
                    } else {
                        count = 0;
                        Surbrillance = [];
                    }
                    parseVal--;
                    parseCase2--;
                }
                Surbrillance = [];
                CombienDeMonter--;
                returnParseCase--;
                count = 0;
            }
            parseVal = Py;
            returnParseVal++;
            parseVal = returnParseVal;
        }
    }
    return false;
}