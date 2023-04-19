<?php
include 'autoLoader.php';
$testClass = new Test();
$AllProducts = $testClass->getAllProducts();
// $type = $_POST['type'];
// $res = $testClass->addProduct($type);
// $sku = $testClass->getSKU();
print_r($AllProducts);//json_encode