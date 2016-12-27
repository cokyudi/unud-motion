<?php
	include '../config.php';
	  
	$stmt = mysqli_prepare($link, "UPDATE pengaduan SET nama_laporan = ?, deskripsi = ?, status = ?, kepada_user = ? WHERE id = ? ");
	
	$nama_laporan = $_POST['nama_laporan'];
	$deskripsi = $_POST['deskripsi'];
	$status = isset($_POST['status']) ? 'terverifikasi' : 'belum diverifikasi';
	$kepada_user = $_POST['kepada_user'];
	$id = $_POST['id'];

	mysqli_stmt_bind_param($stmt, "sssss", $nama_laporan, $deskripsi, $status, $kepada_user, $id);
	mysqli_stmt_execute($stmt);
	  
	if (!$stmt) {
	   die('Query Error : '.mysqli_errno($link).' - '.mysqli_error($link));
	}
	else {
		header("Location: pengaduan.php");
	}
  

?>