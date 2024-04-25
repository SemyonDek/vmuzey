<?php
require_once('../../config/connect.php');

$prodid = $_POST['prodid'];
$catid = $_POST['catid'];
$name = $_POST['nameprod'];
$cityid = $_POST['cityid'];
$addressprod = $_POST['addressprod'];
$timeprod = $_POST['timeprod'];
$numberprod = $_POST['numberprod'];
$mailprod = $_POST['mailprod'];
$siteprod = $_POST['siteprod'];
$description = $_POST['description'];

mysqli_query($ConnectDatabase, "UPDATE `products` SET 
`CATID` = '$catid', `NAME` = '$name', `CITYID` = '$cityid', `ADDRESS` = '$addressprod', 
`TIME` = '$timeprod', `NUMBER` = '$numberprod', `MAIL` = '$mailprod', `SITE` = '$siteprod', `TEXT` = '$description' WHERE `products`.`ID` = '$prodid'");
