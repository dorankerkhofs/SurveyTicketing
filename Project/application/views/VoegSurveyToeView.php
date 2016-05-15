<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Vragen toevoegen</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>

        $('#inputKnop').on('click', function () {
            var surveyName = {'data': $('#dataID').val()};

            if (surveyName != '') {

                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url()?>index.php/VoegSurveyToeController/addSurvey/",
                    data: surveyName,
                    success: function (data) {
                    }
                });
            } else {
                window.alert("Veld mag niet leeg zijn!");
            }

        });

    </script>

    <style>
        .btn-success{

        }

    </style>
</head>

<body>

<p>Naam survey</p>
<br>
<input type="text" name="dataNaam" id="dataID" value="" maxlength="100" size="30" style="width: 35%"/>
<br><br>
<input type="submit" class="btn btn-success btn-small" name="inputKnop" id="inputKnop" value="Voeg toe!"/>


</body>
</html>