<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'head.php'; ?>
</head>

<body>
    <button id="disp">Display Markers</button>
    <button id="del">Delete Markers</button>
    <div class="form-group">
        <label>TYPE OF INCIDENT:</label>
        <select id="incidentType" class="form-control select2" required>
            <option selected disabled value="0">TYPE OF INCIDENT</option>
            <?php include 'display_incident.php'; ?>
        </select>
    </div>


    <div id="map" style="height: 400px;"></div>


    <?php include 'scripts.php'; ?>
    <script>
        $(document).ready(function() {
            var markersdata = [];
            var markers = [];
            var gmarker = [];


            var map = new google.maps.Map(document.getElementById("map"), {
                center: new google.maps.LatLng(10.605016266229336, 122.9671647761524),
                zoom: 16,
            });


            $('#disp').click(function(e) {

                markersdata = [
                    <?php
                    include 'connection.php';
                    $incident = $connect->prepare('SELECT *,count(inc.TYPE_OF_INCIDENT_ID) AS TOTAL FROM item_d i 
                                        JOIN place p
                                        ON i.PLACE_ID = p.id
                                        JOIN incident inc 
                                        ON i.BLOTTER_ENTRY_NUMBER = inc.BLOTTER_ENTRY_NUMBER
                                        JOIN incident_type inct
                                        ON inc.TYPE_OF_INCIDENT_ID = inct.ID
                                        GROUP BY inc.TYPE_OF_INCIDENT_ID,i.PLACE_ID');
                    $incident->execute();
                    $dataincident = $incident->fetchAll();;
                    foreach ($dataincident as $row) {
                        echo '["' . $row['NAME'] . '", ' . $row['LATITUDE'] . ', ' . $row['LONGITUDE'] . ', "dist/img/low/' . $row['ICON'] . '",' . $row['TOTAL'] . '],';
                    }
                    ?>
                ];

                for (let index = 0; index < markersdata.length; index++) {
                    let stringData = '<small class="badge badge-warning"><i class="far fa-clock"></i> ' + markersdata[index][4] + '</small>';

                    addMarkers(markersdata[index][1], markersdata[index][2], markersdata[index][3], stringData, markersdata[index][4]);


                }
            });
            $('#del').click(function(e) {
                remove_markers();
            });


            $('#incidentType').change(function(e) {
                var id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "querydisplayonmap.php",
                    data: {
                        id: id,
                    },
                    success: function(response) {



                        if (response.length <= 0) {
                            remove_markers();
                        } else {

                            var maparr = JSON.parse(response);

                            

                            // formedian = Array.from(new Array(maparr.length), (val, index) => parseInt(maparr[index][0]));
                            // var numbers = [JSON.parse(formedian)];

                            // if(formedian.length != 0){
                            // // var min = Math.min(parseInt(formedian));
                            // // var max = Math.max(parseInt(formedian));
                            // // var medium = median(formedian);


                            // // console.log('min :'+ Math.min(parseInt(formedian)));
                            // // console.log('median :'+median(formedian));
                            // // console.log('min :'+ Math.max(parseInt(formedian)));






                            // }



                            remove_markers();

                            
                            for (let index = 0; index <= maparr.length - 1; index++) {

                                var level = (parseInt(maparr[index]['TOTAL'])/(maparr.length - 1))*100;

                                var fileloc = "dist/img/low/" + maparr[index]['ICON'];
                                let stringData = '';


                                if(level < 25 && (maparr.length - 1) > 0){
                                     stringData = '<img width="30" src=" https://c.tenor.com/37UlvShPJG8AAAAi/ezo-snowflakes.gif">';

                                }else if((level < 75 && level > 25) && (maparr.length - 1) > 0){

                                     stringData = '<img width="30" src=" https://c.tenor.com/0CnzoZmYPm8AAAAi/leaves-fall.gif">';


                                }else if(level > 75 && (maparr.length - 1) > 0){
                                     stringData = '<img width="30" src="https://c.tenor.com/VUH3A7tK-qgAAAAi/dm4uz3-foekoe.gif">';

                                }else{
                                    stringData = '<img width="30" src=" https://c.tenor.com/0CnzoZmYPm8AAAAi/leaves-fall.gif">';

                                }

                                // https://c.tenor.com/37UlvShPJG8AAAAi/ezo-snowflakes.gif
                                //https://c.tenor.com/VUH3A7tK-qgAAAAi/dm4uz3-foekoe.gif
                                //https://c.tenor.com/dRMvP5Gzb0MAAAAj/rain-raining.gif
                                addMarkers(maparr[index]['LATITUDE'], maparr[index]['LONGITUDE'], fileloc, stringData, maparr[index]['TOTAL']);

                            }
                        }

                    }
                });

            });



            function median(values) {
                values.sort(function(a, b) {
                    return a - b;
                });
                var half = Math.floor(values.length / 2);

                if (values.length % 2)
                    return values[half];
                else
                    return (values[half - 1] + values[half]) / 2.0;
            }











            function addMarkers(lat, lng, icon, label, zindex) {
                var marker = new markerWithLabel.MarkerWithLabel({
                    map: map,
                    position: new google.maps.LatLng(lat, lng),
                    icon: icon,
                    labelContent: label,
                    labelAnchor: new google.maps.Point(-26, -56),
                    labelClass: "labels"
                });
                gmarker.push(marker);
            }

            function remove_markers() {
                for (var i = 0; i < gmarker.length; i++) {
                    gmarker[i].setMap(null);

                }
                gmarker = [];
            };
        });
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsjaYpcqQsuXso2ZmNYIWvhm7Pnr9h-tU"></script>
</body>

</html>