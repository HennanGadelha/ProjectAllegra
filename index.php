<?php

require('models/Users.php');


if(isset($_POST['action']) && $_POST['action'] == 'insert') {
    
    $sale = new Sale();
    echo json_encode($sale->insert($_POST));
    return;
}

if(!isset($_GET['action'])) {
   
    $user = new Users();
    echo json_encode($user->findAll());
    
}


if(isset($_POST['action']) && $_POST['action'] == 'update') {

    $product = new Products();

    if($product->update($_POST)){

        echo 'updated';
    }
    return;
}

if(isset($_GET['action']) && $_GET['action'] == 'show' && isset($_GET['cod'])) {
    $user = new Users();
    echo json_encode($user->findOne($_GET['cod']));
  }

  if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['cod'])) {
   
    $user = new Users();
    if($user->delete($_GET['cod'])) {
      echo 'Deleted!';
    }
    
    return;
  }

//http://localhost/Allegra/index.php?action=delete&cod=1
 