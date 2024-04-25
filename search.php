<?php
$search = $_GET['search'];
$catid = $_GET['catid'];
require_once('config/product.php')
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
                    <a class="catalog-link-item catalog-link-museum <?php if ($catid == 1) echo 'active-catalog-link' ?>" href="search.php?catid=1&search=<?= $search ?>">Музеи</a>
                    <a class="catalog-link-item catalog-link-event <?php if ($catid == 2) echo 'active-catalog-link' ?>" href="search.php?catid=2&search=<?= $search ?>">События</a>
                </div>

                <div class="title-country-block-line">
                    <h2 class="block-heading-title heading-1">
                        <p class="block-heading-title-text">
                            <?php
                            if ($catid == 1) echo 'Музеи';
                            elseif ($catid == 2) echo 'События';
                            ?>
                        </p>
                    </h2>


                </div>

                <div class="main-catalog-block">

                    <?php
                    addProdListUser($products, $photos, $ticketsType, $city, $catid);
                    ?>
                </div>

            </div>

        </div>


    </main>

</body>

<script src="script/search.js"></script>

</html>