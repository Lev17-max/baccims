<?php
	include 'connection.php';
	$id			= $_POST['id'];
	$accs 			= $_POST['access_level'];
	
		$query = $connect->prepare("UPDATE user SET ACCESS_LEVEL=:accs WHERE USER_DETAILS_ID=:id");


		$query->bindParam(':accs',$accs);
		$query->bindParam(':id',$id);
		$query->execute();

		if($query){
			 echo "1";
		}else{
			echo "0";
		}

?>