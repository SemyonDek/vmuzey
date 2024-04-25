<?php
require_once('../../config/connect.php');

$answer = $_POST['answer'];
$idQuestion = $_POST['idQuestion'];

mysqli_query($ConnectDatabase, "UPDATE `questions` SET `ANSWER` = '$answer' WHERE `questions`.`ID` = $idQuestion");
