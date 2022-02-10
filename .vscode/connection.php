<?php
$servername = "localhost";
$username = "";
$password = "";

try{ 
  // $connect = new PDO('mysql:host=premium173.web-hosting.com;dbname=baccdxee_it5db','baccdxee_baccims_admin','BACCIMS2022');
     $connect = new PDO('mysql:host=localhost;dbname=it5_db','root','');
}catch(PDOException $e){
  echo $e->getMessage();
}
 

?>