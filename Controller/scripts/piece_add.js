var jeton = jeton || (function () {
    var listPionTeam2; // Team yellow
    var listPionTeam1; // Team red
    return {
        init: function () {
            this.listPionTeam1 = new Array();
            this.listPionTeam2 = new Array();
        },
        add: function (event) {

            Px = game.getPx(); // Longueur horizontale du puissance 4
            Py = game.getPy(); // Longueur verticale du puissance 4

            let num = parseInt($(event).attr('case')); // Case horizontale du clique
            
            if (num == null || num > game.getPx())
            {
                throw "Aucun jeton ne peux être ajouté actuellement.";
            }
            else
            {
                let placeIsNotTaken = true;
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
                        table = [compteur, num];
                        // Si le pion de la boucle est dans la liste des pions de l'équipe rouge
                        jetonHasTeam = isItemInArray(this.listPionTeam1, table);
                        if (!jetonHasTeam) {
                            // Si le pion ne l'est pas, est-il dans la liste des pions de l'équipe jaune :
                            jetonHasTeam = isItemInArray(this.listPionTeam2, table);
                        }
                        if (!jetonHasTeam) {
                            this.set(1, [compteur, num]);
                            $(".row[val='" + compteur + "'] .icon").attr('surbrillance', '');
                            $(".row[val='" + compteur + "'] .icon[case='" + num + "']").replaceWith(searchPiece('red', num));
                            $(".row[val='" + compteur + "'] .icon[case='" + num + "']").attr('team', 'red');
                            game.select(event, Py);
                            monTour.set(false);
                            jetonHasTeam = true;
                            isWinner = verifWin(Px, Py, 'red');
                            if (isWinner) {
                                setWinner(isWinner);
                                $('#game p#tour').text('Tu as gagné !');
                                game.log("Puissance 4", "Gagné ! Bien joué");
                                game.unSelect();
                            } else {
                                $('#game p#tour').text('Au tour de l\'adversaire!');
                                setTimeout(function () {
                                    if (setRobot(Py, Px, 'yellow')) {
                                        $('#game p#tour').text('Damn ! Tu as perdu !');
                                        game.log("Puissance 4", "Perdu ! :(");
                                        monTour.set(false);
                                        game.unSelect();
                                    }
                                }, 50);
                            }
                        }
                        else {
                            // La case est occupé, on refais un tour de boucle
                            jetonHasTeam = false;
                        }
                        compteur--;
                    }
                    game.log("Puissance 4", "Jeton en X:" + num + " Y:" + (compteur + 1));

                } else
                {
                    throw "Emplacement de pion inatteignable";
                }
            }
        },
        set: function (team, value) {
            if (team == 1)
            {
                this.listPionTeam1.push(value);
                this.listPionTeam1 = this.removeDoublons(this.listPionTeam1);
            } else if (team == 2) {
                this.listPionTeam2.push(value);
                this.listPionTeam2 = this.removeDoublons(this.listPionTeam2);
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

function isItemInArray(array, item) {
    for (var i = 0; i < array.length; i++) {
        // This if statement depends on the format of your array
        if (array[i][0] == item[0] && array[i][1] == item[1]) {
            return true;   // Found it
        }
    }
    return false;   // Not found
}