<?php
	include '../config.php';
	  
	$stmt = mysqli_prepare($link, "INSERT INTO pengaduan (oleh_user, nama_laporan, foto, deskripsi, jenis_laporan, tgl_dibuat, status) VALUES (?, ?, ?, ?, 'laporan', ?, 'laporan') ");
	

	$ext = end((explode(".", $_FILES["foto"]["name"])));

	$oleh_user = INSTANSI_ID;
	$nama_laporan = $_POST['nama_laporan'];
	$foto = 'uploads/pengaduan_'.time().'.'.$ext;
	$deskripsi = $_POST['deskripsi'];
	$tgl_dibuat = date('Y-m-d h:i:s');

	echo $foto;

	$target_dir = UPLOADS_PATH;
	$target_file = $target_dir . basename($foto);

	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
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
	    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
	        echo "The file ". basename( $_FILES["foto"]["name"]). " has been uploaded.";
	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }
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