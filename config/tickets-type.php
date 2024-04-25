<?php
require_once('connect.php');

$ticketsType = mysqli_query($ConnectDatabase, "SELECT * FROM `products_tickets_type`");
$ticketsType = mysqli_fetch_all($ticketsType, MYSQLI_ASSOC);
$ticketsCategory = mysqli_query($ConnectDatabase, "SELECT * FROM `products_tickets_category`");
$ticketsCategory = mysqli_fetch_all($ticketsCategory, MYSQLI_ASSOC);

function addTicketTypeListAdm($ticketsType)
{
    foreach ($ticketsType as $item) {
?>
        <option value="<?= $item['ID'] ?>"><?= $item['NAME'] ?></option>
    <?php
    }
}


function addTicketListAdm($ticketsType, $ticketsCategory)
{
    foreach ($ticketsType as $item) {
    ?>
        <h4><?= $item['NAME'] ?> <span class="del-ticket" onclick="delTiketsType(<?= $item['ID'] ?>)">Удалить</span></h4>
        <?php
        foreach ($ticketsCategory as $itemCat) {
            if ($item['ID'] == $itemCat['IDTYPE']) {
        ?>
                <p><strong><?= $itemCat['NAME'] ?></strong> - <span><?= $itemCat['PRICE'] ?> ₽</span> <span class="del-ticket" onclick="delTiketsCat(<?= $itemCat['ID'] ?>)">Удалить</span></p>
        <?php
            }
        }
        ?>
<?php
    }
}
