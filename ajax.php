<?php 
    require_once('config.php');
   
    if (isset($_POST["indexTruePlus"])){
        $indexTrue = $_POST["indexTruePlus"];

        $result = $connect->updatePlusProductQuantity($indexTrue);
        $productQuantity = $connect->getOptionQuantity($indexTrue);
        foreach($productQuantity as $value){
            foreach($value as $val){
                echo $val;
            }
        }
    }else if (isset($_POST["indexTrueMinus"])){
        $indexTrue = $_POST["indexTrueMinus"];

        $result = $connect->updateMinusProductQuantity($indexTrue);
        $productQuantity = $connect->getOptionQuantity($indexTrue);
        foreach($productQuantity as $value){
            foreach($value as $val){
                echo $val;
            }
        }
    }else if(isset($_POST["index"])){
        $index = $_POST["index"];
        $OptionsProducts = $connect->updateProductsID($index);
    }
    $connect->CloseConnectDB();
    unset($connect);
?>