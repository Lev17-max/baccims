var names = [];

$('body').on('change', '.picupload', function(event) {

    var getAttr = $(this).attr('click-type');
    var files = event.target.files;
    var output = document.getElementById("media-list");
    var z = 0
    if (getAttr == 'type1') {
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            names.push($(this).get(0).files[i].name);
            if (file.type.match('image')) {

                var picReader = new FileReader();
                picReader.fileName = file.name
                picReader.addEventListener("load", function(event) {

                    var picFile = event.target;

                    var div = document.createElement("li");

                    div.innerHTML = "<img src='" + picFile.result + "'" +
                        "title='" + picFile.name + "'/><div  class='post-thumb'><div class='inner-post-thumb'><a href='javascript:void(0);' data-id='" + event.target.fileName + "' class='remove-pic'><i class='fa fa-times' aria-hidden='true'></i></a><div></div>";

                    $("#media-list").prepend(div);

                });
            }
            picReader.readAsDataURL(file);

        }

    }
});