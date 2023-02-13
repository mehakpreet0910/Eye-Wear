<?php

class Connection{

    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "shop_db";


public function connect() {
    $dsn = "mysql:host=".$this->host.";dbname=".$this->dbname;
    $pdo= new PDO($dsn, $this->username, $this->password);
     
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
}




}

?>