    <div class="container-fluid">
        <div id="box">
            <h2>Nouveau compte</h2>
            <div id="game">
                <form id="formRegister" action="../account/register" method="post">
                    <div class="mb-3 align">
                        <label for="username" class="form-label">Nom d'utilisateur</label>
                        <input type="text" name="username" class="form-control" id="username" aria-describedby="username" value="<?php if (isset($username)) { echo $username; } ?>">
                        <div id="usernameLength" class="invalid-feedback">
                            Le nom d'utilisateur doit avoir une taille comprise entre 3 et 20 caractères
                        </div>
                        <div id="usernameChars" class="invalid-feedback">
                            Les caractères spéciaux autorisés sont : - et _
                        </div>
                        <?php if (!empty($exception))
                        { ?>
                            <div id="Banalerror" class="activeError invalid-feedback">
                                <?= $exception ?>
                            </div>
                        <?php
                        }
                        ?>
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
            </div>
        </div>
    </div>
    <script type="text/javascript" src="/Controller/scripts/login.js"></script>
</body>
</html>