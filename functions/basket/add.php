<?php
session_start();

require_once('../../config/connect.php');

$idTicket = $_POST['idTicket'];
$valueTicket = $_POST['valueTicket'];

$ticketitem = mysqli_query($ConnectDatabase, "SELECT * FROM `products_tickets_category` WHERE ID = '$idTicket'");
$ticketitem = mysqli_fetch_assoc($ticketitem);

$nameTicket = $ticketitem['NAME'];
$priceTicket = $ticketitem['PRICE'];

$prodid = $ticketitem['PRODID'];

$prod = [];
$prod['ID'] = $idTicket;
$prod['NAME'] = $nameTicket;
$prod['VALUE'] = $valueTicket;
$prod['AMOUNT'] = $priceTicket * $valueTicket;


$idType = $ticketitem['IDTYPE'];

$typeitem = mysqli_query($ConnectDatabase, "SELECT * FROM `products_tickets_type` WHERE ID = '$idType'");
$typeitem = mysqli_fetch_assoc($typeitem);

$nameType = $typeitem['NAME'];

if (isset($_SESSION['IDTYPE']) && $_SESSION['IDTYPE'] == $idType) {
    $basket = $_SESSION['basket'];
} else {
    $_SESSION['IDTYPE'] = $idType;
    $_SESSION['NAMETYPE'] = $nameType;
    $_SESSION['PRODID'] = $prodid;
    $basket = [];
}


array_push($basket, $prod);

$_SESSION['basket'] = $basket;

$sum = 0;
$_SESSION['basketSum'] = 0;
foreach ($_SESSION['basket'] as $value) {
    $sum += $value['AMOUNT'];
}
$service = $sum * 0.1;
$amountSum = $sum + $service;

$_SESSION['basketSum'] = $sum;
$_SESSION['service'] = $service;
$_SESSION['amountSum'] = $amountSum;
