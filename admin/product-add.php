<?php
require_once('../config/city.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>В Музей</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/product-add.css">
</head>

<body>

    <?php
    $cityPage = true;
    require_once('header.php')
    ?>

    <main>
        <div class="container">
            <div class="container-padding">
                <h2 class="block-heading-title heading-1">
                    <p class="block-heading-title-text block-heading-title-text-product-add">Добавление товара</p>
                </h2>

                <div class="product-block-add">
                    <form id="addProductForm" action="">
                        <div class="line-input-add-product">
                            <p>Категория:</p>
                            <select class="select-product-add" name="catid" id="catid">
                                <option value=""></option>
                                <option value="1">Музеи</option>
                                <option value="2">События</option>
                            </select>
                        </div>
                        <div class="line-input-add-product">
                            <p>Название:</p>
                            <input class="name-input" type="text" name="nameprod" id="nameprod" value="">
                        </div>
                        <div class="line-input-add-product">
                            <p>Город:</p>
                            <select class="select-product-add" name="cityid" id="cityid">
                                <option value=""></option>
                                <?php
                                addCitySelectAdm($city);
                                ?>
                            </select>
                        </div>
                        <div class="line-input-add-product">
                            <p>Адрес:</p>
                            <input class="name-input" type="text" name="addressprod" id="addressprod" value="">
                        </div>
                        <div class="line-input-add-product">
                            <p>Режим работы:</p>
                            <input class="name-input" type="text" name="timeprod" id="timeprod" value="">
                        </div>
                        <div class="line-input-add-product">
                            <p>Номер телефона:</p>
                            <input class="name-input" type="text" name="numberprod" id="numberprod" value="">
                        </div>
                        <div class="line-input-add-product">
                            <p>Почта:</p>
                            <input class="name-input" type="text" name="mailprod" id="mailprod" value="">
                        </div>
                        <div class="line-input-add-product">
                            <p>Сайт:</p>
                            <input class="name-input" type="text" name="siteprod" id="siteprod" value="">
                        </div>
                        <div class="line-input-add-product">
                            <p>Описание:</p>
                            <textarea class="textarea-product-add" name="description" id="description"></textarea>
                        </div>
                        <div class="line-input-add-product">
                            <input class="add-product" type="button" value="Добавить" onclick="addProd()">
                        </div>
                        <div class="line-input-add-product">
                            <a class="add-product" href="catalog.php">Назад</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </main>

</body>

<script src="../script/product-add.js"></script>

</html>