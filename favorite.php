<?php
require_once('config/product.php');

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
    require_once('header.php');
    $userid =  $_SESSION['accountId'];
    $favorits = mysqli_query($ConnectDatabase, "SELECT * FROM `favorite` WHERE USERID = '$userid'");
    $favorits = mysqli_fetch_all($favorits, MYSQLI_ASSOC);
    ?>

    <main>
        <div class="container">
            <div class="container-padding">


                <div class="title-country-block-line">
                    <h2 class="block-heading-title heading-1">
                        <p class="block-heading-title-text">
                            Избранное
                        </p>
                    </h2>


                </div>

                <div class="main-catalog-block">

                    <?php
                    addProdListFavoriteUser($products, $photos, $ticketsType, $city, $favorits);
                    ?>

                </div>

            </div>

        </div>


    </main>

</body>

</html>