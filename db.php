<?php
# Trying to connect to DB using mysqli_connect. 
# Reimplemented in DbObject with better OOPS concepts. Revisit if this file is needed.
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_ajax";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>