<div id="recordform" class="row animate__animated animate__headShake d-none">

    <!-- Modal HTML -->
    <form action="send_form.php" id="incident-form" method="post">
        <div class="card card-primary">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-lg-3">
                        <div class="form-group">
                            <label>BLOTTER ENTRY NUMBER:</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control blot-num" name="blotter-no" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>TYPE OF INCIDENT:</label>
                            <select class="form-control select2 incident-type" name="incident-type" required>
                                <option selected disabled value="">TYPE OF INCIDENT</option>
                                <option value="504">OTHER</option>
                                <?php include 'display_incident.php'; ?>
                                
                               
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                <input type="checkbox" class="custom-control-input" id="suspect-switch">
                                <label class="custom-control-label" for="suspect-switch"><small> THERE IS NO SUSPECT INVOLVED </small></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-12">
                        <div class="form-group">
                            <label>DATE & TIME REPORTED:</label>
                            <div class="input-group date" id="reservationdatetime1" data-target-input="nearest">
                                <input type="text" required name="datetime-reported" class="form-control datetimepicker-input" placeholder="TAP THE ICON" data-target="#reservationdatetime1" id="date-reported">
                                <div class="input-group-append" data-target="#reservationdatetime1" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>DATE & TIME OF INCIDENT:</label>
                            <div class="input-group date" id="reservationdatetime2" data-target-input="nearest">
                                <input type="text" required name="datetime-happened" class="form-control datetimepicker-input" placeholder="TAP THE ICON" data-target="#reservationdatetime2" id="date-happened">
                                <div class="input-group-append" data-target="#reservationdatetime2" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                <input type="checkbox" class="custom-control-input" id="victim-switch">
                                <label class="custom-control-label" for="victim-switch"><small> THE REPORTING PERSON IS THE VICTIM </small></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                <input type="checkbox" class="custom-control-input" name="status" value="1" id="status-switch">
                                <label class="custom-control-label" for="status-switch"><small> INCIDENT SOLVED</small></label>
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
                                    <select class="form-control select2" id="incident-place" name="incident-place" style="width: 100%;" required>
                                        
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
                            <textarea required id="incident-details" name="incident-details" style="height:150px;" col="200px"></textarea>
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
                    <?php include 'form_item_a.php'; ?>
                </div>
            </div>
            <div class="con-suspect m-0">
            <div class="card card-secondary m-0 suspect">
                <div class="card-header">
                <h1 class="card-title"> ITEM B - (SUSPECT DATA) </h1>
                    <div class="card-tools">
                        <a href="" class="add-suspect"><i class="fas fa-plus-circle"></i> ADD SUSPECT</a>
                        &nbsp
                        <a href="" class="minus-suspect"><i class="fas fa-minus-circle "></i> REMOVE</a>
                    </div>
                </div>
                <div class="card-body">
                    <?php include 'form_item_b.php'; ?>
                </div>
            </div>
            </div>
            <div class="con-victim m-0">
            <div class="card m-0 card-secondary victim">
                <div class="card-header">
                    <h1 class="card-title"> ITEM C - (VICTIM DATA) </h1>
                    <div class="card-tools">
                        <a href="" class="add-victim"><i class="fas fa-plus-circle"></i> ADD VICTIM</a>
                        &nbsp
                        <a href="" class="minus-victim"><i class="fas fa-minus-circle "></i> REMOVE</a>
                    </div>
                </div>
                <div class="card-body">
                    <?php include 'form_item_c.php'; ?>
                </div>
            </div>
            </div>
            <input type="submit" id="submit-form"  class="btn btn-primary">
        </div> 
    </form>
</div>