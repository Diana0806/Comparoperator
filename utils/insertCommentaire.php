<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/TpComparator/Comparoperator/classes/Manager.php'); 

if (isset($_POST['submit'])) {
    $message = $_POST['message'];
    $authorName = $_POST['author_name'];
    $tourOperatorId = $_POST['tour_operator_id'];

    $manager = new Manager;
    $manager2 = new Manager;
    $manager2->getAuthorIdByName($authorName);
    $manager->createReview($message, $tourOperatorId, $authorName);

   
    header('Location: ../listTO.php?destination=  <?= ?>');
    exit();
}
?>