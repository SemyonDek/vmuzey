<?php
require_once('../../config/connect.php');

$statusQuestion = $_POST['statusQuestion'];
$idQuestion = $_POST['idQuestion'];

mysqli_query($ConnectDatabase, "UPDATE `questions` SET `VISIBLE` = '$statusQuestion' WHERE `questions`.`ID` = $idQuestion");
