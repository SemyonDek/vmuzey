<?php
require_once('../../config/connect.php');

$catid = $_POST['catid'];
$name = $_POST['nameprod'];
$cityid = $_POST['cityid'];
$addressprod = $_POST['addressprod'];

$timeprod = $_POST['timeprod'];
$numberprod = $_POST['numberprod'];
$mailprod = $_POST['mailprod'];
$siteprod = $_POST['siteprod'];
$description = $_POST['description'];

mysqli_query($ConnectDatabase, "INSERT INTO `products` 
(`ID`, `CATID`, `NAME`, `CITYID`, `ADDRESS`, `TIME`, `NUMBER`, `MAIL`, `SITE`, `TEXT`) VALUES 
(NULL, '$catid', '$name', '$cityid', '$addressprod', '$timeprod', '$numberprod', '$mailprod', '$siteprod', '$description')");

$idProd = mysqli_query($ConnectDatabase, "SELECT MAX(id) FROM `products`");
$idProd = mysqli_fetch_all($idProd);
$idProd = $idProd[0][0];

echo $idProd;
