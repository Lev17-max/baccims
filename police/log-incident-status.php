<?php 
 include 'connection.php'; 

if(isset($_POST['blotnum']) && isset($_POST['date']) && isset($_POST['status']) && isset($_POST['user'])){

  $blot = $_POST['blotnum'];
   $date = $_POST['date'];
   $status = $_POST['status'];
   $user = $_POST['user'];

  $query = $connect -> prepare("INSERT INTO `record_logs`(`BLOTTER_ENTRY_NUMBER`, `DATETIME_EDITED`, `STATUS`,`USER_DETAILS_ID`) 
                                VALUES (:blot, :datet, :status ,:user)");
  $query -> bindParam(':blot' , $blot);
  $query -> bindParam(':datet', $date);
  $query -> bindParam(':status', $status);
  $query -> bindParam(':user', $user);
  $query -> execute();
 if($query){
    echo 204;
 }else{
     echo 404;
 }
}

?>