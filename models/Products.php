<?php
require('core/Database.php');


 class Products{
 
    private $connection;
    //private $category = new Category();


    public function __construct(){

        $this->connection = (new Database())->connect();

    }

    public function insert($data){

        $sql = 'INSERT INTO  products ';
        $sql .= '(name, price, genre, description) ';
        $sql .= ' VALUES (:name, :price, :genre, :description)';

        $product = $this->connection->prepare($sql);

        $product->bindValue(':name', $data['name'], PDO::PARAM_STR);
        $product->bindValue(':price', $data['price'], PDO::PARAM_INT);//verificar compatibliddade
        $product->bindValue(':genre', $data['genre'], PDO::PARAM_STR);
        $product->bindValue(':description', $data['description'], PDO::PARAM_STR);

        $product->execute();
        return $this->connection->lastInsertId();

    }

    public function update($data) {


        $sql = 'UPDATE products SET ';
        $sql .= '(name, price, genre, description)';
        $sql .= ' VALUES (:name, :price, :genre, :description) where cod = :cod';

        $product = $this->connection->prepare($sql);

        $product->bindValue(':cod', $data['cod'], PARAM_STR);
        $product->bindValue(':name', $data['name'], PARAM_STR);
        $product->bindValue(':price', $data['price'], PARAM_STR);//verificar compatibliddade
        $product->bindValue(':genre', $data['genre'], PARAM_STR);
        $product->bindValue(':description', $data['description'], PARAM_STR);

        return $product->execute();

    }

    public function delete($cod) {

        $sql = 'DELETE * FROM products WHERE cod = :cod';

        $product = $this->connection->prepare($sql);

        $product->bindValue(':cod', $cod, PDO :: PARAM_INT);

        return $product->execute();
    }


    public function findAll(){

        $sql= 'select * from products';
        $products= $this->connection->prepare($sql);
        $products->execute();
        return $products->fetchAll(PDO::FETCH_OBJ);


    }
    public function searchName($name){

        $sql = 'SELECT * from products';
        $sql .= 'WHERE name = :name';

        $product = $this->connection->prepare($sql);

        $product->bindValue(':name', $name, PDO :: PARAM_STR);
        $product->execute();

        return $product->fetch(PDO :: PARAM_OBJ);

        
    }

    public function searchPrice($minPrice, $maxPrice) {

        $sql = 'SELECT * FROM products';
        $sql = 'WHERE price BETWEEN :minPrice and maxPrice';

        $product = $this->connection->prepare($sql);

        $product->bindValue(':minPrice', $minPrice, PDO :: PARAM_STR);
        $product->bindValue(':maxPrice', $maxPrice, PDO :: PARAM_STR);
       
        $product->execute();
        return  $product->fetchAll(PDO::FETCH_OBJ);

    }//metodo em contruçao 




    
    


}