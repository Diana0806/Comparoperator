<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/TpComparator/Comparoperator/config/database.php');
require_once('../classes/Manager.php'); // Incluez la classe RatingManager

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $operatorId = $_POST["operator_id"];
    $rating = $_POST["rating"];
    $message = "Votre message ici"; // Vous pouvez obtenir le message à partir du formulaire si nécessaire

    // Créez un nouvel objet Rating pour gérer la notation
    $ratingManager = new Manager();

    // Soumettez la notation en utilisant la méthode createRating de RatingManager
    $ratingManager->createRating($operatorId, $authorName, $rating, $message);

    // Redirigez l'utilisateur vers la page d'accueil ou une autre page appropriée
    header("Location: index.php");
    exit();
}
?>
