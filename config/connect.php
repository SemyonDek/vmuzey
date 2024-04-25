<?php
$ConnectDatabase = mysqli_connect(
    'localhost',
    'root',
    '',
    'vmuzey'

);
if (!$ConnectDatabase) {
    echo 'Error!';
}
