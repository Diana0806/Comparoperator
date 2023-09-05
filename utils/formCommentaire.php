
<?php
require('../classes/Manager.php');
require('../classes/Tour_operator.php');



?>

<form action="./insertCommentaire.php" method="post">
    
    <label for="message">Votre commentaire :</label>
    <textarea name="message" rows="4" required></textarea><br>

    <label for="author_name">Nom de l'auteur :</label>
    <input type="text" name="author_name" required><br>

    <input type="submit" name="submit" value="Ajouter le commentaire">
</form>