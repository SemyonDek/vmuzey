<?php
session_start();
require_once('../../config/connect.php');


$nameUser = $_POST['nameUser'];
$surnameUser = $_POST['surnameUser'];

$mailUser = $_POST['mailUser'];
$numberUser = $_POST['numberUser'];

$idUser = $_SESSION['accountId'];

mysqli_query($ConnectDatabase, "UPDATE `users` SET 
`NAME` = '$nameUser', `SURNAME` = '$surnameUser', 
`NUMBER` = '$numberUser', `EMAIL` = '$mailUser'
WHERE `users`.`ID` = $idUser");
