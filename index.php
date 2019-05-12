<?php


require('models/Products.php');


if(isset($_POST['action']) && $_POST['action'] == 'insert') {
    
    $product = new Products();
    echo json_encode($product->insert($_POST));
    return;
}

/*if(!isset($_GET['action'])) {
   
    $user = new Users();
    echo json_encode($user->findAll());
    
}


if(isset($_POST['action']) && $_POST['action'] == 'update') {

    $user = new Users();

    if($user->update($_POST)){

        echo 'updated';
    }
    return;
}

if(isset($_GET['action']) && $_GET['action'] == 'show' && isset($_GET['codUsers'])) {
    $user = new Users();
    echo json_encode($user->findOne($_GET['codUsers']));
  }*/



 