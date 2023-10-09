<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ComparOperator</title>
</head>
<body>
    <?php
        require_once("config/database.php");
        require("classes/Manager.php");
        require("classes/Destination.php");
        require("classes/Tour_operator.php");
        require('Models/ManagerDestination.php');
        require('Models/ManagerOperateur.php');
        require('./utilscss/navbar.php');

        include("utils/formDestination.php");
        include("./utils/formOperateur.php");
?>
        <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h2>Liste des Destinations</h2>
                <?php
                $allDestinations = new Destination;
                $destinations = $allDestinations->getAllDestination();
    
                foreach ($destinations as $destination) {
                    echo "<div class='mb-4'>";
                    echo "<strong>Destination :</strong> " . $destination->getLocation() . "<br>";
                    echo "<strong>Prix :</strong> " . $destination->getPrice() . " €";
                    echo "</div>";
                }
                ?>
            </div>
    
            <div class="col-md-6">
                <h2>Liste des Tour Operators</h2>
                <?php
                $tourOperator = new Tour_operator;
                $listTO = $tourOperator->getAllOperator();
    
                foreach ($listTO as $TO) {
                    echo "<div class='mb-4'>";
                    echo "<strong>Tour operator :</strong> " . $TO->getName() . "<br>";
                    echo "<strong>Lien :</strong> " . $TO->getLink();
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </div>