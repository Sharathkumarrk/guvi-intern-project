<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <?php
    include_once("DbObject.php");
    ?>
    <meta charset="UTF-8">
    <title>Login with PHP and Ajax</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
<script>
 if (!localStorage.email) {
    window.location = 'index.php';
 }
</script>
    <?php
    include_once("db.php");
    $sql = "SELECT * FROM users WHERE username = '{$_SESSION['username']}'";
    $res = mysqli_query($conn, $sql);
    $red = "";
    while ($row = mysqli_fetch_array($res)) {
        $red  = $row['username'];
    }
    if ($red == $_SESSION['email']) {
        $sql1 = "SELECT * FROM users WHERE username = '{$_SESSION['username']}'";
        $res1 = mysqli_query($conn, $sql);
    ?>
                <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6" id="form">
                <h5><span class="text_1_login" id="welcome">Welcome Back: <img src="" style="width: 20px;"></span></h5>
                <div id="loading" class="alert alert-info alert-dismissable hide"> 
                       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                   </div>       
                <div class="form-group-update">
                          <label for="name">Update Name</label>
                          <div id="error_name"></div>
                          <input type="text" class="form-control" name="register[name]" placeholder="Update Username" id="name">
                      </div>
                      <div class="form-group-update">
                          <label for="email">Update Email</label>
                          <div id="error_email"></div>
                          <input type="email" class="form-control" name="register[email]" placeholder="Update Email" id="email">
                      </div>
                      <div class="form-group-update">
                          <label for="username">Update Password</label>
                          <div id="error_password"></div>
                          <input type="password" class="form-control" name="register[password]" placeholder="Update your password" id="password-register">
                      </div>
                      <div class="form-group">
                          <button class="btn btn-primary" id="updatedetails">Update Details Now!</button>   
                      </div>
                      <div class="login-row donroo row no-margin">
                            <a class="btn btn-warning btn-sm" href="logout.php" id="Logout" role="button" onclick="localStorage.clear();">Logout</a>
                     </div>

                </div>
            </div>
            </div>
            </div>
        <?php  ?>
    <?php
    } else {
        echo '<div class="login-row row no-margin" style="text-align: center"><h1 class="alert alert-danger">Check with your email and password</h1></div>';
        echo '<div class="text-center"><a class="btn btn-primary btn-lg" href="index.php" role="button">Back To Home</a></div>';
    }
    ?>

<script>
    if (localStorage.email) {
        document.getElementById('welcome').innerHTML += "Currently Logged in as " + localStorage.getItem('email');
    }
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script type="text/javascript" src="scripts/update.js"></script>

</body>

<p class="card-text" id="Welcome"></p>
<p class="card-text" id="WelcomeN"></p>

</html>