<?php 


include 'connection.php';

    $listallincident = $connect->prepare("SELECT *,i.BLOTTER_ENTRY_NUMBER AS BLOT,
                                                inc.NAME as INCIDENT,
                                                ia.FIRST_NAME AS COMPLAINANT_F,
                                                ia.FAMILY_NAME AS COMPLAINANT_L,
                                                prnk.ABBR as RANK,
                                                ud.FIRST_NAME AS INVESTIGATOR_F,
                                                ud.LAST_NAME AS INVESTIGATOR_L
                                                FROM incident i
                                            LEFT JOIN incident_type inc ON i.TYPE_OF_INCIDENT_ID = inc.ID
                                            LEFT JOIN item_a ia ON i.BLOTTER_ENTRY_NUMBER = ia.BLOTTER_ENTRY_NO
                                            LEFT JOIN item_d id ON i.BLOTTER_ENTRY_NUMBER = id.BLOTTER_ENTRY_NUMBER
                                            LEFT JOIN place p ON id.PLACE_ID = p.ID
                                            LEFT JOIN phase ph ON p.PHASE_ID= ph.ID
                                            LEFT JOIN purok pr ON p.PUROK_ID= pr.ID
                                            LEFT JOIN barangay b  ON p.BARANGAY_ID = b.ID
                                            LEFT JOIN incident_case_disposition icd ON i.BLOTTER_ENTRY_NUMBER = icd.BLOTTER_ENTRY_NUMBER
                                            LEFT JOIN police pol ON icd.INVESTIGATOR = pol.POLICE_ID
                                            LEFT JOIN police_rank prnk ON pol.POLICE_RANK_ID = prnk.ID
                                            LEFT JOIN user_details ud ON pol.USER_DETAILS_ID = ud.ID;
                                        ");
$qry = $connect -> prepare('Select * from `record_logs` where BLOTTER_ENTRY_NUMBER = ?');
$qry2 = $connect -> prepare('Select * from `user_details` where ID = ?');


$listallincident->execute();
$allcrimedatas = $listallincident->fetchAll();




?>