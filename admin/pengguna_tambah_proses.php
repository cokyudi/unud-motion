<?php
	include '../config.php';
	  
	$stmt = mysqli_prepare($link, "INSERT INTO user(user, password, role)
VALUES (?, ?, ?)");

	mysqli_stmt_bind_param($stmt, "sss", 
$user, $password, $role);

	$user = $_POST['user'];
	$password = md5($_POST['password']);
	$role = $_POST['role'];
	
	mysqli_stmt_execute($stmt);
	
  	if (!$stmt) {
	   die('Query Error : '.mysqli_errno($link).' - '.mysqli_error($link));
	}
	else {
		header("Location: pengguna.php");
	   //echo "Penambahan ".mysqli_stmt_affected_rows($stmt)." data berhasil<br />";
	}

?>