<?php
require_once('config/connect.php');

$orderid = $_GET['orderid'];
$orderItem = mysqli_query($ConnectDatabase, "SELECT * FROM `orders` WHERE ID = '$orderid'");
$orderItem = mysqli_fetch_assoc($orderItem);
$orderItemsList = mysqli_query($ConnectDatabase, "SELECT * FROM `order_item` WHERE IDORDER = '$orderid'");
$orderItemsList = mysqli_fetch_all($orderItemsList, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>В Музей</title>
    <link rel="stylesheet" href="css/question-list.css">
</head>

<body>

    <?php
    $questionPage = true;
    require_once('header.php')
    ?>

    <main>
        <div class="container">
            <div class="container-padding">
                <h2 class="block-heading-title heading-1">
                    <p class="block-heading-title-text">Заказ №<?= $orderItem['ID'] ?></p>
                </h2>

                <div class="question-block">
                    <p>
                        <strong>Товар: </strong>
                        <span><?= $orderItem['PRODNAME'] ?></span>
                    </p>
                    <p>
                        <strong>Тип билета: </strong>
                        <span><?= $orderItem['TICKETTYPE'] ?></span>
                    </p>
                    <p>
                        <strong>Билеты: </strong>
                        <span>
                            <?php
                            foreach ($orderItemsList as $item) {
                                $name = $item['NAME'];
                                $value = $item['VALUE'];
                                echo "$name  $value шт. <br>";
                            }
                            ?>
                        </span>
                    </p>
                    <p>
                        <strong>Стоимость: </strong>
                        <span><?= $orderItem['SUM'] ?> ₽</span>
                    </p>
                    <p>
                        <strong>Сервисный сбор: </strong>
                        <span><?= $orderItem['SERVICE'] ?> ₽</span>
                    </p>
                    <p>
                        <strong>Сумма: </strong>
                        <span><?= $orderItem['AMOUNTSUM'] ?> ₽</span>
                    </p>
                    <br>
                    <p>
                        <strong>Фамилия: </strong>
                        <span><?= $orderItem['SURNAMEUSER'] ?></span>
                    </p>
                    <p>
                        <strong>Имя: </strong>
                        <span><?= $orderItem['NAMEUSER'] ?></span>
                    </p>
                    <p>
                        <strong>Номер телефона: </strong>
                        <span><?= $orderItem['NUMBER'] ?></span>
                    </p>
                    <p>
                        <strong>Почта: </strong>
                        <span><?= $orderItem['EMAIL'] ?></span>
                    </p>
                    <p>
                        <strong>Состояние: </strong>
                        <span><?php if ($orderItem['STATUS'] == 1) echo 'Не оплачено' ?><?php if ($orderItem['STATUS'] == 2) echo 'Оплачено' ?></span>
                    </p>
                    <a class="upd-question" href="account.php">Назад</a>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </main>

</body>


</html>