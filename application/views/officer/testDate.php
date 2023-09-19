<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/i18n/datepicker-th.js"></script>

</head>
<body>
        <label>th-th</label>
        <input class="input-medium" type="text" id="datepicker" data-date-language="th-th">
      
        <script>
            $.datepicker.setDefaults( $.datepicker.regional[ "th" ] );

            var currentTime = new Date();
            var year = currentTime.getFullYear();
            var currentDate = new Date();
            currentDate.setYear(currentDate.getFullYear() + 543)
             $("#datepicker").datepicker({
                changeMonth: true,
                changeYear: true,
                yearRange: '+443:+543',
                dateFormat: 'dd/mm/yy',
            });
            $('#datepicker').datepicker("setDate",currentDate );
        </script>
</body>
</html>
