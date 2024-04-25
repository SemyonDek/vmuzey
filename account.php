<?php
require_once('config/connect.php');
require_once('config/orders.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>В Музей</title>
    <link rel="stylesheet" href="css/product-add.css">
    <link rel="stylesheet" href="css/orders.css">
    <link rel="stylesheet" href="css/account.css">
</head>

<body>

    <?php
    $accountPage = true;
    require_once('header.php');
    $accountid = $_SESSION["accountId"];
    $usersData = mysqli_query($ConnectDatabase, "SELECT * FROM `users` WHERE ID = '$accountid'");
    $usersData = mysqli_fetch_assoc($usersData);
    $ordersUser = mysqli_query($ConnectDatabase, "SELECT * FROM `orders` WHERE IDUSER = '$accountid'");
    $ordersUser = mysqli_fetch_all($ordersUser, MYSQLI_ASSOC);
    ?>

    <main>
        <div class="container">
            <div class="container-padding">
                <br>
                <h1 class="heading-1">Аккаунт</h1>
                <div class="info-user-block">
                    <h1 class="heading-2">Мои данные</h1>
                    <form id="updUserForm" action="">
                        <div class="line-input-add-product">
                            <p>Фамилия:</p>
                            <input class="name-input" type="text" name="nameUser" id="nameUser" value="<?= $usersData['NAME'] ?>">
                        </div>
                        <div class="line-input-add-product">
                            <p>Имя:</p>
                            <input class="name-input" type="text" name="surnameUser" id="surnameUser" value="<?= $usersData['SURNAME'] ?>">
                        </div>
                        <div class="line-input-add-product">
                            <p>Почта:</p>
                            <input class="name-input" type="text" name="mailUser" id="mailUser" value="<?= $usersData['EMAIL'] ?>">
                        </div>
                        <div class="line-input-add-product">
                            <p>Телефона:</p>
                            <input class="name-input" type="text" name="numberUser" id="numberUser" value="<?= $usersData['NUMBER'] ?>">
                        </div>
                        <div class="line-input-add-product">
                            <input class="add-product" type="button" value="Изменить" onclick="updInfo()">
                        </div>
                    </form>
                </div>
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
                            addOrdersListAdm($ordersUser);
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </main>


</body>

<script>
    function updInfo() {
        let form = document.getElementById("updUserForm");
        const {
            elements
        } = form;

        const data = Array.from(elements)
            .filter((item) => !!item.name)
            .map((element) => {
                const {
                    name,
                    value
                } = element;

                return {
                    name,
                    value,
                };
            });

        style_input_red = "border-color: #f23d00;";
        style_input_gray = "border-color: #e6e6eb;";

        prov = true;

        data.forEach((element) => {
            if (element["value"] == "") {
                prov = false;
                document.getElementById(element["name"]).style = style_input_red;
            } else {
                document.getElementById(element["name"]).style = style_input_gray;
            }
        });

        if (!prov) return;

        let formData = new FormData(form);

        var url = "functions/account/upd.php";

        let xhr = new XMLHttpRequest();

        xhr.responseType = "document";

        xhr.open("POST", url);
        xhr.send(formData);
        xhr.onload = () => {
            alert("Данные изменены");
        };
    }
</script>

</html>