<?php
include 'connection.php';

$long = $_POST['long'];
$lat = $_POST['lat'];
$prk_id = $_POST['prkid'];
$ph_id = $_POST['phid'];
$brgy_id = $_POST['brgyid'];
$purok = $_POST['purok'];
$phase = $_POST['phase'];
$brgy = $_POST['brgy'];
$pl = '';
$pr = '';
$ph = '';
$br = '';
$send = [];

$query = $connect->prepare('INSERT INTO `place`(`LONGITUDE`, `LATITUDE`) 
                                   VALUES (:long, :lat)');
$query->bindParam(':long', $long);
$query->bindParam(':lat', $lat);
$query->execute();
$pl = $connect->lastInsertId();
if ($query) {
    if (empty($prk_id)) {
        $querypr = $connect->prepare('INSERT IGNORE INTO `purok`(`PUROK`) VALUES (:prk)');
        $querypr->bindParam(':prk', $purok);
        $querypr->execute();
        $pr = $connect->lastInsertId();
        if ($querypr) {
            $qpr = $connect->prepare('UPDATE `place` SET `PUROK_ID`=:prid WHERE ID=:plid');
            $qpr->bindParam(':plid', $pl);
            $qpr->bindParam(':prid', $pr);
            $qpr->execute();
            if (!$qpr) {
                header("location:home.php?erroradd");
            } else {
                $send = 1;
            }
        }
    } else {
        $q1 = $connect->prepare('UPDATE `place` SET `PUROK_ID`=:prk_id WHERE ID=:plid');
        $q1->bindParam(':plid', $pl);
        $q1->bindParam(':prk_id', $prk_id);
        $q1->execute();
        if (!$q1) {
            header("location:home.php?erroradd");
        } else {
            $send = 1;
        }
    }
    if (empty($ph_id)) {
        $queryph = $connect->prepare('INSERT IGNORE INTO `phase`(`PHASE`) VALUES (:ph)');
        $queryph->bindParam(':ph', $phase);
        $queryph->execute();
        $ph = $connect->lastInsertId();
        if ($queryph) {
            $qph = $connect->prepare('UPDATE `place` SET `PHASE_ID`=:phid WHERE ID=:plid');
            $qph->bindParam(':plid', $pl);
            $qph->bindParam(':phid', $ph);
            $qph->execute();
            if (!$qph) {
                header("location:home.php?erroradd");
            } else {
                $send = 1;
            }
        }
    } else {
        $q2 = $connect->prepare('UPDATE `place` SET `PHASE_ID`=:ph_id WHERE ID=:plid');
        $q2->bindParam(':plid', $pl);
        $q2->bindParam(':ph_id', $ph_id);
        $q2->execute();
        if (!$q2) {
            header("location:home.php?erroradd");
        } else {
            $send = 1;
        }
    }
    if (empty($brgy_id)) {
        $queryb = $connect->prepare('INSERT IGNORE INTO `barangay`(`BARANGAY`) VALUES (:brgy)');
        $queryb->bindParam(':brgy', $brgy);
        $queryb->execute();
        $br = $connect->lastInsertId();
        if ($queryb) {
            $qb = $connect->prepare('UPDATE `place` SET `BARANGAY_ID`=:bid WHERE ID=:plid');
            $qb->bindParam(':plid', $pl);
            $qb->bindParam(':bid', $br);
            $qb->execute();
            if (!$qb) {
                header("location:home.php?erroradd");
            } else {
                $send = 1;
            }
        }
    } else {
        $q3 = $connect->prepare('UPDATE `place` SET `BARANGAY_ID`=:brgy_id WHERE ID=:plid');
        $q3->bindParam(':plid', $pl);
        $q3->bindParam(':brgy_id', $brgy_id);
        $q3->execute();
        if (!$q3) {
            header("location:home.php?erroradd");
        } else {
            $send = 1;
        }
    }
    if (!empty($prk_id) && !empty($ph_id) && !empty($brgy_id)) {
        $q = $connect->prepare('UPDATE `place` SET `PUROK_ID`=:prk_id,`PHASE_ID`=:ph_id,`BARANGAY_ID`=:brgy_id WHERE ID=:plid');
        $q->bindParam(':plid', $pl);
        $q->bindParam(':prk_id', $prk_id);
        $q->bindParam(':ph_id', $ph_id);
        $q->bindParam(':brgy_id', $brgy_id);
        $q->execute();
        if (!$q) {
            header("location:home.php?erroradd");
        } else {
            $send = 1;
        }
    }
} else {
    header("location:home.php?erroradd");
}
if ($send == 1) {
    header("location:home.php?successadd");
}else{
    header("location:home.php?erroradd");
}
