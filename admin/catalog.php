<?php
require_once('../config/product.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>В Музей</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/catalog.css">
</head>

<body>

    <?php
    $catalogPage = true;
    require_once('header.php')
    ?>

    <main>
        <div class="container">
            <div class="container-padding">

                <div class="title-country-block-line title-country-block-line-product-add">
                    <h2 class="block-heading-title heading-1">
                        <p class="block-heading-title-text">Товары</p>
                    </h2>
                </div>
                <a class="button-product-add" href="product-add.php">Добавить</a>

                <div class="main-catalog-block">

                    <?php
                    addProdListAdm($products, $photos, $ticketsType, $city);
                    ?>

                </div>

            </div>

        </div>


    </main>

</body>

<script src="../script/catalog.js"></script>

</html>