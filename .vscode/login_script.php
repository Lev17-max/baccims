<?php

include 'connection.php';
session_start();

// call variables
$username = $_POST['user_login'];
$usernameenc = md5($username);
$password = $_POST['user_pass'];
$passwordenc = md5($password);


$query = $connect->prepare("SELECT * FROM user U 
							LEFT JOIN (SELECT * FROM user_details) UD 
							ON UD.ID = U.USER_DETAILS_ID 
							WHERE USERNAME=:uname 
							AND PASSWORD=:pass");

$query->bindParam(':uname', $usernameenc);
$query->bindParam(':pass', $passwordenc);
$query->execute();

$countcredentials = $query->rowCount();
$data = $query->fetchAll();

if ($countcredentials <= 0) {
	header("location:index.php?user_not_found");
	
} else {
	foreach ($data as $row) {
		$str = ucfirst(strtolower($row['FIRST_NAME'])) . ' ' . substr(ucfirst(strtolower($row['MIDDLE_NAME'])), 0, 1) . ' ' . ucfirst(strtolower($row['LAST_NAME']));
		if ($row['VERIFIED'] == 0 || $row['VERIFIED'] == 3 || $row['STATUS'] == 1) {
			$_SESSION['YOUR_NAME'] = '' . ucfirst(strtolower($row['FIRST_NAME']));
			$_SESSION['VERIFIED'] = $row['VERIFIED'];
			$_SESSION['STATUS'] = $row['STATUS'];
			$_SESSION['GENDER'] = $row['GENDER'];

			header("location:lobby.php");
		}else if($row['VERIFIED'] == 2) {
			$_SESSION['USER_ID'] = $row['ID'];
			$_SESSION['FIRST_NAME'] = $row['FIRST_NAME'];
			$_SESSION['GENDER'] = $row['GENDER'];
			$_SESSION['LAST_NAME'] = $row['LAST_NAME'];
			$_SESSION['USER_ID'] = $row['USER_DETAILS_ID'];
			$_SESSION['YOUR_NAME'] = '' . ucfirst(strtolower($row['FIRST_NAME']));

			header("location:lobby_send_pic.php");
		}else if($row['VERIFIED'] == 4) {
			$_SESSION['USER_ID'] = $row['ID'];
			$_SESSION['FIRST_NAME'] = $row['FIRST_NAME'];
			$_SESSION['GENDER'] = $row['GENDER'];
			$_SESSION['LAST_NAME'] = $row['LAST_NAME'];
			$_SESSION['USER_ID'] = $row['USER_DETAILS_ID'];
			$_SESSION['YOUR_NAME'] = '' . ucfirst(strtolower($row['FIRST_NAME']));

			header("location:lobby-personel.php");
		} else if($row['STATUS'] == 2){
			$_SESSION['USERNAME'] = $str;
			$_SESSION['GENDER'] = $row['GENDER'];
			$_SESSION['USER_ID'] = $row['USER_DETAILS_ID'];
		    if ($row['ACCESS_LEVEL'] == 0) {
				if ($row['GENDER'] == 'Male') {
					$_SESSION['ICON'] = 'dist/img/user_level/user.png';
				} else {
					$_SESSION['ICON'] = 'dist/img/user_level/user-fmale';
				}
			}
			if($row['ACCESS_LEVEL'] == 1){
				$_SESSION['ICON'] = 'dist/img/user_level/police.png';
			}
			if ($row['ACCESS_LEVEL'] == 2) {
				if ($row['GENDER'] == 'Male') {
					$_SESSION['ICON'] = 'dist/img/user_level/barangay.png';
				} else {
					$_SESSION['ICON'] = 'dist/img/user_level/fmale-barangay.png';
				}
			}
			if ($row['ACCESS_LEVEL'] == 3) {

				$_SESSION['ICON'] = 'dist/img/user_level/admin.png';
			}
			header("location:create-new-password-page.php");
		}
		else {
			$_SESSION['USERNAME'] = $str;
			$_SESSION['GENDER'] = $row['GENDER'];
			$_SESSION['USER_ID'] = $row['USER_DETAILS_ID'];
			$_SESSION['VERIFIED'] = $row['VERIFIED'];
			$_SESSION['STATUS'] = $row['STATUS'];
			$_SESSION['ACCESS_LEVEL'] = $row['ACCESS_LEVEL'];
		    if ($row['ACCESS_LEVEL'] == 0) {
				if ($row['GENDER'] == 'Male') {
					$_SESSION['ICON'] = 'dist/img/user_level/user.png';
				} else {
					$_SESSION['ICON'] = 'dist/img/user_level/user-fmale.png';
				}
			}
			if($row['ACCESS_LEVEL'] == 1){
				$_SESSION['ICON'] = 'dist/img/user_level/police.png';
			}
			if ($row['ACCESS_LEVEL'] == 2) {
				if ($row['GENDER'] == 'Male') {
					$_SESSION['ICON'] = 'dist/img/user_level/barangay.png';
				} else {
					$_SESSION['ICON'] = 'dist/img/user_level/fmale-barangay.png';
				}
			}
			if ($row['ACCESS_LEVEL'] == 3) {

				$_SESSION['ICON'] = 'dist/img/user_level/admin.png';
			}
			header("location:home.php");
		}
	}
}
