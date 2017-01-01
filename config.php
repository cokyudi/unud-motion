<?php 
	//$link = mysqli_connect("localhost", "root", "", "udayana_motion");

	//define("SITE_URL", "http://localhost/adm_unud_motion/");
	//define("FILE_URL", "http://localhost/adm_unud_motion/");

	//define("UPLOADS_PATH", "../uploads/")

	$link = mysqli_connect("mysql.idhostinger.com", "u604006581_root", "12345678", "u604006581_unud");

	define("SITE_URL", "http://unud-motion.hol.es/");
	define("FILE_URL", "http://unud-motion.hol.es/api/");

	define("INSTANSI_ID", "ilmu_komputer");
	define("UPLOADS_PATH", "../api/uploads/");

	date_default_timezone_set('Asia/Makassar');
?>