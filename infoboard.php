<div id="info" class=" card animate__animated animate__headShake">

    <?php if ($_SESSION['ACCESS_LEVEL'] != 0) {
        echo ' <div class="card-header  mb-0"><div class="card-tools">
                                  <button id="submitPost" class="btn"><i class="fas fa-paper-plane"></i> Compose</button>
                                  </div></div>';
    } else {
        echo '';
    } ?>

    <!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content">
            <div id="PostMsg" class="border-0 active tab-pane" id="activity">

                <!-- Post -->
                <?php include 'info_board_script.php' ?>
                <!-- php include 'test_stacked.php' ?> -->
                <!-- /.post -->

             </div>
        </div>
        <!-- /.tab-content -->
    </div><!-- /.card-body -->
</div>