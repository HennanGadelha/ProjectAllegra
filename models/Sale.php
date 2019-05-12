<?php
require('core/Database.php');

class Sale{

    
    private $date;
    private $connection;
    

    

    public function __construct(){
        
        $this->connection = (new Database())->connect();
        $this->date = date("d-m-Y H:i:s");

    }


    public function insert($value) {

        $sql = 'INSERT INTO sale ';
        $sql .= '(value, date) ';
        $sql .= 'VALUES (:value, now())';

        $sale = $this->connection->prepare($sql);

        $sale->bindValue(':value', $value, PDO::PARAM_INT);
        $sale->bindValue('now', $data['value'], PDO::PARAM_INT);
         
         
        $sale->execute();

        return $this->connection->lastInsertId();

    } 

}