<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Vragen toevoegen</title>
</head>

<body>

<h1>Vraag toevoegen aan database</h1>


<?php

echo '<br><br>';

echo form_open();
echo validation_errors();
echo form_fieldset("Vraag toevoegen");
echo 'Aan welke survey wil je de vraag toevoegen? <br>';
$i = 0;
foreach ($records as $option) {
    $options[$i] = $option->survey_name;
    $i++;
}
echo form_dropdown('keuze', $options, $options[0]);
echo '<br><br><br>';

$inputTekst = array(
    'name' => 'vraagNaam',
    'id' => 'vraagID',
    'value' => '',
    'maxlength' => '5000',
    'size' => '30',
    'style' => 'width:35%',
);

$inputRadio1 = array(
    'name' => 'radioNaam',
    'id' => 'radioID',
    'value' => 'tekst',
    'checked' => TRUE,
    'style' => 'margin:10px',
);

$inputRadio2 = array(
    'name' => 'radioNaam',
    'id' => 'radioID',
    'value' => 'radio',
    'checked' => FALSE,
    'style' => 'margin:10px',
);

echo 'Formuleer hier je vraag: <br>';
echo form_input($inputTekst);

echo '<br><br><br>';
echo 'Wat voor soort vraag id het? tekst/radio <br>';
echo 'tekst';
echo form_radio($inputRadio1);
echo 'radio';
echo form_radio($inputRadio2);

echo '<br><br>';

echo form_submit('mysubmit', 'Submit Post!');
echo form_fieldset_close();
echo form_close();
?>

</body>
</html>