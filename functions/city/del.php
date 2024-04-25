<?php

require_once('../../config/connect.php');

$cityid = $_POST['cityid'];


$productsList = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE CITYID = '$cityid'");
$productsList = mysqli_fetch_assoc($productsList);

if (!isset($productsList)) {

    $cityitem = mysqli_query($ConnectDatabase, "SELECT * FROM `city` WHERE ID = '$cityid'");
    $cityitem = mysqli_fetch_assoc($cityitem);

    unlink('../../' . $cityitem['SRC']);

    mysqli_query($ConnectDatabase, "DELETE FROM city WHERE `city`.`ID` = $cityid");
} else {
    echo 'Существуют товары с выбранным городом';
}
