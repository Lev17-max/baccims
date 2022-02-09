<script>
    $(document).ready(function() {
        <?php include 'get_num_crime.php'; ?>

        // var sparkline3 = new Sparkline($('.sparkline-3')[0], { width: 200, height: 70, lineColor: '#3af221', endColor: '#3af221' })
        // sparkline3.draw([15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21])

        var blueback = 'rgb(0 123 255 / 48%)';
        var reported = {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: "Present Number of Crimes Reported",
                backgroundColor: blueback,
                pointBorderColor: "rgb(0 123 255)",
                pointBackgroundColor: "rgb(0 123 255)",
                borderColor: "rgb(0 123 255)",
                data: [],
                fill: true
            }, {
                label: "Present Number of Crimes Reported",
                backgroundColor: "grey",
                pointBorderColor: "grey",
                pointBackgroundColor: "grey",
                borderColor: "grey",
                data: <?php
                        echo json_encode($array); ?>,
                fill: true
            }],

        }
        var mcr = {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                backgroundColor: blueback,
                pointBorderColor: "rgb(0 123 255)",
                pointBackgroundColor: "rgb(0 123 255)",
                borderColor: "rgb(0 123 255)",
                data: [
                    <?php

                    foreach ($volume as $key => $value) {
                        $voldata[] = '"' . $value . '"';
                    }
                    echo implode(',', $voldata);

                    ?>

                ],
                fill: true
            }],

        }

        var crime_solved = {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: "Number of Crimes Solved",
                backgroundColor: blueback,
                pointBorderColor: "rgb(0 123 255)",
                pointBackgroundColor: "rgb(0 123 255)",
                borderColor: "rgb(0 123 255)",
                data: [],
                fill: true
            }, {
                label: "Number of Crimes Solved",
                backgroundColor: "gray",
                pointBorderColor: "gray",
                pointBackgroundColor: "gray",
                borderColor: "gray",
                data: <?php
                        echo json_encode($array4); ?>,
                fill: true
            }]
        };


        var crime_sol_ef = {
            labels: [
                <?php

                foreach ($arr as $key => $value) {
                    $label[] =  $value[0];
                }
                // $year = array_unique($label)
                echo implode(',', $label);
                ?>
            ],
            datasets: [{
                label: "Crime Solution Effeciency",
                backgroundColor: blueback,
                pointBorderColor: "rgb(0 123 255)",
                pointBackgroundColor: "rgb(0 123 255)",
                borderColor: "rgb(0 123 255)",
                data: [

                    <?php

                    foreach ($arr as $key => $value) {
                        $total[] = '"' . ($value[2] / $value[1]) * 100 . '"';
                    }
                    echo implode(',', $total);
                    ?>

                ],
                fill: true
            }]
        };



        var linectx1 = document.getElementById('crime_solve').getContext('2d');
        var chart1 = new Chart(linectx1, {
            type: 'line',
            data: crime_solved,

            options: {
                responsive: true,
                legend: {
                    display: false,
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false
                        }
                    }],
                    yAxes: [{

                        ticks: {
                            stepSize: 1
                        }
                    }]
                }
            }

        });
        var linectx2 = document.getElementById('crime_reported').getContext('2d');
        var chart2 = new Chart(linectx2, {
            type: 'line',
            data: reported,
            options: {
                responsive: true,
                legend: {
                    display: false,
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false
                        }
                    }],
                    yAxes: [{

                        ticks: {
                            stepSize: 1
                        }
                    }]
                }
            }
        });

        var linectx3 = document.getElementById('crime_sol').getContext('2d');
        var chart3 = new Chart(linectx3, {
            type: 'line',
            data: crime_sol_ef,
            options: {
                responsive: true,
                legend: {
                    display: false,
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display: false
                        },
                        ticks: {
                            stepSize: 10
                        }
                    }]
                }
            }

        });
        var linectx4 = document.getElementById('monthly_crime').getContext('2d');
        var chart4 = new Chart(linectx4, {
            type: 'line',
            data: mcr,
            options: {
                responsive: true,
                legend: {
                    display: false,
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: true
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display: true
                        },
                        ticks: {
                            stepSize: 0.5
                        }
                    }]
                }
            },

        });

        var myPieChart = null;

        function drawChart(objChart, data) {
            if (myPieChart != null) {
                myPieChart.destroy();
            }
            // Get the context of the canvas element we want to select
            var ctx = objChart.getContext("2d");
            chart3 = new Chart(ctx, {
                type: 'line',
                data: data,
                options: {
                    responsive: true,
                    legend: {
                        display: false,
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                    }
                }
            });
        }

        // ?php
        //         foreach ($solution as $key => $value) {
        //            echo  '
        //            addData(chart3,',$value[0].','.$value[1].')';
        //         }


        // ?>




        $('#option_a2').click(function(e) {
            if ($(this).is(':checked')) {
                updateConfigByMutating(chart1, 'bar');
                updateConfigByMutating(chart2, 'bar');
                updateConfigByMutating(chart3, 'bar');
                updateConfigByMutating(chart4, 'bar');

            }
        });
        $('#option_a1').click(function(e) {
            if ($(this).is(':checked')) {

                updateConfigByMutating(chart1, 'line');
                updateConfigByMutating(chart2, 'line');
                updateConfigByMutating(chart3, 'line');
                updateConfigByMutating(chart4, 'line');
            }
        });




        function updateConfigByMutating(chart, type) {
            chart.config.type = type;
            chart.update();
        }

        function addData(chart, label, data) {
            chart.data.labels = label;
            chart.update();
        }

        function removeData(chart) {
            chart.data.labels.pop();
            chart.data.datasets.forEach((dataset) => {
                dataset.data.pop();
            });
            chart.update();
        }




        $("#input-from, #input-to").change(function(e) {



            if ($('#input-from').val() >= $("#input-to").val() ||
                $('#input-from').val() < 1999 || $('#input-to').val() < 1999 ||
                $('#input-from').val() > 2030 || $('#input-to').val() > 2030)



            {
                $("#input-from").addClass('is-invalid');
                $('#input-to').addClass('is-invalid');
            } else {
                $('#input-from').removeClass('is-invalid');
                $('#input-to').removeClass('is-invalid');

                if ($('#option_a2').is(':checked')) {
                    updateConfigByMutating(chart1, 'bar');
                    updateConfigByMutating(chart2, 'bar');
                    updateConfigByMutating(chart3, 'bar');
                    updateConfigByMutating(chart4, 'bar');

                }

                if ($('#option_a1').is(':checked')) {

                    updateConfigByMutating(chart1, 'line');
                    updateConfigByMutating(chart2, 'line');
                    updateConfigByMutating(chart3, 'line');
                    updateConfigByMutating(chart4, 'line');
                }

                $('#crime_reported').load("get_total_filed_crime.php", {

                    from: $('#input-from').val(),
                    to: $("#input-to").val()

                }, function(data1) {


                    if (data1.length <= 2) {
                        for (let index = 0; index < 12; index++) {
                            chart2.data.datasets[0].data[index] = 0;


                        }
                        chart2.update();
                        /////////////////////////////////////////////
                    } else {
                        var array = JSON.parse(data1)
                        var count = 1;

                        while (count <= 12) {
                            for (let index = 0; index <= array.length - 1; index++) {

                                if (count == array[index]['MONTHS']) {
                                    chart2.data.datasets[0].data[count - 1] = array[index]['TOTAL'];
                                    break;

                                } else {
                                    chart2.data.datasets[0].data[count - 1] = 0;


                                }


                            }
                            count++;
                        }
                        chart2.update();
                    }


                });

                $('#monthly_crime').load("monthly_crime.php", {

                    from: $('#input-from').val(),
                    to: $("#input-to").val()

                }, function(response1) {


                    if (response1.length <= 2) {
                        /////////////////////////////////////////
                        for (let index = 0; index < 12; index++) {
                            chart4.data.datasets[0].data[index] = 0;


                        }
                        chart4.update();
                    } else {
                        var monthlyc = JSON.parse(response1);
                        var count = 1;


                        do {
                            for (let index = 0; index <= monthlyc.length - 1; index++) {

                                if (count == monthlyc[index][1]) {
                                    var mcr = parseInt(monthlyc[index][0]) * 100000;

                                    chart4.data.datasets[0].data[count - 1] = parseFloat(mcr / monthlyc[index][2]);

                                    break;

                                } else {
                                    chart4.data.datasets[0].data[count - 1] = 0;
                                }


                            }
                            count++;
                        } while (count <= 12);
                        chart4.update();
                    }

                });

                $('#crime_solve').load("get_total_solved_crimes.php", {

                    from: $('#input-from').val(),
                    to: $("#input-to").val()

                }, function(data2) {

                    if (data2.length <= 2) {
                        ////////////////////////////////////////
                        for (let index = 0; index < 12; index++) {
                            chart1.data.datasets[0].data[index] = 0;

                        }
                        chart1.update();
                    } else {

                        var solve_array = JSON.parse(data2);

                        count = 1;
                        do {
                            for (let index = 0; index <= solve_array.length - 1; index++) {

                                if (count == solve_array[index]['MONTHS']) {
                                    chart1.data.datasets[0].data[count - 1] = solve_array[index]['TOTAL'];
                                    break;

                                } else {
                                    chart1.data.datasets[0].data[count - 1] = 0;
                                }


                            }
                            count++;
                        } while (count <= 12);
                        chart1.update();
                    }

                });


                $('#crime_sol').load("get_filed_crime.php", {

                    from: $(this).val(),
                    to: $("#input-to").val()

                    

                }, function(data) {


                    console.log(data);

                    if (data.length == 0) {

                        ///////////////////
                    } else {
                        var sol_array = JSON.parse(data);
                        var labels = [];
                        labels = Array.from(new Array(sol_array.length), (val, index) => sol_array[index]['YEAR']);
                        addData(chart3, labels)

                        for (let index = 0; index <= sol_array.length - 1; index++) {   
                            var solution = (parseInt(sol_array[index]['TOTAL_SOLVED']) / parseInt(sol_array[index]['TOTAL_FILED'])) * 100;
                       
                            chart3.data.datasets[0].data[index] = solution;

                        }
                        chart3.update();

                    }


                });


            }

        });





        // $('#input-to, #input-from,#month-from ').change(function(e) {

        //     $('#day-from option').remove();
        //     for (let index = 1; index < getDaysInMonth($('#month-from').val(), $('#input-to').val()); index++) {

        //         $('#day-from').append($('<option>').val(index).text(index))

        //     }


        // });

        // $('#input-to, #input-from,#month-to ').change(function(e) {

        //     $('#day-to option').remove();
        //     for (let index = 1; index < getDaysInMonth($('#month-to').val(), $('#input-to').val()); index++) {

        //         $('#day-to').append($('<option>').val(index).text(index))

        //     }


        // });

        // $('#input-to ,#input-from,#month-to, #month-from,#day-to,#day-to').change(function(e) {
        //    if($('#month-from').val() > $('#month-from').val()){
        //     if($('#day-from').val()




        //    }


        //     });



        function diffDays(from, to) {
            var first_date = new Date(to);
            var second_date = new Date(from);
            const diffInMs = first_date - second_date;
            const diffInDays = diffInMs / (1000 * 60 * 60 * 24);
            return diffInDays;
        }




        $('#date-from').change(function(e) {
            var from = $('#date-from').val();
            var to = $('#date-to').val();

            if (to) {
                if (diffDays(from, to) < 0) {
                    $('#date-from').addClass('is-invalid');
                    $('#days-holder').text(diffDays(from, to) + ' days');

                } else {
                    $('#date-from').removeClass('is-invalid');
                }
            }
        });
        $('#date-to').change(function(e) {

            var from = $('#date-from').val();
            var to = $('#date-to').val();


            if (from) {
                if (diffDays(from, to) < 0) {
                    $('#date-to').addClass('is-invalid');
                    $('#days-holder').text(diffDays(from, to) + ' days');
                } else {
                    $('#date-to').removeClass('is-invalid');
                }
            }
        });

        $('#incident-type-map').change(function(e) {
            var from = $('#date-from').val();
            var to = $('#date-to').val();

            var numofdays = diffDays(from, to);
            $('#days-holder').text(numofdays + ' days');


            $.ajax({
                type: "POST",
                url: "get_frequency_of_crime.php",
                data: {
                    id: $('#incident-type-map').val(),
                    from: from,
                    to: to,

                },

                success: function(frequency) {
                    var arr = JSON.parse(frequency);

                    if (arr[0][0] != 0) {
                        var effeciency = numofdays / arr[0][0];
                        $("#frequency-days").text(Math.floor(effeciency));


                        var int1 = Math.floor(effeciency);
                        var frac1 = effeciency - int1;
                        $("#frequency-hours").text(Math.floor(frac1 * 24));


                        var int2 = Math.floor(frac1 * 24);
                        var frac2 = (frac1 * 24) - int2;
                        $("#frequency-minutes").text(Math.floor(frac2 * 60));

                        var int3 = Math.floor(frac2 * 60);
                        var frac3 = (frac2 * 60) - int3;
                        $("#frequency-secs").text(Math.floor(frac3 * 60));
                    } else {
                        $("#frequency-secs, #frequency-minutes ,#frequency-days ,#frequency-hours").text("0 Records")
                    }


                }
            });





        });




    });


    var getDaysInMonth = function(month, year) {

        return new Date(year, month, 0).getDate();

    };
</script>