<div id="updaterecordform" class="row animate__animated animate__headShake d-none">

    <!-- Modal HTML -->
    <form action="updateForm.php" id="incident-form-update" method="post">
        <div class="card card-primary">
            <div class="card-body">
                <input type="hidden" id="id-holder-update" name="crime-id-update" value="">
                <div class="row">
                    <div class="col-12 col-lg-3">
                        <div class="form-group">
                            <label>BLOTTER ENTRY NUMBER:</label>
                            <div class="input-group mb-3">
                                <input type="text" id="blot-num-up" class="form-control blot-num" readonly name="blotter-no-update" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>TYPE OF INCIDENT:</label>
                            <select id="inc-type-up" class="form-control select2 incident-type" name="incident-type-update" required>
                                <option selected disabled value="0">TYPE OF INCIDENT</option>
                                <option value="504">OTHER</option>
                                <?php include 'display_incident.php'; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                <input type="checkbox" class="custom-control-input" id="suspect-switch-update">
                                <label class="custom-control-label" for="suspect-switch-update"><small> THERE IS NO SUSPECT INVOLVED </small></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-12">
                        <div class="form-group">
                            <label>DATE & TIME REPORTED:</label>
                            <div class="input-group date" id="reservationdatetime3" data-target-input="nearest">
                                <input type="text" name="datetime-reported-update" class="form-control datetimepicker-input" placeholder="TAP THE ICON" data-target="#reservationdatetime3" id="date-reported-update">
                                <div class="input-group-append" data-target="#reservationdatetime3" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>DATE & TIME OF INCIDENT:</label>
                            <div class="input-group date" id="reservationdatetime4" data-target-input="nearest">
                                <input type="text" name="datetime-happened-update" class="form-control datetimepicker-input" placeholder="TAP THE ICON" data-target="#reservationdatetime4" id="date-happened-update">
                                <div class="input-group-append" data-target="#reservationdatetime4" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                <input type="checkbox" class="custom-control-input" id="victim-switch-update">
                                <label class="custom-control-label" for="victim-switch-update"><small> THE REPORTING PERSON IS THE VICTIM </small></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                <input type="checkbox" class="custom-control-input" name="status-update" value="1" id="status-switch-update">
                                <label class="custom-control-label" for="status-switch-update"><small> INCIDENT SOLVED</small></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">

                        <center>
                            <h1 class="pt-5"> INCIDENT RECORD FORM </h1>
                            INSTRUCTIONS: Refer to PNP SOP on ‘Recording of Incidents in the Police Blotter’ in filling up this form. This Incident Record Form (IRF) may be reproduced, photocopied,
                            and/or downloaded from the DIDM website, www.didm.pnp.gov.ph
                        </center>

                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>PLACE OF INCIDENT</label>
                                    <select class="form-control select2" id="incident-place-update" name="incident-place-update" style="width: 100%;">
                                        <?php include 'show_places.php'; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <label >NOTE: ENTER IN DETAIL THE NARRATIVE OF THE INCIDENT OR EVENT, ANSWERING THE WHO, WHAT, WHEN, WHERE, WHY AND HOW OF REPORTING.</textarea>
                            </label>
                        <div class="card">
                            <textarea id="incident-details-update" name="incident-details-update" style="height:150px;" col="200px"></textarea>
                        </div>


                    </div>
                </div>

            </div>

            <!-- ITEM A -->
            <div class="card card-secondary m-0">
                <div class="card-header">
                    <h1 class="card-title"> ITEM A - (REPORTING PERSON) </h1>
                </div>
                <div class="card-body">
                <?php include 'form-a-update.php'; ?>
                </div>
            </div>
              <div id="loader-item-b" class="con-suspect-update"> <?php include 'form-b-update.php'; ?></div>
               
               <div id="loader-item-c" class="con-victim-update"><?php include 'form-c-update.php'; ?></div> 

               <div class="card m-0 card-secondary">
                    <div class="card-header">
                        <h1 class="card-title">CASE DISPOSITION</h1>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>OFFICE INSTRUCTION:</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control up-case-disp" name="up-case-disp" required>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>INVESTIGATOR-ON-CASE:</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control up-case-investigator" name="up-case-investigator" required>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-3">
                            <div class="form-group">
                                    <label> CHIEF OF STATION/OFFICE:</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control up-case-chief" name="up-case-chief" required>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                
               
            <input type="submit" id="submit-form-update"  class="btn btn-primary">
        </div> 
    </form>
</div>