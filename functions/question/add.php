<?php
require_once('../../config/connect.php');

session_start();

if (isset($_SESSION['accountId'])) {
    $idAccount = $_SESSION['accountId'];
} else {
    $idAccount = 0;
}

$question = $_POST['questionText'];
$phone = $_POST['questionNumberUser'];
$mail = $_POST['questionMailUser'];
$name = $_POST['questionNameUser'];


mysqli_query($ConnectDatabase, "INSERT INTO `questions` (`ID`, `USERID`, `PHONE`, `EMAIL`, `NAME`, `QUESTION`, `ANSWER`, `VISIBLE`) VALUES (NULL, '$idAccount', '$phone', '$mail', '$name', '$question', '', 0)");
