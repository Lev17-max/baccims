 



    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    //var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [


          'Chrome',
          'IE',
          'FireFox',
          'Safari',
          'Opera',
          'Navigator',


      ],
      datasets: [
        {


          data: [700,500,400,600,300,100],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],


        }
      ]
    }

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.


    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = donutData;
    var pieOptions     = {


      maintainAspectRatio : false,
      responsive : true,



    }



    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
 

      type: 'pie',
      data: pieData,
      options: pieOptions


    })

