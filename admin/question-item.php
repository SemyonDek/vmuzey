<?php
require_once('../config/connect.php');

$questionid = $_GET['questionid'];
$questionItem = mysqli_query($ConnectDatabase, "SELECT * FROM `questions` WHERE ID = '$questionid'");
$questionItem = mysqli_fetch_assoc($questionItem);
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
                    <p class="block-heading-title-text">Вопрос</p>
                </h2>

                <div class="question-block">
                    <p>
                        <strong>Имя: </strong>
                        <span><?= $questionItem['NAME'] ?></span>
                    </p>
                    <p>
                        <strong>Номер телефона: </strong>
                        <span><?= $questionItem['PHONE'] ?></span>
                    </p>
                    <p>
                        <strong>Почта: </strong>
                        <span><?= $questionItem['EMAIL'] ?></span>
                    </p>
                    <p>
                        <strong>Вопрос: </strong>
                        <span><?= $questionItem['QUESTION'] ?></span>
                    </p>
                    <form id="addAnswerForm" action="">
                        <input id="idQuestion" name="idQuestion" type="hidden" value="<?= $questionItem['ID'] ?>">
                        <p>
                            <strong>Ответ: </strong>
                        </p>
                        <textarea name="answer" id="answer"><?= $questionItem['ANSWER'] ?></textarea>
                        <input class="upd-question" type="button" value="Ответить" onclick="addAnswer()">
                    </form>
                    <form id="updQuestionForm" action="">
                        <p>
                            <strong>Видимость: </strong>
                        </p>
                        <select name="visible" id="visible">
                            <option value="0" <?php if ($questionItem['VISIBLE'] == 0) echo 'selected' ?>>Нет</option>
                            <option value="1" <?php if ($questionItem['VISIBLE'] == 1) echo 'selected' ?>>Да</option>
                        </select>
                        <br>
                        <input class="upd-question" type="button" value="Изменить" onclick="updQuestion()">
                    </form>
                    <a class="upd-question" href="question.php">Назад</a>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </main>

</body>

<script src="../script/question-upd.js"></script>

</html>