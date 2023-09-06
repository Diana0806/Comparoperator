<?php
require_once("../config/database.php");
require("../Models/ManagerOperateur.php");

if (isset($_POST['id'])) {

    $name = $_POST['name'];
    $link = $_POST['link'];

insertOperateur($name, $link);

header('Location: ../indexAdmin.php');

}