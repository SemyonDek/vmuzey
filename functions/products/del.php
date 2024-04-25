<?php

require_once('../../config/connect.php');

$prodid = $_POST['prodid'];

$productPhoto = mysqli_query($ConnectDatabase, "SELECT * FROM `products_img` WHERE PRODID = '$prodid'");
$productPhoto = mysqli_fetch_all($productPhoto, MYSQLI_ASSOC);

foreach ($productPhoto as $item) {
    unlink('../../' . $item['SRC']);
}

mysqli_query($ConnectDatabase, "DELETE FROM products_img WHERE `products_img`.`PRODID` = $prodid");

mysqli_query($ConnectDatabase, "DELETE FROM `products_tickets_category` WHERE `products_tickets_category`.`PRODID` = $prodid");

mysqli_query($ConnectDatabase, "DELETE FROM `products_tickets_type` WHERE `products_tickets_type`.`PRODID` = $prodid");

mysqli_query($ConnectDatabase, "DELETE FROM `products` WHERE `products`.`ID` = $prodid");
