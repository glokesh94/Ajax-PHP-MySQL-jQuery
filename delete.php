<?php


	$myConnection = mysqli_connect('localhost','root','', 'service') or die ("could not connect to mysql"); 
	$id = $_GET['id'];
	$sqlCommand = "DELETE  FROM tbl_service WHERE id = '".$id."'";
	$query = mysqli_query($myConnection, $sqlCommand) or die(mysqli_error($myConnection));
	header('location:index.php');


?>		
