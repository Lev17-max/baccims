<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 id="name" class="m-0 name">InfoBoard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li id="name2" class="breadcrumb-item active name">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->


        <!-- display your body here -->
        <div class="container ">

            <!-- end of dashboard -->
            <!-- start of reports -->
            <?php 
                 include 'update-incident.php';
                 include 'infoboard.php';
                 include 'help.php';
                 include 'reports.php';
                 include 'incident_record_form.php';
                //  include 'users.php';
                 include 'messages.php';
                 include 'map.php';
                 include 'contacts.php';
                  
                  ?>
           

        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->