<?php
include_once 'Dao/Verbinding/Database.php';

class DatabaseFactory {
    private static $verbinding;

    public static function getDatabase() {

        if (self::$verbinding == null) {
            $mijnComputernaam = "dt5.ehb.be";
            $mijnGebruikersnaam = "18BD015";
            $mijnWachtwoord = "98431725";
            $mijnDatabase = "18BD015";
            self::$verbinding = new Database($mijnComputernaam, $mijnGebruikersnaam, $mijnWachtwoord, $mijnDatabase);
        }
        return self::$verbinding;
    }
}
?>