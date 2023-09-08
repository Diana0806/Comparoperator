<?php
require_once("config/database.php");
require("classes/Manager.php");
require("classes/Tour_operator.php");
require("classes/Author.php");
require("classes/Review.php");
require("classes/Destination.php");

include("./utilscss/header.php"); ?>
<link rel="stylesheet" href="assets/css/listTO.css">
<?php include("./utilscss/navbar.php");

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
    }
}

        echo "<h1 class='text-center text-light title'>{$destination}</h1>";
        echo "<div class='borderTop'></div>"; ?>
        <div class="container text-center">
            <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                <?php foreach ($operatorsByDestination as $operator) {
                    echo "<div class='col-3 mr-5 ml-5 mt-5'>";
                    echo "<div class='card stp'>";
                    echo "<a class='link text-light' href='{$operator->getLink()}' target='_blank'>{$operator->getName()}</a>";
                    echo "<hr class='w-75'>";
                    echo "<p>score</p>";
                    echo "<p class ='text-light'>{$operator->getPrice()} €</p>";
                    // var_dump($operator);
                    echo "</div>";
                    echo "<input type='hidden' value='{$operator->getId()}' name='idOperator'>";
                    echo "</div>";
                } ?>
            </div>
        </div>
        <div class='borderBottom'></div>
<?php
include("./utilscss/footer.php");