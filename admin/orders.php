<?php
require_once('../config/orders.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>В Музей</title>
    <link rel="stylesheet" href="../css/orders.css">
</head>

<body>

    <?php
    $ordersPage = true;
    require_once('header.php')
    ?>

    <main>
        <div class="container">
            <div class="container-padding">
                <h2 class="block-heading-title heading-1">
                    <p class="block-heading-title-text">Заказы</p>
                </h2>

                <div class="orders-block">

                    <table id="orders-table">
                        <thead>
                            <tr>
                                <td class="number-td">№</td>
                                <td class="product-td">Товар</td>
                                <td class="sum-td">Сумма</td>
                                <td class="status-td">Состояние</td>
                                <td class="info-td">Информация</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            addOrdersListAdm($orders);
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </main>

</body>

</html>