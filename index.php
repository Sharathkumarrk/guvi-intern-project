<?php 
include "db.php";
include "DbObject.php";
include "login.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login with PHP and Ajax</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
<div class="container" id="formContainer">
   <div class="row">
       <div class="col-sm-12 col-md-6 col-lg-6" id="form">

<!--LOGIN FORM-------------------------->          
           <form method="post" action="" id="loginForm">
               <div id="imgContainer">
                   <img src="images/login-img_adobe_express.svg">
                   <h2>Login</h2>
               </div>
               <div class="container">
                  <div id="loginMsgs"></div>
                  <div id="loading_login" class="alert alert-info alert-dismissable hide"> 
                       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                   </div>
                      <div class="form-group">
                          <label for="username">Username</label>
                          <div id="error_username"></div>
                          <input type="text" class="form-control" name="user[username]" id="username-login">
                       </div>
                      <div class="form-group">
                          <label for="username">Password</label>
                          <div id="error_password"></div>
                          <input type="password" class="form-control" name="user[password]" id="password-login">
                      </div>
                      <div class="form-group">
                          <button class="btn btn-primary" id="submit">Login</button>   
                      </div>
               </div>
           </form>
           
           
    <!--REGISTRATION FORM---------------------->

           <form method="post" action="" id="registerForm">
               <div id="imgContainer">
                   <img src="images/login-img_adobe_express.svg">
                   <h4>Let 's get your account setup</h4>
               </div>
               <div class="container">               
                   <div id="loading" class="alert alert-info alert-dismissable hide"> 
                       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                   </div>                    
                      <div class="form-group1">
                          <label for="name">Name</label>
                          <div id="error_name"></div>
                          <input type="text" class="form-control" name="register[name]" placeholder="Enter your full name" id="name">
                      </div>  
                      <div class="form-group1">
                          <label for="email">Email</label>
                          <div id="error_email"></div>
                          <input type="email" class="form-control" name="register[email]" placeholder="Enter your email" id="email">
                      </div>
                      <div class="form-group1">
                          <label for="username">Username</label>
                          <div id="error_username"></div>
                          <input type="text" class="form-control" name="register[username]" placeholder="Create your username" id="username-register">
                       </div>
                      <div class="form-group1">
                          <label for="username">Password</label>
                          <div id="error_password"></div>
                          <input type="password" class="form-control" name="register[password]" placeholder="Create a password" id="password-register">
                          <i id="visibilityBtn"><span class="material-icons" id="viewBtn">visibility</i>
                      </div>
                      <div class="form-group">
                          <button class="btn btn-primary" id="register">Register Now!</button>   
                      </div> 
                 </div>  
           </form>
           
           <div id="registerBtnContainer">
                <p>No account? Sign up for free!</p>
                <span><button id="registerBtn" class="btn btn-outline-primary">Register</button></span>
           </div>
           
           <div id="loginBtnContainer">
                <p>Already signed up? Login now</p>
               <span><button id="loginBtn" class="btn btn-outline-primary">Login</button></span>
           </div>

            <!--
            //Can be implemented in future
           <div>
                <span>Forgot Username?</span> <span>Forgot Password?</span>
           </div> 
           -->

           <br />
       </div>
   </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="scripts/scripts.js" type="text/javascript"></script>
</body>
</html>