<?php
require_once('../config/connect.php');

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
    <link rel="stylesheet" href="../css/question-list.css">
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
                    <form id="updOrderForm" action="">
                        <p>
                            <strong>Состояние: </strong>
                        </p>
                        <input type="hidden" name="idOrder" id="idOrder" value="<?= $orderItem['ID'] ?>">
                        <select name="statusOrder" id="statusOrder">
                            <option value="1" <?php if ($orderItem['STATUS'] == 1) echo 'selected' ?>>Не оплачено</option>
                            <option value="2" <?php if ($orderItem['STATUS'] == 2) echo 'selected' ?>>Оплачено</option>
                        </select>
                        <br>
                        <input class="upd-question" type="button" value="Изменить" onclick="updOrder()">
                    </form>
                    <a class="upd-question" href="orders.php">Назад</a>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </main>

</body>

<script>
    function updOrder() {
        let statusOrder = document.getElementById("statusOrder").value;
        let idOrder = document.getElementById("idOrder").value;

        let formData = new FormData();
        formData.append("statusOrder", statusOrder);
        formData.append("idOrder", idOrder);

        var url = "../functions/order/upd.php";

        let xhr = new XMLHttpRequest();
        xhr.responseType = "document";

        xhr.open("POST", url);
        xhr.send(formData);
        xhr.onload = () => {
            console.log(xhr.response);
            alert("Состояние изменено");
        };
    }
</script>

</html>