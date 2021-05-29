<body>
    <?php
    if (!isset($path)) {
        $path = "/";
    }
    ?>


    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <h2>Puissance 4</h2>

        <?php
        if ($isConnected) { ?>
        <?php
            print('<div class="icon">');
            if ($path == "/play" || $path == "/") {
                print('<a href="#" class="actual"><div class="iconi"><i class="far fa-circle"></i></div><p class="navtxt">Jouer</p></a>');
            } else {
                print('<a href="/play"><div class="iconi"><i class="far fa-circle"></i></div><p class="navtxt">Jouer</p></a>');
            }
            print('</div>');
            print('<div class="icon">');
            if ($path == "/account/me") {
                print('<a href="#" class="actual"><div class="iconi"><i class="far fa-user-circle"></i></div><p class="navtxt">Mon profil</p></a>');
            } else {
                print('<a href="/account/me"><div class="iconi"><i class="far fa-user-circle"></i></div><p class="navtxt">Mon profil</p></a>');
            }
            print('</div>');
            print('<div class="icon">');
            if ($path == "/members") {
                print('<a href="#" class="actual"><div class="iconi"><i class="fas fa-coffee"></i></div><p class="navtxt">Membres</p></a>');
            } else {
                print('<a href="/members"><div class="iconi"><i class="fas fa-coffee"></i></div><p class="navtxt">Membres</p></a>');
            }
            print('</div>');
            print('<div class="icon">');
            print('<a href="/account/logout"><div class="iconi"><i class="fas fa-sign-out-alt"></i></div><p class="navtxt">Déconnexion</p></a>');
            print('</div>');
        } else {
            print('<div class="icon">');
            if ($path == "/play") {
                print('<a href="#" class="actual"><div class="iconi"><i class="far fa-circle"></i></div><p class="navtxt">Jouer</p></a>');
            } else {
                print('<a href="/play"><div class="iconi"><i class="far fa-circle"></i></div><p class="navtxt">Jouer</p></a>');
            }
            print('</div>');
            print('<div class="icon">');
            if ($path == "/account/login") {
                print('<a href="#" class="actual"><div class="iconi"><i class="fas fa-key"></i></div><p class="navtxt">Se connecter</p></a>');
            } else {
                print('<a href="/account/login"><div class="iconi"><i class="fas fa-key"></i></div><p class="navtxt">Se connecter</p></a>');
            }
            print('</div>');
            print('<div class="icon">');
            if ($path == "/account/register") {
                print('<a href="#" class="actual"><div class="iconi"><i class="fas fa-door-open"></i></div><p class="navtxt">S\'enregistrer</p></a>');
            } else {
                print('<a href="/account/register"><div class="iconi"><i class="fas fa-door-open"></i></div><p class="navtxt">S\'enregistrer</p></a>');
            }
            print('</div>');
        } ?>

    </div>

    <div id="panel">
        <span onclick="openNav()">&#9776; Menu</span>
    </div>