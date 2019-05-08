<?php
require('core/Database.php');

class Users {

   
    private $connection;


    public function __construct() {

       
        $this->connection = (new Database())->connect();
    }
 
    public function getCodUserr(){
        return $this->codUser;
    }

    public function setCodUser($codUser){
        $this->codUser =  $codUser ;
    }
    

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name =  $name;
    }

    public function getAddress(){
        return $this->address;
    }

    public function setAddress($address){
        $this->address =  $address;
    }

    public function  getPhone(){
        return $this->phone;
    }

    public function setPhone($phone){
        $this->phone =  $phone ;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email =  $email;
    }

    public function getSex(){
        return $this->sex;
    }

    public function setSex($sex){
        $this->sex =  $sex;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPassword($password){
        $this->password =  $password;
    }


    public function insert($data){
        $sql = 'INSERT INTO users ';
        $sql .= '(name,  cpf, address, phone, email,  password, sex) ';
        $sql .= 'VALUES (:name,  :cpf, :address, :phone, :email,  :password, :sex) ';

        $user = $this->connection->prepare($sql);

        $user->BindValue(':name', $data['name'],PDO::PARAM_STR);
        $user->BindValue(':cpf', $data['cpf'],PDO::PARAM_STR);
        $user->BindValue(':address', $data['address'],PDO::PARAM_STR);
        $user->BindValue(':phone', $data['phone'],PDO::PARAM_STR);
        $user->BindValue(':email', $data['email'],PDO::PARAM_STR);
        $user->BindValue(':password', $data['password'],PDO::PARAM_STR);
        $user->BindValue(':sex', $data['sex'],PDO::PARAM_STR);
  

        $user->execute();
        return $this->connection->lastInsertId();

    }


    public function findAll () {

        $sql= 'select * from users';
        $user= $this->connection->prepare($sql);
        $user->execute();
        return $user->fetchAll(PDO::FETCH_OBJ);
    }

    




}