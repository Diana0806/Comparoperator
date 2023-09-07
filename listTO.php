<?php
require_once("config/database.php");
require("classes/Manager.php");
require("classes/Tour_operator.php");
require("classes/Author.php");
require("classes/Review.php");
require("classes/Destination.php");

$destination = isset($_GET['destination']) ? $_GET['destination'] : null;
$toutvoyage = new Destination();
$image = $toutvoyage->getAllDestination();

if (!$destination) {
    echo "La destination n'a pas été spécifiée.";
} else {
    $tourOperatorManager = new Tour_operator();
    $operatorsByDestination = $tourOperatorManager->getOperatorsByLocation($destination, $image);

        if (empty($operatorsByDestination)) {
            echo "Aucun opérateur trouvé pour la destination : {$destination}";
        } else {
            echo "<h2>Opérateurs pour la destination : {$destination}</h2>";
            echo "<ul>";
            foreach ($operatorsByDestination as $operator) {
                echo "<li>{$operator->getName()} (Site : <a href='{$operator->getLink()}' target='_blank'>{$operator->getLink()}</a>)</li>";
                echo "<input type='hidden' value='{$operator->getId()}' name='idOperator'>";
                $messages = new Review();
                $messagesByAuthorbyOperators = $messages->getAllAuthorMessagesByOperator($operator->getId());
   
                 if (empty($messagesByAuthorbyOperators)) {
            echo "Aucun message trouvé pour l'opérateur";}
            else {
                foreach ($messagesByAuthorbyOperators as $messagesByOperator) {
                    echo $messagesByOperator->getAuthor();
                    echo $messagesByOperator->getMessage();
                }
            }


