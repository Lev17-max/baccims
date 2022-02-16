<?php

include 'connection.php';
date_default_timezone_set('Asia/Manila');
$stats = 5;
if (!isset($_POST['rank'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $type = $_POST['type'];
    $now = date('Y-m-d H:i:s');
    $sender = $_POST['admin_sender'];

    $usernameenc = md5($username);
    $encryptedPass = md5($password);

    // echo $username , $password;

    $search = $connect->prepare("SELECT * FROM `user` WHERE USERNAME=:username");
    $search->bindParam(':username', $usernameenc);
    $search->execute();
    $result = $search->fetchAll();


    if (count($result) <= 0) {
        $query = $connect->prepare("INSERT INTO `user`(`username`, `password`,`ACCESS_LEVEL`) VALUES (:username,:password,:type)");
        $query->bindParam(':username', $usernameenc);
        $query->bindParam(':password', $encryptedPass);
        $query->bindParam(':type', $type);
        $query->execute();
        $id = $connect->lastInsertId();

        if ($query) {
            $insertid = $connect->prepare("INSERT INTO `user_details` (`ID`,`VERIFIED`) VALUES(:id,4)");
            $insertid->bindParam(':id', $id);
            $insertid->execute();

            if ($insertid) {
                $insertid2 = $connect->prepare("UPDATE `user` SET `USER_DETAILS_ID` = :id where id = :id");
                $insertid2->bindParam(':id', $id);
                $insertid2->execute();
                if ($insertid2) {
                    $insertlog = $connect->prepare("INSERT INTO `user_logs` (`USER_ID`,`DATETIME_EDITED`,`STATUS`,`USER_DETAILS_ID`) 
                                                        VALUES(:id,:datenow,:stats,:sender)");
                    $insertlog->bindParam(':id', $id);
                    $insertlog->bindParam(':datenow', $now);
                    $insertlog->bindParam(':stats', $stats);
                    $insertlog->bindParam(':sender', $sender);

                    $insertlog->execute();
                    if ($insertlog) {
                        header("location:home.php?successaddpersonel");
                    } else {
                        header("location:home.php?erroraddpersonel");
                    }
                } else {
                    header("location:home.php?erroraddpersonel");
                }
            } else {
                header("location:home.php?erroraddpersonel");
            }
        }
    } else {
        header("location:home.php?duplicateaddpersonel");
    }
} else {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $type = $_POST['type'];
    $rank = $_POST['rank'];
    $now = date('Y-m-d H:i:s');
    $sender = $_POST['admin_sender'];

    $usernameenc = md5($username);
    $encryptedPass = md5($password);

    // echo $username , $password;

    $search = $connect->prepare("SELECT * FROM `user` WHERE USERNAME=:username");
    $search->bindParam(':username', $usernameenc);
    $search->execute();
    $result = $search->fetchAll();


    if (count($result) <= 0) {
        $query = $connect->prepare("INSERT INTO `user`(`username`, `password`,`ACCESS_LEVEL`) VALUES (:username,:password,:type)");
        $query->bindParam(':username', $usernameenc);
        $query->bindParam(':password', $encryptedPass);
        $query->bindParam(':type', $type);
        $query->execute();
        $id = $connect->lastInsertId();

        if ($query) {
            $insertid = $connect->prepare("INSERT INTO `user_details` (`ID`,`VERIFIED`) VALUES(:id,4)");
            $insertid->bindParam(':id', $id);
            $insertid->execute();

            if ($insertid) {
                $insertid2 = $connect->prepare("UPDATE `user` SET `USER_DETAILS_ID` = :id where id = :id");
                $insertid2->bindParam(':id', $id);
                $insertid2->execute();
                if ($insertid2) {
                    $insertrank = $connect->prepare("INSERT INTO `police`(`USER_DETAILS_ID`, `POLICE_RANK_ID`) VALUES (:id,:rank)");
                    $insertrank->bindParam(':id', $id);
                    $insertrank->bindParam(':rank', $rank);
                    $insertrank->execute();
                    if ($insertrank) {

                        $insertlog = $connect->prepare("INSERT INTO `user_logs` (`USER_ID`,`DATETIME_EDITED`,`STATUS`,`USER_DETAILS_ID`) 
                                                        VALUES(:id,:datenow,:stats,:sender)");
                        $insertlog->bindParam(':id', $id);
                        $insertlog->bindParam(':datenow', $now);
                        $insertlog->bindParam(':stats', $stats);
                        $insertlog->bindParam(':sender', $sender);

                        $insertlog->execute();
                        if ($insertlog) {
                            header("location:home.php?successaddpersonel");
                        } else {
                            header("location:home.php?erroraddpersonel");
                        }
                    } else {
                        header("location:home.php?erroraddpersonel");
                    }
                } else {
                    header("location:home.php?erroraddpersonel");
                }
            } else {
                header("location:home.php?erroraddpersonel");
            }
        }
    } else {
        header("location:home.php?duplicateaddpersonel");
    }
}
?>