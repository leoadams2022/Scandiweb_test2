<?php
include 'autoLoader.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['request'])){
        $request = $_POST['request'];
        if($request === 'skuDup'){
            $sku =  $_POST['sku'];
            $Products = new Products();
            $res = $Products->checkSkuDup($sku);
            echo (json_encode($res));
        }elseif($request === 'addProduct'){
            $FormObj =  $_POST['FormObj'];
            $productType = $_POST['productType'];
            $Products = new Products();
            $res = $Products->addProduct($productType,$FormObj);
            echo (json_encode($res));
        }
    }
}