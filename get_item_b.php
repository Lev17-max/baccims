<?php 


include 'connection.php';
$blotid = $_POST['blot'];

$query = $connect->prepare("SELECT `ID`, `FAMILY_NAME`, `FIRST_NAME`, 
                                    `MIDDLE_NAME`, `QUALIFIER`, `NICKNAME`,
                                    `CITIZENSHIP`, `GENDER`, `CIVIL_STATUS`, 
                                    `BIRTHDATE`, `AGE`, `BIRTHPLACE`,
                                     `HOME_PHONE`, `MOBILE`, `CURRENT_ADDRESS`,
                                      `CURRENT_VILLAGE`, `CURRENT_BARANGAY`, 
                                      `CURRENT_CITY`, `CURRENT_PROVINCE`,
                                       `OTHER_ADDRESS`, `OTHER_VILLAGE`, `OTHER_BARANGAY`,
                                        `OTHER_CITY`, `OTHER_PROVINCE`, `HIGHEST_EDUCATION`,
                                         `OCCUPATION`, `ID_PRESENTED`, `EMAIL` FROM `item_a` 
                            WHERE BLOTTER_ENTRY_NO = :id");
$query->bindParam(':id', $blotid);
$query->execute();
$querydata = $query->fetchAll();

echo json_encode($querydata);

?>