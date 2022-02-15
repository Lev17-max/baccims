<script>
  $(document).ready(function() {

    var markersdata = [];
    var markers = [];
    var gmarker = [];


    var map = new google.maps.Map(document.getElementById("map"), {
      center: new google.maps.LatLng(10.605016266229336, 122.9671647761524),
      zoom: 16,
    });


    $('#crimemap_date').change(function(e) {


      let year = $(this).val();
      let crime = $('#incidentType option').filter(':selected').val();

      if (crime != 0) {

        $.ajax({
          type: "POST",
          url: "map-query-all-admin.php",
          data: {
            id: crime,
            year: year,
          },
          success: function(response) {

            if (response.length <= 0) {
              remove_markers();
            } else {

              let maparr = JSON.parse(response);
              remove_markers();


              for (let index = 0; index <= maparr.length - 1; index++) {
                var fileloc = "../dist/img/low/" + maparr[index]['ICON'];
           
                let a;
                if(maparr[index]['TOTAL'] > maparr[index]['TOTAL_CRIMES']){
                  a = maparr[index]['TOTAL'];
                }
                else{
                  a = maparr[index]['TOTAL_CRIMES'];
                }
                
                
                assignLabel(maparr[index]['LATITUDE'],maparr[index]['LONGITUDE'],maparr[index]['TOTAL'], a, fileloc,maparr[index]['PHASE'],maparr[index]['PUROK']);
    
              }
            }

          }
        });
      } else {


        $.ajax({
          type: "POST",
          data: {
            year : year,
          },
          url: "map-query-all-admin.php",
          success: function(response) {

            let arr = JSON.parse(response);

            // place = Array.from(new Array(arr.length), (val, index) => arr[index]['PLACE_ID']);

            // var counts = {};


            remove_markers();

            // place.forEach(function(x) {
            //   counts[x] = (counts[x] || 0) + 1;
            // });

            // console.log(counts['3']);

            for (let index = 0; index < arr.length; index++) {
              var fileloc = "../dist/img/low/" + arr[index]['ICON'];
              // var flag;
              // let st = arr[index]['PLACE_ID'];
           
              // if (flag == st) {
              //   continue;
              // } else {
                 let a;
                if(arr[index]['TOTAL'] > arr[index]['TOTAL_CRIMES']){
                  a = arr[index]['TOTAL'];
                }
                else{
                  a = arr[index]['TOTAL_CRIMES'];
                }
                
                
                assignLabel(arr[index]['LATITUDE'],arr[index]['LONGITUDE'],arr[index]['TOTAL'], a, fileloc,arr[index]['PHASE'],arr[index]['PUROK']);
      // flag = parseInt(arr[index]['PLACE_ID']);

      //         }
            }


          }
        });




      }




      // $.ajax({
      //   type: "POST",
      //   url: "map-query-all-admin.php",
      //   data: {
      //     year: year,
      //   },
      //   success: function (response) {

      //     if (response.length <= 0) {
      //       remove_markers();
      //     } else {

      //       var maparr = JSON.parse(response);


      //       remove_markers();


      //       for (let index = 0; index <= maparr.length - 1; index++) {
      //         var fileloc = "../dist/img/low/" + maparr[index]['ICON'];

      //         let stringData = assignLabel(maparr[index]['TOTAL'],maparr.length - 1,maparr[index]['ICON']);


      //         // https://c.tenor.com/37UlvShPJG8AAAAi/ezo-snowflakes.gif
      //         //https://c.tenor.com/VUH3A7tK-qgAAAAi/dm4uz3-foekoe.gif
      //         //https://c.tenor.com/dRMvP5Gzb0MAAAAj/rain-raining.gif
      //         addMarkers(maparr[index]['LATITUDE'], maparr[index]['LONGITUDE'], fileloc, stringData, maparr[index]['TOTAL']);

      //       }
      //     }



      //   }
      // });




    });



    $('#incidentType').change(function(e) {
      let id = $('#incidentType option').filter(':selected').val();
      let year = $('#crimemap_date').val();
      
      if (id != 0) {
        $.ajax({
          type: "POST",
          url: "map-query-all-admin.php",
          data: {
            id: id,
            year: year,
          },
          success: function(response) {

            remove_markers();

            if (response.length <= 0) {
              remove_markers();
            } else {

              let maparr = JSON.parse(response);

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
                var fileloc = "../dist/img/low/" + maparr[index]['ICON'];


                // let stringData = assignLabel(maparr[index]['TOTAL'], maparr.length - 1, maparr[index]['ICON'],maparr[index]['PHASE'],maparr[index]['PUROK']);

                // // https://c.tenor.com/37UlvShPJG8AAAAi/ezo-snowflakes.gif
                // //https://c.tenor.com/VUH3A7tK-qgAAAAi/dm4uz3-foekoe.gif
                //https://c.tenor.com/dRMvP5Gzb0MAAAAj/rain-raining.gif

                let a;
                if(maparr[index]['TOTAL'] > maparr[index]['TOTAL_CRIMES']){
                  a = maparr[index]['TOTAL'];
                }
                else{
                  a = maparr[index]['TOTAL_CRIMES'];
                }
                
                
                assignLabel(maparr[index]['LATITUDE'],maparr[index]['LONGITUDE'],maparr[index]['TOTAL'], a, fileloc,maparr[index]['PHASE'],maparr[index]['PUROK']);
    
              }
            }

          }
        });
      } else {

        $.ajax({
          type: "POST",
          url: "map-query-all-admin.php",
          data: {
            year: year,
          },
          success: function(response) {

            remove_markers();

            if (response.length <= 0) {
              remove_markers();
            } else {

              let maparr = JSON.parse(response);

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
                var fileloc = "../dist/img/low/" + maparr[index]['ICON'];

                let a;
                if(maparr[index]['TOTAL'] > maparr[index]['TOTAL_CRIMES']){
                  a = maparr[index]['TOTAL'];
                }
                else{
                  a = maparr[index]['TOTAL_CRIMES'];
                }
                
                
                assignLabel(maparr[index]['LATITUDE'],maparr[index]['LONGITUDE'],maparr[index]['TOTAL'], a, fileloc,maparr[index]['PHASE'],maparr[index]['PUROK']);
    
                // https://c.tenor.com/37UlvShPJG8AAAAi/ezo-snowflakes.gif
                //https://c.tenor.com/VUH3A7tK-qgAAAAi/dm4uz3-foekoe.gif
                //https://c.tenor.com/dRMvP5Gzb0MAAAAj/rain-raining.gif


        
              }
            }

          }
        });

      }

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


    function assignLabel(lat,long,total, arrayLength, icon,phase,purok) {
      var level = (parseInt(total) / arrayLength) * 100;

      let stringData = '';


      if (level < 25 && arrayLength > 0) {
       
        // stringData = '<img width="30" src=" https://c.tenor.com/37UlvShPJG8AAAAi/ezo-snowflakes.gif">';
        stringData = '<img width="30" src="../dist/img/level/low.png"><span class="badge badge-secondary">'+phase+' '+purok+'</span>';

      } else if ((level < 75 && level > 25) && arrayLength > 0) {
     
        stringData = '<img width="30" src="../dist/img/level/medium.png"><span class="badge badge-secondary">'+phase+' '+purok+'</span>';
                    } else if (level > 75 && arrayLength > 0) {
        stringData = '<img width="30" src="../dist/img/level/high.png"><span class="badge badge-secondary">'+phase+' '+purok+'</span>';
      } else {
    
        // stringData = '<img width="30" src=" https://c.tenor.com/0CnzoZmYPm8AAAAi/leaves-fall.gif">';
        stringData = '<img width="30" src="../dist/img/level/low.png"><span class="badge badge-secondary">'+phase+' '+purok+'</span>';
                    }


        addMarkers(lat, long, icon, stringData, total);



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


  // var infoWindow = new google.maps.InfoWindow(),
  //   marker, i;
  // // Create markers.
  // for (let i = 0; i < features.length; i++) {

  //   var position = new google.maps.LatLng(features[i][1], features[i][2]);

  //   marker = new markerWithLabel.MarkerWithLabel({
  //     position: position,
  //     icon: features[i][3],
  //     map: map,

  //     zIndex: features[i][4],
  //     labelContent: '<span class="badge bg-warning">' + features[i][4] + '</span>',

  //     labelAnchor: new google.maps.Point(-19, -40),
  //     animation: google.maps.Animation.DROP,

  //   });




  //   google.maps.event.addListener(marker, 'click', (function(marker, i) {
  //     return function() {
  //       infoWindow.setContent(contentString[i][0]);
  //       infoWindow.open(map, marker);
  //     }
  //   })(marker, i));
  // }
  // for (const key in legends) {
  //   const legend = document.getElementById("legend");
  //   const div = document.createElement("div");
  //   div.innerHTML = '<img src="' + legends[key][1] + '">' + legends[key][0];

  //   legend.appendChild(div);


  // }



  // //contrrols inside the map
  // map.controls[google.maps.ControlPosition.TOP_RIGHT].push(legend);
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