<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>vragenlijst</title>

</head>

<body>
<h1>vragenlijst<br/></h1>


<?php

$i = 0;
foreach ($records as $option) {
    $options[$i] = $option->survey_name;
    $i++;
}

echo form_open(base_url()."index.php/DropController");

echo form_dropdown("nameDrop", $options);
echo form_submit('mysubmit', 'Kies deze survey!');
echo form_close();

?>

</body>
</html>

