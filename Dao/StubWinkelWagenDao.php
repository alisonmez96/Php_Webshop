<?php
class WinkelWagenDao {
    
    public static function getWinkelWagenItem(){

        $getWinkelWagen[0] = new WinkelWagen(3,1);
        $getWinkelWagen[1] = new WinkelWagen(3,1);
        $getWinkelWagen[2] = new WinkelWagen(3,1);
        
        return $getWinkelWagen;
    }

    public static function getTotaalPrijsExclBtw() {
    foreach (self::getWinkelwagenItem() as $winkelwagenPrijsExclBtw){
    $prijsexcl= $winkelwagenPrijsExclBtw->getAantal() *
    ProductDao::getProductById($winkelwagenPrijsExclBtw->getProductId())->getPrijsExclBtw();
    $totaal = $prijsexcl;
    }
    return $totaal;
}

public static function getTotaalBtw(){
    foreach (self::getWinkelwagenItem() as $winkelwagenBtw){
    $btwProduct= self::getTotaalPrijsExclBtw();
    $btw = $btwProduct * ProductDao::getProductById($winkelwagenBtw->getProductId())->getBtwPercentage()
    / 100;
    } 
    return $btw;
}

public static function getTotaalPrijsInclBtw(){

$totaalPrijs = self::getTotaalPrijsExclBtw()+ self::getTotaalBtw() ;
return $totaalPrijs;
    }
}
?>