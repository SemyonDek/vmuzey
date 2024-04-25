<?php
require_once('../config/connect.php');

$cityid = $_GET['cityid'];
$cityitem = mysqli_query($ConnectDatabase, "SELECT * FROM `city` WHERE ID = '$cityid'");
$cityitem = mysqli_fetch_assoc($cityitem);
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
                    <p class="block-heading-title-text">Измененеи города</p>
                </h2>


                <div class="city-block-add">

                    <div class="upd-block">
                        <h3 class="block-heading-title heading-2">
                            <p class="block-heading-title-text">Изображение</p>
                        </h3>
                        <div id="mainPhotoCat" class="block-img">
                            <img src="../<?= $cityitem['SRC'] ?>" alt="">
                        </div>
                        <div class="btn-img-block">
                            <form id="PhotoCityForm" action="">
                                <input type="file" name="file_photo" id="file_photo">
                                <input id="upd-photo-button" type="button" value="Изменить">
                            </form>
                        </div>

                        <form id="addCityForm" action="">
                            <input type="hidden" name="cityid" id="cityid" value="<?= $cityid ?>">
                            <h3 class="block-heading-title heading-2">
                                <p class="block-heading-title-text">Название</p>
                            </h3>
                            <input class="name-input" type="text" name="namecity" id="namecity" value="<?= $cityitem['NAME'] ?>">
                        </form>

                        <div class="button-upd-block">
                            <input id="upd-city-button" class="button-city-add-form" type="button" value="Изменить">
                            <br>
                            <input id="del-city-button" class="button-city-add-form" type="button" value="Удалить">
                            <br>
                            <a class="button-city-add-form" href="city-list.php">Назад</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

</body>

<script src="../script/city-upd.js"></script>

</html>