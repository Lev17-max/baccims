<?php 

    if(isset( $_POST['id'])){
          $id = $_POST['id'];
    }
  
    include 'connection.php';
    $qry = $connect ->prepare("SELECT * FROM `user_details`WHERE id = :id");
    $qry->bindParam(':id', $id);
    $qry->execute();
   $qrydata= $qry->fetchAll();

    foreach ($qrydata as $key) {

        echo $key['PHONE'];
        # code...
        }
            
                        ?>