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
                                         `OCCUPATION`, `ID_PRESENTED`, `EMAIL` FROM `item_c` 
                            WHERE BLOTTER_ENTRY_NO = :id");
$query->bindParam(':id', $blotid);
$query->execute();
$querydata = $query->fetchAll();

foreach ($querydata as $key => $itemc) {

    # code...

?>

<div class="m-0">
    <div class="card m-0 card-secondary victim-update">
        <div class="card-header">
            <h1 class="card-title"> ITEM C - (VICTIM DATA) </h1>
            <div class="card-tools">
                <a href="" class="add-victim-update"><i class="fas fa-plus-circle"></i> ADD VICTIM</a>
                &nbsp
                <a href="" class="minus-victim-update"><i class="fas fa-minus-circle "></i> REMOVE</a>
            </div>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-12 col-lg-3">
                    <input type="hidden" class="form-control input-item-c-update input-item-c-update-id d-none" name="item-c-update-id[]" value="<?php echo $itemc['ID'] ?>" required>
                    <div class="form-group">
                        <label>FAMILY NAME:</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control input-item-c-update input-item-c-update-faname" name="item-c-update-family-name[]" value="<?php echo $itemc['FAMILY_NAME'] ?>" required>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>FIRST NAME:</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control input-item-c-update input-item-c-update-fname" name="item-c-update-first-name[]" value="<?php echo $itemc['FIRST_NAME'] ?>" required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label>MIDDLE NAME:</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control input-item-c-update input-item-c-update-mname" name="item-c-update-middle-name[]" value="<?php echo $itemc['MIDDLE_NAME'] ?>" required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label>QUALIFIER:</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control  input-item-c-update input-item-c-update-qual" name="item-c-update-qualifier[]" value="<?php echo $itemc['QUALIFIER'] ?>" required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label>NICKNAME:</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control input-item-c-update input-item-c-update-nname" name="item-c-update-nickname[]" value="<?php echo $itemc['NICKNAME'] ?>" required>
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
                            <input type="text" class="form-control input-item-c-update input-item-c-update-cship" name="item-c-update-citizenship[]" value="<?php echo $itemc['CITIZENSHIP'] ?>" required>
                        </div>
                    </div>

                </div>
                <div class="col-lg-1">
                    <div class="form-group">
                        <label>SEX:</label>
                        <div class="input-group mb-3">
                            <select class="form-control input-item-c-update input-item-c-update-gender" name="item-c-update-gender[]"  required>
                                <option selected disabled value="0"></option>
                                <?php if( $itemc['GENDER']  == 1){
                                    
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
                            <input type="text" class="form-control input-item-c-update input-item-c-update-cstats" name="item-c-update-civil-status[]" value="<?php echo $itemc['CIVIL_STATUS'] ?>" required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label>DATE OF BIRTH:</label>
                        <div class="input-group mb-3">
                            <input type="date" class="form-control  input-item-c-update  input-item-c-update-bdate" name="item-c-update-birthday[]" value="<?php echo $itemc['BIRTHDATE'] ?>" required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1">
                    <div class="form-group">
                        <label>AGE:</label>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control input-item-c-update input-item-c-update-age" name="item-c-update-age[]"  value="<?php echo $itemc['AGE'] ?>" required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label>PLACE OF BIRTH:</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control  input-item-c-update input-item-c-update-place-bday" name="item-c-update-pbd[]" value="<?php echo $itemc['BIRTHPLACE'] ?>" required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label>HOME PHONE:</label>
                        <div class="input-group mb-3">
                            <input type="Tel" placeholder="Format: 123-456-7890" class="form-control input-item-c-update input-item-c-update-home-num suspect-num" value="<?php echo $itemc['HOME_PHONE'] ?>" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required name="item-c-update-home-phone[]" required>
                        </div>
                    </div>
                </div>
                <label>MOBILE PHONE:</label>
                <div class="col-lg-2">
                    <div class="input-group form-group " style="position: relative;">
                        <input type="tel" class="form-control phone-a phone input-item-c-update input-item-c-update-mobile-num[]" name="item-c-update-mobile-phone[]" value="<?php echo $itemc['MOBILE'] ?>" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required>
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
                            <input type="text" class="form-control input-item-c-update input-item-c-update-curr-addr" name="item-c-update-current-addrs[]" value="<?php echo $itemc['CURRENT_ADDRESS'] ?>"  required>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>VILLAGE SITIO:</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control input-item-c-update input-item-c-update-sit" name="item-c-update-sitio[]" value="<?php echo $itemc['CURRENT_VILLAGE'] ?>" required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label>BARANGAY:</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control input-item-c-update  input-item-c-update-brgy" name="item-c-update-barangay[]" value="<?php echo $itemc['CURRENT_BARANGAY'] ?>" required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label>TOWN/CITY:</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control input-item-c-update input-item-c-update-city" name="item-c-update-city[]" value="<?php echo $itemc['CURRENT_CITY'] ?>" required>
                        </div>

                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label>PROVINCE:</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control  input-item-c-update input-item-c-update-prov" name="item-c-update-province[]" value="<?php echo $itemc['CURRENT_PROVINCE'] ?>" required>
                        </div>
                    </div>
                </div>

            </div>
            <hr>


            <div class="row other-address-item-c-update">
                <div class="col-12 col-lg-3">
                    <div class="form-group">
                        <label>OTHER ADDRESS(STREET):</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control input-item-c-update input-item-c-update-oth-addr" name="item-c-update-other-addrs[]" value="<?php echo $itemc['OTHER_ADDRESS'] ?>" required>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>VILLAGE SITIO:</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control input-item-c-update input-item-c-update-sit2" name="item-c-update-sitio2[]" value="<?php echo $itemc['OTHER_VILLAGE'] ?>" required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label>BARANGAY:</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control input-item-c-update input-item-c-update-brgy2" name="item-c-update-barangay2[]" value="<?php echo $itemc['OTHER_BARANGAY'] ?>" required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label>TOWN/CITY:</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control input-item-c-update input-item-c-update-city2" name="item-c-update-city2[]" value="<?php echo $itemc['OTHER_CITY'] ?>" required>
                        </div>

                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label>PROVINCE:</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control input-item-c-update input-item-c-update-prov2" name="item-c-update-province2[]" value="<?php echo $itemc['OTHER_PROVINCE'] ?>" required>
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
                            <input type="text" class="form-control input-item-c-update input-item-c-update-educ" name="item-c-update-educ[]" value="<?php echo $itemc['HIGHEST_EDUCATION'] ?>" required>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>OCCUPATION:</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control input-item-c-update input-item-c-update-occ" name="item-c-update-work[]" value="<?php echo $itemc['OCCUPATION'] ?>" required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>ID CARD PRESENTED:</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control input-item-c-update input-item-c-update-id-press" name="item-c-update-id-bought[]" value="<?php echo $itemc['ID_PRESENTED'] ?>" required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>EMAIL ADDRESS:</label>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control input-item-c-update input-item-c-update-email" name="item-c-update-email[]" value="<?php echo $itemc['EMAIL'] ?>" required>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php 
 }?>