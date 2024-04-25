<?php
require_once('../../config/connect.php');
session_start();

if (isset($_SESSION['accountId'])) {
    $idAccount = $_SESSION['accountId'];
} else {
    $idAccount = 0;
}

$surnameClient = $_POST['surnameClient'];
$nameClient = $_POST['nameClient'];

$numberClient = $_POST['numberClient'];
$mailClient = $_POST['mailClient'];

$prodid = $_SESSION['PRODID'];

$productitem = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE ID = '$prodid'");
$productitem = mysqli_fetch_assoc($productitem);

$prodname = $productitem['NAME'];

$nametype = $_SESSION['NAMETYPE'];

$sum = $_SESSION['basketSum'];
$service = $_SESSION['service'];
$amount = $_SESSION['amountSum'];

mysqli_query($ConnectDatabase, "INSERT INTO `orders` 
(`ID`, `IDUSER`, `PRODNAME`, `TICKETTYPE`, `SUM`, `SERVICE`, `AMOUNTSUM`, `SURNAMEUSER`, `NAMEUSER`, `EMAIL`, `NUMBER`, `STATUS`) VALUES 
(NULL, '$idAccount', '$prodname', '$nametype', '$sum', '$service', '$amount', '$surnameClient', '$nameClient', '$mailClient', '$numberClient', '1')");

$idOrder = mysqli_query($ConnectDatabase, "SELECT MAX(id) FROM `orders`");
$idOrder = mysqli_fetch_all($idOrder);
$idOrder = $idOrder[0][0];

foreach ($_SESSION['basket'] as $item) {

    $nameProd = $item['NAME'];
    $value = $item['VALUE'];

    mysqli_query($ConnectDatabase, "INSERT INTO `order_item` (`ID`, `IDORDER`, `NAME`, `VALUE`) VALUES (NULL, '$idOrder', '$nameProd', '$value')");
}

unset($_SESSION['IDTYPE']);
unset($_SESSION['NAMETYPE']);
unset($_SESSION['PRODID']);
unset($_SESSION['basket']);
unset($_SESSION['basketSum']);
unset($_SESSION['service']);
unset($_SESSION['amountSum']);
