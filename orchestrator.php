<?php

require_once "DbObject.php";
include "User.php";

if(isset($_POST['formData']) && isset($_POST['action'])) { 
    
    $data = $_POST['formData'];  
    $action = $_POST['action'];  
    $username = $data['username']; 
    $password = $data['password'];    
        
    if($action == "register") {    
        
        $args = [];   
        $args['name'] = $data['name'];  
        $args['email'] = $data['email'];
        $args['username'] = $data['username'];
        $args['password'] = $data['password'];

        $user = new User($args);  
        $user->create($args);  
       
        print_r($user); 
    }

    if($action == "login") {   
        
        $args = [];    
        $args['username'] = $data['username']; 
        $args['password'] = $data['password'];

        $user = new User($args);  
        $result = $user->login_check($args);  

        if (gettype($result) === "boolean" ){
            echo json_encode(array('success' => 0));
        }else{
            echo json_encode(array('success' => 1));
        }
    }


    if($action == "update") {    
        
        $args = [];    
        $args['username'] = $data['username']; 
        $args['password'] = $data['password'];
        $args['name'] = $data['name'];

        $user = new User($args);  
        $result = $user->update_user($args);  
        
        print_r("Printing the result");
        print_r($result);
        if (gettype($result) === "boolean" ){
            echo json_encode(array('success' => 0));
        }else{
            echo json_encode(array('success' => 1));
        }
    }
}
?>