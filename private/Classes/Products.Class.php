<?php
include 'classAutoLoader.php';

class Products extends Db {
    protected $id;
    protected $sku;
    protected $name;
    protected $price;
    protected $type;

    protected $size;
    protected $weight;
    protected $dimensions_h;
    protected $dimensions_w;
    protected $dimensions_l;

    public function getAllProducts(){
        $stmt = $this->connect()->prepare("SELECT `sku`, `name`, `price`, `type`, `size`, `weight`, `dimensions_h`, `dimensions_w`, `dimensions_l` FROM `products`");
        $stmt->execute();
        $arr = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $arr;
    }
} 