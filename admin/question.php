<?php
require_once('../config/question.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>В Музей</title>
    <link rel="stylesheet" href="../css/question-list.css">
</head>

<body>

    <?php
    $questionPage = true;
    require_once('header.php')
    ?>

    <main>
        <div class="container">
            <div class="container-padding">
                <h2 class="block-heading-title heading-1">
                    <p class="block-heading-title-text">Вопросы</p>
                </h2>

                <div class="question-block">
                    <table>
                        <thead>
                            <tr>
                                <td class="number-td">№</td>
                                <td class="question-td">Вопрос</td>
                                <td class="visible-td">Видимость</td>
                                <td class="info-td">Информация</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            addQuestionListAdm($question);
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

</body>

</html>