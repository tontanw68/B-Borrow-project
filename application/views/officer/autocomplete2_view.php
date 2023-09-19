<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ระบบจัดการยืม-คืนหนังสือ</title>
  <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
 
</head>
<body>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

  <input type="text" name="colleges" id="colleges" class="form-control" />
  <input type='hidden' id='mydata' value='<?php echo json_encode($search);?>' />
  <script>

      $( function() {
        var oData = $("#mydata").val();
            oData = JSON.parse(oData);
        $( "#colleges" ).autocomplete({
            source: oData
        }); 
      });
  </script>
</body>
</html>