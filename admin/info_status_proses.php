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
		// FIREBASE
		if ($status == 1) {
			$result = mysqli_query($link, "
				SELECT i.*, u.nama, DATE_FORMAT(tanggal, '%W, %d %b %Y') as tanggal, u.foto as foto_profil, i.foto as foto_info
				FROM info i
				JOIN user u ON u.user = i.user
				WHERE id = $id
			");
			if ($row=mysqli_fetch_assoc($result)) {
				$message = array(
					'message' => $row['deskripsi'], 
					'title' => $row['judul_info'], 
					'id' => $row['id'],
					'nama' => $row['nama'],
					'tanggal' => $row['tanggal'],
					'foto_info' => $row['foto_info'],
					'foto_profil' => $row['foto_profil'],
				);
			}
			
			$result = mysqli_query($link, "SELECT * FROM token");
			$tokens = array();
			$key = 0;
			while ($row=mysqli_fetch_assoc($result)) {
				$tokens[$key] = $row['token'];
				$key++;
			}

			//var_dump($tokens);

			$url = 'https://fcm.googleapis.com/fcm/send';
			$field = array(
				'registration_ids' => $tokens,
				'data' => $message
			);

			$headers = array(
				'Authorization: key = AAAAYrk-vfw:APA91bEUn0nQ7N0Iza2oE2CIr_rUHDR9nKww0JNIhQO5Xn21TW8oXwtiAlKUeIs0f-HHcy5ayRIXCGFFZ--hhOF72U3zmjjJCbALuFl36p7DSM08dxDbjkilXshkLIcS32pPmjIdG7hsPcZco9W1GH93qfpPO5zsSQ', 
				'Content-Type: application/json'
			);

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($field));
			$result = curl_exec($ch);
			if ($result === FALSE) {
				die('Curl failed: '.curl_error($ch));
			}
			curl_close($ch);

			echo $result;
		}
		

		header("Location: info.php");
	}
  

?>