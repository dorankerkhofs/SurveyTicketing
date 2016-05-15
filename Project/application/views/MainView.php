<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <!-- zorg ervoor dat IE de laatste rendering techniek gebruikt -->
    <meta name="viewport" content="width = device-width, initial scale=1">

    <title>MainView</title>

    <style>

        ul{
            margin:0px;
            padding:0px;
            overflow:hidden;
        }

        li{
            float:left;
            list-style:none;
            padding:10px;
            width:100px;
        }

        .list-group-item{
            float:left;
        }


    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>

        $(function () {
            $("#tabs a").click(function () {
                var page = this.hash.substr(1);

                $("content_wrapper").block;

                $.get(page, function (gotHtml) {
                    $("#content").html(gotHtml);
                    $("#content_wrapper").unblock;
                });
                return false;


            });
        });

    </script>

</head>

<body>

<div class="list-group">
    <ul id="tabs">

        <a class="list-group-item" href="#<?php echo base_url() ?>index.php/VoegSurveyToeController/">Survey toevoegen</a></li>
        <a class="list-group-item" href="#<?php echo base_url() ?>index.php/AdminController/">Vragen toevoegen</a></li>
        <a class="list-group-item" href="#<?php echo base_url() ?>index.php/dropController/">Vragenlijst invullen</a></li>

    </ul>

</div>

<div id="content_wrapper">
    <div id="content">

    </div>
</div>

</body>

</html>


<?php
