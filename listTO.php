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
    require("classes/Tour_operator.php");

    $tourOperatorManager = new Tour_operator();
    $TOWithDestinations = $tourOperatorManager->getOperatorByDestination();

    foreach ($TOWithDestinations as $TO) {
        echo "<div>";
        echo "<h2>" . $TO->getName() . "</h2>";
        echo "<h4> Aller sur le site : " . $TO->getLink() . "</h4>";
        echo "</div>";
    }
    ?>
</body>

</html>