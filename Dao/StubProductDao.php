<?php

include_once 'Model/ProductModel.php';

class ProductDAO {
    
    public static function getProducten(){
        $array[0] = new Product(1, "Series 3", "Silver Aluminum Case with Fog Sport Band", 21, 329, "img/smartwatch/watch_1.jpeg","Silver","38 mm");
        $array[1] = new Product(2, "Series 3", "Gold Aluminum Case with Pink Sand Sport Band", 21, 329, "img/smartwatch/watch_2.jpeg","Gold Pink","38 mm");
        $array[2] = new Product(3, "Series 3", "Space Gray Aluminum Case with Gray Sport Band", 21, 329, "img/smartwatch/watch_3.jpeg","Space Gray","42 mm");
        $array[3] = new Product(4, "Series 3", "Space Gray Aluminum Case with Black Sport Band", 21, 329, "img/smartwatch/watch_4.jpeg","Black","42 mm");

        $array[4] = new Product(1, "Series 3", "Silver Aluminum Case with Fog Sport Band", 21, 399, "img/smartwatch/watch_5.jpeg","Silver","42 mm");
        $array[5] = new Product(2, "Series 3", "Gold Aluminum Case with Pink Sand Sport Band", 21, 399, "img/smartwatch/watch_6.jpeg","Gold Pink","38 mm");
        $array[6] = new Product(3, "Series 3", "Space Gray Aluminum Case with Gray Sport Band", 21, 399, "img/smartwatch/watch_7.jpeg","Space Gray","38 mm");
        $array[7] = new Product(4, "Series 3", "Space Gray Aluminum Case with Black Sport Band", 21, 399, "img/smartwatch/watch_8.jpeg","Black","38 mm");

        $array[8] = new Product(1, "Series 3", "Silver Aluminum Case with Seashell Sport Loop", 21, 399, "img/smartwatch/watch_9.jpeg","Silver","42 mm");
        $array[9] = new Product(2, "Series 3", "Gold Aluminum Case with Pink Sand Sport Loop", 21, 399, "img/smartwatch/watch_10.jpeg","Gold Pink","42 mm");
        $array[10] = new Product(3, "Series 3", "Space Gray Aluminum Case with Dark Olive Sport Loop", 21, 399, "img/smartwatch/watch_11.jpeg","Space Gray","42 mm");
        $array[11] = new Product(4, "Series 3", "Stainless Steel Case with Soft White Sport Band", 21, 599, "img/smartwatch/watch_12.jpeg","White","42 mm");
        $array[12] = new Product(4, "Series 3", "Space Black Stainless Steel Case with Black Sport Band", 21, 599, "img/smartwatch/watch_13.jpeg","Black","38 mm");
        $array[13] = new Product(4, "Series 3", "Stainless Steel Case with Milanese Loop", 21, 699, "img/smartwatch/watch_14.jpeg","Stainless Steel","38 mm");
        $array[14] = new Product(4, "Series 3", "Space Black Stainless Steel Case with Space Black Milanese Loop", 21, 749, "img/smartwatch/watch_15.jpeg","Black","38 mm");

        return $array;
    }
    
    public static function getProductById($productId){
        foreach (self::getProducten() as $huidigProduct){
            if($huidigProduct->getProductId() == $productId){
                return $huidigProduct;
            }
        }
    }
 }
 
 ?>