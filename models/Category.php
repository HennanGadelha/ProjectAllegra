<?php

require('core/DataBase.php');


class Category {

    private $connection;

   public function __construct(){

        $this->connection = (new Database())->connect();

   }


   public function insert($data){

        $sql = 'INSERT INTO category ';
        $sql .= '(name) VALUES (:name)';

        $category = $this->connection->prepare($sql);

        $category->bindValue(':name', $data['name'], PDO::PARAM_STR);

        $category->execute();

        return $this->connection->lastInsertId();
   }

   public function update($cod) {

        $sql = 'UPDATE  category SET ';
        $sql .= '(name) VALUES (name) ';
        $sql .= 'WHERE cod = :cod';

        $category = $this->connection->prepare($sql);

        $category->bindValue(':cod', $cod, PDO::PARAM_INT);
        $category->bindValue(':cod', $cod, PDO::PARAM_STR);

        return $category->execute();

   }

   public function delete($cod){

        $sql = 'DELETE * FROM category where cod = :cod';

        $category = $this->connection->prepare($sql);
        $category->bindValue(':cod', $cod, PDO::PARAM_INT);

        return $category->execute();
   }

   public function findOne($name) {

        $sql = 'SELECT * FROM category WHERE name=:name ';

        $category = $this->connection->prepare($sql);

        $category->bindValue(':name',$name, PDO::PARAM_STR);

        $category->execute();

        return fetch(PDO::PARAM_OBJ);


    


   }



}