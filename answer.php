<?php
require_once('config/question.php');
$questionVisible = mysqli_query($ConnectDatabase, "SELECT * FROM `questions` WHERE VISIBLE = 1");
$questionVisible = mysqli_fetch_all($questionVisible, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>В Музей</title>
    <link rel="stylesheet" href="css/answer.css">
</head>

<body>

    <?php
    require_once('header.php')
    ?>

    <main>
        <div class="container">
            <div class="container-padding">

                <div class="answers-main-block">
                    <h1 class="heading-2">Часто задаваемые вопросы</h1>

                    <div class="answers-content-block">
                        <?php
                        addQuestionListUser($questionVisible);
                        ?>
                    </div>

                    <div class="button-add-question-block">
                        <button type="button" class="button-add-question" onclick="openModalQuestion()">Написать в чат поддержки</button>
                    </div>
                </div>


            </div>
        </div>
    </main>


    <div id="modal-add-question">
        <div class="top-line-modal-question">
            Задать вопрос
            <div class="close-modal-question-block" onclick="openModalQuestion()">
                <svg fill="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-icon cursor-pointer close-icon">
                    <path data-v-7c7a3ea8="" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z"></path>
                </svg>
            </div>
        </div>


        <div class="form-add-question-block">
            <div class="message-question-block">
                Режим работы службы поддержки <br> с 9 до 18 по Московскому времени.
                Вы можете задать свой вопрос ниже - мы скоро ответим на него!
            </div>

            <form action="" id="addQuestionForm">
                <textarea name="questionText" id="questionText" placeholder="Введите Ваш вопрос"></textarea>
                <input name="questionNumberUser" id="questionNumberUser" type="text" placeholder="Ваш мобильный телефон">
                <input name="questionMailUser" id="questionMailUser" type="text" placeholder="Ваш Email">
                <input name="questionNameUser" id="questionNameUser" type="text" placeholder="Как к вам можно обратиться?">
                <button id="addQuestionButton" type="button">Отправить</button>
            </form>
        </div>
    </div>

</body>

<script src="script/answer.js"></script>
<script src="script/question-add.js"></script>

</html>