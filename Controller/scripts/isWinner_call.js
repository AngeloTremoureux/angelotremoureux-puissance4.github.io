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
/**
 * Fonction qui vérifie s'il y a un gagnant
 * au Puissance 4 en vérifiant seulement horizontalement
 * (Nombre de pions >= 4 sur la même colonne)
 * @param {BigInteger} Px - Largeur du tableau
 * @param {BigInteger} Py - Hauteur du tableau
 * @param {BigInteger} Color - Couleur de l'équipe
 * @returns Boolean - Vrai si l'équipe est gagnante - Faux si elle ne l'est pas.
 */

function isWinner_horizontal(Px, Py, Color) {
    // Vérification en horizontal
    let couleur;
    let retour = false;
    const maListeDePions = jeton.get(Color);
    maListeDePions.sort();

    let listeJetonAllignes = [];

    maListeDePions.forEach(unPion => {
        // Si la liste est vide, on entre le jeton
        if (GetTailleListe(listeJetonAllignes) == 0) {
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

function isWinner_vertical(Px, Py, Color) {
    // Vérification en verticale
    let couleur;
    let retour = false;
    const maListeDePions = jeton.get(Color);
    // Clonage de la liste de pions pour la manipulation
    let listeVariableDePions =  JSON.parse(JSON.stringify(maListeDePions));

    let listeJetonAllignes = [];

    // Parcours de chaque colonne (x) du tableau
    let i = 0;
    let indexPion = 0;
    while (i < Px && !retour) {
        // Pour chaque colonne, on compte le nombre de pions
        // de la couleur actuel
        listeVariableDePions.forEach(unPion => {
            // Si le pion est sur cette colonne (x) :
            if (unPion[0] == (i+1)) {
                listeJetonAllignes.push(unPion);
                // On supprime de la liste des pions non utilisés le pion actuel
                delete listeVariableDePions[indexPion];
                if (APlusDe4PionsAlignes(listeJetonAllignes)) {
                    // On ne peux pas faire de return car nous sommes dans une
                    // fonction foreach qui ne retourne rien, alors on
                    // attribut la valeur de retour à la variable retour
                    retour = listeJetonAllignes;
                }
            }
            indexPion++;
        });
        // On change de colonne
        i++;
        listeJetonAllignes = GetListeVide();
    }
    if (retour) {
        return retour;
    }
    else {
        return false;
    }


    maListeDePions.forEach(unPion => {
        // Si la liste est vide, on entre le jeton
        if (GetTailleListe(listeJetonAllignes) == 0) {
            listeJetonAllignes.push(unPion);
        }
        else {
            // Si la liste n'est pas vide, et que le jeton est sur la meme ligne
            // que le jeton précedent
            if (EstSurLaMemeLigne(listeJetonAllignes, unPion)) {
                // Si le pion est en dessous du dernier pion, alors on l'ajoute a la liste
                if (LePionEstIlEnBasDuDernierPion(listeJetonAllignes, unPion)) {
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

function isWinner_diagonalTopLeft(Px, Py, Color) {
    let parseVal = 4, returnParseVal = 4;
    let couleur, CombienDeMonter, count;
    let parseCaseBas = 2;
    let parseCase = 1;
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
                parseCase++;
            }
            parseCase = 1;
            returnParseVal++;
            parseVal = returnParseVal;
        } else {
            count = 0;
            parseCase = parseCaseBas;
            CombienDeMonter = Px - 1;
            Surbrillance = [];
            parseVal = Py;
            if (CombienDeMonter >= 4) {
                // Vérifier la ligne en diagonale
                for (let j = 0; j < CombienDeMonter; j++) {
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
                    parseCase++;
                }
                CombienDeMonter--;
                parseCaseBas++;
            }
            parseVal = Py;
            returnParseVal++;
            parseVal = returnParseVal;
        }
    }
    return false;
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