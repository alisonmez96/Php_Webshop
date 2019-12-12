<?php
include_once 'Model/Product.php';
include_once 'Dao/Verbinding/DatabaseFactory.php';

class ProductDao {
    private static function getVerbinding() {
        return DatabaseFactory::getDatabase();
    }

    public static function getAll() {
        $resultaat = self::getVerbinding()->voerSqlQueryUit("SELECT * FROM Product");
        $resultatenArray = array();
        for ($index = 0; $index < $resultaat->num_rows; $index++) {
            $databaseRij = $resultaat->fetch_array();
            $nieuw = self::converteerRijNaarObject($databaseRij);
            $resultatenArray[$index] = $nieuw;
              
        }
        return $resultatenArray;
    }

    public static function getById($id) {
        $resultaat = self::getVerbinding()->voerSqlQueryUit("SELECT * FROM Product WHERE productId=?", array($id));
        if ($resultaat->num_rows == 1) {
            $databaseRij = $resultaat->fetch_array();
            return self::converteerRijNaarObject($databaseRij);
        } else {
            return false;
        }
    }

    public static function insert($product) {
        return self::getVerbinding()->voerSqlQueryUit("INSERT INTO Product(naam, beschrijving, btwPercentage, prijsExclBtw, locatieFoto,locatieFoto1,locatieFoto2, kleur, maat) VALUES ('?','?','?','?','?','?','?','?','?')", array($product->getNaam(), $product->getBeschrijving(), $product->getBtwPercentage(), $product->getPrijsExclBtw(), $product->getLocatieFoto(),$product->getLocatieFoto1(),$product->getLocatieFoto2(), $product->getKleur(), $product->getMaat()));
    }

    public static function deleteById($id) {
        return self::getVerbinding()->voerSqlQueryUit("DELETE FROM Product where productId=?", array($id));
    }

    public static function delete($product) {
        return self::deleteById($product->getProductId());
    }

    public static function update($product) {
        return self::getVerbinding()->voerSqlQueryUit("UPDATE Product SET naam='?', beschrijving='?', btwPercentage='?', prijsExclBtw='?', locatieFoto='?', locatieFoto1='?', locatieFoto2='?', kleur='?', maat='?' WHERE productId=?", array($product->getNaam(), $product->getBeschrijving(), $product->getBtwPercentage(), $product->getPrijsExclBtw(), $product->getLocatieFoto(),$product->getLocatieFoto1(),$product->getLocatieFoto2(), $product->getKleur(), $product->getMaat(), $product->getProductId()));
    }

    protected static function converteerRijNaarObject($databaseRij) {
        return new Product($databaseRij['productId'], $databaseRij['naam'], $databaseRij['beschrijving'], $databaseRij['btwPercentage'], $databaseRij['prijsExclBtw'], $databaseRij['locatieFoto'], $databaseRij['locatieFoto1'], $databaseRij['locatieFoto2'], $databaseRij['kleur'], $databaseRij['maat']);
    }
}
