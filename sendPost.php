<?php


$composer_id = $_POST['id'];
$date = $_POST['date'];
$message = $_POST['message'];
$target_dir = "post/";
$name = '';
include 'connection.php';
$uploadStats = 0;

if(file_exists($target_dir)){

}else{
	mkdir($target_dir);
}




$query = $connect->prepare("SELECT * FROM user_details where ID =:composer_id");
$query->bindParam(':composer_id', $composer_id);
$query->execute();
$countcredentials = $query->rowCount();

if ($countcredentials > 0) {
	$finalfile = '';
	$data = $query->fetchAll();
	foreach ($data as $row) {
		// code...
		$name = $row['FIRST_NAME'];
	}
	$count = count($_FILES);
	for ($i = 0; $i < $count; $i++) {
		/* Location */
		$filename =
			$target_file = $target_dir . basename($_FILES['file_' . $i]['name']);

		/* Upload file */
		if (move_uploaded_file($_FILES['file_' . $i]['tmp_name'], $target_file)) {
			$temp = explode(".", $target_file);
			$newfilename = $target_dir . strtolower(date('YmdHis', strtotime($date))) . $i . '_' . strtolower($name) . '.' . end($temp);
			rename($target_file, $newfilename);
			$finalfile = $finalfile . ':' . $newfilename;


			$uploadStats = 1;
		} else {
			$uploadStats = 0;
			echo '2';
		}
	}

	if ($uploadStats == 1) {
		//send database
		$query1 = $connect->prepare("INSERT INTO `info_board`(`SENDER_ID`, `DETAILS`, `DATE_POSTED`, `IMAGES`) VALUES(:id,:message,:dateposted,:images)");
		$query1->bindParam(':id', $composer_id);
		$query1->bindParam(':dateposted', $date);
		$query1->bindParam(':message', $message);
		$query1->bindParam(':images', $finalfile);
		$query1->execute();

		if ($query1) {
			echo '1';
		}
	} else {
		echo '3';
	}
} else {
	echo '0';
}




 // echo $composer_id.$date.$message;
