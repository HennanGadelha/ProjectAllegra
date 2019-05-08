<?php

 class Products{
 
    private $codProduct;
    private $name;
    private $price;
    private $description;


    public function __construct($codProduct, $name, $price,$description){

        $this->codProduct =$codProduct;
        $this->name = $name;
        $this->price =$price;
        $this->description= $description;

    }


    public function findAll(){


    }
    public function findSearch($name){

        
    }
    


}