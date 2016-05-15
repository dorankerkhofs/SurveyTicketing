<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>vragenlijst</title>
</head>

<body>

<br>

<?php
$i = 1;
echo '<br>';
$aantalVragen = count($vragen);

$surveyID = $vragen[0]->survey_id;
$vraagID = $vragen[0]->vraag_id;
echo form_open(base_url() . "index.php/SurveyController");
foreach ($vragen as $vraag) {
    $inputTekst = array(
        'name' => 'inputNaam' . $i,
        'id' => 'inputID' . $i,
        'value' => '',
        'maxlength' => '5000',
        'size' => '30',
        'style' => 'width:25%',
    );
    $inputRadio1 = array(
        'name' => 'inputNaam' . $i,
        'id' => 'inputID' . $i,
        'value' => 1,
        'checked' => TRUE,
        'style' => 'margin:10px',
    );
    $inputRadio2 = array(
        'name' => 'inputNaam' . $i,
        'id' => 'inputID' . $i,
        'value' => 2,
        'checked' => TRUE,
        'style' => 'margin:10px',
    );
    $inputRadio3 = array(
        'name' => 'inputNaam' . $i,
        'id' => 'inputID' . $i,
        'value' => 3,
        'checked' => TRUE,
        'style' => 'margin:10px',
    );
    $inputRadio4 = array(
        'name' => 'inputNaam' . $i,
        'id' => 'inputID' . $i,
        'value' => 4,
        'checked' => TRUE,
        'style' => 'margin:10px',
    );
    $inputRadio5 = array(
        'name' => 'inputNaam' . $i,
        'id' => 'inputID' . $i,
        'value' => 5,
        'checked' => FALSE,
        'style' => 'margin:10px',
    );
    echo $vraag->vraag_body;
    echo '<br>';
    if ($vraag->vraag_soort == 'tekst') {
        echo form_textarea($inputTekst);
    } else {
        echo form_radio($inputRadio1);
        echo form_radio($inputRadio2);
        echo form_radio($inputRadio3);
        echo form_radio($inputRadio4);
        echo form_radio($inputRadio5);
    }
    echo '<br><br>';
    $i++;
}
echo form_hidden("hiddenVraagID", $vraagID);
echo form_hidden("hiddenSurveyID", $surveyID);
echo form_hidden("hiddenAantal", $aantalVragen);
echo form_submit('mysubmit', 'Submit Post!');
echo form_close();
?>

</body>
</html>