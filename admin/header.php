<?php
session_start();
if (!isset($_SESSION['accountName']) || $_SESSION['accountName'] !== 'admin') {
    header('Location: ../');
}
$_SESSION['CITYIDFILTER'] = '0';
?>

<link data-n-head="ssr" rel="icon" type="image/png" sizes="32x32" href="../img/main/favicon-32x32.png">
<link rel="stylesheet" href="../fonts/fonts.css">
<link rel="stylesheet" href="../css/header.css">


<header>

    <div class="container container-padding">
        <div class="header-block">

            <button id="open-menu" aria-label="Открыть меню" class="header-burger">
                <div class="vm-icon header-burger-icon">
                    <svg width="25" height="18" viewBox="0 0 25 18" fill="none" xmlns="http://www.w3.org/2000/svg" class="vm-icon-svg inherit-fill-color">
                        <path fill="#131330" d="M0 0h25v2H0zM0 8h25v2H0zM0 16h25v2H0z"></path>
                    </svg>
                </div>
            </button>

            <div class="header-search">
                <div class="search">
                    <div class="search-enter">
                        <form action="search.php" method="get" class="search-input">
                            <label class="search-input-label">
                                <div class="search-input__search-icon">
                                    <div class="vm-icon">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="vm-icon-svg default-icon-size">
                                            <path d="M9.167 1.667c4.14 0 7.5 3.36 7.5 7.5 0 4.14-3.36 7.5-7.5 7.5-4.14 0-7.5-3.36-7.5-7.5 0-4.14 3.36-7.5 7.5-7.5zm0 13.333A5.832 5.832 0 0015 9.166a5.832 5.832 0 00-5.833-5.833 5.831 5.831 0 00-5.834 5.833A5.832 5.832 0 009.167 15zm7.07.059l2.358 2.357-1.18 1.179-2.356-2.358 1.179-1.178z" fill="#131330"></path>
                                        </svg>
                                    </div>
                                </div>
                                <input name="catid" value="1" type="hidden">
                                <input placeholder="Введите город, музей или событие" name="search" value="" class="vm-input search-input__input vm-input_scheme-gray vm-input_disabled-text-color-gray-dark vm-input_placeholder-text-color-gray-dark">
                            </label>
                        </form>
                    </div>
                </div>
            </div>

            <a href="index.php" aria-current="page" class="header-logo nuxt-link-exact-active nuxt-link-active">
                <div class="vm-icon">
                    <svg width="63" height="50" viewBox="0 0 63 50" fill="none" xmlns="http://www.w3.org/2000/svg" class="vm-icon-svg default-icon-size">
                        <path d="M11.105 1.645c5.186 0 9.402 4.066 9.402 9.063v28.584c0 4.997-4.219 9.063-9.402 9.063-5.183 0-9.402-4.066-9.402-9.063V10.708c0-4.997 4.219-9.063 9.402-9.063zm0-1.645C4.972 0 0 4.793 0 10.708v28.584C0 45.207 4.972 50 11.105 50S22.21 45.207 22.21 39.292V10.708C22.213 4.793 17.242 0 11.105 0zM51.892 1.645c5.186 0 9.405 4.066 9.405 9.063v28.584c0 4.997-4.219 9.063-9.402 9.063-5.183 0-9.402-4.066-9.402-9.063V10.708c-.004-4.997 4.216-9.063 9.399-9.063zm0-1.645c-6.134 0-11.105 4.793-11.105 10.708v28.584C40.787 45.207 45.758 50 51.892 50 58.025 50 63 45.207 63 39.292V10.708C63 4.793 58.028 0 51.892 0z" fill="#1A051D"></path>
                        <path d="M51.902 1.645c1.903 0 3.742.553 5.319 1.595 2.07 1.372 3.463 3.441 3.92 5.82.456 2.378-.075 4.786-1.499 6.78L39.261 44.414c-1.284 1.8-3.198 3.09-5.39 3.635l-.035.01-.024.007c-.115.03-.231.052-.35.079l-.018.003-.102.02c-.098.02-.197.036-.306.052l-.16.027c-.085.013-.174.023-.259.032-.068.007-.133.017-.201.023l-.238.02c-.072.007-.147.01-.218.013a5.263 5.263 0 01-.228.007c-.075.003-.15.003-.225.003l-.225-.003c-.075-.003-.153-.003-.228-.007-.072-.003-.146-.01-.218-.013-.078-.006-.16-.01-.238-.02a4.176 4.176 0 01-.201-.023c-.085-.01-.174-.02-.26-.032-.05-.007-.098-.017-.149-.023l-.024-.004c-.099-.016-.197-.033-.29-.05l-.098-.019-.03-.006c-.116-.023-.232-.05-.345-.076l-.027-.007-.034-.01c-2.193-.546-4.11-1.838-5.39-3.635L3.357 15.84c-1.42-1.994-1.955-4.402-1.499-6.78.457-2.382 1.85-4.448 3.92-5.82a9.612 9.612 0 015.32-1.595c3.101 0 6.003 1.47 7.76 3.931L30.1 21.334l1.403 1.964 1.403-1.964L44.148 5.576c1.75-2.46 4.651-3.931 7.754-3.931zm0-1.645c-3.535 0-7.008 1.622-9.16 4.642L31.5 20.399 20.259 4.642C18.107 1.622 14.633 0 11.099 0c-2.17 0-4.36.612-6.284 1.885-5.053 3.352-6.334 10.017-2.86 14.89l20.381 28.573c1.58 2.214 3.869 3.672 6.368 4.297.024.006.044.013.068.016.137.033.273.063.412.092l.147.03c.116.023.231.043.347.06.068.009.136.022.201.032l.303.04c.078.01.16.02.239.026.091.01.187.016.282.023.085.006.17.013.256.016l.272.01c.088.003.177.003.266.003l.265-.003c.092-.003.18-.003.273-.01.085-.003.17-.01.255-.016a8.424 8.424 0 00.521-.05c.102-.013.204-.023.303-.039a419.708 419.708 0 01.548-.092l.147-.03c.136-.03.276-.059.412-.092l.068-.016c2.503-.622 4.791-2.083 6.368-4.297L61.04 16.774c3.476-4.872 2.196-11.537-2.858-14.889A11.332 11.332 0 0051.901 0z" fill="#1A051D"></path>
                    </svg>
                </div>
            </a>

            <div class="header-right">
                <div class="header-profile">
                    <div class="header-no-authorized">

                        <a href="../functions/account/logout.php" class="vm-button header-login-button vm-button_theme-default vm-button_size-sm">
                            <p class="vm-button-wrapper">Выход</p>
                        </a>

                    </div>
                </div>
            </div>

        </div>
    </div>

</header>


<?php
if (isset($_GET['catid'])) {
    $catActive = $_GET['catid'];
} else {
    if (isset($index)) {
        $catActive = 0;
    } else {
        $catActive = 10;
    }
}
?>

<div id="left-menu">
    <div class="side-menu-main">
        <ul class="side-menu-list">
            <!-- <li class="side-menu-list-item"><a href="index.php" class="side-menu-list-link ">Главная</a></li> -->
            <li class="side-menu-list-item"><a href="orders.php" class="side-menu-list-link <?php if (isset($ordersPage)) echo 'nuxt-link-exact-active' ?>">Заказы</a></li>
            <li class="side-menu-list-item"><a href="catalog.php" class="side-menu-list-link <?php if (isset($catalogPage)) echo 'nuxt-link-exact-active' ?>">Товары</a></li>
            <li class="side-menu-list-item"><a href="city-list.php" class="side-menu-list-link <?php if (isset($cityPage)) echo 'nuxt-link-exact-active' ?>">Города</a></li>
            <li class="side-menu-list-item"><a href="question.php" class="side-menu-list-link <?php if (isset($questionPage)) echo 'nuxt-link-exact-active' ?>">Вопросы</a></li>
        </ul>
    </div>


    <div class="side-menu-footer">
        <a href="../functions/account/logout.php" class="side-menu-help-link">Выход</a>
    </div>

</div>

<script>
    let menu = document.getElementById('left-menu');
    let buttonMenu = document.getElementById('open-menu');

    buttonMenu.onclick = function() {
        if (menu.style.left == '') {
            menu.style.left = '0';
        } else {
            menu.style.left = '';
        }
    }
</script>