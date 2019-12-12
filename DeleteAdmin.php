<?php
header('Location: AdminList.php');
include_once 'Dao/LoginDao.php';
include_once 'Model/LoginModel.php';
LoginDAO::deleteById($_POST["loginId"]);
?>