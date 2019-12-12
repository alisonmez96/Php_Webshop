<?php
header('Location: Cart.php');
include_once 'Dao/WinkelWagenDao.php';
include_once 'Model/WinkelWagenItem.php';
$quantity = ($_POST["quantity"]);

if ($quantity == 1) {
    $winkelwagenitem = new WinkelwagenItem($quantity, intval($_POST["productId"]));
} else {
    echo $quantity;
    $winkelwagenitem = new WinkelwagenItem($quantity, intval($_POST["productId"]));
}

WinkelWagenDao::veranderAantalItems($winkelwagenitem);

?>