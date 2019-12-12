<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Werkstuk_Back-end Development</title>
    <meta name="description" content="An interactive getting started guide for Brackets.">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>

<div id="header"> 
  <a href="Index.php"><img src="img/header/apple.png" width="18" height="21" alt="apple" id="logoapple"/></a>
  <a href="Admin.php"><img src="img/header/admin.png" width="22" height="20" alt="admin" id="logoadmin"/></a>
  <a href="Cart.php"><img src="img/header/shoppingbag.png" width="21" height="21" alt="cart" id="logocart"/></a>
</div>

<div id="banner">
    <div id="minibanner">
        <h1 id="titelpage">Apple Watch Series 3</h1>
    </div>
        <img src="img/bannerwatch.png" alt="bannerwatch" width="390" height="350" id="imgbanner">
        <h1 id="titelbanner">There’s an Apple Watch for</h1>
        <h1 id="titelbanner2"> everyone. Choose yours.</h1> 
</div>

<div id="filter">
</div>

<div id="container"> 
<div id="productenlijst"> 
<?php include_once 'Dao/ProductDao.php';
      foreach (ProductDao::getAll() as $product) { ?>       
  <div id="producten">
    <img width="250" height="250" id="productenimg" src="data:image/jpeg;base64, <?php echo base64_encode($product->getLocatieFoto()) ?>" />
    <p id="naamproduct"><?php echo $product->getNaam()?></p>
    <p id="beschrijvingproduct"><?php echo $product->getBeschrijving() ?></p>
    <p id="prijsproduct"> &#8364; <?php echo $product->getPrijsInclBtw() ?></p>
    <a id="detialleproduct" href="Detaille.php?productId=<?php echo $product->getProductId() ?> ">Toon Details</a>
  </div>
<?php } ?>
</div>
</div>

<div id="footer"></div>

<footer>
    <p>Copyright © 2018 Designed &amp; Development by Ali Sönmez.</p>
</footer>

</body>
</html>
