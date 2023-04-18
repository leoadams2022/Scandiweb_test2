<?php
include 'autoLoader.php';
$testClass = new Test(1);
$type = $_POST['type'];
$res = $testClass->$type();
print_r($res);//json_encode