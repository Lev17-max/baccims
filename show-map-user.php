<script>
    $(document).ready(function() {
        var markersdata = [];
        var markers = [];
        var gmarker = [];
        var legend = [];

        var map = new google.maps.Map(document.getElementById("map"), {
            center: new google.maps.LatLng(10.605016266229336, 122.9671647761524),
            zoom: 16,
        });

      
        $('#incidentType').change(function(e) {
            var id = $('#incidentType').val();
            if (id != 0) {
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


                            remove_markers();


                            for (let index = 0; index <= maparr.length - 1; index++) {
                                var fileloc = "dist/img/low/" + maparr[index]['ICON'];

                                let stringData = assignLabel(maparr[index]['TOTAL'], maparr.length - 1, maparr[index]['ICON'],maparr[index]['PHASE'],maparr[index]['PUROK']);

                                addMarkers(maparr[index]['LATITUDE'], maparr[index]['LONGITUDE'], fileloc, stringData, maparr[index]['TOTAL']);

                            }
                        }

                    }
                });
            } else {

                $.ajax({
                    type: "GET",
                    url: "map-query-all.php",
                    success: function(response) {

                        var arr = JSON.parse(response);

                        place = Array.from(new Array(arr.length), (val, index) => arr[index]['PLACE_ID']);

                        var counts = {};

                        remove_markers();


                        place.forEach(function(x) {
                            counts[x] = (counts[x] || 0) + 1;
                        });

                        // console.log(counts['3']);

                        for (let index = 0; index < arr.length; index++) {
                            var fileloc = "dist/img/low/" + arr[index]['ICON'];
                            var flag;
                            let st = arr[index]['PLACE_ID'];
                            console.log('number: ' + st);
                            if (flag == st) {
                                continue;
                            } else {
                                console.log(counts[st]);

                                let stringData = assignLabel(arr[index]['TOTAL'], counts[st], arr[index]['ICON'],arr[index]['PHASE'],arr[index]['PUROK']);
                                addMarkers(arr[index]['LATITUDE'], arr[index]['LONGITUDE'], fileloc, stringData, arr[index]['TOTAL']);
                                flag = parseInt(arr[index]['PLACE_ID']);

                            }
                        }


                    }
                });




            }

        });

        function assignLabel(total, arrayLength, icon,phase,purok) {
      var level = (parseInt(total) / arrayLength) * 100;

      let stringData = '';

      if (level < 25 && arrayLength > 0) {
       
       // stringData = '<img width="30" src=" https://c.tenor.com/37UlvShPJG8AAAAi/ezo-snowflakes.gif">';
       stringData = '<img width="30" src="dist/img/level/low.png"><span class="badge badge-secondary">'+phase+' '+purok+'</span>';

     } else if ((level < 75 && level > 25) && arrayLength > 0) {
    
       stringData = '<img width="30" src="dist/img/level/medium.png"><span class="badge badge-secondary">'+phase+' '+purok+'</span>';
                   } else if (level > 75 && arrayLength > 0) {
       stringData = '<img width="30" src="dist/img/level/high.png"><span class="badge badge-secondary">'+phase+' '+purok+'</span>';
     } else {
   
       // stringData = '<img width="30" src=" https://c.tenor.com/0CnzoZmYPm8AAAAi/leaves-fall.gif">';
       stringData = '<img width="30" src="dist/img/level/low.png"><span class="badge badge-secondary">'+phase+' '+purok+'</span>';
                   }


      return stringData;


    }







        function addMarkers(lat, lng, icon, label, zindex) {
            var marker = new markerWithLabel.MarkerWithLabel({
                map: map,
                position: new google.maps.LatLng(lat, lng),
                icon: icon,
                labelContent: label,
                zIndex: parseInt(zindex),
                labelAnchor: new google.maps.Point(-33, -51),
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

<style type="text/css">
    #legend {
        font-family: Arial, sans-serif;
        background: #fff;
        padding: 10px;
        margin: 10px;
        border: 3px solid #000;
    }

    #legend h3 {
        margin-top: 0;
    }

    #legend img {
        vertical-align: middle;
    }
</style>