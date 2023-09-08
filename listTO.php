<?php
require_once("config/database.php");
require("classes/Manager.php");
require("classes/Tour_operator.php");
require("classes/Author.php");
require("classes/Review.php");
require("classes/Destination.php");

include("./utilscss/navbar.php");

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
        // Récupérez l'image spécifique pour cette destination
        $destinationImage = null;
        foreach ($image as $dest) {
            if ($dest->getLocation() === $destination) {
                $destinationImage = $dest->getImage();
                break;
            }
        }
<<<<<<< HEAD
    }
}
=======
>>>>>>> bc2733d165e386271a7099773be99e23b00e7ff2

        echo "<h1 class='text-center text-light title'>{$destination}</h1>";
        echo "<div class='borderTop'></div>";
        foreach ($operatorsByDestination as $operator) {
            echo "<div>";
            echo "<a href='{$operator->getLink()}' target='_blank'>{$operator->getName()}</a>";
            echo "<hr>";
            echo "<p>score</p>";
            echo "<p>{$operator->getPrice()}</p>";
            var_dump($operator);
            echo "<input type='hidden' value='{$operator->getId()}' name='idOperator'>";
            echo "</div>";
        }
    }
}

include("./utilscss/footer.php");