<?php
require_once('../../config/connect.php');

$typeid = $_POST['typeid'];

$categoryTicket = mysqli_query($ConnectDatabase, "SELECT * FROM `products_tickets_category` WHERE IDTYPE = '$typeid'");
$categoryTicket = mysqli_fetch_all($categoryTicket, MYSQLI_ASSOC);

?>


<div id="category-tickets" class="category-tickets-block">
    <div class="sub-title-input-tickets-form">Категория билета</div>

    <input id="idtypeprod" name="idtypeprod" type="hidden" value="<?= $typeid ?>">

    <?php
    foreach ($categoryTicket as $item) {
    ?>
        <div class="category-tickets-item">
            <div class="name-category-tickets-block">
                <p class="name-category-tickets">
                    <?= $item['NAME'] ?>
                </p>
                <p class="price-category-tickets">
                    <?= $item['PRICE'] ?> ₽
                </p>
            </div>

            <div class="value-category-tickets-block">
                <button class="button-value-category" type="button" onclick="updValueTickets(-1, <?= $item['ID'] ?>)">
                    <div class="vm-icon">
                        <svg width="8" height="2" viewBox="0 0 8 2" fill="none" xmlns="http://www.w3.org/2000/svg" class="vm-icon-svg inherit-fill-color default-icon-size">
                            <path d="M7.316.25C7.694.25 8 .586 8 1s-.306.75-.684.75H.684C.306 1.75 0 1.414 0 1S.306.25.684.25h6.632z" fill="#BEBFD1"></path>
                        </svg>
                    </div>
                </button>

                <input class="value-tickets-input" type="hidden" name="valueTickets__<?= $item['ID'] ?>" id="valueTickets__<?= $item['ID'] ?>" value="0">
                <span class="value-category-tickets" id="value-tickets__<?= $item['ID'] ?>">0</span>

                <button class="button-value-category" type="button" onclick="updValueTickets(1, <?= $item['ID'] ?>)">
                    <div class="vm-icon">
                        <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg" class="vm-icon-svg inherit-fill-color default-icon-size">
                            <path d="M4.75 3.25h2.566c.378 0 .684.336.684.75s-.306.75-.684.75H4.75v2.566C4.75 7.694 4.414 8 4 8s-.75-.306-.75-.684V4.75H.684C.306 4.75 0 4.414 0 4s.306-.75.684-.75H3.25V.684C3.25.306 3.586 0 4 0s.75.306.75.684V3.25z" fill="#fff"></path>
                        </svg>
                    </div>
                </button>
            </div>
        </div>
    <?php

    }
    ?>




</div>