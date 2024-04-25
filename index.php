<?php
require_once('config/product.php');
require_once('config/city.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>В Музей</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>

    <?php
    $index = true;
    require_once('header.php');
    ?>

    <main>
        <div class="container">
            <div class="main-baner-block">
                <div class="left-main-baner-block">
                    <h1 class="online-banner-title">Онлайн покупка билетов в музеи</h1>

                    <div class="manual-site-block">

                        <div class="manual-site-item">
                            <div class="name-manual-site-item-block">
                                <p class="number-manual-site-item">1</p>
                                <p class="text-manual-site-item">Выберите музей и купите билет</p>
                            </div>

                            <div class="photo-manual-site-item-block">
                                <img src="img/main/online-banner-step1.f78a51a.svg" alt="">
                            </div>
                        </div>

                        <div class="manual-site-item">
                            <div class="name-manual-site-item-block">
                                <p class="number-manual-site-item">2</p>
                                <p class="text-manual-site-item">Получите билет на электронную почту</p>
                            </div>

                            <div class="photo-manual-site-item-block">
                                <img src="img/main/online-banner-step2.ee9dc55.svg" alt="">
                            </div>
                        </div>

                        <div class="manual-site-item">
                            <div class="name-manual-site-item-block">
                                <p class="number-manual-site-item">3</p>
                                <p class="text-manual-site-item">Покажите билет с QR-кодом на входе и проходите</p>
                            </div>

                            <div class="photo-manual-site-item-block">
                                <img src="img/main/online-banner-step3.672febc.svg" alt="">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="right-main-baner-block">

                    <a href="catalog.php?catid=1" class="tickets-baner-item">
                        <div class="online-banner-button__devider-wrp">
                            <div class="online-banner-button__devider"></div>
                        </div>

                        <div class="online-banner-button__background"></div>

                        <div class="online-banner-button__content" data-v-42c3bc98="">
                            <h2 class="online-banner-button__heading" data-v-42c3bc98="">Билеты</h2>
                            <div class="online-banner-button__action" data-v-42c3bc98="">
                                <p data-v-42c3bc98="">Купить</p>
                                <div class="vm-icon online-banner-button__action-icon" data-v-42c3bc98="">
                                    <svg width="6" height="9" viewBox="0 0 6 9" fill="none" xmlns="http://www.w3.org/2000/svg" class="vm-icon-svg inherit-fill-color inherit-stroke-color default-icon-size">
                                        <path d="M5.009 3.866l-.177.177.177-.177L1.905.763A.897.897 0 10.638 2.03L3.107 4.5.637 6.97a.897.897 0 001.268 1.267L5.01 5.134a.897.897 0 000-1.268z" fill="#2E1AAE" stroke="#2E1AAE" stroke-width=".5"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="catalog.php?catid=2" class="tickets-baner-item">
                        <div class="online-banner-button__devider-wrp">
                            <div class="online-banner-button__devider"></div>
                        </div>

                        <div class="online-banner-button__background"></div>

                        <div class="online-banner-button__content" data-v-42c3bc98="">
                            <h2 class="online-banner-button__heading" data-v-42c3bc98="">События</h2>
                            <div class="online-banner-button__action" data-v-42c3bc98="">
                                <p data-v-42c3bc98="">Посетить</p>
                                <div class="vm-icon online-banner-button__action-icon" data-v-42c3bc98="">
                                    <svg width="6" height="9" viewBox="0 0 6 9" fill="none" xmlns="http://www.w3.org/2000/svg" class="vm-icon-svg inherit-fill-color inherit-stroke-color default-icon-size">
                                        <path d="M5.009 3.866l-.177.177.177-.177L1.905.763A.897.897 0 10.638 2.03L3.107 4.5.637 6.97a.897.897 0 001.268 1.267L5.01 5.134a.897.897 0 000-1.268z" fill="#2E1AAE" stroke="#2E1AAE" stroke-width=".5"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>

                </div>
            </div>

            <div class="container-padding">
                <div class="title-country-block-line">
                    <h2 class="block-heading-title heading-1">
                        <p class="block-heading-title-text">Популярные направления</p>
                    </h2>

                </div>

                <div class="country-slider-block">
                    <input id="countpagesslider" type="hidden" value="<?= $cityCount ?>">

                    <div class="hidden-block">
                        <div id="slider" class="swipe-slider-block">

                            <div class="item-country <?php
                                                        if (isset($_SESSION['CITYIDFILTER'])) {
                                                            if ($_SESSION['CITYIDFILTER'] == '0') {
                                                                echo 'active-item-country';
                                                            }
                                                        } else {
                                                            echo 'active-item-country';
                                                        }
                                                        ?>">
                                <div class="item-country-block">
                                    <img class="city-img" src="img/country/city-default.de75f6d.svg">
                                    <p class="city-name">Все</p>
                                </div>
                                <input type="hidden" name="cityid" value="0">
                            </div>

                            <?php
                            addCityListUser($city, $_SESSION['CITYIDFILTER']);
                            ?>


                        </div>
                    </div>

                    <div class="button-slider-block">

                        <div id="right-button-slider" class="button-slider button-slider-right">
                            <div class="vm-arrow vm-arrow-button__arrow vm-arrow--right" data-v-616a64c9="" data-v-4d77d480="">
                                <div class="vm-icon vm-arrow__img">
                                    <svg width="11" height="7" viewBox="0 0 11 7" fill="none" xmlns="http://www.w3.org/2000/svg" class="vm-icon-svg inherit-fill-color inherit-stroke-color">
                                        <path d="M1.202 2.235L4.788 6.42a.937.937 0 001.424 0l3.586-4.185A.938.938 0 009.087.688H1.913a.937.937 0 00-.711 1.547z" fill="#2E1AAE"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div id="left-button-slider" class="button-slider button-slider-left button-slider-deactive">
                            <div class="vm-arrow vm-arrow-button__arrow vm-arrow--right" data-v-616a64c9="" data-v-4d77d480="">
                                <div class="vm-icon vm-arrow__img">
                                    <svg width="11" height="7" viewBox="0 0 11 7" fill="none" xmlns="http://www.w3.org/2000/svg" class="vm-icon-svg inherit-fill-color inherit-stroke-color">
                                        <path d="M1.202 2.235L4.788 6.42a.937.937 0 001.424 0l3.586-4.185A.938.938 0 009.087.688H1.913a.937.937 0 00-.711 1.547z" fill="#2E1AAE"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div id="indexcatalog-prod" class="index-products-block">
                <div class="catalog-index-block">
                    <div class="top-index-catalog-line">
                        <div class="top-index-catalog-line__left">
                            <h3 class="block-heading-title heading-2">
                                <p class="block-heading-title-text">Музеи</p>
                                <p class="block-heading-title-sub-title"><?= $cityname ?></p>
                            </h3>
                        </div>

                        <div class="top-index-catalog-line__right">
                            <a href="catalog.php?catid=1">показать все</a>
                        </div>
                    </div>

                    <div class="main-catalog-block">

                        <?php
                        addProdListUser($products, $photos, $ticketsType, $city, 1);
                        ?>

                    </div>
                </div>

                <div class="catalog-index-block">
                    <div class="top-index-catalog-line">
                        <div class="top-index-catalog-line__left">
                            <h3 class="block-heading-title heading-2">
                                <p class="block-heading-title-text">События</p>
                                <p class="block-heading-title-sub-title"><?= $cityname ?></p>
                            </h3>
                        </div>

                        <div class="top-index-catalog-line__right">
                            <a href="catalog.php?catid=1">показать все</a>
                        </div>
                    </div>

                    <div class="main-catalog-block">

                        <?php
                        addProdListUser($products, $photos, $ticketsType, $city, 2);
                        ?>

                    </div>
                </div>
            </div>

        </div>
    </main>

</body>

<script src="script/index.js"></script>

</html>