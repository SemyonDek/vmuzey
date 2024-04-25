<?php
require_once('../../config/connect.php');

$cityid = $_POST['cityid'];
$img = $_FILES['file_photo'];
$srcImg = '';

$typeFIle = substr($img['name'], strrpos($img['name'], '.') + 1);

$cityitem = mysqli_query($ConnectDatabase, "SELECT * FROM `city` WHERE ID = '$cityid'");
$cityitem = mysqli_fetch_assoc($cityitem);

unlink('../../' . $cityitem['SRC']);

$prov = True;
while ($prov) {
    $fileName = uniqid() . '.' . $typeFIle;
    $fileUrl = '../../img/city/' . $fileName;
    $srcImg = 'img/city/' . $fileName;

    if (!file_exists($fileUrl)) {
        move_uploaded_file($img['tmp_name'], $fileUrl);

        $prov = False;
    }
}

mysqli_query($ConnectDatabase, "UPDATE `city` SET 
    `SRC` = '$srcImg'  WHERE `city`.`ID` = $cityid");

require_once('../../config/connect.php');

$cityitem = mysqli_query($ConnectDatabase, "SELECT * FROM `city` WHERE ID = '$cityid'");
$cityitem = mysqli_fetch_assoc($cityitem);

?>
<div id="mainPhotoCat" class="block-img">
    <img src="../<?= $cityitem['SRC'] ?>" alt="">
</div>