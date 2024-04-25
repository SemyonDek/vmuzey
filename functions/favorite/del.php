<?php

require_once('../../config/connect.php');

$prodid = $_POST['prodid'];

mysqli_query($ConnectDatabase, "DELETE FROM favorite WHERE `favorite`.`PRODID` = $prodid");
