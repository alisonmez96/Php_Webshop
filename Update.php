<?php
include_once 'Dao/ProductDao.php';
include_once 'Model/Product.php';
include_once 'Validation.php';
$product = ProductDao::getById($_GET["productId"]);

$Formulier = true;
$naamVal = $beschrijvingVal = $prijsExclBtwVal;
$naamErr = $beschrijvingErr = $prijsExclBtwErr;

if (FormulierOk()) {
    $naamErr = errRequiredVeld("naam");
    $beschrijvingErr = errRequiredVeld("beschrijving");
    $prijsExclBtwErr = errVoegMeldingToe(errRequiredVeld("prijsExclBtw"), errVeldIsNumeriek("prijsExclBtw"));

    if (validatieForm()) {

        header('Location: Admin.php');
        $Formulier = false;

        if (LegeVeld("btwPercentage")) {
            $btwPercentage = 21;
        } else {
            $btwPercentage = getVeldWaarde("btwPercentage");
        }

        $imgBlob = file_get_contents(addslashes($_FILES['img']['tmp_name']));
        $imgBlob1 = file_get_contents(addslashes($_FILES['img2']['tmp_name']));
        $imgBlob2 = file_get_contents(addslashes($_FILES['img3']['tmp_name']));

        $productId = $_POST["productId"];
        $naam = $_POST["naam"];
        $beschrijving = $_POST["beschrijving"];
        $prijsExclBtw = $_POST["prijsExclBtw"];
        $kleur = $_POST["kleur"];
        $maat = $_POST["maat"];
        
        $newProduct = new Product($productId, $naam, $beschrijving, $btwPercentage, $prijsExclBtw ,$imgBlob ,$imgBlob1 ,$imgBlob2 ,$kleur, $maat);

        ProductDao::update($newProduct);
    } else {
        $naamVal = getVeldWaarde("naam");
        $beschrijvingVal = getVeldWaarde("beschrijving");
        $prijsExclBtwVal = getVeldWaarde("prijsExclBtw");
    }
}

function FormulierOk() {
    return isset($_POST['postcheck']);
}

function validatieForm() {
    global $naamErr, $beschrijvingErr, $prijsExclBtwErr;
    $allErr = $naamErr . $beschrijvingErr . $prijsExclBtwErr;
    if (empty($allErr)) {
        return true;
    } else {
        return false;
    }
}

if ($Formulier) {
    ?>
    <html lang="en">

        <head>
            <meta charset="UTF-8">
            <title>Werkstuk_Back-end Development</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="css/style.css" /> </head>
            <link rel="stylesheet" href="css/insert.css" type="text/css"/>
        <body>
            <div id="formulier">
                <form action="Update.php" method="POST" enctype="multipart/form-data">
                    <div>
                        <label>ID:</label>
                        <input type="text" name="productId" value="<?php echo $product->getProductId() ?>">
                    </div>
                   
                    <div>
                        <label>Foto:</label>
                        <input type="file" name="img" value="">
                    </div>
                    
                    <div>
                        <label>Foto:</label>
                        <input type="file" name="img1" value="">
                    </div>
                    
                    <div>
                        <label>Foto:</label>
                        <input type="file" name="img2" value="">
                    </div>
                    
                    <div>
                        <label>Naam:</label>
                        <input type="text" name="naam" id="naam" value="<?php echo $product->getNaam() ?>">
                        <mark><?php echo $naamErr; ?></mark>
                    </div>

                    <div>
                        <label>Beschrijving:</label>
                        <textarea rows="5" type="text" name="beschrijving" id="beschrijving"><?php echo $product->getBeschrijving() ?></textarea>
                        <mark><?php echo $beschrijvingErr; ?></mark>
                    </div>

                    <div>
                        <label>Btw percentage:</label>
                        <input type="number" name="btwPercentage" value="<?php echo $product->getBtwPercentage() ?>" id="btw">
                    </div>

                    <div>
                        <label>Prijs (excl. BTW):</label>
                        <input type="number" name="prijsExclBtw" id="btw" value="<?php echo $product->getPrijsExclBtw() ?>">
                        <mark><?php echo $prijsExclBtwErr; ?></mark>
                    </div>
                    
                    <div>
                        <label>Kleur:</label>
                        <input type="text" name="kleur" value="<?php echo $product->getKleur() ?>">
                        <mark><?php echo $kleurErr ?></mark>
                    </div>
                    
                    <div>
                        <label>Maat:</label>
                        <input type="number" name="maat" value="<?php echo $product->getMaat() ?>">
                    </div>
                        
                    <div>
                        <input type="hidden" name="postcheck" value="true" />
                        <input type="submit" value="Updaten">
                        <a href="Admin.php"><input type="button" value="Annuleer"> </a>
                    </div>
                </form>
            </div>
        </body>

    </html>
<?php } ?>