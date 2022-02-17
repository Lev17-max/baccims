<?php

 $session_id = $_POST['sesid'];
$username = $_POST['username'];
$password = $_POST['password'];
$firstname = ucfirst(strtolower($_POST['firstname']));
$middlename = ucfirst(strtolower($_POST['middlename']));
$lastname = ucfirst(strtolower($_POST['lastname']));
$address = $_POST['address'];
$birth = $_POST['birthday'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$terms = $_POST['terms'];
$target_dir = "admin/uploads/";
$target_fileF = $target_dir . basename($_FILES["frontID"]["name"]);
$target_fileB = $target_dir . basename($_FILES["backID"]["name"]);
$uploadOk = 1;
$id = '';


$date = DateTime::createFromFormat('d/m/Y', $birth);
$birthdate = $date->format('Y-m-d');

if(file_exists($target_dir)){

}else{
    mkdir($target_dir);
}

// Check file size
if ($_FILES["frontID"]["size"] > (5 * 1024 * 1024) && $_FILES["backID"]["size"] > (5 * 1024 * 1024)) {

    $uploadOk = 0;
}


if (
    isset($username) &&  isset($session_id) && isset($address) && isset($password) && isset($birth) && isset($target_fileF) && isset($target_fileB) &&
    isset($birth) && isset($terms)
) {
    if ($terms == 'agree') {
        $encryptedPass = md5($password);
        $usernameenc = md5($username);

        include 'connection.php';
        if ($uploadOk == 0) {
            header("location:register.php?errorsize");
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["frontID"]["tmp_name"], $target_fileF) && move_uploaded_file($_FILES["backID"]["tmp_name"], $target_fileB)) {
                $tempF = explode(".", $_FILES["frontID"]["name"]);
                $tempB = explode(".", $_FILES["backID"]["name"]);
                $newfilenameF = $target_dir . ucfirst(strtolower($lastname)) . '_' . ucfirst(strtolower($firstname)) . '_front_id' . '.' . end($tempF);
                $newfilenameB = $target_dir . ucfirst(strtolower($lastname)) . '_' . ucfirst(strtolower($firstname)) . '_back_id' . '.' . end($tempB);
                rename($target_fileF, $newfilenameF);
                rename($target_fileB, $newfilenameB);

                $F = 'uploads/' . ucfirst(strtolower($lastname)) . '_' . ucfirst(strtolower($firstname)) . '_front_id' . '.' . end($tempF);
                $B = 'uploads/' . ucfirst(strtolower($lastname)) . '_' . ucfirst(strtolower($firstname)) . '_back_id' . '.' . end($tempB);

                //send database
                $query1 = $connect->prepare("UPDATE `user_details` SET `FIRST_NAME` = :firstname , `MIDDLE_NAME` = :middlename, `LAST_NAME` =:lastname, `BIRTHDATE` = :birth, `PHONE` = :phone, `GENDER` = :gender,`ADDRESS` = :address, `FRONT_ID` = :fID, `BACK_ID` = :bID, `VERIFIED`= 1 where ID = :sesid");
                $query1->bindParam(':firstname', $firstname);
                $query1->bindParam(':middlename', $middlename);
                $query1->bindParam(':lastname', $lastname);
                $query1->bindParam(':birth', $birthdate);
                $query1->bindParam(':gender', $gender);
                $query1->bindParam(':address', $address);
                $query1->bindParam(':phone', $phone);
                $query1->bindParam(':fID', $F);
                $query1->bindParam(':bID', $B);
                $query1->bindParam(':sesid', $session_id);
                $query1->execute();

                if ($query1) {
                    $query = $connect->prepare("UPDATE `user` SET `USERNAME`=:username,`PASSWORD`=:pass WHERE ID = :sesid");
                    $query->bindParam(':sesid', $session_id);
                    $query->bindParam(':username', $usernameenc);
                    $query->bindParam(':pass', $encryptedPass);

                    $query->execute();
                    if ($query) {
                        header("location:index.php?successpersonel");
                    } else {
                        header("location:lobby-personel.php?errorregpersonel");
                    }
                } else {
                    header("location:lobby-personel.php?errorregpersonel");
                }
            } else {
                header("location:lobby-personel.php?errorfilepersonel");
            }
        }
    } else {
        header("location:lobby-personel.php?accepttermspersonel");
    }
} else {
    header("location:lobby-personel.php?errorpersonel");
}
?>
