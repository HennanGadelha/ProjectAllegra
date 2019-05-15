<?php
require('core/Database.php');
require('models/Users.php');

class Sale{

    
    private $date;
    private $connection;
    private $user;
    private $products;

   
    public function __construct(){
        
        $this->connection = (new Database())->connect();
        $this->date = date("d-m-Y H:i:s");
        $this->user = new Users();
        $this->products = [];

    }


    public function insert($data) {

        $sql = 'INSERT INTO sale ';
        $sql .= '(value, date) ';
        $sql .= 'VALUES (:value, now())';

        $sale = $this->connection->prepare($sql);

        $sale->bindValue(':value', $data['value'], PDO::PARAM_INT);
        
        $sale->execute();

        return $this->connection->lastInsertId();

    } 


}