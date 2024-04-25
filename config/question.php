<?php
require_once('connect.php');

$question = mysqli_query($ConnectDatabase, "SELECT * FROM `questions`");
$question = mysqli_fetch_all($question, MYSQLI_ASSOC);


function addQuestionListAdm($question)
{
    foreach ($question as $item) {

?>
        <tr>
            <td class="number-td"><?= $item['ID'] ?></td>
            <td class="question-td"><?= $item['QUESTION'] ?></td>
            <td class="visible-td"><?php if ($item['VISIBLE'] == 0) echo 'Нет';
                                    else echo 'Да' ?></td>
            <td class="info-td"><a href="question-item.php?questionid=<?= $item['ID'] ?>">Подробнее</a></td>
        </tr>

    <?php
    }
}


function addQuestionListUser($question)
{
    foreach ($question as $item) {
    ?>

        <div class="answer-content-item">
            <div class="question-item">
                <p><?= $item['QUESTION'] ?></p>
                <div class="vm-arrow faq-item__arrow">
                    <div class="vm-icon vm-arrow__img">
                        <svg width="11" height="7" viewBox="0 0 11 7" fill="none" xmlns="http://www.w3.org/2000/svg" class="vm-icon-svg inherit-fill-color inherit-stroke-color">
                            <path d="M1.202 2.235L4.788 6.42a.937.937 0 001.424 0l3.586-4.185A.938.938 0 009.087.688H1.913a.937.937 0 00-.711 1.547z" fill="#2E1AAE"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="answer-item"><?= nl2br($item['ANSWER']) ?></div>
        </div>
<?php
    }
}
