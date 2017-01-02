<?php
	include '../config.php';
	  
	$stmt = mysqli_prepare($link, "INSERT INTO pengaduan (oleh_user, nama_laporan, foto, deskripsi, jenis_laporan, tgl_dibuat, status) VALUES (?, ?, ?, ?, 'laporan', ?, 'laporan') ");
	

	$oleh_user = INSTANSI_ID;
	$nama_laporan = $_POST['nama_laporan'];
	$deskripsi = $_POST['deskripsi'];
	$tgl_dibuat = date('Y-m-d H:i:s');

	$uploadOk = 1;
	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["foto"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }
	}

	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	    $foto = file_get_contents($_FILES['foto']['tmp_name']);
		$foto = base64_encode($foto);
	}

	mysqli_stmt_bind_param($stmt, "sssss", $oleh_user, $nama_laporan, $foto, $deskripsi, $tgl_dibuat);
	mysqli_stmt_execute($stmt);
	  
	if (!$stmt) {
	   die('Query Error : '.mysqli_errno($link).' - '.mysqli_error($link));
	}
	else {
		header("Location: pengaduan.php");
	}
  

?>