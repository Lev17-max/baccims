<script>
    function readURL(input, num) {
        if (input.files && input.files[0] && num == 1) {
            var reader = new FileReader();
            reader.onload = function(e) {

                $('#image-holder1').attr('href', e.target.result);
                $('#Fimg').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        } else if (input.files && input.files[0] && num == 2) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image-holder2').attr('href', e.target.result);
                $('#Bimg').attr('src', e.target.result);

            }
            reader.readAsDataURL(input.files[0]);
        }
    }


    $(document).ready(function() {

        $('#reg_username').keyup(function (e) { 

            if(this.value.length > 4){
            $.ajax({
                type: "POST",
                url: "search_username.php",
                data: {
                    username : $(this).val(),
                },
                success: function (response) {
                    if(response == 204){
                        $('#reg_username').addClass('is-invalid');
                        $('#reg_username').removeClass('is-valid');

                        $('#reg_username').attr('title', 'Username is Taken');
                    }else{
                        $('#reg_username').addClass('is-valid');
                        $('#reg_username').removeClass('is-invalid');
                        $('#reg_username').attr('title', 'Username is Available');
                    }
                    
                }
            });
        }else{
                        $('#reg_username').addClass('is-invalid');
                        $('#reg_username').removeClass('is-valid');

                        $('#reg_username').attr('title', 'Letters should be more than 4');

        }
            
        });



        
        bsCustomFileInput.init();


    });

    $("#exampleInputFile1").on("change", function() {
        $("#id-show1").removeClass('d-none');
        $(".br").addClass('d-none');
    });
    $("#exampleInputFile2").on("change", function() {
        $("#id-show2").removeClass('d-none');
        $(".br").addClass('d-none');
    });
</script>