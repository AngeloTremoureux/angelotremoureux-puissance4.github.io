<?php
$register = filter_input(INPUT_GET, 'register', FILTER_SANITIZE_STRING);
require_once('Controller/pdo.php');
require_once('Controller/connexion.php');
$sth = $dbh->query('SELECT * FROM player');

foreach($sth as $row) {
    print_r($row);
}

if (isset($_POST['username'], $_POST['password'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    echo $username . "<br/>";
    echo $password . "<br/>";

    $session = new SessionRegister();
    try {
        $session->setUsername($username);
        $session->setPassword($password);
        $session->setBdd($dbh);
        $session->createSession();
        echo $session->getPassword() . "<br/>";
        echo $session->getUsername() . "<br/>";
        
        print("Votre session a été crée. Connectez vous");
        $register = false;
        
    }
    catch (Exception $ex)
    {
        print($ex->getMessage());
    }
    
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Puissance 4</title>
    <meta charset="utf-8">
    <script src="https://kit.fontawesome.com/f1e20245fc.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/styles/style.css">
    <link rel="stylesheet" type="text/css" href="/styles/login.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-fluid">
        <div id="box">
            <?php 
            if (empty($register) || $register = false)
            {
                ?>
                <h2>Connexion</h2>
            <div id="game">
                <form id="formLogin form">
                    <div class="mb-3 align">
                        <label for="username" class="form-label">Nom d'utilisateur</label>
                        <input type="text" class="form-control" id="username" aria-describedby="username">
                    </div>
                    <div class="mb-3 align">
                        <label for="password" class="form-label">Mot-de-passe</label>
                        <input type="password" class="form-control" id="password">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Connexion</button>
                        <div id="noAccount" class="invalid-feedback">
                            Ce compte n'existe pas.
                        </div>
                    </div>
                    <div class="mb-1">
                        <a href="/account/register" class="btn btn-secondary">Je n'ai pas de compte</a>
                    </div>
                </form>

                <?php

            }
            else {
                ?>
                <h2>Nouveau compte</h2>
                <div id="game">
                <form id="formRegister" action="../account/register" method="post">
                    <div class="mb-3 align">
                        <label for="username" class="form-label">Nom d'utilisateur</label>
                        <input type="text" name="username" class="form-control" id="username" aria-describedby="username">
                        <div id="usernameLength" class="invalid-feedback">
                            Le nom d'utilisateur doit avoir une taille comprise entre 3 et 20 caractères
                        </div>
                        <div id="usernameChars" class="invalid-feedback">
                            Les caractères spéciaux autorisés sont : - et _
                        </div>
                        <div id="usernameTaken" class="invalid-feedback">
                            Ce nom d'utilisateur est déjà pris
                        </div>
                    </div>
                    <div class="mb-3 align">
                        <label for="password" class="form-label">Mot-de-passe</label>
                        <input type="password" name="password" class="form-control" id="password">
                        <div id="passwordLength" class="invalid-feedback">
                        Le mot-de-passe doit comprendre uniquement entre 3 et 40 caractères
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">S'enregistrer</button>
                    </div>
                    <div class="mb-1">
                        <a href="/account/login" id="register" class="btn btn-secondary">J'ai déjà un compte</a>
                    </div>
                </form>

                <?php
            }
            ?>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="/Controller/scripts/login.js"></script>
</body>
</html>