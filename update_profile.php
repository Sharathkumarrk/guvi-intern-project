<?php
include_once("db.php");
if(isset($_POST['create_acc'])) {
	$user_name = $_POST['user_name'];
	$user_email = $_POST['email'];
	$user_linkedin = $_POST['user_linkedin'];
	$sql = "SELECT * FROM users WHERE user_email='$user_email'";
	$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
	$row = mysqli_fetch_assoc($resultset);
	if(!$row['email']){
		$stmt = $conn->prepare("UPDATE users SET user_name=?, user_email=?, user_linkedin=? WHERE user_email='$user_email'");
		$stmt->bind_param("sss", $user_name, $user_email, $user_linkedin);
		$stmt->execute();
	} else {
		echo "fail";
	}
}
?>