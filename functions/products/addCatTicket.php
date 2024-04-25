<?php
require_once('../../config/connect.php');

$prodid = $_POST['prodid'];
$typeticketid = $_POST['typeticketid'];
$nameTicket = $_POST['nameTicket'];
$priceTicket = $_POST['priceTicket'];

mysqli_query($ConnectDatabase, "INSERT INTO `products_tickets_category` (`ID`, `PRODID`, `IDTYPE`, `NAME`, `PRICE`) VALUES (NULL, '$prodid', '$typeticketid', '$nameTicket', '$priceTicket')");

$minprice = $priceTicket;

$categoryTicketMin = mysqli_query($ConnectDatabase, "SELECT * FROM `products_tickets_category` WHERE IDTYPE = '$typeticketid'");
$categoryTicketMin = mysqli_fetch_all($categoryTicketMin, MYSQLI_ASSOC);

foreach ($categoryTicketMin as $itemMin) {
    if ($minprice > $itemMin['PRICE']) {
        $minprice = $itemMin['PRICE'];
    }
}

mysqli_query($ConnectDatabase, "UPDATE `products_tickets_type` SET `MINPRICE` = '$minprice'  WHERE `products_tickets_type`.`ID` = $typeticketid");

require_once('../../config/tickets-type.php');
$typeTicket = mysqli_query($ConnectDatabase, "SELECT * FROM `products_tickets_type` WHERE PRODID = '$prodid'");
$typeTicket = mysqli_fetch_all($typeTicket, MYSQLI_ASSOC);
$categoryTicket = mysqli_query($ConnectDatabase, "SELECT * FROM `products_tickets_category` WHERE PRODID = '$prodid'");
$categoryTicket = mysqli_fetch_all($categoryTicket, MYSQLI_ASSOC);

?>

<div id="tickets-list" class="tickets-product-list">
    <?php
    addTicketListAdm($typeTicket, $ticketsCategory);
    ?>
</div>