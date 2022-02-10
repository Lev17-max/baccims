<?php  

 include 'connection.php'; 

 if(isset($_POST['new-pass']) && isset($_POST['hidden-id'])){
   $newPass = md5($_POST['new-pass']);
   $hidId = $_POST['hidden-id'];


   $update = $connect->prepare("UPDATE user SET PASSWORD = :pass ,STATUS = 0 WHERE ID = :id");
   $update -> bindParam(':id', $hidId);
   $update -> bindParam(':pass', $newPass);
   $update ->execute();
   $detup = $update->rowCount();

   if($detup < 0){
      header('location:create-new-password-page.php?errorchangepass');
   }else{
      
      header('location:index.php?successchangepass');
   }


 }else{
    header('location:404-page.php');
 }







?>