<?php 
	include '../config.php';

	$id=$_GET['id'];
	$sql = "DELETE FROM info WHERE id=$id";

	if (mysqli_query($link, $sql)) {
	    header("Location: info.php");
	} else {
	    echo "Error deleting record: " . mysqli_error($link);
	}

 ?>