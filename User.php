<?php

require_once "DbObject.php";

class User extends DbObject{

  public $id;
  public $name;
  public $email;
  public $username;
  public $password;
  public $hashed_password;
  static public $table_name = "users";
  static public $columns = ["name", "email", "username", "hashed_password"];
  
  public function __construct($args = []) {
      
      $this->name = $args['name'];  
      $this->email = $args['email'];
      $this->username = $args['username'];  
      $this->password = $args['password']; 
  }

}
?>