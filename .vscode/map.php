<div id="maps" class="row  animate__animated animate__headShake d-none">

    <div class="col-lg-8 col-12 m-0 p-0">
        <div class="card ">
            <div class="card-header border-0 pb-0">
                <h3 class="card-title">Crime Map</h3>
                <div class="card-tools">
                    <button id="hide" type="button" class="btn btn-tool text-dark" onclick="PrintDiv()">
                        <i class="fas fa-copy"> Print</i>
                    </button>
                </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body pt-0 ">
                <div class="d-md-flex">
                    <div class="p-1 flex-fill" style="overflow: hidden">
                        <!-- Map will be created here -->
                        <div id="map" style="height:  500px; overflow: hidden">

                        </div>


                    </div>
                </div>
            </div><!-- /.d-md-flex -->
        </div>
        <!-- /.card-body -->
    </div>

    <div class="col-lg-4 col-12">
        <div class="card">
            <div class="card-body">
                <div class="col-12 col-md-12 col-lg-12 order-1 order-md-2">
                    <center>
                        <h3 class="text-primary"><i class="fas fa-wrench"></i> Crime Map Option</h3>
                    </center>
                    <?php if ($_SESSION['ACCESS_LEVEL'] != 0) {
                    ?>
                        <div class="form-group">
                            <label>Year:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input type="number" class="form-control float-right" min="1999" value="<?php echo date("Y"); ?>" max="2030" id="crimemap_date">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group">
                            <label>TYPE OF INCIDENT:</label>

                            <select id="incidentType" class="form-control select2" required>
                                <option selected value="0">ALL</option>
                                <?php include 'display_incident.php'; ?>
                            </select>
                        </div>
                        <div id="container_for_display" class="row animate__animated animate__headShake d-none">
                            <!-- ./col -->
                            <div class="col-lg-12 col-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <!-- include regis -->
                                        <h3 id="displayhere"></h3>
                                        <!-- /regis -->
                                        <p>No of Days</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->




                            <!-- /.row -->
                        </div>
                    <?php } else { ?>

                        <div class="form-group">
                            <label>TYPE OF INCIDENT:</label>

                            <select id="incidentType" class="form-control select2" required>
                                <option selected value="0">ALL</option>
                                <?php include 'display_incident.php'; ?>
                            </select>
                        </div>


                    <?php } ?>




                </div>
            </div>

        </div>


        <div class="card">
            <div class="card-header border-0">
                <div class="card-title">
                    Markers
                </div>
            </div>
            <div class="card-body">
                <?php include 'connection.php';
                $query = $connect->prepare('SELECT * FROM incident_type');
                $query->execute();
                $data = $query->fetchAll();
                foreach ($data as $row2) {

                    echo '  <a class="btn btn-app"><img width="20" src="dist/img/low/' . $row2['ICON'] . '"><br> ' . $row2['NAME'] . ' </a>';
                }    ?>
            </div>
        </div>



        <div class="card">
            <div class="card-header border-0">
                <div class="card-title">
                    Levels
                </div>
            </div>
            <div class="card-body">
                <?php
                for ($i = 1; $i <= 3; $i++) {
                    if ($i == 2) {
                        echo '  <a class="btn btn-app"><img width="20"  src="dist/img/level/low.png"><br>Low</a>';
                    } else if ($i == 1) {
                        echo '  <a class="btn btn-app"><img width="20" src="dist/img/level/high.png"><br> High </a>';
                    } else {
                        echo '  <a class="btn btn-app"><img width="20" src="dist/img/level/medium.png"><br> Medium </a>';
                    }
                } ?>
            </div>
        </div>





    </div>
</div>