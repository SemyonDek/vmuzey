<?php
require_once('../config/city.php');
require_once('../config/product-photo.php');
require_once('../config/tickets-type.php');

$prodid = $_GET['prodid'];
$productitem = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE ID = '$prodid'");
$productitem = mysqli_fetch_assoc($productitem);
$productPhoto = mysqli_query($ConnectDatabase, "SELECT * FROM `products_img` WHERE PRODID = '$prodid'");
$productPhoto = mysqli_fetch_all($productPhoto, MYSQLI_ASSOC);
$typeTicket = mysqli_query($ConnectDatabase, "SELECT * FROM `products_tickets_type` WHERE PRODID = '$prodid'");
$typeTicket = mysqli_fetch_all($typeTicket, MYSQLI_ASSOC);
$categoryTicket = mysqli_query($ConnectDatabase, "SELECT * FROM `products_tickets_category` WHERE PRODID = '$prodid'");
$categoryTicket = mysqli_fetch_all($categoryTicket, MYSQLI_ASSOC);
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

                <div class="product-upd-flex-block">

                    <div class="product-block-upd">
                        <h2 class="block-heading-title heading-1">
                            <p class="block-heading-title-text block-heading-title-text-product-add">Изменение товара</p>
                        </h2>
                        <form id="addProductForm" action="">'
                            <input type="hidden" name="prodid" id="prodid" value="<?= $productitem['ID'] ?>">
                            <div class="line-input-add-product">
                                <p>Категория:</p>
                                <select class="select-product-add" name="catid" id="catid">
                                    <option value=""></option>
                                    <option value="1" <?php if ($productitem['CATID'] == 1) echo 'selected' ?>>Музеи</option>
                                    <option value="2" <?php if ($productitem['CATID'] == 2) echo 'selected' ?>>События</option>
                                </select>
                            </div>
                            <div class="line-input-add-product">
                                <p>Название:</p>
                                <input class="name-input" type="text" name="nameprod" id="nameprod" value="<?= $productitem['NAME'] ?>">
                            </div>
                            <div class="line-input-add-product">
                                <p>Город:</p>
                                <select class="select-product-add" name="cityid" id="cityid">
                                    <option value=""></option>
                                    <?php
                                    $cityid = $productitem['CITYID'];
                                    addCitySelectAdm($city, $cityid);
                                    ?>
                                </select>
                            </div>
                            <div class="line-input-add-product">
                                <p>Адрес:</p>
                                <input class="name-input" type="text" name="addressprod" id="addressprod" value="<?= $productitem['ADDRESS'] ?>">
                            </div>
                            <div class="line-input-add-product">
                                <p>Режим работы:</p>
                                <input class="name-input" type="text" name="timeprod" id="timeprod" value="<?= $productitem['TIME'] ?>">
                            </div>
                            <div class="line-input-add-product">
                                <p>Номер телефона:</p>
                                <input class="name-input" type="text" name="numberprod" id="numberprod" value="<?= $productitem['NUMBER'] ?>">
                            </div>
                            <div class="line-input-add-product">
                                <p>Почта:</p>
                                <input class="name-input" type="text" name="mailprod" id="mailprod" value="<?= $productitem['MAIL'] ?>">
                            </div>
                            <div class="line-input-add-product">
                                <p>Сайт:</p>
                                <input class="name-input" type="text" name="siteprod" id="siteprod" value="<?= $productitem['SITE'] ?>">
                            </div>
                            <div class="line-input-add-product">
                                <p>Описание:</p>
                                <textarea class="textarea-product-add" name="description" id="description"><?= $productitem['TEXT'] ?></textarea>
                            </div>
                            <div class="line-input-add-product">
                                <input class="add-product" type="button" value="Изменить" onclick="updProd()">
                            </div>
                        </form>
                    </div>

                    <div class="left-block-add-prod">
                        <h2 class="block-heading-title heading-1">
                            <p class="block-heading-title-text block-heading-title-text-product-add">Добавить изображение</p>
                        </h2>
                        <form id="addPhotoForm" action="">
                            <div class="line-input-add-product">
                                <input type="file" name="file_photo" id="file_photo">
                                <input id="upd-photo-button" type="button" value="Добавить" onclick="addPhoto()">
                            </div>
                            <div id="PhotoBlock">
                                <?php
                                addProdPhotoAdmin($productPhoto);
                                ?>
                            </div>
                        </form>
                    </div>

                    <div class="bottom-add-price-product">
                        <h2 class="block-heading-title heading-1">
                            <p class="block-heading-title-text block-heading-title-text-product-add">Добавить билеты</p>
                        </h2>
                        <div class="add-tickets-main-block">
                            <div class="add-tickets-type-block">
                                <h3>Тип билета</h3>
                                <form id="addTicketsTypeForm" action="">
                                    <div class="line-input-add-product">
                                        <p>Название:</p>
                                        <input class="name-input" type="text" name="nameTicketType" id="nameTicketType" value="">
                                    </div>
                                    <div class="line-input-add-product">
                                        <input class="add-product" type="button" value="Добавить" onclick="addTypeTicketProd()">
                                    </div>
                                </form>
                            </div>
                            <div class="add-tickets-cat-block">
                                <h3>Категория билета</h3>
                                <form id="addTicketsCatForm" action="">
                                    <div class="line-input-add-product">
                                        <p>Тип:</p>
                                        <select class="select-product-add" name="typeticketid" id="typeticketid">
                                            <option value=""></option>
                                            <?php
                                            addTicketTypeListAdm($typeTicket);
                                            ?>
                                        </select>
                                    </div>
                                    <div class=" line-input-add-product">
                                        <p>Название:</p>
                                        <input class="name-input" type="text" name="nameTicket" id="nameTicket" value="">
                                    </div>
                                    <div class="line-input-add-product">
                                        <p>Цена:</p>
                                        <input class="name-input" type="number" name="priceTicket" id="priceTicket" value="">
                                    </div>
                                    <div class="line-input-add-product">
                                        <input class="add-product" type="button" value="Добавить" onclick="addCatTicketProd()">
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div id="tickets-list" class="tickets-product-list">
                            <?php
                            addTicketListAdm($typeTicket, $ticketsCategory);
                            ?>
                        </div>

                    </div>
                </div>

                <div class="line-input-add-product">
                    <input class="add-product" type="button" value="Удалить" onclick="delProd()">
                </div>
                <div class="line-input-add-product">
                    <a class="add-product" href="catalog.php">Назад</a>
                </div>
            </div>
        </div>
    </main>

</body>

<script src="../script/product-upd.js"></script>

</html>