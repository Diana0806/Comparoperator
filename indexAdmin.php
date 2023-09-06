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

        include("utils/formDestination.php");

        $allDestinations = new Destination;
        $destinations = $allDestinations->getAllDestination();

        foreach ($destinations as $destination) {
            echo "<div>";
            echo "Destination : " . $destination->getLocation() . "<br>";
            echo "Prix : " . $destination->getPrice() . " €";
            echo "</div>";
        }

        include("utils/formOperateur.php");

        $tourOperator = new Tour_operator;
        $listTO = $tourOperator->getAllOperator();

        foreach ($listTO as $TO) {
            echo "<div>";
            echo "Tour operator :" . $TO->getName() . "<br>";
            echo "Lien :" . $TO->getLink();
            echo "</div>";
        }
    ?>
</body>
</html>