<?php

class Db  
{
    private $host = 'localhost';
    private $user = 'root';
    private $pwd = '';
    private $dbName = 'scandiweb_test';

    protected function connect(){
        $dsn ='mysql:host=' . $this->host . ';dbname=' . $this->dbName;
        $pdo = new PDO($dsn, $this->user, $this->pwd); 
        //(PDO::FETCH_OBJ OR PDO::FETCH_ASSOC)
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        return $pdo;
    }
}

