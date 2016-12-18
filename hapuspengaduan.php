<?php 
	$link = mysqli_connect("localhost", "root", "","udayana_motion");

	$id=$_GET['id'];
	$sql = "DELETE FROM pengaduan WHERE id=$id";

	if (mysqli_query($link, $sql)) {
	    header("Location: pengaduan.php");
	} else {
	    echo "Error deleting record: " . mysqli_error($link);
	}

 ?>