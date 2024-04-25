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
                    <p class="block-heading-title-text">Добавление города</p>
                </h2>


                <div class="city-block-add">

                    <form id="addCityForm" action="">
                        <div class="upd-block">
                            <h3 class="block-heading-title heading-2">
                                <p class="block-heading-title-text">Изображение</p>
                            </h3>
                            <div class="btn-img-block">
                                <input type="file" name="file_photo" id="file_photo">
                            </div>

                            <h3 class="block-heading-title heading-2">
                                <p class="block-heading-title-text">Название</p>
                            </h3>
                            <input class="name-input" type="text" name="namecity" id="namecity">

                            <div class="button-upd-block">
                                <input id="add-city-button" class="button-city-add-form" type="button" value="Добавить">
                                <br>
                                <a class="button-city-add-form" href="city-list.php">Назад</a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </main>

</body>

<script src="../script/city-add.js"></script>

</html>