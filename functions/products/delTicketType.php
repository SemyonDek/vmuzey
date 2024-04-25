<?php

require_once('../../config/connect.php');

$idType = $_POST['idType'];

$ticketitem = mysqli_query($ConnectDatabase, "SELECT * FROM `products_tickets_type` WHERE ID = '$idType'");
$ticketitem = mysqli_fetch_assoc($ticketitem);

$prodid = $ticketitem['PRODID'];

$categoryTicket = mysqli_query($ConnectDatabase, "SELECT * FROM `products_tickets_category` WHERE IDTYPE = '$idType'");
$categoryTicket = mysqli_fetch_assoc($categoryTicket);

$prov = '';

if (!isset($categoryTicket)) {
    mysqli_query($ConnectDatabase, "DELETE FROM products_tickets_type WHERE `products_tickets_type`.`ID` = $idType");
} else {
    $prov = 0;
}


require_once('../../config/tickets-type.php');
$typeTicket = mysqli_query($ConnectDatabase, "SELECT * FROM `products_tickets_type` WHERE PRODID = '$prodid'");
$typeTicket = mysqli_fetch_all($typeTicket, MYSQLI_ASSOC);
$categoryTicket = mysqli_query($ConnectDatabase, "SELECT * FROM `products_tickets_category` WHERE PRODID = '$prodid'");
$categoryTicket = mysqli_fetch_all($categoryTicket, MYSQLI_ASSOC);

?>

<p id="prov"><?= $prov ?></p>

<div id="tickets-list" class="tickets-product-list">
    <?php
    addTicketListAdm($typeTicket, $ticketsCategory);
    ?>
</div>

<select class="select-product-add" name="typeticketid" id="typeticketid">
    <option value=""></option>
    <?php
    addTicketTypeListAdm($typeTicket);
    ?>
</select>