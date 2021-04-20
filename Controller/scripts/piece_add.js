var pion = pion || (function () {
    var coordPionX;
    var coordPionY;
    return {
        /**
         * Initialise un pion
         * @param {BigInteger} y
         * @param {BigInteger} x
         */
        init: function (y, x) {
            this.coordPionX = x
            this.coordPionY = y;
        },
        getArray: function() {
            return [coordPionY, coordPionX];
        },
        getX: function() {
            return coordPionX;
        },
        getY: function() {
            return coordPionY;
        },
        setX: function(x) {
            this.coordPionX = x;
        },
        setY: function(y) {
            this.coordPionY = y;
        }
    }
});

var jeton = jeton || (function () {
    var listPionTeam2; // Team yellow
    var listPionTeam1; // Team red
    return {
        init: function () {
            this.listPionTeam1 = new Array();
            this.listPionTeam2 = new Array();
        },
        click: function (clickPx, Color) {
            if (monTour.get()) {
                Px = game.getPx(); // Longueur horizontale du puissance 4
                Py = game.getPy(); // Longueur verticale du puissance 4

                let num = parseInt(clickPx); // Case horizontale du clique
                this.add(num, Color);
                monTour.set(false);
                isWinner = verifWin(Px, Py, Color);
                if (isWinner) {
                    setWinner(isWinner);
                    $('#game p#tour').text('Tu as gagné !');
                    game.log("Puissance 4", "Gagné ! Bien joué");
                    game.unSelect();
                }
                else {
                    $('#game p#tour').text('Au tour de l\'adversaire!');
                    game.unSelect();
                    setTimeout(function () {
                        // On récupère le callback et on ajoute un pion
                        let callbackPion = ajouteUnPionRobot(Py, Px, 'yellow');
                        if (callbackPion == -1) {
                            $('#game p#tour').text('Egalité !');
                            game.log("Puissance 4", "Egalité !");
                        }
                        else {
                            // Si le bot est gagnant
                            if (verifWin(Px, Py, 'yellow')) {
                                $('#game p#tour').text('Damn ! Tu as perdu !');
                                game.log("Puissance 4", "Perdu ! :(");
                            }
                            // S'il n'y a pas de gagnant
                            else {
                                $('#game p#tour').text('A ton tour !');
                                monTour.set(true);
                            }
                            
                            
                        }
                    }, 50);
                }
            }
        },
        add: function (clickPx, Color) {

            Px = game.getPx(); // Longueur horizontale du puissance 4
            Py = game.getPy(); // Longueur verticale du puissance 4

            let num = parseInt(clickPx); // Case horizontale du clique
            
            if (num == null || num > game.getPx())
            {
                throw "Aucun jeton ne peux être ajouté actuellement.";
            }
            else
            {
                let compteur = Py;
                let jetonHasTeam = false;
                var table;
                // Si c'est à mon tour :
                if (monTour.get()) {
                    // Parcours de toutes les cases Y de la collonne actuelle du puissance 4 :
                    while (compteur > 0 && !jetonHasTeam)
                    {
                        // Variable compteur = jeton en Y
                        // Variable num = jeton en X
                        let monPion = new pion();
                        monPion.init(compteur, num);

                        // Si le pion de la boucle est dans la liste des pions de l'équipe rouge
                        jetonHasTeam = ContientPion(this.listPionTeam1, monPion);
                        if (!jetonHasTeam) {
                            // Si le pion ne l'est pas, est-il dans la liste des pions de l'équipe jaune :
                            jetonHasTeam = ContientPion(this.listPionTeam2, monPion);
                        }
                        // Si le pion n'a toujours pas d'équipe
                        if (!jetonHasTeam) {
                            
                            this.set(Color, monPion);
                            $(".row[val='" + compteur + "'] .icon").attr('surbrillance', '');
                            $(".row[val='" + compteur + "'] .icon[case='" + num + "']").replaceWith(searchPiece(Color, num));
                            $(".row[val='" + compteur + "'] .icon[case='" + num + "']").attr('team', Color);

                            jetonHasTeam = true;
                        }
                        else {
                            // La case est occupé, on refais un tour de boucle
                            jetonHasTeam = false;
                        }
                        compteur--;
                    }
                    game.log("Puissance 4", "Jeton en X:" + num + " Y:" + (compteur + 1));

                }
                 else
                {
                    throw "Emplacement de pion inatteignable";
                }
            }
        },
        set: function (team, value) {
            if (team == 1 || team == 'red')
            {
                this.listPionTeam1.push(value);
            } else if (team == 2 || team == 'yellow') {
                this.listPionTeam2.push(value);
            } else {
                throw "Le joueur est introuvable";
            }
        },
        removeDoublons: function (arr) {
            var uniques = [];
            var itemsFound = {};
            for(var i = 0, l = arr.length; i < l; i++) {
                var stringified = JSON.stringify(arr[i]);
                if(itemsFound[stringified]) { continue; }
                uniques.push(arr[i]);
                itemsFound[stringified] = true;
            }
            return uniques;
        },
        clear: function () {
            this.listPionTeam1 = [];
            this.listPionTeam2 = [];
            game.log("Puissance 4", "Les données des pions ont été effacés");
        },
        get: function (team) {
            if (team == 1 || team == 'red')
            {
                return this.listPionTeam1;
            } else if (team == 2 || team == 'yellow')
            {
                return this.listPionTeam2;
                
            } else {
                throw "Le joueur est introuvable";
            }

        },
        getTeam2: function () {
            return this.listPionTeam2;
        }
    };
}());

/**
 * Vérifie si une liste contient une liste
 * @param {Array<pion>} array 
 * @param {Array} item 
 */
function ContientPion(listeDePions, pion) {
    listeDePions.forEach(element => {
        if (Pio(element).getArray() == pion(element).getArray()) {
            return true;
        }
    });
    return false;
}

function isItemInArray(array, item) {
    for (var i = 0; i < array.length; i++) {
        // This if statement depends on the format of your array
        if (array[i][0] == item[0] && array[i][1] == item[1]) {
            return true;   // Found it
        }
    }
    return false;   // Not found
}