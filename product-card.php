<?php
require_once('config/connect.php');
require_once('functions/basket/clear.php');

$prodid = $_GET['prodid'];
$productitem = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE ID = '$prodid'");
$productitem = mysqli_fetch_assoc($productitem);
$productPhoto = mysqli_query($ConnectDatabase, "SELECT * FROM `products_img` WHERE PRODID = '$prodid'");
$productPhoto = mysqli_fetch_all($productPhoto, MYSQLI_ASSOC);
$typeTicket = mysqli_query($ConnectDatabase, "SELECT * FROM `products_tickets_type` WHERE PRODID = '$prodid'");
$typeTicket = mysqli_fetch_all($typeTicket, MYSQLI_ASSOC);
$categoryTicket = mysqli_query($ConnectDatabase, "SELECT * FROM `products_tickets_category` WHERE PRODID = '$prodid'");
$categoryTicket = mysqli_fetch_all($categoryTicket, MYSQLI_ASSOC);

$countPhoto = count($productPhoto);
$cityid = $productitem['CITYID'];

$cityProd = mysqli_query($ConnectDatabase, "SELECT * FROM `city` WHERE ID = '$cityid'");
$cityProd = mysqli_fetch_assoc($cityProd);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>В Музей</title>
    <link rel="stylesheet" href="css/product-card.css">
</head>

<body>

    <?php
    require_once('header.php')
    ?>

    <main>
        <div class="container">
            <div class="container-padding">
                <div class="product-img-block-padding">
                    <div class="product-img-block">
                        <input id="countpagesslider" type="hidden" value="<?= $countPhoto ?>">
                        <input id="prodidprod" type="hidden" value="<?= $prodid ?>">


                        <div id="slider" class="swipe-product-img-block">
                            <?php
                            foreach ($productPhoto as $itemPhoto) {
                            ?>
                                <div class="product-img-item-block">
                                    <img src="<?= $itemPhoto['SRC'] ?>" alt="">
                                </div>
                            <?php
                            }
                            ?>
                        </div>

                        <div class="button-product-img-block">
                            <div id="left-button-slider" class="button-product-img-item">
                                <div class="vm-icon vm-gallery-controls-button-arrow-icon vm-gallery-controls-button-arrow-icon_left">
                                    <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="vm-icon-svg inherit-fill-color default-icon-size">
                                        <path d="M5.783 11.25l5.821 5.822a1.25 1.25 0 01-1.767 1.767L.998 10l8.839-8.838a1.25 1.25 0 011.767 1.767L5.784 8.75h13.964a1.25 1.25 0 110 2.5H5.783z" fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                            <div id="right-button-slider" class="button-product-img-item button-product-img-item-active">
                                <div class="vm-icon vm-gallery-controls-button-arrow-icon vm-gallery-controls-button-arrow-icon_right">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="vm-icon-svg inherit-fill-color default-icon-size">
                                        <path d="M15.215 8.75L9.394 2.93A1.25 1.25 0 1111.16 1.16L20 10.001l-8.839 8.838a1.25 1.25 0 01-1.767-1.768l5.821-5.82H1.25a1.25 1.25 0 010-2.5h13.965z" fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-info-block">
                    <div class="left-product-info-block">
                        <div class="title-product-line">
                            <div class="title-name-block">
                                <h1 class="heading-1"><?= $productitem['NAME'] ?></h1>
                            </div>

                            <?php
                            if (isset($_SESSION["accountId"])) {
                                $iduserid = $_SESSION["accountId"];
                                $favoriteProd = mysqli_query($ConnectDatabase, "SELECT * FROM `favorite` WHERE PRODID = '$prodid' AND USERID = '$iduserid' ");
                                $favoriteProd = mysqli_fetch_assoc($favoriteProd);
                            ?>
                                <div class="heart-favorite-block">
                                    <div id="favorite-button" class="vm-icon like-big-icon">
                                        <svg width="36" height="34" viewBox="0 0 36 34" fill="none" xmlns="http://www.w3.org/2000/svg" class="vm-icon-svg default-icon-size">
                                            <?php
                                            if (isset($favoriteProd)) {
                                            ?>
                                                <path id="empty-heart-favorite" class="display-none" d="M18 33.667L2.68 18.347c-3.633-4.28-3.443-10.7.588-14.733A10.833 10.833 0 0118 3.067a10.833 10.833 0 0115.298 15.257L18 33.667zm12.77-17.515A7.5 7.5 0 0020.178 5.591L18 7.47l-2.178-1.88A7.5 7.5 0 005.23 16.152l.19.22L18 28.954l12.58-12.582.19-.22z" fill="#131330"></path>
                                                <path id="full-heart-favorite" class="" d="M18 33.666L2.68 18.346c-3.633-4.28-3.443-10.7.588-14.733A10.833 10.833 0 0118 3.066a10.834 10.834 0 0115.298 15.257L18 33.666z" fill="#EB3D00"></path>
                                            <?php
                                            } else {
                                            ?>
                                                <path id="empty-heart-favorite" class="" d="M18 33.667L2.68 18.347c-3.633-4.28-3.443-10.7.588-14.733A10.833 10.833 0 0118 3.067a10.833 10.833 0 0115.298 15.257L18 33.667zm12.77-17.515A7.5 7.5 0 0020.178 5.591L18 7.47l-2.178-1.88A7.5 7.5 0 005.23 16.152l.19.22L18 28.954l12.58-12.582.19-.22z" fill="#131330"></path>
                                                <path id="full-heart-favorite" class="display-none" d="M18 33.666L2.68 18.346c-3.633-4.28-3.443-10.7.588-14.733A10.833 10.833 0 0118 3.066a10.834 10.834 0 0115.298 15.257L18 33.666z" fill="#EB3D00"></path>
                                            <?php
                                            }
                                            ?>
                                        </svg>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>

                        </div>

                        <div class="basic-information-block">
                            <div class="basic-information-item">
                                <div class="icon-text-link-icon">
                                    <div class="vm-icon">
                                        <svg width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg" class="vm-icon-svg inherit-fill-color default-icon-size">
                                            <path d="M13.303 13.47L8 18.774 2.697 13.47a7.5 7.5 0 1110.606 0zM8 9.834A1.667 1.667 0 108 6.5a1.667 1.667 0 000 3.334z" fill="#131330"></path>
                                        </svg>
                                    </div>
                                </div>
                                <p>
                                    <strong><?= $cityProd['NAME'] ?>, </strong>
                                    <span><?= $productitem['ADDRESS'] ?></span>
                                </p>
                            </div>

                            <div class="basic-information-item">
                                <div class="icon-text-link-icon">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg" class="vm-icon-svg inherit-fill-color default-icon-size">
                                        <path d="M9 17.333A8.333 8.333 0 119 .667a8.333 8.333 0 110 16.666zM9.833 9V4.833H8.167v5.834h5V9H9.833z" fill="#2E1AAE"></path>
                                    </svg>
                                </div>
                                <p>
                                    <strong>Режим работы: </strong>
                                    <span><?= $productitem['TIME'] ?></span>
                                </p>
                            </div>
                        </div>

                        <div class="description-block"><?= nl2br($productitem['TEXT']) ?></div>

                        <div class="contacts-block">
                            <div class="contacts-title-block">
                                <h2 class="heading-2">Контакты</h2>
                            </div>

                            <div class="contacts-item-block">
                                <div class="contacts-item-title-block">
                                    <h4 class="contacts-block-subtitle">Адрес</h4>
                                </div>
                                <p>
                                    <strong><?= $cityProd['NAME'] ?>, </strong>
                                    <span><?= $productitem['ADDRESS'] ?></span>
                                </p>
                            </div>

                            <div class="contacts-item-block">
                                <div class="contacts-item-title-block">
                                    <h4 class="contacts-block-subtitle"><?= $productitem['NAME'] ?></h4>
                                </div>
                                <div class="contacs-items-info-block">

                                    <div class="contacs-item-info-block">
                                        <div class="icon-text-link-icon">
                                            <div class="vm-icon">
                                                <svg width="12" height="19" viewBox="0 0 12 19" fill="none" xmlns="http://www.w3.org/2000/svg" class="vm-icon-svg inherit-fill-color default-icon-size">
                                                    <path d="M1.833 1.667H11a.833.833 0 01.833.833v15a.833.833 0 01-.833.833H1a.834.834 0 01-.833-.833V0h1.666v1.667zm0 1.666V7.5h8.334V3.333H1.833z" fill="#2E1AAE"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <p><?= $productitem['NUMBER'] ?></p>
                                    </div>

                                    <div class="contacs-item-info-block">
                                        <div class="icon-text-link-icon">
                                            <div class="vm-icon">
                                                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="vm-icon-svg inherit-fill-color default-icon-size">
                                                    <path d="M1.5.5h15a.833.833 0 01.833.833v13.334a.834.834 0 01-.833.833h-15a.833.833 0 01-.833-.833V1.333A.833.833 0 011.5.5zm7.55 7.236L3.707 3.198l-1.08 1.27 6.434 5.463 6.317-5.467-1.09-1.26-5.237 4.532H9.05z" fill="#2E1AAE"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <p><?= $productitem['MAIL'] ?></p>
                                    </div>

                                    <div class="contacs-item-info-block">
                                        <div class="icon-text-link-icon">
                                            <div class="vm-icon">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg" class="vm-icon-svg inherit-fill-color default-icon-size">
                                                    <path d="M8.674 17.333C3.992 17.333.196 13.603.196 9 .196 4.398 3.992.667 8.674.667c4.683 0 8.48 3.73 8.48 8.333 0 4.602-3.797 8.333-8.48 8.333zM6.733 15.39a14.712 14.712 0 01-1.427-5.556H1.944A6.618 6.618 0 003.5 13.31a6.8 6.8 0 003.233 2.08zm.271-5.556a13.094 13.094 0 001.67 5.627 13.086 13.086 0 001.67-5.627h-3.34zm8.4 0h-3.36a14.712 14.712 0 01-1.428 5.556 6.8 6.8 0 003.233-2.08 6.619 6.619 0 001.556-3.476zM1.945 8.167h3.362c.106-1.925.59-3.812 1.427-5.556A6.8 6.8 0 003.5 4.69a6.618 6.618 0 00-1.556 3.476zm5.061 0h3.339a13.086 13.086 0 00-1.67-5.627 13.086 13.086 0 00-1.67 5.627h.001zm3.611-5.556a14.712 14.712 0 011.427 5.556h3.362a6.619 6.619 0 00-1.556-3.477 6.8 6.8 0 00-3.233-2.08z" fill="#2E1AAE"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <p><?= $productitem['SITE'] ?></p>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="right-product-info-block">

                        <div class="main-buy-block">



                            <div id="buy-item-block" class="buy-item-block tickets-main-block">
                                <div class="title-buy-item-block">Билеты</div>
                                <div class="buy-item-content-block">
                                    <?php
                                    if (!isset($_SESSION["accountId"])) {
                                    ?>
                                        <p class="sidebar-museum-empty-message">
                                            Для покупки билетов авторизуйтесь.
                                            <br>
                                        </p>
                                    <?php
                                    } else {
                                    ?>

                                        <form id="ticketsForm" action="">

                                            <input id="prodid" name="prodid" type="hidden" value="1">
                                            <div class="sub-title-input-tickets-form">Тип билета</div>

                                            <div class="type-tickets-input-block">

                                                <div id="type-tickets-block" class="type-tickets-input-button-block">
                                                    <div id="arrow-type-tickets" class="vm-arrow vm-select-custom__arrow">
                                                        <div class="vm-icon vm-arrow__img">
                                                            <svg width="11" height="7" viewBox="0 0 11 7" fill="none" xmlns="http://www.w3.org/2000/svg" class="vm-icon-svg inherit-fill-color inherit-stroke-color">
                                                                <path d="M1.202 2.235L4.788 6.42a.937.937 0 001.424 0l3.586-4.185A.938.938 0 009.087.688H1.913a.937.937 0 00-.711 1.547z" fill="#2E1AAE"></path>
                                                            </svg>
                                                        </div>
                                                    </div>

                                                    <div class="vm-select-custom__selected-option">
                                                        <span class="vm-select-custom__selected">
                                                            <div id="main-type-info" class="select-ticket-option select-ticket-option_selected-option">
                                                                <div class="vm-select-custom__placeholder">Выберите</div>
                                                            </div>
                                                        </span>
                                                    </div>

                                                </div>

                                                <div id="menu-type-tickets" class="vm-dropdown vm-select-custom__dropdown vm-select-custom__dropdown--bottom-position menu-filter-hidden">
                                                    <?php
                                                    foreach ($typeTicket as $itemType) {
                                                    ?>
                                                        <div class="select-menu-ticket-option">
                                                            <input type="hidden" value="<?= $itemType['ID'] ?>">

                                                            <div class="select-ticket-option-main">
                                                                <p class="select-ticket-option-title"><?= $itemType['NAME'] ?></p>
                                                            </div>
                                                            <div class="select-ticket-option-description">
                                                                <p>от <?= $itemType['MINPRICE'] ?> ₽</p>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>

                                            </div>

                                            <div id="category-tickets" class="category-tickets-block">

                                            </div>
                                            <div class="button-buy-block">
                                                <button class="button-buy-button" type="button" onclick="continueBuy()">Продолжить покупку</button>
                                            </div>
                                        <?php
                                    }
                                        ?>

                                        </form>
                                </div>
                            </div>

                            <div id="order-item-block" class="display-none">
                                <div class="title-buy-item-block">
                                    Покупка
                                    <div class="button-back-buy" onclick="backBuy()">
                                        <div class="vm-icon">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="vm-icon-svg default-icon-size">
                                                <path d="M3.828 7H16v2H3.828l5.364 5.364-1.414 1.414L0 8 7.778.222l1.414 1.414L3.828 7z" fill="#3D3A5B"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <div class="buy-item-content-block">
                                    <form id="orderForm" action="">
                                        <div class="sub-title-input-tickets-form">Выбранные билеты</div>
                                        <div id="selected-tickets-block" class="selected-tickets-block">
                                        </div>
                                        <?php
                                        if (isset($_SESSION["accountId"])) {
                                            $accountid = $_SESSION["accountId"];
                                            $usersData = mysqli_query($ConnectDatabase, "SELECT * FROM `users` WHERE ID = '$accountid'");
                                            $usersData = mysqli_fetch_assoc($usersData);
                                        }

                                        ?>
                                        <div class="input-order-block">
                                            <label for="surnameClient" class="line-input-order-item">
                                                <div class="name-input-order">
                                                    <p>Фамилия</p>
                                                </div>
                                                <div class="input-order-item-block">
                                                    <input id="surnameClient" name="surnameClient" value="<?php if (isset($_SESSION["accountId"])) echo $usersData['NAME'] ?>" placeholder="Фамилия" class="input-order-item-input" type="text">
                                                </div>
                                            </label>
                                            <label for="nameClient" class="line-input-order-item">
                                                <div class="name-input-order">
                                                    <p>Имя</p>
                                                </div>
                                                <div class="input-order-item-block">
                                                    <input id="nameClient" name="nameClient" value="<?php if (isset($_SESSION["accountId"])) echo $usersData['SURNAME'] ?>" placeholder="Имя" class="input-order-item-input" type="text">
                                                </div>
                                            </label>
                                            <label for="mailClient" class="line-input-order-item">
                                                <div class="name-input-order">
                                                    <p>Почта</p>
                                                </div>
                                                <div class="input-order-item-block">
                                                    <input id="mailClient" name="mailClient" value="<?php if (isset($_SESSION["accountId"])) echo $usersData['EMAIL'] ?>" placeholder="Почта" class="input-order-item-input" type="text">
                                                </div>
                                            </label>
                                            <label for="numberClient" class="line-input-order-item">
                                                <div class="name-input-order">
                                                    <p>Телефон</p>
                                                </div>
                                                <div class="input-order-item-block">
                                                    <input id="numberClient" name="numberClient" value="<?php if (isset($_SESSION["accountId"])) echo $usersData['NUMBER'] ?>" placeholder="Телефон" class="input-order-item-input" type="text">
                                                </div>
                                            </label>
                                        </div>

                                        <div id="amount-tickets" class="amount-buy-block">
                                            <div class="sidebar-museum-tickets-delimiter"></div>

                                            <div class="line-amount-tickets-block">
                                                <p class="name-line-amount">Стоимость</p>
                                                <p class="value-line-amount">0 ₽</p>
                                            </div>

                                            <div class="line-amount-tickets-block">
                                                <p class="name-line-amount">Сервисны сбор</p>
                                                <p class="value-line-amount">0 ₽</p>
                                            </div>

                                            <div class="line-amount-tickets-block">
                                                <p class="name-line-amount">К оплате</p>
                                                <p class="value-line-amount"><strong>0 ₽</strong></p>
                                            </div>
                                        </div>

                                        <div class="button-buy-block">
                                            <button class="button-buy-button" type="button" onclick="addOrder()">Оформить</button>
                                        </div>

                                    </form>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </main>

</body>

<script src="script/product-card.js"></script>


<script>
    function addOrder() {
        let form = document.getElementById("orderForm");
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

        var url = "functions/order/add.php";

        let xhr = new XMLHttpRequest();

        xhr.responseType = "document";

        xhr.open("POST", url);
        xhr.send(formData);
        xhr.onload = () => {
            console.log(xhr.response);
            alert("Заказ оформлен");
            window.location.replace("index.php");
        };
    }
</script>

</html>