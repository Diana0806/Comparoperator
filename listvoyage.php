<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ComparOperator</title>
</head>
<body>
    <?php
        require("./classes/Manager.php");
        require("./classes/Destination.php");

        $destinationManager = new Destination();
        // var_dump($destinationManager);
        $allDestinations = $destinationManager->getAllDestination();
        // var_dump($allDestinations);

        foreach ($allDestinations as $destination) {

            if($destination->getImage() === ''){
                $bgImg = 0;
            } else {
                $bgImg = 1;
            }
            // var_dump($destination->getImage());
            echo "<div>";
            echo "<h2> Destination : " . "<a href='listTO.php?destination=" .
             $destination->getLocation() . "&bgImg=". $bgImg . "'>" . $destination->getLocation() . "</a>" . 
             "</h2>";
            echo "<h4> Prix : " . $destination->getPrice() . " €</h4>";
            echo "</div>";
        }
    ?>
</body>
</html>