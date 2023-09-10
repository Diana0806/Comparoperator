<?php

require('./utilscss/navbar.php');
require('./classes/Manager.php');
require('./classes/Review.php');


?>

<div class="container mt-4">
    <?php
    $operator = isset($_GET['operator']) ? $_GET['operator'] : null;

    $messages = new Review();
    $messagesByAuthorbyOperators = $messages->getAllAuthorMessagesByOperator($operator);

    if (empty($messagesByAuthorbyOperators)) {
        echo '<div class="alert alert-warning">Aucun message trouvé pour l\'opérateur</div>';
    } else {
        foreach ($messagesByAuthorbyOperators as $messagesByOperator) {
            echo '<div class="card mb-3">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . htmlspecialchars($messagesByOperator->getAuthor()) . '</h5>';
            echo '<p class="card-text">' . htmlspecialchars($messagesByOperator->getMessage()) . '</p>';
            echo '</div>';
            echo '</div>';
        }
    }
    ?>
</div>

