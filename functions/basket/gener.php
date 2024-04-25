<?php
session_start();

?>

<div id="selected-tickets-block" class="selected-tickets-block">
    <div class="name-selected-type-tickets"><?= $_SESSION['NAMETYPE'] ?></div>
    <?php
    foreach ($_SESSION['basket'] as $item) {
    ?>
        <div class="item-selected-category-tickets">
            <p class="name-selected-category"><?= $item['NAME'] ?></p>
            <p class="value-selected-category"><?= $item['VALUE'] ?> шт.</p>
        </div>
    <?php
    }
    ?>
</div>


<div id="amount-tickets" class="amount-buy-block">
    <div class="sidebar-museum-tickets-delimiter"></div>

    <div class="line-amount-tickets-block">
        <p class="name-line-amount">Стоимость</p>
        <p class="value-line-amount"><?= $_SESSION['basketSum'] ?> ₽</p>
    </div>

    <div class="line-amount-tickets-block">
        <p class="name-line-amount">Сервисны сбор</p>
        <p class="value-line-amount"><?= $_SESSION['service'] ?> ₽</p>
    </div>

    <div class="line-amount-tickets-block">
        <p class="name-line-amount">К оплате</p>
        <p class="value-line-amount"><strong><?= $_SESSION['amountSum'] ?> ₽</strong></p>
    </div>
</div>