

<?php

require('../config/database.php');
require('./classes/Manager.php');

if (isset($_POST['submit'])) {
    $message = $_POST['message'];
    $authorName = $_POST['author_name'];

    createReview($message, $authorName);

    // header('Location: confirmation_commentaire.php');
}
?>





