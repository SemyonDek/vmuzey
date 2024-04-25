<?php
require_once('../../config/connect.php');

$cityid = $_POST['cityid'];
$namecity = $_POST['namecity'];

mysqli_query($ConnectDatabase, "UPDATE `city` SET `NAME` = '$namecity'  WHERE `city`.`ID` = $cityid");
