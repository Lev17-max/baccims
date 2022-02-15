<div id="users" class="row animate__animated animate__headShake d-none">
    <div class="col-12 ">
        <div class="card">
            
            <div class="card-header">
                <h3 class="card-title">User</h3>
                <?php if($_SESSION['ACCESS_LEVEL'] != 1){ 
                        echo ' <div class="card-tools">
                        <a href="" class="add-account text-secondary" data-toggle="modal" data-target="#adduser"><i class="fas fa-plus-circle"></i> ADD ACCOUNT</a>
                      </div>';
                }                  
                    ?>
                      
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive overflow-auto">
                <table id="user_table" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                        <?php if($_SESSION['ACCESS_LEVEL'] == 2){ ?>

                            <th style="width: 1%">
                                #
                            </th>
                            <th style="width: 20%">
                                Full Name
                            </th>
                            <th>
                                User Type
                            </th>
                            <th>
                                Front ID
                            </th>
                            <th>
                                Back ID
                            </th>
                            <th>
                                Account status
                            </th>
                            <th>
                                Verification Status
                            </th>
                            <th>
                                <!-- no data -->
                            </th>
                        <?php } 
                        else if($_SESSION['ACCESS_LEVEL'] == 3){ ?>

                            <th style="width: 1%">
                                #
                            </th>
                            <th style="width: 20%">
                                Full Name
                            </th>
                            <th>
                                User Type
                            </th>
                            <th>
                                Account status
                            </th>
                            <th>
                                <!-- no data -->
                            </th>
                        <?php } ?>
                        </tr>
                    </thead>
                    <tbody id="tbod">
                        <?php 
                            include 'show_admin_table.php';
                        
                        ?>

                    </tbody>


                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>



