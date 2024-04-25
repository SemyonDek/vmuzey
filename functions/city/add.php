<?php
require_once('../../config/connect.php');

$name = $_POST['namecity'];
$img = $_FILES['file_photo'];
$srcImg = '';

$typeFIle = substr($img['name'], strrpos($img['name'], '.') + 1);

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

mysqli_query($ConnectDatabase, "INSERT INTO `city` (`ID`, `NAME`, `SRC`) VALUES (NULL, '$name', '$srcImg')");
