<?php
session_start();
if (!isset($_SESSION["gegevensUser"])) {
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Werkstuk_Back-end Development</title>
    <meta name="description" content="An interactive getting started guide for Brackets.">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>

<div id="header"> 
  <a href="Index.php"><img src="img/header/apple.png" width="18" height="21" alt="apple" id="logoapple"/></a>
  <a href="Admin.php"><img src="img/header/admin.png" width="22" height="20" alt="admin" id="logoadmin"/></a>
  <a href="Cart.php"><img src="img/header/shoppingbag.png" width="21" height="21" alt="cart" id="logocart"/></a>

<?php
if (isset($_SESSION["username"])) {
    echo '<a  id="loguit" href="logout.php"><img src="img/logout.png" width="25px" height="25px"></a>';
        } else {
    header('Location: login.php');
        }
?>
</div>

<table style="width:100%">
  <tr>
    <th>Foto</th>
    <th>Naam Artikel</th> 
    <th>Beschrijving</th>
    <th>Btw Percentage</th>
    <th>Prijs Exclusief</th>
    <th>Btw Bedrag</th>
    <th>Prijs Inclusief</th>
    <th>Kleur</th>
    <th>Maat</th>
    <th>Aanpassen</th>
    <th>Verwijderen</th>
  </tr>

<?php include_once 'Dao/ProductDao.php';
      foreach (ProductDao::getAll() as $product) { ?>
<tr>
    <td><img src="data:image/jpeg;base64, <?php echo base64_encode($product->getLocatieFoto())  ?>"  width="50" height="50"></td>
    <td><?php echo $product->getNaam()?></td>
    <td><?php echo $product->getBeschrijving() ?></td>
    <td><?php echo $product->getBtwPercentage() ?> %</td>
    <td>&#8364; <?php echo $product->getPrijsExclBtw() ?></td>
    <td>&#8364; <?php echo $product->getBtw()?></td>
    <td>&#8364; <?php echo $product->getPrijsInclBtw()?></td>
    <td><?php echo $product->getKleur()?></td>
    <td><?php echo $product->getMaat()?></td>
    
    <td>
    <form action='Update.php' method='GET'>
       <input type='hidden' name='productId' value="<?php echo $product->getProductId()?>">
       <input type='image' value='updaten' src='img/update.svg' id='editButton' width="30" height="30">
    </form>
    </td>
   
   <td>
    <form action='DeleteAdminItem.php' method='POST'>
        <input type='hidden' name='productId' value="<?php echo $product->getProductId()?>">
        <input type='image' value='verwijderen 'src='img/remove.svg' id='removeButton' width="30" height="30">
    </form> 
   </td>
</tr>
<?php } ?>
</table>

<a type="submit" id="btnProduct" href="Insert.php">Nieuwe product toevoegen</a>
<a href="LoginAanmaken.php" id="btnProduct">Nieuwe admin toevoegen</a>
<a href="AdminList.php" id="btnProduct"> Lijst van admin</a>

</body>
</html>
