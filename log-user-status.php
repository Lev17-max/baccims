<?php 
 include 'connection.php'; 

if(isset($_POST['userid']) && isset($_POST['date']) && isset($_POST['status']) && isset($_POST['editorid'])){

  $user = $_POST['userid'];
   $date = $_POST['date'];
   $status = $_POST['status'];
   $editor = $_POST['editorid'];

  $query = $connect -> prepare("INSERT IGNORE INTO `user_logs`(`USER_ID`, `DATETIME_EDITED`, `STATUS`,`USER_DETAILS_ID`) 
                                VALUES (:user, :datet, :status ,:edit) 
                                ON DUPLICATE KEY 
                                UPDATE `DATETIME_EDITED` = :datet, `STATUS` = :status , `USER_DETAILS_ID` = :edit");
  $query -> bindParam(':edit' , $editor);
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