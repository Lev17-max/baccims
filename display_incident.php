<?php include 'connection.php'; 
                                        $query = $connect->prepare('SELECT * FROM incident_type ORDER BY NAME;');
                                        $query->execute();$data = 
                                        $query-> fetchAll();


                                           
                                        foreach ($data as $value) { 
                                            echo '<option value="'.$value['ID'].'">'
                                            .strtoupper($value['NAME']).'</option>';
                                            }?>