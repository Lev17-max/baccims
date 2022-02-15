


<?php
	include 'connection.php';

	

	 
    if(isset($_POST['id']) && isset($_POST['date']) && isset($_POST['subject']) && isset($_POST['message'])){

	$composer_id = $_POST['id'];
	$date = $_POST['date'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
		
	$mess = $subject . ':' . $message;


	include 'api_msg_details.php';
include 'sms-api-details.php';
			include 'sms-api.php';
	$query = $connect->prepare("INSERT INTO `message` (`SUBJECT`, `MESSAGE`, `DATE`, `SENDER_ID`) VALUES (:subject, :message, :timesend, :id)");
	$query->bindParam(':subject', $subject);
	$query->bindParam(':message', $message);
	$query->bindParam(':timesend', $date);
	$query->bindParam(':id', $composer_id);
	$query->execute();

	if($query) {
		$look = $connect->prepare('SELECT * FROM user U 
									JOIN user_details UD 
									ON U.USER_DETAILS_ID = UD.ID
									WHERE U.STATUS != 1 AND U.ACCESS_LEVEL = 0 AND VERIFIED = 1');
		$look->execute();
		$data = $look->fetchAll();
		foreach ($data as $row) {
			
			
			$arr = checkServer($apicode);
			foreach ($arr as $array) {
				foreach ($array as $key => $value) {
					if ($key === 'MessagesLeft') {
						$number_of_ms_left = $value;
					}
				}
			}
		
			if ($number_of_ms_left != 0) {
				$result = itexmo(str_pad($row['PHONE'], 11, '0', STR_PAD_LEFT), $mess, $apicode, $pass);
				if ($result == 0) {
		
					echo true;
				} else {
		
					echo false;
				}
			} else {
		
				//FAILED
				echo 0;
			}

		}

	} else {
		echo 3;
	}





	


	// function checkServer($apicode)
	// {
	// 	$url = 'https://itexmo.com/php_api/serverstatus.php?apicode='.$apicode;
	// 	$data =  json_decode(file_get_contents($url, false),true);
	// 	if(is_array($data)){
	// 		return 'This is array';
	// 	}else{
	// 		return 'This is not array';
	// 	}
	// }


	}
?>