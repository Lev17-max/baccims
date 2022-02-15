
<?php 
include 'connection.php';

$blotid = $_POST['blot_num'];

$query = $connect->prepare("SELECT `ID`, `FAMILY_NAME`, `FIRST_NAME`, 
                                    `MIDDLE_NAME`, `QUALIFIER`, `NICKNAME`,
                                    `CITIZENSHIP`, `GENDER`, `CIVIL_STATUS`, 
                                    `BIRTHDATE`, `AGE`, `BIRTHPLACE`,
                                     `HOME_PHONE`, `MOBILE`, `CURRENT_ADDRESS`,
                                      `CURRENT_VILLAGE`, `CURRENT_BARANGAY`, 
                                      `CURRENT_CITY`, `CURRENT_PROVINCE`,
                                       `OTHER_ADDRESS`, `OTHER_VILLAGE`, `OTHER_BARANGAY`,
                                        `OTHER_CITY`, `OTHER_PROVINCE`, `HIGHEST_EDUCATION`,
                                         `OCCUPATION`, `ID_PRESENTED`, `EMAIL` FROM `item_b` 
                            WHERE BLOTTER_ENTRY_NO = :id");
$query->bindParam(':id', $blotid);
$query->execute();
$querydata = $query->fetchAll();

?>




<?php
foreach ($querydata as $key => $itemb) {



    # code...

?>


<div class="m-0">
    <div class="card card-secondary m-0 suspect-update">
        <div class="card-header">
            <h1 class="card-title"> ITEM B - (SUSPECT DATA) </h1>
            <div class="card-tools">
                <a href="" class="add-suspect-update"><i class="fas fa-plus-circle"></i> ADD SUSPECT</a>
                &nbsp
                <a href="" class="minus-suspect-update"><i class="fas fa-minus-circle "></i> REMOVE</a>
            </div>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-12 col-lg-3">
                    <input type="hidden" class="form-control input-item-b-update input-item-b-update-id d-none" name="item-b-update-id[]" value="<?php echo $itemb[0] ?>" required>
                    <div class="form-group">
                        <label>FAMILY NAME:</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control input-item-b-update input-item-b-update-faname" name="item-b-update-family-name[]" value="<?php echo $itemb[1] ?>" required>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>FIRST NAME:</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control input-item-b-update input-item-b-update-fname" name="item-b-update-first-name[]" value="<?php echo $itemb[2] ?>" required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label>MIDDLE NAME:</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control input-item-b-update input-item-b-update-mname" name="item-b-update-middle-name[]" value="<?php echo $itemb[3] ?>" required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label>QUALIFIER:</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control  input-item-b-update input-item-b-update-qual" name="item-b-update-qualifier[]" value="<?php echo $itemb[4] ?>" required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label>NICKNAME:</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control input-item-b-update input-item-b-update-nname" name="item-b-update-nickname[]" value="<?php echo $itemb[5] ?>" required>
                        </div>
                    </div>
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="col-12 col-lg-2">
                    <div class="form-group">
                        <label>CITIZENSHIP:</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control input-item-b-update input-item-b-update-cship" name="item-b-update-citizenship[]" value="<?php echo $itemb[6] ?>" required>
                        </div>
                    </div>

                </div>
                <div class="col-lg-1">
                    <div class="form-group">
                        <label>SEX:</label>
                        <div class="input-group mb-3">
                            <select class="form-control input-item-b-update input-item-b-update-gender" name="item-b-update-gender[]" required>
                                <option selected disabled value="0"></option>

                                <?php if($itemb[7] == 1){
                                    
                                    echo '<option selected value="1">Male</option>
                                          <option value="2">Female</option>';
                                    
                                        }else{
                                            
                                            echo '<option  value="1">Male</option>
                                            <option selected value="2">Female</option>';
                                        }?>
                                
                                
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label>CIVIL STATUS:</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control input-item-b-update input-item-b-update-cstats" name="item-b-update-civil-status[]" value="<?php echo $itemb[8] ?>" required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label>DATE OF BIRTH:</label>
                        <div class="input-group mb-3">
                            <input type="date" class="form-control  input-item-b-update  input-item-b-update-bdate" name="item-b-update-birthday[]" value="<?php echo $itemb[9] ?>" required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1">
                    <div class="form-group">
                        <label>AGE:</label>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control input-item-b-update input-item-b-update-age" name="item-b-update-age[]"  value="<?php echo $itemb[10] ?>" required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label>PLACE OF BIRTH:</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control  input-item-b-update input-item-b-update-place-bday" name="item-b-update-pbd[]" value="<?php echo $itemb[11] ?>" required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label>HOME PHONE:</label>
                        <div class="input-group mb-3">
                            <input type="Tel" placeholder="Format: 123-456-7890" class="form-control input-item-b-update input-item-b-update-home-num suspect-num" value="<?php echo $itemb[12] ?>" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required name="item-b-update-home-phone[]" required>
                        </div>
                    </div>
                </div>
                <label>MOBILE PHONE:</label>
                <div class="col-lg-2">
                    <div class="input-group form-group " style="position: relative;">
                        <input type="tel" class="form-control phone-a phone input-item-b-update input-item-b-update-mobile-num" name="item-b-update-mobile-phone[]" value="<?php echo $itemb[13] ?>" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required>
                        <span class="countrycode2">
                            +63 </span>
                        <div class=" phone-icon input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12 col-lg-3">
                    <div class="form-group">
                        <label>CURRENT ADDRESS(STREET):</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control input-item-b-update input-item-b-update-curr-addr" name="item-b-update-current-addrs[]" value="<?php echo $itemb[14] ?>"  required>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>VILLAGE SITIO:</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control input-item-b-update input-item-b-update-sit" name="item-b-update-sitio[]" value="<?php echo $itemb[15] ?>" required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label>BARANGAY:</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control input-item-b-update  input-item-b-update-brgy" name="item-b-update-barangay[]" value="<?php echo $itemb[16] ?>" required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label>TOWN/CITY:</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control input-item-b-update input-item-b-update-city" name="item-b-update-city[]" value="<?php echo $itemb[17] ?>" required>
                        </div>

                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label>PROVINCE:</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control  input-item-b-update input-item-b-update-prov" name="item-b-update-province[]" value="<?php echo $itemb[18] ?>" required>
                        </div>
                    </div>
                </div>

            </div>
            <hr>


            <div class="row other-address-item-b-update">
                <div class="col-12 col-lg-3">
                    <div class="form-group">
                        <label>OTHER ADDRESS(STREET):</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control input-item-b-update input-item-b-update-oth-addr" name="item-b-update-other-addrs[]" value="<?php echo $itemb[19] ?>" required>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>VILLAGE SITIO:</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control input-item-b-update input-item-b-update-sit2" name="item-b-update-sitio2[]" value="<?php echo $itemb[20] ?>" required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label>BARANGAY:</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control input-item-b-update input-item-b-update-brgy2" name="item-b-update-barangay2[]" value="<?php echo $itemb[21] ?>" required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label>TOWN/CITY:</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control input-item-b-update input-item-b-update-city2" name="item-b-update-city2[]" value="<?php echo $itemb[22] ?>" required>
                        </div>

                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label>PROVINCE:</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control input-item-b-update input-item-b-update-prov2" name="item-b-update-province2[]" value="<?php echo $itemb[23] ?>" required>
                        </div>
                    </div>
                </div>
                <hr>
            </div>



            <div class="row">
                <div class="col-12 col-lg-3">
                    <div class="form-group">
                        <label>HIGHEST EDUCATIONAL ATTAINMENT:</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control input-item-b-update input-item-b-update-educ" name="item-b-update-educ[]" value="<?php echo $itemb[24] ?>" required>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>OCCUPATION:</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control input-item-b-update input-item-b-update-occ" name="item-b-update-work[]" value="<?php echo $itemb[25] ?>" required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>ID CARD PRESENTED:</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control input-item-b-update input-item-b-update-id-press" name="item-b-update-id-bought[]" value="<?php echo $itemb[26] ?>" required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>EMAIL ADDRESS:</label>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control input-item-b-update input-item-b-update-email" name="item-b-update-email[]" value="<?php echo $itemb[27] ?>" required>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


<?php }


?>
