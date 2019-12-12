<?php

class Product {
    private $productId;
    private $naam;
    private $beschrijving;
    private $btwPercentage;
    private $prijsExclBtw;
    private $locatieFoto;
    private $locatieFoto1;
    private $locatieFoto2;
    private $kleur;
    private $maat;
    
    function getProductId() {
        return $this->productId;
    }

    function getNaam() {
        return $this->naam;
    }

    function getBeschrijving() {
        return $this->beschrijving;
    }

    function getBtwPercentage() {
        return $this->btwPercentage;
    }

    function getPrijsExclBtw() {
        return $this->prijsExclBtw;
    }

    function getLocatieFoto() {
        return $this->locatieFoto;
    }
    
    function getLocatieFoto1() {
        return $this->locatieFoto1;
    }
    
    function getLocatieFoto2() {
        return $this->locatieFoto2;
    }

    function getKleur() {
        return $this->kleur;
    }

    function getMaat() {
        return $this->maat;
    }

    function setProductId($productId) {
        $this->productId = $productId;
    }

    function setNaam($naam) {
        $this->naam = $naam;
    }

    function setBeschrijving($beschrijving) {
        $this->beschrijving = $beschrijving;
    }

    function setBtwPercentage($btwPercentage) {
        $this->btwPercentage = $btwPercentage;
    }

    function setPrijsExclBtw($prijsExclBtw) {
        $this->prijsExclBtw = $prijsExclBtw;
    }

    function setLocatieFoto($locatieFoto) {
        $this->locatieFoto = $locatieFoto;
    }
    
    function setLocatieFoto1($locatieFoto1) {
        $this->locatieFoto1 = $locatieFoto1;
    }
    
    function setLocatieFoto2($locatieFoto2) {
        $this->locatieFoto2 = $locatieFoto2;
    }

    function setKleur($kleur) {
        $this->kleur = $kleur;
    }

    function setMaat($maat) {
        $this->maat = $maat;
    }
  
    function __construct($productId, $naam, $beschrijving, $btwPercentage, $prijsExclBtw, $locatieFoto ,$locatieFoto1 ,$locatieFoto2 ,$kleur ,$maat) {
        $this->productId = $productId;
        $this->naam = $naam;
        $this->beschrijving = $beschrijving;
        $this->btwPercentage = $btwPercentage;
        $this->prijsExclBtw = $prijsExclBtw;
        $this->locatieFoto = $locatieFoto;
        $this->locatieFoto1 = $locatieFoto1;
        $this->locatieFoto2 = $locatieFoto2;
        $this->kleur = $kleur;
        $this->maat = $maat;
    }

   function getBtw(){
            return $this->prijsExclBtw / 100 * $this->btwPercentage;
        }
        
    function getPrijsInclBtw(){
            return $this->prijsExclBtw + $this->getBtw();
        }   
}

?>