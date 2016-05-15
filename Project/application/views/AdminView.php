<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Vragen toevoegen</title>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>

        $('#submitButton').on('click', function () {

            var selectedSurvey = $('#surveySelect :selected').index();
            var surveyVraag = $('#vraagID').val();
            var surveyRadio = $("input[type='radio'][id='radioID']:checked").val();

            if (surveyVraag != '') {

                var surveyData = {'first': selectedSurvey, 'second': surveyVraag, 'third': surveyRadio}
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url()?>index.php/AdminController/insertQuestion/",
                    data: surveyData,
                    success: function (data) {
                    }
                });
            } else {
                window.alert("Je moet eerst een vraag invullen");
            }
        });


    </script>

    <style>
        label.btn span {
            font-size: 1.2em;
        }

        div[data-toggle="buttons"] label.active {
            color: #7F9F3B;
        }

        div[data-toggle="buttons"] label {
            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: normal;
            line-height: 2em;
            text-align: left;
            white-space: nowrap;
            vertical-align: top;
            cursor: pointer;
            border: 0.5px solid #c8c8c8;
            border-radius: 3px;
            color: #c8c8c8;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            -o-user-select: none;
            user-select: none;
        }

        div[data-toggle="buttons"] label:hover {
            color: #7F9F3B;
        }

        div[data-toggle="buttons"] label:active, div[data-toggle="buttons"] label.active {
            -webkit-box-shadow: none;
            box-shadow: none;
        }
    </style>
</head>

<body>

<?php
$i = 0;
foreach ($records as $option) {
    $options[$i] = $option->survey_name;
    $i++;
}
?>
<div class="container">
    <div class="page-header">
        <h1>Vraag toevoegen</h1>
    </div>
    <div class="jumbotron">
        <p>Aan welke survey wil je de vraag toevoegen?</p><br>
        <select name="surveySelect" id="surveySelect">
            <?php
            foreach ($options as $option) { ?>
                <option value="<?php echo $option ?>"><?php echo $option ?></option>
                <?php
            }
            ?>
        </select>

        <br><br><br>

        <p>formuleer hier je vraag</p>
        <input type="text" name="vraagNaam" id="vraagID" value="" maxlength="5000" size="30"/>

        <br><br><br>

        <p>wat voor soort vraag wil je toevoegen?</p><br>


        <div class="row">
            <div class="col-xs-12">
                <br>
                <div class="btn-group btn-group-vertical" data-toggle="buttons">
                    <label class="btn active">
                        <input type="radio" name='radioNaam' id="radioID" value="tekst" checked><i
                            class="fa fa-circle-o fa-2x"></i><i class="fa fa-check-circle-o fa-2x"></i>
                        <span> Tekst</span>
                    </label>
                    <label class="btn">
                        <input type="radio" name='radioNaam' id="radioID" value="radio"><i
                            class="fa fa-circle-o fa-2x"></i><i
                            class="fa fa-check-circle-o fa-2x"></i><span>Radio</span>
                    </label>
                </div>

            </div>
        </div>

        <br><br>


        <input type="button" class="btn btn-success btn-small" id="submitButton" name="submitButton" value="Ok!"/>
    </div>


</div>

</body>
</html>
