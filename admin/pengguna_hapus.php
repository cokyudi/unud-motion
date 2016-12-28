<?php 
	include '../config.php';

	$user=$_GET['user'];
	$sql = "DELETE FROM user WHERE user='$user'";

	if (mysqli_query($link, $sql)) {
	    header("Location: pengguna.php");

	} else {
	    echo "Error deleting record: " . mysqli_error($link);
	}

 ?>