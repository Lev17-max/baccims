<?php
	include 'connection.php';
	$id			= $_POST['id'];
	$verify     = $_POST['ver'];
    
           
                $query = $connect->prepare("UPDATE user_details SET VERIFIED=:verify WHERE ID=:id");

				$query->bindParam(':verify',$verify);
				$query->bindParam(':id',$id);
				$query->execute();

				if($query){
					 echo "1";
				}else{
					 echo "0";
				}

?>