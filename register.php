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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ComparOperateur</title>
</head>
<body>

<h2>Register</h2>
<form action="register.php" method="post" enctype="multipart/form-data">
    <label for="nom">Votre Nom:</label>
    <input type="text" id="name" name="name" required><br>

    <label for="password">Mot de passe:</label>
    <input type="password" id="password" name="password" required><br>

    <button type="submit">Register</button>
</form>
    
</body>
</html>