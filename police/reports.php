<div id="reports" class="card animate__animated animate__headShake d-none">
    <div class="card-header border-0 pb-0">
        <div class="card-tools">


            <button id="hide2" type="button" class="btn btn-tool text-dark" onclick="PrintDiv2()">
                <i class="fas fa-copy"> Print</i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="row justify-content-md-end">
                    <div class="form-group col-lg-4 mb-0">
                        <div class="form-group form-inline mb-0">
                            <small id="helpId" class="form-text text-muted">FROM : &nbsp</small>
                            <input type="number" class="form-control col-lg-4" id="input-from" min="1900" max="2099" step="1" value="<?php echo date('Y') - 1 ?>" aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted">&nbsp &nbsp TO : &nbsp</small>
                            <input type="number" size="4" class="form-control col-lg-4" id="input-to" min="1900" max="2099" step="1" value="<?php echo date('Y') ?>" aria-describedby="helpId" placeholder="">
                        </div>
                    </div>
                </div>


            </div>
            <center>
                <br>
                <h3 class="font-family-serif">Barangay Handumanan</h3>
                <h5> Reports </h5>
                <br>
            </center>
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-secondary">
                    <input type="radio" name="options" id="option_a1" autocomplete="off" checked=""> LINE GRAPH
                </label>
                <label class="btn btn-secondary">
                    <input type="radio" name="options" id="option_a2" autocomplete="off"> BAR GRAPH
                </label>

            </div>



            <div class="col-12 col-md-6 col-lg-6 mr-0">
                <div class="card">
                    <div class="card-body">
                        <div class="chart-title">
                            <h4>Crime Reported</h4>
                        </div>
                        <canvas id="crime_reported"></canvas>
                        <div class="d-flex flex-row justify-content-end">
                            <span class="mr-2">
                                <i class="fas fa-square text-primary"></i> Selected Year
                            </span>

                            <span>
                                <i class="fas fa-square text-gray"></i> Present Year
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 mr-0">
                <div class="card">
                    <div class="card-body">
                        <div class="chart-title">
                            <h4>Crime Solved</h4>
                            <div class="float-right">

                            </div>
                        </div>
                        <canvas id="crime_solve"></canvas>
                        <div class="d-flex flex-row justify-content-end">
                            <span class="mr-2">
                                <i class="fas fa-square text-primary"></i> Selected Year
                            </span>

                            <span>
                                <i class="fas fa-square text-gray"></i> Present Year
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6 mr-0">
                <div class="card">
                    <div id='crime_sol_con' class="card-body">
                        <div class="chart-title">
                            <h4>Crime Solution Efficiency</h4>
                            <div class="float-right">

                            </div>
                        </div>
                        <canvas id="crime_sol"></canvas>

                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 mr-0">
                <div class="card">
                    <div class="card-body">
                        <div class="chart-title">
                            <h4>Monthly Crime Rate</h4>
                            <div class="float-right">

                            </div>
                        </div>
                        <canvas id="monthly_crime"></canvas>

                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 order-2 order-md-1">
                <div class="row">
                    <!-- <div class="col-12 col-lg-12">
                        <div class="card card-primary">
                                <table class="table table-bordered">
                    
                             <div class="card-body p-0">
                                   <thead>
                                        <tr class="bg-secondary">
                                            <th width="40%">
                                                <center>Type of Index Crimes</center>
                                            </th>
                                            <th>
                                                <center>Highly Associated Location</center>
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody id="table_body_reports">



                                    </tbody>
                                </table>
                            </div>
                            /.card-body 
                        </div>
                    </div> -->
                    <div class="card">
                        <div class="card-header mb-0">
                            <h4 class="card-title text-primary"><i class="fas fa-wrench"></i> Frequency of Crime</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-lg-4">


                                    <small>
                                        The Frequency of Crime or Crime Clock represents the annual ratio of crime to fixed time intervals.
                                    </small>

                                    <div class="form-group">
                                        <label>Number of Days:</label>
                                        <label id="days-holder"></label>
                                        <div class="form-group form-inline mb-0">
                                            <small class="form-text text-muted">FROM : </small>
                                            <input type="date" class="form-control col-lg-12 col-12" name="" id="date-from" placeholder="FROM">
                                       
                                            <small class="form-text text-muted"> &nbsp &nbsp TO : </small>
                                            <input type="date" class="form-control col-lg-12 col-12" name="" id="date-to" placeholder="TO">

                                        </div>

                                        <!-- /.input group -->
                                    </div>
                                    <div class="form-group">
                                        <label>TYPE OF INCIDENT:</label>
                                        <select id="incident-type-map" class="form-control col-md-4select2" required>
                                            <option selected disabled> Select Incident </option>
                                            <?php include 'display_incident.php'; ?>
                                        </select>
                                    </div>

                                </div>
                                <div class="row col-lg-8 mt-5">
                                    <div class="col-lg-6 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-primary">
                                            <div class="inner">
                                                <h4 id="frequency-days">0</h4>

                                                <p>Days</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-calendar text-white"></i>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-lg-6 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-primary">
                                            <div class="inner">
                                                <h4 id="frequency-hours">0</h4>

                                                <p>Hours</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-clock text-white"></i>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-lg-6 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-primary">
                                            <div class="inner">
                                                <h4 id="frequency-minutes">0</h4>

                                                <p>Minutes</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-clock text-white"></i>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-lg-6 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-primary">
                                            <div class="inner">
                                                <h4 id="frequency-secs">0</h4>

                                                <p>Secs</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-clock text-white"></i>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- ./col -->
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>


        <!-- table here -->

        <div class="card ">
            <div class="card-body table-responsive">
                <table id="crime_table_list" class="table table-bordered table-hover">
                    <thead>
                        <tr>
          
                            <th width="20%">
                                BLOTTER ENTRY #
                            </th>
                            <th>
                                CRIME INCIDENT
                            </th>
                            <th>
                                COMPLAINANT
                            </th>
                            <th>
                                DATE FILED
                            </th>
                            <th>
                                PLACE
                            </th>
                            <th>
                                STATUS
                            </th>
                            <th>

                            </th>

                        </tr>
                    </thead>
                    <tbody id="tbodcrimelist">

                       <?php include 'show_table_crime.php'; ?>

                    </tbody>


                </table>
            </div>
        </div>


        <!-- table end -->

    </div>




    <!-- /.card-body -->
</div>