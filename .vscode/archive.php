<?php
	include 'connection.php';
	$id			= $_POST['id'];
	$status     = $_POST['status'];
 

	    if($status == 1){
			    $stats = 0;
		        $query = $connect->prepare("UPDATE user SET STATUS=:stats WHERE USER_DETAILS_ID=:id");

				$query->bindParam(':stats',$stats);
				$query->bindParam(':id',$id);
				$query->execute();

				if($query){
					 echo "1";
				}else{
					 echo "0";
				}

	    }
	    else{
	    	    $stats = 1;
		        $query = $connect->prepare("UPDATE user SET STATUS=:stats WHERE USER_DETAILS_ID=:id");

				$query->bindParam(':stats',$stats);
				$query->bindParam(':id',$id);
				$query->execute();

				if($query){
					 echo "1";
				}else{
					 echo "0";
				}


	    }
		

?>