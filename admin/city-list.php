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
    <link rel="stylesheet" href="../css/city-list.css">
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
                    <p class="block-heading-title-text">Города</p>
                </h2>

                <a class="button-city-add" href="city-add.php">Добавить</a>

                <div class="city-block">

                    <?php
                    addCityListAdm($city);
                    ?>

                </div>
            </div>
        </div>
    </main>

</body>

</html>