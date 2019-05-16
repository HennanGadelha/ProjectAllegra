<?php
require('core/Database.php');



 class Products{
 
    private $connection;
    private $category;


    public function __construct(){

        $this->connection = (new Database())->connect();
        $this->category = new Category();
}
    public function insert($data){

        $sql = 'INSERT INTO  products ';
        $sql .= '(name, price, genre, description, productsCategory) ';
        $sql .= ' VALUES (:name, :price, :genre, :description, :productsCategory)';
        $product = $this->connection->prepare($sql);
        $product->bindValue(':name', $data['name'], PDO::PARAM_STR);
        $product->bindValue(':price', $data['price'], PDO::PARAM_STR);
        $product->bindValue(':genre', $data['genre'], PDO::PARAM_STR);
        $product->bindValue(':description', $data['description'], PDO::PARAM_STR);
        $product->bindValue(':productsCategory', $data['productsCategory'], PDO::PARAM_INT);

        $product->execute();
        return $this->connection->lastInsertId();

    }
    public function update($data) {

        $sql = 'UPDATE products SET ';
        $sql .= 'name=:name, price=:price, genre=:genre, description=:description';
        $sql .= ' where cod = :cod';
        $product = $this->connection->prepare($sql);
        $product->bindValue(':cod', $data['cod'],PDO::PARAM_INT);
        $product->bindValue(':name', $data['name'],PDO::PARAM_STR);
        $product->bindValue(':price', $data['price'],PDO::PARAM_STR);
        $product->bindValue(':genre', $data['genre'], PDO::PARAM_STR);
        $product->bindValue(':description', $data['description'], PDO :: PARAM_STR);
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
        $product->bindValue(':minPrice', $minPrice, PDO :: PARAM_INT);
        $product->bindValue(':maxPrice', $maxPrice, PDO :: PARAM_INT);
        $product->execute();
        return  $product->fetchAll(PDO::FETCH_OBJ);

    }//metodo em contruçao 




    
    


}