<?php
require_once('../../config/connect.php');
session_start();

$prodid = $_POST['prodid'];
$idAccount = $_SESSION['accountId'];
mysqli_query($ConnectDatabase, "INSERT INTO `favorite` (`ID`, `USERID`, `PRODID`) VALUES (NULL, '$idAccount', '$prodid')");
