<?php

require('models/Users.php');


if(isset($_POST['action']) && $_POST['action'] == 'insert') {
    
    $user = new Users();
    echo json_encode($user->insert($_POST));
    return;
}
/*
if(!isset($_GET['action'])) {
   
    $user = new Users();
    echo json_encode($user->findAll());
}*/
