<?php
$usernameVal = $wachtwoordVal = "";
$usernameErr = $wachtwoordErr = "";

$toonFormulier = true;

include_once 'Validation.php';
include_once 'Dao/LoginDao.php';
include_once 'Model/LoginModel.php';

function isFormulierIngediend() {
    return isset($_POST['postcheck']);
}

if (isFormulierIngediend()) {
    $usernameVal = getVeldWaarde("username");
    $wachtwoordVal = getVeldWaarde("wachtwoord");


    $usernameErr = errRequiredVeld("username");
    $wachtwoordErr = errRequiredVeld("wachtwoord");


    if (isFormulierValid()) {
        $toonFormulier = false;

        if (!$resultaat = loginDAO::getAllByUsername($usernameVal)) {
            if ($resultaat1 = loginDAO::insert(new login(0, $usernameVal, $wachtwoordVal))) {
                $_SESSION["username"] = $usernameVal;
                $_SESSION["gegevensUser"] = loginDAO::getAllByUsernameEnWachtwoord($usernameVal, $wachtwoordVal);
                $_SESSION["userId"] = $_SESSION["gegevensUser"]->getLoginId();
                header('Location: Login.php');
            } else {
                $toonFormulier = true;
            }
        } else {
            $usernameErr = errAlbestaand("username");
            $toonFormulier = true;
        }
    } else {
        $usernameVal = getVeldWaarde("username");
        $wachtwoordVal = getVeldWaarde("wachtwoord");
    }
}

function isFormulierValid() {
    global $usernameErr, $wachtwoordErr;
    $allErr = $usernameErr . $wachtwoordErr;
    if (empty($allErr)) {
        return true;
    } else {
        return false;
    }
}

if ($toonFormulier) {
    ?>

    <html>
        <head>
            <meta charset="UTF-8">
            <title>Werkstuk_Back-end Development</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="css/style.css" type="text/css">
            <link rel="stylesheet" href="css/login.css" type="text/css">        
        </head>
        <body>

            <section class="login">
                <form class="formulier" action="LoginAanmaken.php" method="POST">
                    <h1>Account aanmaken</h1>

                    <div>
                        <label for="username">Username</label><br>
                        <input type="text" name="username" value="<?php echo $usernameVal; ?>"/><br>
                        <mark><?php echo $usernameErr; ?></mark>
                        <?php
                        if (isset($usernameErr)) {
                            echo'<br>';
                        }
                        ?>
                    </div>
                    <div>
                        <label for="wachtwoord">Wachtwoord</label><br>
                        <input type="password" name="wachtwoord" value="<?php echo $wachtwoordVal; ?>"/><br>
                        <mark><?php echo $wachtwoordErr; ?></mark>
                        <?php
                        if (isset($wachtwoordErr)) {
                            echo'<br>';
                        }
                        ?>
                    </div>
                    <div>
                        <div>
                            <input type="hidden" name="postcheck" value="true"/>
                            <input class="btnLogin" type="submit" value="Account aanmaken">
                        </div>
                    </div>

                </form>
            </section>
        </body>
    </html>

<?php } ?>