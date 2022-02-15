<?php
include 'connection.php';
if (isset($_POST['ranks']) && !empty($_POST['ranks'])) {

	$id			= $_POST['id'];
	$accs 			= $_POST['access_level'];
	$rank = $_POST['ranks'];


	$query = $connect->prepare("UPDATE user SET ACCESS_LEVEL=:accs WHERE USER_DETAILS_ID=:id");

	$query->bindParam(':accs', $accs);
	$query->bindParam(':id', $id);
	$query->execute();

	if ($query) {
		$insertrank = $connect->prepare("INSERT IGNORE INTO `police` (`USER_DETAILS_ID`, `POLICE_RANK_ID`) 
												VALUES (:id,:ranks)
											      ON DUPLICATE KEY 
                                                UPDATE `POLICE_RANK_ID` = :ranks
                                              ");
		$insertrank->bindParam(':id', $id);
		$insertrank->bindParam(':ranks', $rank);
		$insertrank->execute();

		if ($insertrank) {
			echo "1";
		} else {
			echo "0";
		}
	} else {
		echo "0";
	}
} else {
	$id	= $_POST['id'];
	$accs 	= $_POST['access_level'];

	$query = $connect->prepare("UPDATE user SET ACCESS_LEVEL=:accs WHERE USER_DETAILS_ID=:id");


	$query->bindParam(':accs', $accs);
	$query->bindParam(':id', $id);
	$query->execute();

	if ($query) {

		$search = $connect->prepare('SELECT * from `police` where USER_DETAILS_ID = :id');
		$search->bindParam(':id', $id);
		$search->execute();

		$res = $search->rowCount();
		if ($res <= 0) {
			echo "1";
		} else {
			$ins = $connect->prepare('UPDATE `police` SET `STATUS` = 1 where USER_DETAILS_ID = :id');
			$ins->bindParam(':id', $id);
			$ins->execute();
			if ($ins) {
				echo '1';
			} else {
				echo '0';
			}
		}
	} else {
		echo '0';
	}
}


?>
