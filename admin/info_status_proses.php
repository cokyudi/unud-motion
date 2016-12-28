<?php
	include '../config.php';
	  
	$stmt = mysqli_prepare($link, "UPDATE info SET status = ? WHERE id = ? ");
	
	$status = $_POST['status'];
	$id = $_POST['id'];

	mysqli_stmt_bind_param($stmt, "ss", $status, $id);
	mysqli_stmt_execute($stmt);
	  
	if (!$stmt) {
	   die('Query Error : '.mysqli_errno($link).' - '.mysqli_error($link));
	}
	else {
		header("Location: info.php");
	}
  

?>