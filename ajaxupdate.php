<?php
	
	$myConnection = mysqli_connect('localhost','root','', 'service') or die ("could not connect to mysql"); 
	$id = $_POST['main_id'];
	$name=$_POST['name'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$sqlCommand = "UPDATE tbl_service set name='$name', phone='$phone', email='$email', address='$address' WHERE id = '".$id."'";
	$query = mysqli_query($myConnection, $sqlCommand) or die(mysqli_error($myConnection));
	
?>		