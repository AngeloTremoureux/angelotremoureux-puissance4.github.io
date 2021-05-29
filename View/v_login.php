<div class="container-fluid">
        <div id="box">
            <h2>Connexion</h2>
            <div id="game">
                <form id="formLogin form" action="../account/login" method="post">
                    <?php if ($accountJustCreatedBefore == true) {
                        ?>
                            <div id="mb-3 align" class="successfull">
                                Votre compte a bien été créée. Veuillez vous connecter.
                            </div>
                        <?php
                    } ?>
                    
                    <div class="mb-3 align">
                        <label for="username" class="form-label">Nom d'utilisateur</label>
                        <input type="text" class="form-control" name="username" id="username" value="<?php if (isset($username)) { echo $username; } ?>" aria-describedby="username">
                    </div>
                    <div class="mb-3 align">
                        <label for="password" class="form-label">Mot-de-passe</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="mb-3">
                        <button type="submit" data-sitekey="6LdY4OkaAAAAAOw4RyVGtcwhCbrSkBDwjqrTMbAG" data-callback='onSubmit' data-action='submit' class="btn btn-primary g-recaptcha">Connexion</button>
                        <?php if (!empty($exception))
                        { ?>
                            <div id="Banalerror" class="activeError invalid-feedback">
                                <?= $exception ?>
                            </div>
                        <?php
                        }
                        ?>
                        
                    </div>
                    <div class="mb-1">
                        <a href="/account/register" class="btn btn-secondary">Je n'ai pas de compte</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="/Controller/scripts/login.js"></script>
</body>
</html>