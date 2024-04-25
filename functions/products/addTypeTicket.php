<?php
require_once('../../config/connect.php');

$prodid = $_POST['prodid'];
$nameTicketType = $_POST['nameTicketType'];

mysqli_query($ConnectDatabase, "INSERT INTO `products_tickets_type` (`ID`, `PRODID`, `NAME`, `MINPRICE`) VALUES (NULL, '$prodid', '$nameTicketType', '0')");

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

<select class="select-product-add" name="typeticketid" id="typeticketid">
    <option value=""></option>
    <?php
    foreach ($typeTicket as $item) {
    ?>
        <option value="<?= $item['ID'] ?>"><?= $item['NAME'] ?></option>
    <?php
    }
    ?>
</select>