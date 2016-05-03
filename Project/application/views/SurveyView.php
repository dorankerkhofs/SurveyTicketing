<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>vragenlijst</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script type="text/javascript">

        function getIdDropdown() {
            var selectedVal = {'data': document.getElementById("dropDownKeuze").selectedIndex};

            $.ajax({
                type: "POST",
                url: "<?php echo base_url()?>index.php/SurveyController/getQuestionsById/",
                data: selectedVal,
                success: function (data) {
                    obj = JSON.parse(data);

                }
            });

            $.ajax({
                type: "POST",
                url: "<?php echo base_url()?>index.php/SurveyView/",
                data: {'data': obj},
                success: function (data) {
                    window.alert(data);
                }
            });

            //window.alert(obj[0].vraag_id + "\n" + obj[0].survey_id + "\n" + obj[0].vraag_body + "\n" + obj[0].vraag_soort);
        }

    </script>

</head>

<body>
<h1>vragenlijst<br/></h1>


<?php


$i = 0;
foreach ($records as $option) {
    $options[$i] = $option->survey_name;
    $i++;
}
?>
<select name="keuze" id="dropDownKeuze" onchange="getIdDropdown()">
    <?php
    foreach ($options as $option) { ?>
        <option><?php echo $option ?></option>
        <?php
    } ?>
</select>

</body>
</html>

