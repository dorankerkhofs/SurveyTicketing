<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Vragen toevoegen</title>
</head>

<body>

<?php
echo '<br>';

echo form_open();
echo validation_errors();
echo form_fieldset('Survey toevoegen');
echo 'Naam survey:';
echo '<br>';
$inputTekst = array(
    'name' => 'dataNaam',
    'id' => 'dataID',
    'value' => '',
    'maxlength' => '100',
    'size' => '30',
    'style' => 'width:35%',
);
echo form_input($inputTekst);

echo '<br><br>';

echo form_submit('mysubmit', 'Submit Post!');
echo form_fieldset_close();
echo form_close();
?>


</body>
</html>