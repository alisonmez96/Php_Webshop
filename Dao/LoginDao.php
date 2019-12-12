<?php
include_once 'Model/LoginModel.php';
include_once 'Dao/Verbinding/DatabaseFactory.php';

class LoginDAO {
    private static function getVerbinding() {
        return DatabaseFactory::getDatabase();
    }

    public static function getAll() {
        $resultaat = self::getVerbinding()->voerSqlQueryUit("SELECT * FROM Login");
        $resultatenArray = array();
        for ($index = 0; $index < $resultaat->num_rows; $index++) {
            $databaseRij = $resultaat->fetch_array();
            $nieuw = self::converteerRijNaarObject($databaseRij);
            $resultatenArray[$index] = $nieuw;
        }
        return $resultatenArray;
    }

    public static function getAllByUsernameEnWachtwoord($username, $wachtwoord) {
        $resultaat = self::getVerbinding()->voerSqlQueryUit("SELECT * FROM Login WHERE username='?' AND wachtwoord='?'", array($username, $wachtwoord));
        if ($resultaat->num_rows == 1) {
            $databaseRij = $resultaat->fetch_array();
            return self::converteerRijNaarObject($databaseRij);
        } else {
            return false;
        }
    }

    public static function getAllByUsername($username) {
        $resultaat = self::getVerbinding()->voerSqlQueryUit("SELECT * FROM Login WHERE username='?'", array($username));
        $resultatenArray = array();
        for ($index = 0; $index < $resultaat->num_rows; $index++) {
            $databaseRij = $resultaat->fetch_array();
            $nieuw = self::converteerRijNaarObject($databaseRij);
            $resultatenArray[$index] = $nieuw;
        }
        return $resultatenArray;
    }

    public static function insert($login) {
        return self::getVerbinding()->voerSqlQueryUit("INSERT INTO Login(username, wachtwoord) VALUES ('?','?')", array($login->getUsername(), $login->getWachtwoord()));
    }

    public static function deleteById($id) {
        return self::getVerbinding()->voerSqlQueryUit("DELETE FROM Login where loginId=?", array($id));
    }

    public static function delete($login) {
        return self::deleteById($login->getLoginId());
    }

    protected static function converteerRijNaarObject($databaseRij) {
        return new login($databaseRij['loginId'], $databaseRij['username'], $databaseRij['wachtwoord']);
    }

}