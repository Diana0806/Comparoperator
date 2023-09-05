<?php

require('../config/database.php');
require('../Models/ManagerDestination.php');

if (isset($_POST['id'])) {

    $location = $_POST['location'];
    $price = $_POST['price'];
    $tourOperatorId = $_POST['tour_operator'];

insertDestination($location, $price, $tourOperatorId );

header('Location: ../index.php');

}