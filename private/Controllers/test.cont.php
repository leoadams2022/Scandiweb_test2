<?php
include 'autoLoader.php';
$testClass = new Test(1);
$res = $testClass->getSKU();
print_r($res);//json_encode