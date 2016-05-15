<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <style>

        td {
            width: 300px;
        }

        body {
            padding: 5px;
            margin: 5px;
        }

    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>


        function getIdDropdown() {


            var selectedVal = {'data': $("select[name=keuze] option:selected").index()};

            $.ajax({
                type: "POST",
                url: "<?php echo base_url()?>index.php/BekijkResultatenController/getSurveyID/",
                data: selectedVal,
                success: function (data) {

                    var obj = JSON.parse(data);

                    $('#vragen').html("");

                    if (obj.length > 0) {
                        try {
                            var items = [];
                            $.each(obj, function (i, val) {
                                items.push($('<tr/>').html(
                                    "<td>" + val.vraag_body + "</td>" +
                                    "<td>" + val.antwoord_body + "</td>"
                                ));
                            });

                            $('#vragen tbody').append.apply($('#vragen'), items);
                        } catch (e) {
                            errorpopup("Error, probeer opnieuw...");
                            ;
                        }
                    } else {
                        errorpopup("Geen vragen gevonden");
                    }
                },
                error: function () {
                    errorpopup("Error tijdens request..");
                }
            });
        }

    </script>

    <title></title>
</head>

<body>

<?php

$options = array();
$i = 0;

foreach ($surveys as $survey) {
    if (!in_array($survey->survey_name, $options)) {
        $options[$i] = $survey->survey_name;
        $i++;
    }
}

?>
<select name="keuze" id="dropDownKeuze"
        onchange="getIdDropdown()"> <?php //moet veranderd worden, mag niet onchange via deze manier ?>
    <?php
    foreach ($options as $option) { ?>
        <option><?php echo $option ?></option>
        <?php
    } ?>
</select>

<table id="checkTabel">
    <thead>
    <th id="surveyName"></th>
    <tr>
        <th>Vraag</th>
        <th>Antwoord</th>
    </tr>
    </thead>
    <tbody id="vragen">

    </tbody>

</table>

</body>





