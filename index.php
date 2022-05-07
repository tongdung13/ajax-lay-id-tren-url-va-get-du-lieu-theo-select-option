<?php



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<script>
        // lay id tren url
        var vars = [],
            hash;
        var hashes = window.location.href.slice(window.location.href.indexOf('e/'));

        for (var i = 0; i < hashes.length; i++) {
            var id = hashes[2];
        }
        console.log(id);
        // get du lieu theo select option
        $("select[name='model_name']").change(function() {

            var model_name = $(this).val();
            console.log(model_name);
            var promotion = $(this).val();
            $.ajax({
                url: '/admin/campaign-customers/get-promotion/' + id + '?model_name=' + model_name,
                type: 'GET',
                data: promotion,
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    $("#promotion").html('');
                    $.each(response, function(key, value) {
                        if (value != 0) {
                            $("#promotion").append(
                                "<input type='radio' name='gift_if' style='margin-top: 10px' value=" +
                                value.id + " />",
                                "<label>" + value.name + "</label>" + "</br>"
                            );
                        } else {
                            $("#promotion").append(
                                "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#myModal'>" +
                                'Chọn quà tặng' +
                                "</button>"

                            );
                        }

                    });
                }
            });

        });
    </script>
</body>
</html>

