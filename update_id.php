
<?php
include 'connection.php';
session_start();
$terms = $_POST['terms'];
$target_dir = "admin/uploads/";
$target_fileF = $target_dir . basename($_FILES["frontID"]["name"]);
$target_fileB = $target_dir . basename($_FILES["backID"]["name"]);
$uploadOk = 1;

if ($_FILES["frontID"]["size"] > (5 * 1024 * 1024) && $_FILES["backID"]["size"] > (5 * 1024 * 1024)) {
    $uploadOk = 0;
}
if (isset($_SESSION['FIRST_NAME']) && isset($_SESSION['LAST_NAME']) && isset($target_fileF) && isset($target_fileB) && isset($terms) && isset($_SESSION['USER_ID'])) {
    $firstname = $_SESSION['FIRST_NAME'];
    $lastname = $_SESSION['LAST_NAME'];
    $id = $_SESSION['USER_ID'];

    if ($terms == 'agree') {
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

                $f =  'uploads/' . ucfirst(strtolower($lastname)) . '_' . ucfirst(strtolower($firstname)) . '_front_id' . '.' . end($tempF);
                $b =  'uploads/' . ucfirst(strtolower($lastname)) . '_' . ucfirst(strtolower($firstname)) . '_back_id' . '.' . end($tempB);

                //send database
                $query = $connect->prepare("UPDATE user_details SET FRONT_ID =:FID,BACK_ID=:BID,VERIFIED=3 WHERE ID=:id");
                $query->bindParam(':FID', $f);
                $query->bindParam(':BID', $b);
                $query->bindParam(':id', $id);
                $query->execute();

                if ($query) {
                    header("location:index.php?success");
                } else {
                    header("location:index.php?errorreg");
                }
            } else {
                header("location:index.php?errorfile");
            }
        }
    }
} else {
    echo 'no session';
}




?>