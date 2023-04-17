<?php
include 'classAutoLoader.php';
class Test extends Db {
    protected $id;
    protected $sku;
    protected $name;
    protected $price;
    protected $type;

    public function __construct($proId){
        // $this->name = $config["name"];
        $this->id = $proId;
        $sql = "SELECT * FROM `products` WHERE `id` = $this->id";
        $stmt = $this->connect()->query($sql);
            $row = $stmt->fetch();
            $this->sku = $row->sku;
        // $this->getProduct();
        // $sql = "SELECT * FROM `products` ";
        // $stmt = $this->connect()->query($sql);
        // $data = $stmt->fetchAll();
        // return ($data);
        // // $this->sku = $data->sku;
      }
  
    public function getProduct(){
        $sql = "SELECT * FROM `products` WHERE `id` = $this->id";
        $stmt = $this->connect()->query($sql);
            $row = $stmt->fetch();
            $this->sku = $row->sku;
            // return ($row->sku);
            // return $this->id;
    }
    public function getSKU(){
        return $this->sku;
    }
}   
