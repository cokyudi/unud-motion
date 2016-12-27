<?php 
	include '../config.php';

	$id=$_GET['id'];
	$sql = "DELETE FROM pengaduan WHERE id=$id";

	if (mysqli_query($link, $sql)) {
	    header("Location: pengaduan.php");
	} else {
	    echo "Error deleting record: " . mysqli_error($link);
	}

 ?>