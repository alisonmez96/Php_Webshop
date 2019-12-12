<?php
include_once 'Model/WinkelWagenItem.php';

class WinkelwagenDAO {
     public static function getWinkelwagenItems() {
        if (isset($_COOKIE['itemWinkelwagen'])) {
            return unserialize($_COOKIE['itemWinkelwagen']);
        } else {
            $winkelwagenItems = array();
            return $winkelwagenItems;
        }
    }
    
    public static function veranderAantalItems($winkelwagenItem) {
        $winkelwagenItems = self::getWinkelwagenItems();
        $bool = false;

        foreach ($winkelwagenItems as $huidigWinkelwagenItem) {
            if ($winkelwagenItem->getProductId() == $huidigWinkelwagenItem->getProductId()) {
                $verschil = $winkelwagenItem->getAantal() - $huidigWinkelwagenItem->getAantal();
                $huidigWinkelwagenItem->setAantal($huidigWinkelwagenItem->getAantal() + $verschil);
                setcookie('itemWinkelwagen', serialize($winkelwagenItems));
                $bool = true;
            }
        }
        if ($bool == false) {
            $winkelwagenItems[] = $winkelwagenItem;
            $cookie = serialize($winkelwagenItems);
            setcookie('itemWinkelwagen', $cookie);
        }
    }
    
    public static function verwijderProduct($productId) {
        $winkelwagenItems = self::getWinkelwagenItems();

        foreach ($winkelwagenItems as $index => $huidigWinkelwagenItem) {
            if ($huidigWinkelwagenItem->getProductId() == $productId) {
                unset($winkelwagenItems[$index]);
            }
        }
        setcookie('itemWinkelwagen', serialize($winkelwagenItems));
    }
    
    public static function getTotaalPrijsExclBtw() {
        $totPrijsExclBtw = 0;
        foreach (self::getWinkelwagenItems() as $winkelwagenItem) {
            $totPrijsExclBtw += $winkelwagenItem->getTotaalPrijsExclBtw();
        }
        return $totPrijsExclBtw;
    }

    public static function getTotaalBtw() {
        $totPrijsBtw = 0;
        foreach (self::getWinkelwagenItems() as $winkelwagenItem) {
            $totPrijsBtw += $winkelwagenItem->getTotaalBtw();
        }
        return $totPrijsBtw;
    }

    public static function getTotaalPrijsInclBtw() {
        $totPrijsInclBtw = 0;
        foreach (self::getWinkelwagenItems() as $winkelwagenItem) {
            $totPrijsInclBtw += $winkelwagenItem->getTotaalPrijsInclBtw();
        }
        return $totPrijsInclBtw;
    }
}