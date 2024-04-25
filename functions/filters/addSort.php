<?php

require_once('../../config/connect.php');

$sorting = $_POST['sort'];
$catid = $_POST['catid'];

require_once('../../config/product.php');
?>



<div id="main-catalog-block" class="main-catalog-block">

    <?php
    addProdListUser($products, $photos, $ticketsType, $city, $catid);
    ?>
</div>