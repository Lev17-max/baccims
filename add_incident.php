<?php 
include 'connection.php';

$target_dir = "dist/img/incident-icon/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$upload = 1;

   if(file_exists($target_dir)){

   }else{
       mkdir($target_dir);
   }

if ($_FILES["file"]["size"] > (5 * 1024 * 1024)) {
    $upload= 0;
}

 if(isset($_POST['name']) && isset($target_file)){
    if($upload == 1){
        if (move_uploaded_file($_FILES['file']["tmp_name"], $target_file)) {
            $name = $_POST['name'];
            $temp = explode(".", $_FILES['file']["name"]);
            $newfilename = $name.'.'.end($temp);
            rename($target_file, $newfilename);
            $query = $connect->prepare('INSERT INTO `incident_type`(`NAME`, `ICON`) VALUES (:names, :icon)');
            $query->bindParam(':names', $name);
            $query->bindParam(':icon',$newfilename);
            $query-> execute();

            if($query){
                echo '1';
            }else{
                echo '2';
            }
        }
    }else{
        echo 503;
    }

}






?> 