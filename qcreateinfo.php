<?php
// buat koneksi dengan MySQL, gunakan database: universitas
$link = mysqli_connect('localhost', 'root', '', 'udayana_motion');
  
// buat prepared statements
$stmt = mysqli_prepare($link, "INSERT INTO info 
VALUES ('1408605048', ?, ?, ?, ?)");
  
// hubungkan "data" dengan prepared statements
mysqli_stmt_bind_param($stmt, "ssss", 
	$tanggal, $judul_info, $deskripsi, $foto);
  
// siapkan "data" query 1
$POST['tanggal']=date('Y-m-d');
$judul_info=$_POST['judul_info'];
$deskripsi=$_POST['deskripsi'];
$foto=$_POST['foto'];

  
// jalankan query 1
mysqli_stmt_execute($stmt);
  
// cek hasil query 1
if (!$stmt) {
   die('Query Error : '.mysqli_errno($link).' - '.mysqli_error($link));
}
else {
	header("Location: info.php");
   //echo "Penambahan ".mysqli_stmt_affected_rows($stmt)." data berhasil<br />";
}
  

?>