<script>
    function submitReport(reportid) {

        // $('#updateIncident').modal('show');
        // // $('.add-victim').trigger('click');
       var editor_id = <?php echo $_SESSION['USER_ID'] ?>;

        $.ajax({
            type: "POST",
            url: "get-status-crime.php",
            data: {
                id: reportid
            },
            success: function(response) {

                let arr = JSON.parse(response);
                let status = arr[0]['STATUS'];
                let blots = arr[0]['BLOTTER_ENTRY_NUMBER'];

                var formatfirst = '<div class="card btn-group">                           ' +
                    '  <div class="card-body">                    ' +
                    '      <a href="update-incident.php" class="btn btn-app bg-info edit-incident-pop">       ' +
                    '          <i class="fas fa-pen"></i>        ' +
                    '          Edit                               ' +
                    '      </a>                                    ';

                if (status == 0) {
                    var btnchoice = ' <a class="btn btn-app bg-success text-white crime-solved"> ' +
                        '          <i class="fas fa-check-double"></i>        ' +
                        '         Mark as Solved                        ' +
                        '      </a>                                    ';
                } else if (status == 1) {
                    var btnchoice = ' <a class="btn btn-app bg-warning crime-solved"> ' +
                        '          <i class="fas fa-file"></i>        ' +
                        '         Mark as Filed                           ' +
                        '      </a>                                    ';

                }

                var formatlast =
                    '  </div>                                     ' +
                    '<div>                                        ';

                Swal.fire({
                    title: 'OPTIONS',
                    html: formatfirst + btnchoice + formatlast,

                    focusConfirm: false,
                    showConfirmButton: false,
                    customClass: {
                        container: 'overflow-hidden',

                    },
                    showCancelButton: true,
                });




                $('.crime-solved').click(function(e) {
                    let choice_status;

                    if (status == 0) {
                        choice_status = 1;
                    } else {
                        choice_status = 0;
                    }
                    Swal.fire({
                        title: "Confirm Choice?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "Blue",
                        confirmButtonText: "Confirm!",
                        closeOnConfirm: false
                    }).then((result) => {
                        if (result.isConfirmed) {

                            // console.log(id+ ' ' +choice_status);
                            $.ajax({
                                type: "POST",
                                url: "status-crime-edit.php",
                                data: {
                                    id: reportid,
                                    status: choice_status
                                },
                                success: function(data) {
                                                 

                                    if (data == 204) {

                                     $.ajax({
                                         type: "POST",
                                         url: "log-incident-status.php",
                                         data: {
                                             blotnum : blots,
                                             date : "<?php date_default_timezone_set('Asia/Manila');echo date('Y-m-d H:i:s');  ?>",
                                             status: choice_status,
                                             user: editor_id
                                         },
                                         success: function (ans) {
                                             if(ans == 204){
                                                Swal.fire({
                                                        icon: 'success',
                                                        text: 'Updated Successfully!',
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                                $('#tbodcrimelist').load('show_table_crime.php',{
                                                                    usid : <?php echo $_SESSION['USER_ID']; ?>
                                                                });
                                                        }else{
                                                
                                                            $('#tbodcrimelist').load('show_table_crime.php',{
                                                                    usid : <?php echo $_SESSION['USER_ID']; ?>
                                                                });
                                                        }
                                                    });
                                             }else{
                                                 console.log(ans);
                                             }
                        
                                             
                                         }
                                     });
                                       
                                    }

                                }
                            });







                        }
                    });


                });



                $('.edit-incident-pop').click(function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: "Confirm?",
                        text: 'The table will close and redirect you to the form.',
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "Blue",
                        confirmButtonText: "Confirm!",
                        closeOnConfirm: false
                    }).then((result) => {
                        if (result.isConfirmed) {

                            $('#message').addClass('d-none');
                            $('#info').addClass('d-none');
                            // $('#reports').addClass('d-none');
                            $('#recordform').addClass('d-none');
                            $('#users').addClass('d-none');
                            $('#maps').addClass('d-none');
                            $('#reports').addClass('d-none');
                            $('#contacts').addClass('d-none');
                            $('#help').addClass('d-none');
                            $('#updaterecordform').removeClass('d-none');
                            $('#name').text('Update Incident Form');
                            $('#name2').text('Update Incident Form');
                            
                            $('#up_id').val(reportid);
                            $('#up_blot').val(blots);


             
                             $.ajax({
                                 type: "POST",
                                 url: "update-incident-script.php",
                                 data: {
                                     id: reportid

                                 },

                                 success: function (response) {

                                     let values = JSON.parse(response);
                                 
         
                                     $('#id-holder-update').val(values[0]['ID']);
                                     $('#blot-num-up').val(values[0]['BLOTTER_ENTRY_NUMBER']);
                                     $('#date-reported-update').val(values[0]['DATETIME_FILED']);
                                     $('#date-happened-update').val(values[0]['DATETIME_HAPPEN']);

                                     $('.up-case-disp').val(values[0]['INSTRUCTION']);
                                     $('.up-case-investigator').val(values[0]['INVESTIGATOR']);
                                     $('.up-case-chief').val(values[0]['CHIEF']);



                                     $('#incident-place-update').val(values[0]['PLACE_ID']).change();
                                     $('#incident-details-update').text(values[0][9]);
                                     $('#inc-type-up').val(values[0]['TYPE_OF_INCIDENT_ID']).change();
                                     if(values[0]['STATUS'] == 1){
                                        $("#status-switch-update").prop('checked', true);
                                     }else
                                     $('#status-switch-update').val(values[0]['STATUS']).change();


                                     $.ajax({
                                         type: "POST",
                                         url: "get_item_a.php",
                                         data: {
                                             blot: values[0]['BLOTTER_ENTRY_NUMBER']
                                         },
                                         success: function (itemares) {

                                            let valuesitema = JSON.parse(itemares);
                                            let input = document.querySelectorAll('.input-item-a-update');

                                            for (let index = 0; index < input.length; index++) {
                                                input[index].value = valuesitema[0][index];
                                                
                                            }
                                             
                                         }
                                     });
                                     
                                    $('#loader-item-c').load('form-c-update.php',{
                                        blot_num : values[0]['BLOTTER_ENTRY_NUMBER']
                                    });
                                    $('#loader-item-b').load('form-b-update.php',{
                                        blot_num : values[0]['BLOTTER_ENTRY_NUMBER']
                                    });

                            //  for (let index = 0; index < input.length; index++) {
                            //      input[index].value = index;
                                 
                            //  }
                                     
                                 }
                             });




                            

                      




























































                      




                                }
                            });


















                


                //         }


                //     });





                });









            }
        });
    }
</script>