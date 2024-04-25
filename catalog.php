<?php
require_once('config/product.php');
$catid = $_GET['catid'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>В Музей</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/catalog.css">
</head>

<body>

    <?php
    require_once('header.php')
    ?>

    <main>
        <div class="container">
            <div class="container-padding">
                <div class="line-catalog-link">
                    <input id="catidcatid" type="hidden" value="<?= $catid ?>">
                    <a class="catalog-link-item catalog-link-museum <?php if ($catid == 1) echo 'active-catalog-link' ?>" href="catalog.php?catid=1">Музеи</a>
                    <a class="catalog-link-item catalog-link-event <?php if ($catid == 2) echo 'active-catalog-link' ?>" href="catalog.php?catid=2">События</a>
                </div>

                <div class="title-country-block-line">
                    <h2 class="block-heading-title heading-1">
                        <p class="block-heading-title-text">
                            <?php
                            if ($catid == 1) echo 'Музеи';
                            elseif ($catid == 2) echo 'События';
                            ?>
                        </p>
                        <p class="block-heading-title-sub-title"><?= $cityname ?></p>
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

                                <div id="menu-sort" class="vm-dropdown vm-select-custom__dropdown vm-select-custom__dropdown--right vm-select-custom__dropdown--bottom-position menu-filter-hidden">

                                    <div id="new-sort" class="vm-dropdown-item vm-select-dropdown-item">
                                        <input value="DESC" type="hidden">
                                        <p class="vm-select-custom__dropdown-option-default">Сначала новые</p>
                                    </div>

                                    <div id="old-sort" class="vm-dropdown-item vm-select-dropdown-item vm-dropdown-item_selected">
                                        <input value="ASC" type="hidden">
                                        <p class="vm-select-custom__dropdown-option-default">Сначала старые</p>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div id="main-catalog-block" class="main-catalog-block">

                    <?php
                    addProdListUser($products, $photos, $ticketsType, $city, $catid);
                    ?>

                </div>

            </div>

        </div>


    </main>

</body>

<script src="script/catalog.js"></script>

</html>