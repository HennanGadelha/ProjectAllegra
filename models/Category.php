<?php

class Category {

    private $codCategory;
    private $name;
    

   public function __construct($name){

  //  $this->codCategory;
    $this->$name = $name;
   }


   public function findAll () {   
        $sql = "Select * from users ";
    
    }

    public function findOne($COD_Category){

        //
    }



}