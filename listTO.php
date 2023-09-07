<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Opérateurs par Destination</title>
</head>
<body>
    <h1>Opérateurs par Destination</h1>

    <?php
    require_once("config/database.php");
    require("classes/Manager.php");
    require("classes/Tour_operator.php");
    require("classes/Author.php");

    // Récupérez la destination depuis le paramètre GET
    $destination = isset($_GET['destination']) ? $_GET['destination'] : null;

    if (!$destination) {
        echo "La destination n'a pas été spécifiée.";
    } else {
        $tourOperatorManager = new Tour_operator();
        $operatorsByDestination = $tourOperatorManager->getOperatorsByLocation($destination);

        if (empty($operatorsByDestination)) {
            echo "Aucun opérateur trouvé pour la destination : {$destination}";
        } else {
            echo "<h2>Opérateurs pour la destination : {$destination}</h2>";
            echo "<ul>";
            foreach ($operatorsByDestination as $operator) {
                echo "<li>{$operator->getName()} (Site : <a href='{$operator->getLink()}' target='_blank'>{$operator->getLink()}</a>)</li>";
                
            
            echo "</ul>";
            
        }
  
        
        $operator->getId();
                
                 require('./utils/formCommentaire.php'); 
    }
        
    }
    ?>
</body>
</html>
