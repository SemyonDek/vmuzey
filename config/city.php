<?php
require_once('connect.php');

$city = mysqli_query($ConnectDatabase, "SELECT * FROM `city`");
$city = mysqli_fetch_all($city, MYSQLI_ASSOC);


$cityCount = count($city) + 1;
$count = $cityCount;
if ($cityCount > 7) {
    $count = ($cityCount - ($cityCount %  7)) / 7;
    if (($cityCount - $count * 7) > 0) {
        $count++;
    }
}
$cityCount = $count;


function addCityListAdm($city)
{
    foreach ($city as $item) {

?>
        <div class="item-country">
            <a href="city-upd.php?cityid=<?= $item['ID'] ?>">
                <div class="item-country-block">
                    <img class="city-img" src="../<?= $item['SRC'] ?>">
                    <p class="city-name"><?= $item['NAME'] ?></p>
                </div>
            </a>
        </div>

    <?php
    }
}


function addCitySelectAdm($city, $sityid = 0)
{
    foreach ($city as $item) {
    ?>
        <option value="<?= $item['ID'] ?>" <?php if ($item['ID'] == $sityid) echo 'selected' ?>><?= $item['NAME'] ?></option>

    <?php
    }
}

function addCityListUser($city, $citiid)
{
    foreach ($city as $item) {
    ?>
        <div class="item-country <?php if ($item['ID'] == $citiid) echo 'active-item-country' ?>">
            <div class="item-country-block">
                <img class="city-img" src="<?= $item['SRC'] ?>">
                <p class="city-name"><?= $item['NAME'] ?></p>
            </div>
            <input type="hidden" name="cityid" value="<?= $item['ID'] ?>">
        </div>
<?php
    }
}
