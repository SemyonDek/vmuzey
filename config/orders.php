<?php

require_once('connect.php');

$orders = mysqli_query($ConnectDatabase, "SELECT * FROM `orders`");
$orders = mysqli_fetch_all($orders, MYSQLI_ASSOC);


function addOrdersListAdm($orders)
{
    foreach ($orders as $item) {
?>
        <tr>
            <td class="number-td"><?= $item['ID'] ?></td>
            <td class="product-td"><?= $item['PRODNAME'] ?></td>
            <td class="sum-td"><?= $item['AMOUNTSUM'] ?> ₽</td>
            <td class="status-td"><?php
                                    if ($item['STATUS'] == 1) echo 'Не оплачено';
                                    elseif ($item['STATUS'] == 2) echo 'Оплачено';
                                    ?></td>
            <td class="info-td"><a href="order-item.php?orderid=<?= $item['ID'] ?>">Подробнее</a></td>
        </tr>
<?php
    }
}
