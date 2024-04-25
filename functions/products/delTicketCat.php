<?php

require_once('../../config/connect.php');

$idCat = $_POST['idCat'];

$ticketitem = mysqli_query($ConnectDatabase, "SELECT * FROM `products_tickets_category` WHERE ID = '$idCat'");
$ticketitem = mysqli_fetch_assoc($ticketitem);

$prodid = $ticketitem['PRODID'];

mysqli_query($ConnectDatabase, "DELETE FROM products_tickets_category WHERE `products_tickets_category`.`ID` = $idCat");


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