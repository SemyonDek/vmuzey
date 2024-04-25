<?php
require_once('connect.php');

session_start();


$photos = mysqli_query($ConnectDatabase, "SELECT * FROM `products_img`");
$photos = mysqli_fetch_all($photos, MYSQLI_ASSOC);
$ticketsType = mysqli_query($ConnectDatabase, "SELECT * FROM `products_tickets_type`");
$ticketsType = mysqli_fetch_all($ticketsType, MYSQLI_ASSOC);
$city = mysqli_query($ConnectDatabase, "SELECT * FROM `city`");
$city = mysqli_fetch_all($city, MYSQLI_ASSOC);


if (isset($sorting)) {
    if (!isset($_SESSION['CITYIDFILTER'])) {
        $_SESSION['CITYIDFILTER'] = 0;
        $products = mysqli_query($ConnectDatabase, "SELECT * FROM `products`");
        $products = mysqli_fetch_all($products, MYSQLI_ASSOC);
        $cityname = 'Все';
    } else {
        if ($_SESSION['CITYIDFILTER'] !== '0') {
            $cityid = $_SESSION['CITYIDFILTER'];
            $products = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE CITYID = '$cityid' ORDER BY ID $sorting");
            $products = mysqli_fetch_all($products, MYSQLI_ASSOC);
            $cityname = mysqli_query($ConnectDatabase, "SELECT * FROM `city` WHERE ID = '$cityid' ORDER BY ID $sorting");
            $cityname = mysqli_fetch_assoc($cityname);
            $cityname = $cityname['NAME'];
        } else {
            $products = mysqli_query($ConnectDatabase, "SELECT * FROM `products` ORDER BY ID $sorting");
            $products = mysqli_fetch_all($products, MYSQLI_ASSOC);
            $cityname = 'Все';
        }
    }
} else {
    if (isset($_GET['search'])) {
        $search = '%' . $_GET['search'] . '%';
        $products = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE NAME LIKE '$search'");
        $products = mysqli_fetch_all($products, MYSQLI_ASSOC);
    } else {
        if (!isset($_SESSION['CITYIDFILTER'])) {
            $_SESSION['CITYIDFILTER'] = 0;
            $products = mysqli_query($ConnectDatabase, "SELECT * FROM `products`");
            $products = mysqli_fetch_all($products, MYSQLI_ASSOC);
            $cityname = 'Все';
        } else {
            if ($_SESSION['CITYIDFILTER'] !== '0') {
                $cityid = $_SESSION['CITYIDFILTER'];
                $products = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE CITYID = '$cityid'");
                $products = mysqli_fetch_all($products, MYSQLI_ASSOC);
                $cityname = mysqli_query($ConnectDatabase, "SELECT * FROM `city` WHERE ID = '$cityid'");
                $cityname = mysqli_fetch_assoc($cityname);
                $cityname = $cityname['NAME'];
            } else {
                $products = mysqli_query($ConnectDatabase, "SELECT * FROM `products`");
                $products = mysqli_fetch_all($products, MYSQLI_ASSOC);
                $cityname = 'Все';
            }
        }
    }
}



function addProdListAdm($products, $photos, $ticketsType, $city)
{
    foreach ($products as $item) {
        $src = '';
        foreach ($photos as $itemPhoto) {
            if ($itemPhoto['PRODID'] == $item['ID']) {
                $src = $itemPhoto['SRC'];
                break;
            }
        }
        if ($src == '') {
            $src = 'img/main/logo.png';
        }
        $minPrice = 100000000000;
        $prov = true;
        foreach ($ticketsType as $itemMin) {
            if ($item['ID'] == $itemMin['PRODID']) {
                if ($itemMin['MINPRICE'] < $minPrice) {
                    $minPrice = $itemMin['MINPRICE'];
                    $prov = false;
                }
            }
        }
        if ($prov) {
            $minPrice = 0;
        }
        $cityName = '';
        foreach ($city as $itemCity) {
            if ($itemCity['ID'] == $item['CITYID']) {
                $cityName = $itemCity['NAME'];
                break;
            }
        }
?>

        <div class="catalog-item-block">
            <div class="catalog-item-img-block">
                <a href="product-upd.php?prodid=<?= $item['ID'] ?>">
                    <img class="catalog-item-img" src="../<?= $src ?>" alt="">
                    <p class="catalog-item-price">
                        <span class="catalog-item-price-value">от <?= $minPrice ?> ₽</span>
                        <span class="catalog-item-price-buy">Изменить</span>
                    </p>
                </a>
            </div>

            <div class="catalog-item-content-block">
                <a href="product-upd.php?prodid=<?= $item['ID'] ?>"><?= $item['NAME'] ?></a>
                <div class="bottom-line-catalog-item">
                    <!-- <div class="favorite-catalog-item">
                                    <div class="vm-icon vm-card-description-likes-icon">
                                        <svg width="36" height="34" viewBox="0 0 36 34" fill="none" xmlns="http://www.w3.org/2000/svg" class="vm-icon-svg default-icon-size">
                                            <path d="M18 33.666L2.68 18.346c-3.633-4.28-3.443-10.7.588-14.733A10.833 10.833 0 0118 3.066a10.834 10.834 0 0115.298 15.257L18 33.666z" fill="#EB3D00"></path>
                                        </svg>
                                    </div>
                                    <p class="count-favorite-catalog-item">17</p>
                                </div> -->
                    <p><?= $item['TIME'] ?>, <?= $cityName ?></p>
                </div>
            </div>
        </div>
        <?php
    }
}


function addProdListUser($products, $photos, $ticketsType, $city, $catid)
{
    foreach ($products as $item) {
        if ($item['CATID'] == $catid) {
            $src = '';
            foreach ($photos as $itemPhoto) {
                if ($itemPhoto['PRODID'] == $item['ID']) {
                    $src = $itemPhoto['SRC'];
                    break;
                }
            }
            if ($src == '') {
                $src = 'img/main/logo.png';
            }
            $minPrice = 100000000000;
            $prov = true;
            foreach ($ticketsType as $itemMin) {
                if ($item['ID'] == $itemMin['PRODID']) {
                    if ($itemMin['MINPRICE'] < $minPrice) {
                        $minPrice = $itemMin['MINPRICE'];
                        $prov = false;
                    }
                }
            }
            if ($prov) {
                $minPrice = 0;
            }
            $cityName = '';
            foreach ($city as $itemCity) {
                if ($itemCity['ID'] == $item['CITYID']) {
                    $cityName = $itemCity['NAME'];
                    break;
                }
            }
        ?>
            <div class="catalog-item-block">
                <div class="catalog-item-img-block">
                    <a href="product-card.php?prodid=<?= $item['ID'] ?>">
                        <img class="catalog-item-img" src="<?= $src ?>" alt="">
                        <p class="catalog-item-price">
                            <span class="catalog-item-price-value">от <?= $minPrice ?> ₽</span>
                            <span class="catalog-item-price-buy">Купить</span>
                        </p>
                    </a>
                </div>

                <div class="catalog-item-content-block">
                    <a href="product-card.php?prodid=<?= $item['ID'] ?>"><?= $item['NAME'] ?></a>
                    <div class="bottom-line-catalog-item">
                        <!-- <div class="favorite-catalog-item">
                            <div class="vm-icon vm-card-description-likes-icon">
                                <svg width="36" height="34" viewBox="0 0 36 34" fill="none" xmlns="http://www.w3.org/2000/svg" class="vm-icon-svg default-icon-size">
                                    <path d="M18 33.666L2.68 18.346c-3.633-4.28-3.443-10.7.588-14.733A10.833 10.833 0 0118 3.066a10.834 10.834 0 0115.298 15.257L18 33.666z" fill="#EB3D00"></path>
                                </svg>
                            </div>
                            <p class="count-favorite-catalog-item">17</p>
                        </div> -->
                        <p><?= $item['TIME'] ?>, <?= $cityName ?></p>
                    </div>
                </div>
            </div>
            <?php


        }
    }
}



function addProdListFavoriteUser($products, $photos, $ticketsType, $city, $favorits)
{
    foreach ($favorits as $itemFav) {
        foreach ($products as $item) {

            if ($item['ID'] == $itemFav['PRODID']) {

                $src = '';
                foreach ($photos as $itemPhoto) {
                    if ($itemPhoto['PRODID'] == $item['ID']) {
                        $src = $itemPhoto['SRC'];
                        break;
                    }
                }
                if ($src == '') {
                    $src = 'img/main/logo.png';
                }
                $minPrice = 100000000000;
                $prov = true;
                foreach ($ticketsType as $itemMin) {
                    if ($item['ID'] == $itemMin['PRODID']) {
                        if ($itemMin['MINPRICE'] < $minPrice) {
                            $minPrice = $itemMin['MINPRICE'];
                            $prov = false;
                        }
                    }
                }
                if ($prov) {
                    $minPrice = 0;
                }
                $cityName = '';
                foreach ($city as $itemCity) {
                    if ($itemCity['ID'] == $item['CITYID']) {
                        $cityName = $itemCity['NAME'];
                        break;
                    }
                }
            ?>
                <div class="catalog-item-block">
                    <div class="catalog-item-img-block">
                        <a href="product-card.php?prodid=<?= $item['ID'] ?>">
                            <img class="catalog-item-img" src="<?= $src ?>" alt="">
                            <p class="catalog-item-price">
                                <span class="catalog-item-price-value">от <?= $minPrice ?> ₽</span>
                                <span class="catalog-item-price-buy">Купить</span>
                            </p>
                        </a>
                    </div>

                    <div class="catalog-item-content-block">
                        <a href="product-card.php?prodid=<?= $item['ID'] ?>"><?= $item['NAME'] ?></a>
                        <div class="bottom-line-catalog-item">
                            <!-- <div class="favorite-catalog-item">
                                <div class="vm-icon vm-card-description-likes-icon">
                                    <svg width="36" height="34" viewBox="0 0 36 34" fill="none" xmlns="http://www.w3.org/2000/svg" class="vm-icon-svg default-icon-size">
                                        <path d="M18 33.666L2.68 18.346c-3.633-4.28-3.443-10.7.588-14.733A10.833 10.833 0 0118 3.066a10.834 10.834 0 0115.298 15.257L18 33.666z" fill="#EB3D00"></path>
                                    </svg>
                                </div>
                                <p class="count-favorite-catalog-item">17</p>
                            </div> -->
                            <p><?= $item['TIME'] ?>, <?= $cityName ?></p>
                        </div>
                    </div>
                </div>
<?php


            }
        }
    }
}
