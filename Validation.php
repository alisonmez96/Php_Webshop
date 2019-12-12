<?php
function getVeldWaarde($naamVeld) {
    return $_POST[$naamVeld];
}

function isVeldLeeg($naamVeld) {
    $waarde = getVeldWaarde($naamVeld);
    return empty($waarde);
}

function isVeldNumeriek($naamVeld) {
    return is_numeric(getVeldWaarde($naamVeld));
}

function errRequiredVeld($naamVeld) {
    if (isVeldLeeg($naamVeld)) {
        return "Gelieve een waarde in te geven";
    } else {
        return "";
    }
}

function errVeldIsNumeriek($naamVeld) {
    if (isVeldNumeriek($naamVeld)) {
        return "";
    } else {
        return "Waarde moet numeriek zijn";
    }
}

function errVoegMeldingToe($huidigeErrMelding, $toeTeVoegenErrMelding) {
    if (empty($huidigeErrMelding)) {
        return $toeTeVoegenErrMelding;
    } else {
        if (empty($toeTeVoegenErrMelding)) {
            return $huidigeErrMelding;
        } else {
            return $huidigeErrMelding . "<br>" . $toeTeVoegenErrMelding;
        }
    }
}

function errCheckImageType($naamVeld){
    if(!in_array($_FILES[$naamVeld]['type'], array('image/jpg', 'image/png'))) {
        return "Afbeelding moet een jpg of png zijn";
    } else {
        return "";
    }
}

function errImageRequired($naamVeld){
    if (!isset($_FILES[$naamVeld]['size'])) {
        return "Afbeelding kiezen aub";
    } else {
        return "";
    }
}

?>
