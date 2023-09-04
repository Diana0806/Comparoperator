<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ComparOperator</title>
</head>
<body>
    <?php
        require("classes/Manager.php");
        require("classes/Destination.php");

        $destinationManager = new Destination();
        $allDestinations = $destinationManager->getAll();
    ?>
</body>
</html>