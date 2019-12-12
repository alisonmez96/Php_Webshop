<?php
header('Location: Cart.php');
include_once 'Dao/WinkelWagenDao.php';
include_once 'Model/WinkelWagenItem.php';

WinkelWagenDao::verwijderProduct(intval($_POST["productId"]));

?>