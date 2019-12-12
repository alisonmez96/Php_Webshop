<?php include_once 'Dao/ProductDao.php';
      $productDetaille = ProductDao::getById($_GET['productId']);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Werkstuk_Back-end Development</title>
    <meta name="description" content="An interactive getting started guide for Brackets.">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/detaille.css">
  
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>

<body>
<div id="header"> 
  <a href="Index.php"><img src="img/header/apple.png" width="18" height="21" alt="apple" id="logoapple"/></a>
  <a href="Admin.php"><img src="img/header/admin.png" width="22" height="20" alt="admin" id="logoadmin"/></a>
  <a href="Cart.php"><img src="img/header/shoppingbag.png" width="21" height="21" alt="cart" id="logocart"/></a>
</div>

<div id="minibanner">
  <h1 id="titelpage">Apple Watch Series 3</h1>
</div>               

<div class="mySlides fade">
<img src="data:image/jpeg;base64, <?php echo base64_encode($productDetaille->getLocatieFoto())  ?>"  id="imgdetaille">
</div>

<div class="mySlides fade">
<img src="data:image/jpeg;base64, <?php echo base64_encode($productDetaille->getLocatieFoto1())  ?>"  id="imgdetaille">
</div>

<div class="mySlides fade">
<img src="data:image/jpeg;base64, <?php echo base64_encode($productDetaille->getLocatieFoto2())  ?>"  id="imgdetaille">
</div>

<div id="dotPlace">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>
    
    <div id="detailleright">
    <p id="naamdetaille">Apple Watch - <?php echo $productDetaille->getNaam()?></p>
    <p id="beschrijvingdetaille"><?php echo $productDetaille->getBeschrijving()?></p>

    <p id="titelmaatdetaille"> Kastgrootte </p>

    <div id="maatprijsdetaille"> 
    <p id="maatdetaille"><?php echo $productDetaille->getMaat()?> mm</p>
    <p id="prijsdetaille"> &euro; <?php echo number_format($productDetaille->getPrijsExclBtw(),2)?> Excl.</p>
    <p id="infodetaille"> Geschikt voor een pols van 130-200 mm.</p>
    </div>

    <div id="divwinkelwagen"> 
    <p id="prijsdetaillewagen"> &euro; <?php echo number_format($productDetaille->getPrijsInclBtw(),2)?> Incl.</p>
    <p id="kleurdetaille">Kleur: <?php echo $productDetaille->getKleur()?></p>
    
    <form action="ChangeQuantity.php" method='POST'>
    <input type='hidden' name='productId' value="<?php echo $productDetaille->getProductId()?>">
  <div>
    <input type='button' value='-' class='qtyminus' field='quantity' />
    <input type='text' name='quantity' value='1' class='qty' />
    <input type='button' value='+' class='qtyplus' field='quantity' /> <br>
  </div>
    <input type='submit' value='Add to Cart' id="buttonwinkelwagen">
</form>
    
    
    <div id="infoleveringdiv"> 
    <p id="infolevering"> Levering: 3 Werkdagen na betaling </p>
    </div>
    </div>
    </div>

<div id="footer">
    <div id="btwuitleg">
    <p id="btwdetaille">De prijzen zijn exclusief BTW (<?php echo $productDetaille->getBtwPercentage()?> %) en eventuele van toepassing zijnde
        verwijderingsbijdragen, maar exclusief leveringskosten (tenzij anders vermeld). 
        Op het bestelformulier ziet u het BTW-bedrag en, indien van toepassing, de verwijderingsbijdrage 
        voor de producten die u hebt geselecteerd.</p>
    </div>
</div>

<footer>
<p>Copyright © 2018 Designed by Apple &amp; Development by Ali Sönmez.</p>
</footer>

<script src="js/quantity.js"></script>
<script src="js/slider.js"></script>

</body>
</html>
