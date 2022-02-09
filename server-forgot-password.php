<?php
include 'connection.php';

if(isset($_POST['username']) && isset($_POST['phone'])){

    $username = $_POST['username'];
    $number = $_POST['phone'];


    $usernamenc = md5($username);
    $phone = str_pad($number, 11, '0', STR_PAD_LEFT);


    $querys = $connect->prepare("SELECT * from user u
                                JOIN user_details ud ON u.USER_DETAILS_ID = ud.id
                                WHERE USERNAME = :username AND PHONE = :number");
    $querys -> bindParam(':username', $usernamenc);
    $querys -> bindParam(':number', $number);
    $querys ->execute();

    if (!$querys) {
        header("location:forgot-password-page.php?user_not_found");
    }else{
        $randompass = randomPassword();
        $passcode = md5($randompass);
        // echo '<br>'.$password;
        $update = $connect->prepare("UPDATE user u
                                    JOIN user_details ud
                                    ON u.USER_DETAILS_ID = ud.ID
                                    SET `PASSWORD` = :pass , `STATUS` = 2
                                    WHERE `USERNAME` = :user AND `PHONE` = :num");
        $update -> bindParam(':user', $usernamenc);
        $update -> bindParam(':num', $number);
        $update -> bindParam(':pass', $passcode);
        $update ->execute();
        $updateresults = $update->rowCount();
        if($updateresults <= 0){
              header('location:index.php?erroraddingpassword');
        }else{      
                     include 'sms-api-details.php';
                   
                     include 'sms-api.php';
             
                 
                    $arr = checkServer($apicode);
                        foreach ($arr as $array) {
                            foreach ($array as $key => $value) {
                                if ($key === 'MessagesLeft') {
                                    $number_of_ms_left = $value;
                                }
                            }
                        }
                     $msg = 'Your reset password is : '.$randompass;

                    if ($number_of_ms_left != 0) {
                        $result = itexmo($phone,$msg, $apicode, $pass);
                        if ($result == 0) {
                       
                            header('location:index.php?resetpasswordsuccess');
                        } else {
                      
                            header('location:index.php?resetpassworderror');
                        }
                    } else {
                      
                        header('location:index.php?resetpassworderror');
                    }
                 

           
           
        }
    }
}else{
    header('location:404-page.php');
}

function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}


?>