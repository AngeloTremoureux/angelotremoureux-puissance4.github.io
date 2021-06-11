    <div class="container-fluid">
        <div id="box">
            <h2>Nouveau compte</h2>
            <div id="game">
                <form id="formRegister" action="../account/register" method="post">
                    <div class="mb-3 align">
                        <?php if (!empty($exception)) { ?>
                            <div class="alert alert-danger activeError invalid-feedback" id="Banalerror" role="alert">
                                <?= $exception ?>
                            </div>
                        <?php } ?>
                        <label for="username" class="form-label">Nom d'utilisateur</label>
                        <input type="text" name="username" class="form-control"id="username" aria-describedby="username"
                        value="<?php
                        if (isset($username)) {
                            echo $username;
                        } ?>">
                        
                    </div>
                    <div class="mb-3 align">
                        <label for="password" class="form-label">Mot-de-passe</label>
                        <input type="password" name="password" class="form-control" id="password">
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