<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Option 1: Bootstrap Bundle with Popper -->
<!--     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 -->
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- CISTICO App -->
<script src="dist/js/adminlte.js"></script>
<!-- BS-Stepper -->
<script src="plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- FLOT CHARTS -->
<!-- <script src="plugins/flot/jquery.flot.js"></script> -->
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<!-- <script src="plugins/flot/plugins/jquery.flot.resize.js"></script> -->
<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- InputMask -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- SweetAlert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Ekko Lightbox -->
<script src="plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<script src="plugins/jquery-multifield-master/jquery.multifield.js"></script>
<script src="https://unpkg.com/@googlemaps/markerwithlabel/dist/index.min.js"></script>
<script src="dist/js/tooltip.js"></script>

<script>
    function PrintDiv2() {
        var divToPrint = document.getElementById('reports');
        var but = document.getElementById('hide2');


        but.style.display = "none";



        window.print();
        window.close();
        but.style.display = "block";
    }

    function PrintDiv() {
        var divToPrint = document.getElementById('maps');
        var but = document.getElementById('hide');


        but.style.display = "none";



        window.print();
        window.close();
        but.style.display = "block";
    }



    $('#sidebar-info-board').click(function(e) {
        $('#info').removeClass('d-none');
        // $('#reports').addClass('d-none');
        $('#recordform').addClass('d-none');
        $('#message').addClass('d-none');
        $('#users').addClass('d-none');
        $('#reports').addClass('d-none');
        $('#help').addClass('d-none');
        $('#maps').addClass('d-none');
        $('#name').text('Info Board');
        $('#contacts').addClass('d-none');
        $('#updaterecordform').addClass('d-none');
        $('#name2').text('Info Board');
        // $('#sidebar-info-board').addClass('d-none');
    });
    $('#sidebar-map').click(function(e) {
        $('#info').addClass('d-none');
        // $('#reports').addClass('d-none');
        $('#recordform').addClass('d-none');
        $('#message').addClass('d-none');
        $('#help').addClass('d-none');
        $('#updaterecordform').addClass('d-none');
        $('#users').addClass('d-none');
        $('#reports').addClass('d-none');
        $('#maps').removeClass('d-none');
        $('#name').text('Crime Map');
        $('#contacts').addClass('d-none');
        $('#name2').text('Crime Map');
    });
    $('#sidebar-form').click(function(e) {
        $('#info').addClass('d-none');
        // $('#reports').addClass('d-none');
        $('#recordform').removeClass('d-none');
        $('#message').addClass('d-none');
        $('users').addClass('d-none');
        $('#updaterecordform').addClass('d-none');
        $('#help').addClass('d-none');
        $('#reports').addClass('d-none');
        $('#maps').addClass('d-none');
        $('#name').text('Incident Record Form');
        $('#name2').text('Incident Record Form');
        $('#contacts').addClass('d-none');

        // $('#sidebar-info-board').addClass('d-none');
        // $('#sidebar-info-board').addClass('d-none');
    });
    $('#sidebar-reports').click(function(e) {
        $('#message').addClass('d-none');
        $('#info').addClass('d-none');
        $('#reports').removeClass('d-none');
        $('#help').addClass('d-none');
        $('#recordform').addClass('d-none');
        $('#users').addClass('d-none');
        $('#maps').addClass('d-none');
        $('#updaterecordform').addClass('d-none');
        $('#name').text('Reports');
        $('#name2').text('Reports');
        $('#contacts').addClass('d-none');
        // $('#sidebar-info-board').addClass('d-none');
        // $('#sidebar-info-board').addClass('d-none');
        // $('#sidebar-info-board').addClass('d-none');
    });
    $('#sidebar-message').click(function(e) {
        $('#message').removeClass('d-none');
        $('#info').addClass('d-none');
        $('#reports').addClass('d-none');
        $('#recordform').addClass('d-none');
        $('#users').addClass('d-none');
        $('#maps').addClass('d-none');
        $('#updaterecordform').addClass('d-none');
        $('#help').addClass('d-none');
        $('#name').text('Alert Message');
        $('#name2').text('Alert Message');
        $('#contacts').addClass('d-none');
        // $('#sidebar-info-board').addClass('d-none');
        // $('#sidebar-info-board').addClass('d-none');
        // $('#sidebar-info-board').addClass('d-none');
    });
    $('#sidebar-users').click(function(e) {
        $('#message').addClass('d-none');
        $('#info').addClass('d-none');
        // $('#reports').addClass('d-none');
        $('#recordform').addClass('d-none');
        $('#users').removeClass('d-none');
        $('#maps').addClass('d-none');
        $('#reports').addClass('d-none');
        $('#contacts').addClass('d-none');
        $('#updaterecordform').addClass('d-none');
        $('#name').text('Users');
        $('#help').addClass('d-none');
        $('#name2').text('Users');
        // $('#sidebar-info-board').addClass('d-none');
        // $('#sidebar-info-board').addClass('d-none');
        // $('#sidebar-info-board').addClass('d-none');
    });
    $('#sidebar-contact').click(function(e) {
        $('#message').addClass('d-none');
        $('#info').addClass('d-none');
        // $('#reports').addClass('d-none');
        $('#recordform').addClass('d-none');
        $('#users').addClass('d-none');
        $('#maps').addClass('d-none');
        $('#reports').addClass('d-none');
        $('#contacts').removeClass('d-none');
        $('#updaterecordform').addClass('d-none');
        $('#help').addClass('d-none');
        $('#name').text('About Us');
        $('#name2').text('About Us');

    });
    $('#sidebar-help').click(function(e) {
        $('#message').addClass('d-none');
        $('#info').addClass('d-none');
        // $('#reports').addClass('d-none');
        $('#recordform').addClass('d-none');
        $('#users').addClass('d-none');
        $('#maps').addClass('d-none');
        $('#reports').addClass('d-none');
        $('#contacts').addClass('d-none');
        $('#help').removeClass('d-none');
        $('#updaterecordform').addClass('d-none');
        $('#name').text('Help');
        $('#name2').text('Help');

    });

    $(document).ready(function() {




        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                type: 'image',
                onContentLoaded: function() {
                    var container = $('.ekko-lightbox-container');
                    var image = container.find('img');
                    var windowHeight = $(window).height();
                    if (image.height() + 200 > windowHeight) {
                        image.css('height', windowHeight - 150);
                        var dialog = container.parents('.modal-dialog');
                        var padding = parseInt(dialog.find('.modal-body').css('padding'));
                        dialog.css('max-width', image.width() + padding * 2 + 2);
                    }
                }
            });
        });
        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        });
        $('#reservationdatetime1').datetimepicker({
            icons: {
                time: 'far fa-clock'
            }
        });
        $('#reservationdatetime2').datetimepicker({
            icons: {
                time: 'far fa-clock'
            }
        });
        $('#reservationdatetime3').datetimepicker({
            icons: {
                time: 'far fa-clock'
            }
        });
        $('#reservationdatetime4').datetimepicker({
            icons: {
                time: 'far fa-clock'
            }
        });

        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'DD/MM/YYYY'
        });
        // $('#reservationdateA').datetimepicker({
        //     format: 'DD/MM/YYYY'
        // });
        // $('#reservationdateB').datetimepicker({
        //     format: 'DD/MM/YYYY'
        // });
        // $('#reservationdateC').datetimepicker({
        //     format: 'DD/MM/YYYY'
        // });

        var uri = window.location.toString();
        if (uri.indexOf("?") > 0) {
            var clean_uri = uri.substring(0, uri.indexOf("?"));
            window.history.replaceState({}, document.title, clean_uri);
        }

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000,
        });


        $('#logout').click(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You will be logout",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Proceed!'
            }).then((result) => {
                if (result.isConfirmed) {

                    window.location.href = "logout.php";
                }
            })



        });

        <?php include 'toast.php'; ?>

      



    });


    $(function() {
        $('.select2').select2();
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });

        $('#user_table').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        $('#crime_table_list').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
     


        $('#incident_table').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });




        $('#addplacebtn').click(function(e) {
            e.preventDefault();

            var form = $(this).parents('form');
            Swal.fire({
                title: "Confirm Place?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "Blue",
                confirmButtonText: "Confirm!",
                closeOnConfirm: false
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });



        $('#resetpass').click(function(e) {
            e.preventDefault();

            var form = $(this).parents('form');
            Swal.fire({
                title: "Reset Password?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "Blue",
                confirmButtonText: "Confirm!",
                closeOnConfirm: false
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });

    });
</script>