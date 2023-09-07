<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/TpComparator/Comparoperator/classes/Manager.php'); 
require("../classes/Destination.php");

if (isset($_POST['submit'])) {
    $message = $_POST['message'];
    $authorName = $_POST['author_name'];
    $tourOperatorId = $_POST['tour_operator_id'];

    $manager = new Manager;
    $manager2 = new Manager;
    $manager2->getAuthorIdByName($authorName);
    $manager->createReview($message, $tourOperatorId, $authorName);
    $redirectUrl = "listTO.php?destination=" . $_POST['destination'];

    header('Location: ../' . $redirectUrl);
    exit();
}
?>