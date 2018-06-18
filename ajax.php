 
<?php
include('config.php');
//Fetching Values from URL
$name=$_POST['name'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$address=$_POST['address'];
//Insert query
		$sql = "INSERT INTO `tbl_service` (name,phone,email,address) VALUES ('".$_POST['name']."','".$_POST['phone']."','".$_POST['email']."','".$_POST['address']."')";
		$result = mysqli_query($conn, $sql);

?> 
