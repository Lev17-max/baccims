<?php 
  session_start();
  unset($_SESSION['blot_num']);
  $_SESSION['blot_num'] = $_POST['blot_num'];

  echo $_SESSION['blot_num'];


// $incident = $connect->prepare('SELECT * FROM `incident` WHERE 1')




?>