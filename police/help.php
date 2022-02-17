<div id="help" class="row animate__animated animate__headShake d-none">

<?php if($_SESSION['ACCESS_LEVEL'] == 1){ ?>
<div class="col-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Adding New Crime Incident
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex">
                <p class="d-flex flex-column">
                    To add new Crime Incident, You need to prepare an icon of the crime. Go to the "Incident Record Form" tab and click "Type of Incident" then choose the "Other" option to add another Crime incident 
                  <br>
                  <b class="text-danger">Icon must be in <a href="https://fileinfo.com/extension/png#:~:text=A%20PNG%20file%20is%20an,lossless%20compression%20and%20supports%20transparency" target="_blank">.PNG</a> file format and must not use <a href="https://fileinfo.com/extension/jpeg" target="_blank">.JPG/JPEG</a> file format to fit in the map </b>
                  <!-- <a href="https://www.google.com/maps/place/Handumanan,+Bacolod,+Negros+Occidental/">www.google.com/maps</a> -->
                </p>
                 
                </div>
                <img class="card-img-top" href="../dist/img/help/newcrime.png"  src="../dist/img/help/newcrime.png" data-toggle="lightbox" data-type="image" alt="Card image cap">
                <img class="card-img-top" href="../dist/img/help/newcrimem.png" src="../dist/img/help/newcrimem.png" data-toggle="lightbox" data-type="image" alt="Card image cap">
  


            </div>
        </div>
    </div>
    <div class="col-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Adding Place for Crime Incident
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex">
                <p class="d-flex flex-column">
                    To add new Place for Crime Incident, You need to prepare Coordinates. Go to the "Incident Record Form" tab and click "Type of Incident" then choose the "Add Place" option to add another Crime incident 
                  <br>
                  <!-- <a href="https://www.google.com/maps/place/Handumanan,+Bacolod,+Negros+Occidental/">www.google.com/maps</a> -->
                </p>
                 
                </div>
                <img class="card-img-top"  href="../dist/img/help/place.png" src="../dist/img/help/place.png" data-toggle="lightbox" data-gallery="imgpolice-gallery" data-type="image" alt="Card image cap">
                <img class="card-img-top"  href="../dist/img/help/placem.png"   src="../dist/img/help/placem.png"data-toggle="lightbox" data-type="image" data-gallery="imgpolice-gallery" alt="Card image cap">
  


            </div>
        </div>
    </div>
    <div class="col-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Getting The Latitude And Longitude.
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex">
                <p class="d-flex flex-column">
                    To get the longitude and Latitude of the place. You need to go to Google Maps and "Right Click" on the position where the place located in the map.
                  <br>
                  <a href="https://www.google.com/maps/place/Handumanan,+Bacolod,+Negros+Occidental/">www.google.com/maps</a>
                </p>
                 
                </div>
                <img class="card-img-top" href = "../dist/img/help/helplonglat.gif" src="../dist/img/help/helplonglat.gif" alt="Card image cap" data-toggle="lightbox" data-gallery="img-gallery" data-type="image" >
  


            </div>
        </div>
    </div>


    <?php } else if($_SESSION['ACCESS_LEVEL'] > 1) {?>


        <div class="col-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Adding New User
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex">
                <p class="d-flex flex-column">
                    To add new User, Go to the "Users" tab and click "Add Account" . The System will provide a form to create user. 
                  <br>
                  <!-- <a href="https://www.google.com/maps/place/Handumanan,+Bacolod,+Negros+Occidental/">www.google.com/maps</a> -->
                </p>
                 
                </div>
                <img class="card-img-top img-fluid" href="../dist/img/help/useradd.png" src="../dist/img/help/useradd.png" data-gallery="newuser-gallery"  data-toggle="lightbox" data-type="image" alt="Card image cap">
                <img class="card-img-top" href="../dist/img/help/useraddm.png" src="../dist/img/help/useraddm.png" data-gallery="newuser-gallery" data-toggle="lightbox"  data-type="image" alt="Card image cap">


            </div>
        </div>
    </div>












        <?php } else if($_SESSION['ACCESS_LEVEL'] < 1) {?>


<div class="col-12 col-lg-6">
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                Update Mobile Number
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex">
            <p class="d-flex flex-column">
                To Edit Old Phone Number, Click your Full name in the top right screen. The System will show you the user infomation and proceed editing your number by clicking the pen icon near the phone number. 
            <br>
            <!-- <a href="https://www.google.com/maps/place/Handumanan,+Bacolod,+Negros+Occidental/">www.google.com/maps</a> -->
            </p>
            
            </div>
            <img class="card-img-top" src="../dist/img/help/editnum.png" alt="Card image cap">
            <img class="card-img-top" src="../dist/img/help/editnum2.png" alt="Card image cap">


        </div>
    </div>
</div>
<div class="col-12 col-lg-6">
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                How to Use Crime Map
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex">
            <p class="d-flex flex-column">
                To use crime map, navigate to "Crime Map" tab. Choose "All" to display all crimes or choose a specific crime to display in the crime map.
            <br>
            <!-- <a href="https://www.google.com/maps/place/Handumanan,+Bacolod,+Negros+Occidental/">www.google.com/maps</a> -->
            </p>
            
            </div>
            <img class="card-img-top" src="../dist/img/help/crimemap.png" alt="Card image cap">
            <img class="card-img-top" src="../dist/img/help/crimemap2.png" alt="Card image cap">


        </div>
    </div>
</div>











<?php }?>
   
</div>