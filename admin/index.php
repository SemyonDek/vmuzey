<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>В Музей</title>
    <link rel="stylesheet" href="../css/index.css">
</head>

<body>

    <?php
    header('Location: catalog.php');
    $indexPage = true;
    require_once('header.php')
    ?>

    <main>
        <div class="container">

            <div class="container-padding">
                <div class="title-country-block-line">
                    <h2 class="block-heading-title heading-1">
                        <p class="block-heading-title-text">Города</p>
                    </h2>

                    <div class="block-heading-right">
                        <div class="where-go-filters">
                            <div class="vm-select-custom vm-select where-go-sort vm-select-custom--open">

                                <div id="sort-block" class="vm-select-custom__dropdown-toggle">

                                    <div id="arrow-sort" class="vm-arrow vm-select-custom__arrow">
                                        <div class="vm-icon vm-arrow__img">
                                            <svg width="11" height="7" viewBox="0 0 11 7" fill="none" xmlns="http://www.w3.org/2000/svg" class="vm-icon-svg inherit-fill-color inherit-stroke-color">
                                                <path d="M1.202 2.235L4.788 6.42a.937.937 0 001.424 0l3.586-4.185A.938.938 0 009.087.688H1.913a.937.937 0 00-.711 1.547z" fill="#2E1AAE"></path>
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="vm-select-custom__selected-option">

                                        <span class="vm-select-custom__selected-option-icon">
                                            <div class="vm-icon">
                                                <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="vm-icon-svg inherit-fill-color default-icon-size">
                                                    <path d="M7.75 7.375v4.375h-2.5V7.375L2.333 3h8.334L7.75 7.375zm4.375-5.625H.875V.5h11.25v1.25z" fill="#2E1AAE"></path>
                                                </svg>
                                            </div>
                                        </span>

                                        <span class="vm-select-custom__selected">
                                            <div class="vm-select-selected-option">
                                                <span id="name-sort" class="">Сначала старые</span>
                                            </div>
                                        </span>

                                    </div>
                                </div>

                                <div id="menu-sort" class="vm-dropdown vm-select-custom__dropdown vm-select-custom__dropdown--bottom-position menu-filter-hidden">

                                    <div id="min-price-sort" class="vm-dropdown-item vm-select-dropdown-item">
                                        <input value="min-price" type="hidden">
                                        <p class="vm-select-custom__dropdown-option-default">Сначала дешевые</p>
                                    </div>

                                    <div id="max-price-sort" class="vm-dropdown-item vm-select-dropdown-item">
                                        <input value="max-price" type="hidden">
                                        <p class="vm-select-custom__dropdown-option-default">Сначала дорогие</p>
                                    </div>

                                    <div id="new-sort" class="vm-dropdown-item vm-select-dropdown-item">
                                        <input value="new" type="hidden">
                                        <p class="vm-select-custom__dropdown-option-default">Сначала новые</p>
                                    </div>

                                    <div id="old-sort" class="vm-dropdown-item vm-select-dropdown-item vm-dropdown-item_selected">
                                        <input value="old" type="hidden">
                                        <p class="vm-select-custom__dropdown-option-default">Сначала старые</p>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="country-slider-block">
                    <input id="countpagesslider" type="hidden" value="2">

                    <div class="hidden-block">
                        <div id="slider" class="swipe-slider-block">

                            <div class="item-country active-item-country">
                                <div class="item-country-block">
                                    <img class="city-img" src="../img/country/city-default.de75f6d.svg">
                                    <p class="city-name">Все</p>
                                </div>
                            </div>

                            <div class="item-country">
                                <div class="item-country-block">
                                    <img class="city-img" src="../img/country/city-ptb.7eb95cf.svg">
                                    <p class="city-name">Санкт-Петербург</p>
                                </div>
                            </div>

                            <div class="item-country">
                                <div class="item-country-block">
                                    <img class="city-img" src="../img/country/city-msk.4e1ef93.svg">
                                    <p class="city-name">Москва</p>
                                </div>
                            </div>

                            <div class="item-country">
                                <div class="item-country-block">
                                    <img class="city-img" src="../img/country/city-crm.c36e28e.svg">
                                    <p class="city-name">Крым</p>
                                </div>
                            </div>

                            <div class="item-country">
                                <div class="item-country-block">
                                    <img class="city-img" src="../img/country/city-kzn.9f6d43d.svg">
                                    <p class="city-name">Казань</p>
                                </div>
                            </div>

                            <div class="item-country">
                                <div class="item-country-block">
                                    <img class="city-img" src="../img/country/city-vgd.305b5d9.svg">
                                    <p class="city-name">Волгоград</p>
                                </div>
                            </div>

                            <div class="item-country">
                                <div class="item-country-block">
                                    <img class="city-img" src="../img/country/city-yar.f850f89.svg">
                                    <p class="city-name">Ярославль</p>
                                </div>
                            </div>

                            <div class="item-country">
                                <div class="item-country-block">
                                    <img class="city-img" src="../img/country/city-vmr.b39e5c2.svg">
                                    <p class="city-name">Владимир</p>
                                </div>
                            </div>

                            <div class="item-country">
                                <div class="item-country-block">
                                    <img class="city-img" src="../img/country/city-kgd.a73501a.svg">
                                    <p class="city-name">Калининград</p>
                                </div>
                            </div>

                            <div class="item-country">
                                <div class="item-country-block">
                                    <img class="city-img" src="../img/country/city-nov.44898b3.svg">
                                    <p class="city-name">Великий Новгород</p>
                                </div>
                            </div>

                            <div class="item-country">
                                <div class="item-country-block">
                                    <img class="city-img" src="../img/country/city-nnov.4e566e4.svg">
                                    <p class="city-name">Нижний Новгород</p>
                                </div>
                            </div>

                            <div class="item-country">
                                <div class="item-country-block">
                                    <img class="city-img" src="../img/country/city-psc.8351e8f.svg">
                                    <p class="city-name">Псков</p>
                                </div>
                            </div>

                            <div class="item-country">
                                <div class="item-country-block">
                                    <img class="city-img" src="../img/country/city-tul.8ab1bec.svg">
                                    <p class="city-name">Тула</p>
                                </div>
                            </div>

                            <div class="item-country">
                                <div class="item-country-block">
                                    <img class="city-img" src="../img/country/city-rzn.37b441f.svg">
                                    <p class="city-name">Рязань</p>
                                </div>
                            </div>

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

            <div class="index-products-block">
                <div class="catalog-index-block">
                    <div class="top-index-catalog-line">
                        <div class="top-index-catalog-line__left">
                            <h3 class="block-heading-title heading-2">
                                <p class="block-heading-title-text">Музеи</p>
                                <p class="block-heading-title-sub-title">Рядом</p>
                            </h3>
                        </div>

                        <div class="top-index-catalog-line__right">
                            <!-- <a href="">показать все</a> -->
                        </div>
                    </div>

                    <div class="main-catalog-block">

                        <div class="catalog-item-block">
                            <div class="catalog-item-img-block">
                                <a href="product-upd.php">
                                    <img class="catalog-item-img" src="../img/products/0c9c3e595eb25832-w820-h440.jpg" alt="">
                                    <p class="catalog-item-price">
                                        <span class="catalog-item-price-value">от 500 ₽</span>
                                        <span class="catalog-item-price-buy">Изменить</span>
                                    </p>
                                </a>
                            </div>

                            <div class="catalog-item-content-block">
                                <a href="product-upd.php">
                                    Музей советских игровых автоматов
                                </a>
                                <div class="bottom-line-catalog-item">
                                    <div class="favorite-catalog-item">
                                        <div class="vm-icon vm-card-description-likes-icon">
                                            <svg width="36" height="34" viewBox="0 0 36 34" fill="none" xmlns="http://www.w3.org/2000/svg" class="vm-icon-svg default-icon-size">
                                                <path d="M18 33.666L2.68 18.346c-3.633-4.28-3.443-10.7.588-14.733A10.833 10.833 0 0118 3.066a10.834 10.834 0 0115.298 15.257L18 33.666z" fill="#EB3D00"></path>
                                            </svg>
                                        </div>
                                        <p class="count-favorite-catalog-item">17</p>
                                    </div>
                                    <p>11:00 - 21:00, Санкт-Петербург</p>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>

                <div class="catalog-index-block">
                    <div class="top-index-catalog-line">
                        <div class="top-index-catalog-line__left">
                            <h3 class="block-heading-title heading-2">
                                <p class="block-heading-title-text">События</p>
                                <p class="block-heading-title-sub-title">Рядом</p>
                            </h3>
                        </div>

                        <div class="top-index-catalog-line__right">
                        </div>
                    </div>

                    <div class="main-catalog-block">

                        <div class="catalog-item-block">
                            <div class="catalog-item-img-block">
                                <a href="product-upd.php">
                                    <img class="catalog-item-img" src="../img/products/0c9c3e595eb25832-w820-h440.jpg" alt="">
                                    <p class="catalog-item-price">
                                        <span class="catalog-item-price-value">от 500 ₽</span>
                                        <span class="catalog-item-price-buy">Изменить</span>
                                    </p>
                                </a>
                            </div>

                            <div class="catalog-item-content-block">
                                <a href="product-upd.php">
                                    Музей советских игровых автоматов
                                </a>
                                <div class="bottom-line-catalog-item">
                                    <div class="favorite-catalog-item">
                                        <div class="vm-icon vm-card-description-likes-icon">
                                            <svg width="36" height="34" viewBox="0 0 36 34" fill="none" xmlns="http://www.w3.org/2000/svg" class="vm-icon-svg default-icon-size">
                                                <path d="M18 33.666L2.68 18.346c-3.633-4.28-3.443-10.7.588-14.733A10.833 10.833 0 0118 3.066a10.834 10.834 0 0115.298 15.257L18 33.666z" fill="#EB3D00"></path>
                                            </svg>
                                        </div>
                                        <p class="count-favorite-catalog-item">17</p>
                                    </div>
                                    <p>11:00 - 21:00, Санкт-Петербург</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </main>

</body>

<script src="../script/index.js"></script>

</html>