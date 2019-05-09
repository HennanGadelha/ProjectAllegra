<?php
require('core/Database.php');
require('models/Category.php');

 class Products{
 
    private $connection;
    private $category = new Category();


    public function __construct(){

        $this->connection = (new Database())->connect();

    }

    public function insert($data){

        $sql = 'INSERT INTO  prodcuts';
        $sql .= '(name, price, genre, description)';
        $sql .= ' VALUES (:(name, :price, :genre, :description)';

        $product = $this->connection->prepare($sql);

        $product->bindValue(':name', $data['name'], PARAM_STR);
        $product->bindValue(':price', $data['price'], PARAM_STR);//verificar compatibliddade
        $product->bindValue(':genre', $data['genre'], PARAM_STR);
        $product->bindValue(':description', $data['description'], PARAM_STR);

        $product->execute();
        return $this->connection->lastInsertId();

    }


    public function findAll(){

        $sql= 'select * from products';
        $products= $this->connection->prepare($sql);
        $products->execute();
        return $products->fetchAll(PDO::FETCH_OBJ);


    }
    public function findSearch($name){

        $sql = 'select * from products';
        $sql .= 'where name = :name';

        $product = $this->connection->prepare($sql);

        $product->bindValue(':name', $name, PDO :: PARAM_STR);
        $product->execute();

        return $product->fetch(PDO :: PARAM_OBJ);

        
    }
    


}