
<?php
require('../Models/Manager.php');
require('../classes/Tour_operator.php');

$TourOperator = new Tour_operator;


$tourOperatorId = $_GET['tour_operator_id']; 
?>

<form action="./insertCommentaire.php" method="post">
    <input type="hidden" name="tour_operator_id" value="<?php echo $tourOperatorId; ?>">
    
    <label for="message">Votre commentaire :</label>
    <textarea name="message" rows="4" required></textarea><br>

    <label for="author_name">Nom de l'auteur :</label>
    <input type="text" name="author_name" required><br>

    <input type="submit" name="submit" value="Ajouter le commentaire">
</form>