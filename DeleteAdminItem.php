<?php
header('Location: Admin.php');
include_once 'Dao/ProductDao.php';
include_once 'Model/ProductModel.php';
ProductDao::deleteById($_POST["productId"]);
?>