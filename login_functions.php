<script>
    $(document).ready(function () {
         const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000,
        });
        <?php include 'toast.php'; ?>

    });
       

</script>