<?php require('./utilscss/navbar2.php')?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="../indexAdmin.php" method="post">
                <div class="mb-3">
                    <label for="identifiant" class="form-label">Identifiant</label>
                    <input type="text" name="identifiant" class="form-control" id="identifiant" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Se connecter</button>
            </form>
        </div>
    </div>
</div>


