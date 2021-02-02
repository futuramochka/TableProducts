<?php
    class CProduct{
        private $host; //IP
        private $user; //Login
        private $password; //Pass
        private $option; //Config
        private $database; //DB
        public $PDO; //PDO
        private $charset = 'UTF8'; //utf-8

        public function __construct($host__copy, $user__copy, $password__copy, $database__copy){
            $this->host = $host__copy;
            $this->user = $user__copy;
            $this->password = $password__copy;
            $this->database = $database__copy;
            $this->option = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
        }

        public function connectDB(){
            $this->PDO = new PDO("mysql:host=$this->host;dbname=$this->database;
            charset=$this->charset",$this->user,$this->password,$this->option);

        }

        public function createTable(){
            $sql = "CREATE TABLE IF NOT EXISTS Products (
                    id          INT AUTO_INCREMENT PRIMARY KEY,
                product_id      INT                  DEFAULT NULL,
                product_name    VARCHAR (255)        DEFAULT NULL,
                product_price   INT                  DEFAULT NULL,
                product_article VARCHAR (550)        DEFAULT NULL,
                product_quantity INT                 DEFAULT NULL,
                date_create      DATE                DEFAULT NULL
                )";
            return $this->PDO->exec($sql);
        }

        public function getProducts($limit){//Function return array Products
            global $connect;
            $query = $connect->PDO->prepare("SELECT * FROM `Products` WHERE `id` != `product_id` ORDER BY `date_create` DESC LIMIT $limit");
            $query->execute();
            $row = $query->fetchAll();
            return $row;
        }

        public function getOptionQuantity($valueIndexProduct){//Function return array Products
            global $connect;
            $query = $connect->PDO->prepare("SELECT `product_quantity` FROM `Products` WHERE `id` LIKE $valueIndexProduct");
            $query->execute();
            $row = $query->fetchAll();
            return $row;
        }

        public function updatePlusProductQuantity($valueIndexProduct){//Function update + quantity product
            global $connect;
            $update = $connect->PDO->prepare("UPDATE `Products` SET `product_quantity`= `product_quantity`+1 WHERE `id` LIKE $valueIndexProduct");
            $update->execute();
            return $update;
        }

        public function updateProductsID($index){
            global $connect;
            $update = $connect->PDO->prepare("UPDATE `Products` SET `product_id` = $index WHERE `id` LIKE $index");
            $update->execute();
            return $update;
        }

        public function updateMinusProductQuantity($valueIndexProduct){//Function update - quantity product
            global $connect;
            $update = $connect->PDO->prepare("UPDATE `Products` SET `product_quantity`= `product_quantity`-1 WHERE `id` LIKE $valueIndexProduct");
            $update->execute();
            return $update;
        }

        public function getInfoPDO(){//Info PDO
            return $this->PDO;
        }

        public function CloseConnectDB(){//Close connect for database mysql
            $this->PDO = null;
        } 
    }
?>