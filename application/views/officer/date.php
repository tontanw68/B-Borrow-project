<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>

    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link href="css/datepicker.css" rel="stylesheet">
    <script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="js/bootstrap-datepicker-thai.js"></script>

    <!-- <script type="text/javascript" src="jquery.js"></script>
    <link href="assets/bootstrap-datepicker-thai/css/datepicker.css" rel="stylesheet">
    <script type="text/javascript" src="assets/bootstrap-datepicker-thai/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="assets/bootstrap-datepicker-thai/js/bootstrap-datepicker-thai.js"></script>
    <script type="text/javascript" src="assets/bootstrap-datepicker-thai/js/locales/bootstrap-datepicker.th.js"></script> -->
    <script>
        $(function(){
            $("#datepicker").datepicker({
                language:'th-th',
                format:'dd/mm/yyyy',
                autoclose: true
            });
        });
    </script>
</head>
<body>
        <label>th-th</label>
        <input class="input-medium" type="text" id="datepicker" name="datepicker">
</body>
</html>
