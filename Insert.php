<?php
include_once 'Dao/ProductDao.php';
include_once 'Model/Product.php';
include_once 'Validation.php';

$toonFormulier = true;
$naamVal = $beschrijvingVal = $prijsExclBtwVal = $kleurVal;
$naamErr = $beschrijvingErr = $prijsExclBtwErr = $kleurErr;

if (isFormulierIngediend()) {
    $naamErr = errRequiredVeld("naam");
    $beschrijvingErr = errRequiredVeld("beschrijving");
    $prijsExclBtwErr = errVoegMeldingToe(errRequiredVeld("prijsExclBtw"), errVeldIsNumeriek("prijsExclBtw"));
    $kleurErr = errRequiredVeld("kleur");

    if (isFormulierValid()) {

        header('Location: Admin.php');
        $toonFormulier = false;

        if (isVeldLeeg("btwPercentage")) {
            $btwPercentage = 21;
        } else {
            $btwPercentage = getVeldWaarde("btwPercentage");
        }
        
        $imgBlob = file_get_contents(addslashes($_FILES['img']['tmp_name']));
        $imgBlob1 = file_get_contents(addslashes($_FILES['img1']['tmp_name']));
        $imgBlob2 = file_get_contents(addslashes($_FILES['img2']['tmp_name']));
        
        $naam = $_POST["naam"];
        $beschrijving = $_POST["beschrijving"];
        $prijsExclBtw = $_POST["prijsExclBtw"];
        $kleur = $_POST["kleur"];
        $maat = $_POST["maat"];
        
        $newProduct = new Product(0, $naam, $beschrijving, $btwPercentage, $prijsExclBtw ,$imgBlob ,$imgBlob1, $imgBlob2, $kleur ,$maat);
        ProductDao::insert($newProduct);
    } else {
        $naamVal = getVeldWaarde("naam");
        $beschrijvingVal = getVeldWaarde("beschrijving");
        $prijsExclBtwVal = getVeldWaarde("prijsExclBtw");
        $kleurVal = getVeldWaarde("kleur");
    }
}

function isFormulierIngediend() {
    return isset($_POST['postcheck']);
}

function isFormulierValid() {
    global  $naamErr, $beschrijvingErr, $prijsExclBtwErr, $kleurErr;
    $allErr =  $naamErr . $beschrijvingErr . $prijsExclBtwErr . $kleurErr;
    if (empty($allErr)) {
        return true;
    } else {
        return false;
    }
}

if ($toonFormulier) { ?>
<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="UTF-8">
<title>Werkstuk_Back-end Development</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" href="css/insert.css" type="text/css"/>
</head>
<body>

    <div id="formulier">
        <form action="Insert.php" method="POST" enctype="multipart/form-data">
        <div>
            <label>Foto:</label>
            <input type="file" name="img" value="" required="">
        </div>
                    
        <div>
            <label>Foto:</label>
            <input type="file" name="img1" value="" required="">
        </div>
                    
        <div>
            <label>Foto:</label>
            <input type="file" name="img2" value="" required="">
        </div>

        <div>
            <label>Naam:</label>
            <input type="text" name="naam" id="naam" value="<?php echo $naamVal; ?>">
            <mark><?php echo $naamErr; ?></mark>
        </div>

        <div>
            <label>Beschrijving:</label>
            <textarea rows="5" id="beschrijving" type="text" name="beschrijving" value="<?php echo $beschrijvingVal; ?>"></textarea>
            <mark><?php echo $beschrijvingErr; ?></mark>
        </div>

        <div>
            <label>Btw percentage:</label>
            <input type="number" name="btwPercentage" value="" id="btw">
        </div>

        <div>
            <label>Prijs (excl. BTW):</label>
            <input type="number" name="prijsExclBtw" id="btw" value="<?php echo $prijsExclBtwVal ?>">
            <mark><?php echo $prijsExclBtwErr; ?></mark>
        </div>
                    
        <div>
            <label>Kleur:</label>
            <input type="text" name="kleur" value="<?php echo $kleurVal ?>">
            <mark><?php echo $kleurErr ?></mark>
        </div>
                    
        <div>
            <label>Maat:</label>
            <select name="maat">
            <option value="38">38</option>
            <option value="42">42</option>
            </select>
        </div>

    <div>
        <input type="hidden" name="postcheck" value="true"/>
        <input type="submit" value="Toevoegen">
        <a href="Admin.php"><input type="button" value="Annuleer"></a>
    </div>
            </form>
        </div>
    </body>
</html>
<?php } ?>