<?php
require_once('../../config/connect.php');

session_start();


$cityidadd = $_POST['cityid'];

$_SESSION['CITYIDFILTER'] = $cityidadd;


require_once('../../config/product.php');
?>

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
                <a href="catalog.php?catid=2">показать все</a>
            </div>
        </div>

        <div class="main-catalog-block">

            <?php
            addProdListUser($products, $photos, $ticketsType, $city, 2);
            ?>

        </div>
    </div>
</div>