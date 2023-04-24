<?php
include 'autoLoader.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['request'])){
        $request = $_POST['request'];
        if($request === 'getAllProducts'){
            $Products = new Products();
            $data  = $Products->getAllProducts();
            echo (json_encode($data));
        }elseif($request === 'massDelete'){
            $Products = new Products();
            $data  = $Products->deleteBySku($_POST['skuArr']);
            echo (json_encode($data));
        }
    }
}