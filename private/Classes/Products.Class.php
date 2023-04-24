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

    public function __construct(array $config = []) {
        // $this->name = $config["name"];
        // $this->id = $config["id"];
      }

    public function getAllProducts(){
        $stmt = $this->connect()->prepare("SELECT `sku`, `name`, `price`, `type`, `size`, `weight`, `dimensions_h`, `dimensions_w`, `dimensions_l` FROM `products`");
        $stmt->execute();
        $arr = $stmt->fetchAll(PDO::FETCH_CLASS);
        if($arr){
            return $arr;
        }else{
            return NULL;
        }
    }
    public function deleteBySku($skuArr){
        $count = 0;
        if(count($skuArr) > 0){
            foreach ($skuArr as $sku) {
                $stmt = $this->connect()->prepare(" DELETE FROM `products` WHERE `sku` = ?");
                $stmt->execute([$sku]);
                $count = $count + $stmt->rowCount();
                $stmt = null;
            }
            return $count;
        }
    }
} 