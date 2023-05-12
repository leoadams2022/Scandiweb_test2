<?php
include 'classAutoLoader.php';

class Products extends Db {
    protected $sku;
    protected $name;
    protected $price;
    protected $type;

    protected $size;
    protected $weight;
    protected $dimensions_h;
    protected $dimensions_w;
    protected $dimensions_l;

    public function __construct() {
       
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

    public function checkSkuDup($sku){
        if($sku)
        $stmt = $this->connect()->prepare("SELECT * FROM `products` WHERE `sku` = ?");
        $stmt->execute([$sku]);
        $count = $stmt->rowCount();
        $stmt = null;
        if($count > 0){
            return true;
        }
        return false;
    }

    public function addProduct($productType,$FormObj){

        $inSku = $this->setSku($FormObj['sku']);
        $inName = $this->setName($FormObj['name']);
        $inPrice = $this->setPrice($FormObj['price']);
        $inType = $this->setType($FormObj['productType']);
        if($inSku && $inName && $inPrice && $inType){

            $method = $this->$productType($FormObj);
            return $method;
        }
    }
    public function dvd($FormObj){
        $inSize = $this->setSize($FormObj['size']);
        if($inSize){
            $stmt = $this->connect()->prepare("INSERT INTO `products`(`sku`, `name`, `price`, `type`, `size`) VALUES (?,?,?,?,?)");
            $stmtExexute = $stmt->execute([$this->sku,$this->name,$this->price,$this->type,$this->size]);
            $count = $this->connect()->lastInsertId();
            $stmt = null;
            if($stmtExexute){
                return true;
            }
            return false;
        }
    }
    public function book($FormObj){
        $inWeight = $this->setWeight($FormObj['weight']);
        if($inWeight){
            $stmt = $this->connect()->prepare("INSERT INTO `products`(`sku`, `name`, `price`, `type`, `weight`) VALUES (?,?,?,?,?)");
            $stmtExexute = $stmt->execute([$this->sku,$this->name,$this->price,$this->type,$this->weight]);
            $count = $this->connect()->lastInsertId();
            $stmt = null;
            if($stmtExexute){
                return true;
            }
            return false;
        }
    }
    public function furniture($FormObj){
        $inDimensions_h = $this->setDimensions_h($FormObj['height']);
        $inDimensions_w = $this->setDimensions_w($FormObj['width']);
        $inDimensions_l = $this->setDimensions_l($FormObj['lenght']);
        if($inDimensions_h && $inDimensions_w && $inDimensions_l){
            $stmt = $this->connect()->prepare("INSERT INTO `products`(`sku`, `name`, `price`, `type`, `dimensions_h`, `dimensions_w`, `dimensions_l`) VALUES (?,?,?,?,?,?,?)");
            $stmtExexute = $stmt->execute([$this->sku,$this->name,$this->price,$this->type,$this->dimensions_l,$this->dimensions_w,$this->dimensions_h]);
            $count = $this->connect()->lastInsertId();
            $stmt = null;
            if($stmtExexute){
                return true;
            }
            return false;
        }
    }
    
    public function setSku($in){
        $sukRegex = '/^[A-Za-z0-9][A-Za-z0-9][A-Za-z0-9][A-Za-z0-9]+-[A-Za-z0-9][A-Za-z0-9][A-Za-z0-9][A-Za-z0-9]+-[A-Za-z0-9][A-Za-z0-9][A-Za-z0-9][A-Za-z0-9]+$/i';
        if(strlen($in) == 14){
            if($this->useRegex(strtoupper($in),$sukRegex) == 1){
                $this->sku = strtoupper($in);
                return true;
            }
        }
        return false;
    }
    public function setName($in){
        $nameRegex = '/^[A-Za-z\s]*$/';
        if(strlen($in) < 16){
            if($this->useRegex(strtoupper($in),$nameRegex) == 1){
                $this->name = $in;
                return true;
            }
        }
        return false;
    }
    public function setPrice($in){
        $numberRegex = '/^\d+$/';
        if(is_numeric($in)){
            if($this->useRegex(strtoupper($in),$numberRegex) == 1){
                $this->price = $in;
                return true;
            }
        }
        return false;
    }
    public function setType($in){
        if($in == 'dvd' || $in == 'book' || $in == 'furniture'){
            $this->type = $in;
            return true;
            }
        return false;
    }
    public function setSize($in){
        $numberRegex = '/^\d+$/';
        if(is_numeric($in)){
            if($this->useRegex(strtoupper($in),$numberRegex) == 1){
                $this->size = $in;
                return true;
            }
        }
        return false;
    }
    public function setWeight($in){
        $numberRegex = '/^\d+$/';
        if(is_numeric($in)){
            if($this->useRegex(strtoupper($in),$numberRegex) == 1){
                $this->weight = $in;
                return true;
            }
        }
        return false;
    }
    public function setDimensions_h($in){
        $numberRegex = '/^\d+$/';
        if(is_numeric($in)){
            if($this->useRegex(strtoupper($in),$numberRegex) == 1){
                $this->dimensions_h = $in;
                return true;
            }
        }
        return false;
    }
    public function setDimensions_w($in){
        $numberRegex = '/^\d+$/';
        if(is_numeric($in)){
            if($this->useRegex(strtoupper($in),$numberRegex) == 1){
                $this->dimensions_w = $in;
                return true;
            }
        }
        return false;
    }
    public function setDimensions_l($in){
        $numberRegex = '/^\d+$/';
        if(is_numeric($in)){
            if($this->useRegex(strtoupper($in),$numberRegex) == 1){
                $this->dimensions_l = $in;
                return true;
            }
        }
        return false;
    }


    private function useRegex($input,$regex) {
        return preg_match($regex, $input);
    }
} 