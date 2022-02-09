<?php
include 'connection.php';

if (isset($_POST['msg']) && isset($_POST['id'])) {

    $msg = $_POST['msg'];
    $id = $_POST['id'];

    $query = $connect->prepare('SELECT `PHONE` FROM `user_details` WHERE ID = :id ');
    $query->bindParam(':id', $id);
    $query->execute();
    $phonedata = $query->fetchAll();

    include 'sms-api-details.php';
    include 'sms-api.php';

    foreach ($phonedata as $key => $value) {
      $number = str_pad($value['PHONE'], 11, '0', STR_PAD_LEFT);
    }

    $arr = checkServer($apicode);
    foreach ($arr as $array) {
        foreach ($array as $key => $value) {
            if ($key === 'MessagesLeft') {
                $number_of_ms_left = $value;
            }
        }
    }

    if ($number_of_ms_left != 0) {
        $result = itexmo($number, $msg, $apicode, $pass);
        if ($result == 0) {

            echo 1;
        } else {

            echo 2;
        }
    } else {

        //FAILED
        echo 0;
    }
} else {
    header('location:404-page.php');
}

?>
