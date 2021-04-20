function setBot(Color) {
    monTour.set(false);
    game.unSelect();
    let Px = game.getPx();
    let Py = game.getPy();
    resetGame();
    RobotVsRobot(Py, Px, Color);
}

function RobotVsRobot(Py, Px, Color) {
    ajouteUnPionRobot(Py, Px, Color);

    setTimeout(function () {
        let listeDeCasesAlignes = verifWin(Px, Py, Color);
        // Si des cases sont alignés, c'est qu'il y a un gagnant
        if (listeDeCasesAlignes) {
            if (Color == 'yellow') {
                game.log("Puissance 4", "Les Jaunes ont gagnés !");
                $('#game p#tour').text('Les Jaunes ont gagnés !');
                setWinner(listeDeCasesAlignes);
                
            }
            else {
                game.log("Puissance 4", "Les Rouges ont gagnés !");
                $('#game p#tour').text('Les Rouges ont gagnés !');
                setWinner(listeDeCasesAlignes);
            }
        }
        else {
            if (Color == 'yellow') {
                RobotVsRobot(Px, Py, 'red');
            }
            else {
                RobotVsRobot(Px, Py, 'yellow');
            }
            
        }
    }, 50);
}

function getListePionsAJouer() {
    // Liste contenant la liste des pions qui peuvent encore
    // être jouer par le joueur actuel
    let listePionsAJouer = [];
    const listeDePionsRed = jeton.get('red');
    const listeDePionsYellow = jeton.get('yellow');

    // On parcours chaque case horizontale du jeux
    for (let i = 1; i <= game.getPx(); i++) {
        // Si un pion d'une liste des 2 équipes est en
        // haut du jeux, alors aucune pièce ne peut être joué.
        if (
            !(ListeContientElleListe(listeDePionsRed, [1, i]))
            && !(ListeContientElleListe(listeDePionsYellow, [1, i]))
            )
        {
            listePionsAJouer.push(i);
        }
    }
    return listePionsAJouer;
}

function ajouteUnPionRobot(Py, Px, Color) {
    const maListeDePions = jeton.get(Color);

    // Liste des lignes encore jouables
    let listePionsAJouer = getListePionsAJouer(Color);

    if (listePionsAJouer.length > 0) {
         // On génère un nombre aléatoire entre 1 et
        // le nombre de pièces restantes compris
        let nombreAleatoireDePionsAJouer = Math.floor((Math.random() * listePionsAJouer.length + 2) - 1);
        // On choisis le pion X correspondante du
        // nombre aléatoire généré
        let unPionAleatoireQuiPeuxEtreJouer = listePionsAJouer[nombreAleatoireDePionsAJouer - 1];

        jeton.add(unPionAleatoireQuiPeuxEtreJouer, Color);
        return 1;
    }
    else {
        return -1;
    }
}