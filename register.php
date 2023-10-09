<?php
require_once('config/autoload.php');

if (!empty($_POST['name'] ) && !empty($_POST['password'] )) {

    $author = new Author();
    $author->setName($_POST['name']);
    $author->setGrade('client');
    $author->setPassword($_POST['password']);

    $manager = new Manager();
    $manager->registerAuthor($author);
    
}

?>

<?php require('./utilscss/navbar.php')?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>Inscription</h2>
            <form action="register.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Votre Nom:</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">S'inscrire</button>
            </form>
        </div>
    </div>
</div>

<!-- Inclure Bootstrap JS (facultatif, pour des fonctionnalités avancées) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>





