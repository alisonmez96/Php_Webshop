<?php
include_once 'Dao/WinkelWagenDao.php';
include_once 'Ingenico.php';
$winkelwagenDAO = new WinkelwagenDAO();
$winkelwagenItems = $winkelwagenDAO->getWinkelwagenItems();
?>

<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Werkstuk_Back-end Development</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <link rel="stylesheet" href="css/cart.css" type="text/css">
  
    </head>
    
<body>   
<div id="header"> 
  <a href="Index.php"><img src="img/header/apple.png" width="18" height="21" alt="apple" id="logoapple"/></a>
  <a href="Admin.php"><img src="img/header/admin.png" width="22" height="20" alt="admin" id="logoadmin"/></a>
  <a href="Cart.php"><img src="img/header/shoppingbag.png" width="21" height="21" alt="cart" id="logocart"/></a>
</div>
    
    <a href="index.php"><button type="button" id="btnVerder"><span>Verder winkelen</span></button></a>
    
    <h1 id="titelCart">Here’s what’s in your cart.</h1>
    
    <h4 id="subtitelCart">Here’s what’s in your bag.</h4>
    

        <?php foreach ($winkelwagenItems as $winkelwagenitem) {
                        $huidigProduct = $winkelwagenitem->getProduct(); ?>
           
    <div id="cartItem">
    <img src="data:image/jpeg;base64, <?php echo base64_encode($huidigProduct->getLocatieFoto())  ?>" id="imgCart">
    
    <div id="div">
    <a href='<?php echo "Detaille.php?productId=" . $huidigProduct->getProductId() ?>' id="hover">
    Apple Watch <?php echo $huidigProduct->getNaam() ?> , <?php echo $huidigProduct->getMaat() ?> mm , <?php echo $huidigProduct->getBeschrijving() ?>
    </a>
    </div>
    
    <strong id="prijsCart">€<?php echo $huidigProduct->getPrijsExclBtw() ?>.00</strong>

    <form action='DeleteCartItem.php' method='POST' id="delete">
        <button type='submit'><span>Verwijder</span></button>
        <input type='hidden' name='productId' value='<?php echo $winkelwagenitem->getProductId() ?>'>
    </form>
    
    
    <form action='ChangeQuantity.php' method='POST' id="update">
        <button type='submit'><span>Update</span></button>
            <input type='number' name='quantity' value='<?php echo $winkelwagenitem->getAantal() ?>' min='0'>
            <input type='hidden' name='productId' value='<?php echo $winkelwagenitem->getProductId() ?>'>
    </form> 
    <hr id="itemHr">
    </div>
    <?php } ?>
    
    <hr id="cartHr">
    
    <div id="titel">
        <b><h3 id="exclP">Totaal prijs excl. btw:</h3></b>
        <b><h3>Totaal btw:</h3></b>
        <b><h3>Totaal prijs incl btw</h3></b>
    </div>
    
    <div id="prijs">
        <strong>€<?php echo $winkelwagenDAO->getTotaalPrijsExclBtw() ?></strong>
        <strong>€<?php echo $winkelwagenDAO->getTotaalBtw() ?></strong>
        <strong>€<?php echo $winkelwagenDAO->getTotaalPrijsInclBtw() ?></strong>
    </div>
    
            <?php   $bedrag = number_format(WinkelwagenDAO::getTotaalPrijsInclBtw(), 2, '', '');
                    $mijnBetaling = Ingenico::genereerNieuweBetaling($bedrag);
                    $mijnBetaling->setAfhandelingBetalingGeaccepteerdUrl("http://dtsl.ehb.be/~ali.sonmez/Werkstuk_BackendDevelopment/Thanks.php");
                    $mijnBetaling->genereerBetalingsformulier();
            ?>
             

    </body>

</html>