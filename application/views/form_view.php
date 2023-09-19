<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title>Welcome to CodeIgniter</title>
    <style type="text/css">
        .fr{
            color: red;
        }
    </style>

	
</head>
<body>

<!-- เรียกใช้งานที่ login ฟังชัน index2-->
<?php echo form_open('login/index2'); ?>

<h5>Username</h5>
<input type="text" name="username" value="<?php echo set_value('username'); ?>" size="50" />
<!-- span เป็นตัวกำหนด class หรือจุดเล็กๆที่เราต้องการ -->
<span class="fr"><?php echo form_error('username');?></span>

<h5>Password</h5>
<input type="password" name="password" value="<?php echo set_value('password'); ?>" size="50" />
<span class="fr"><?php echo form_error('password');?></span>

<h5>Password Confirm</h5>
<input type="password" name="passconf" value="<?php echo set_value('passconf'); ?>" size="50" />
<span class="fr"><?php echo form_error('passconf');?></span>

<h5>Email Address</h5>
<input type="text" name="email" value="<?php echo set_value('email'); ?>" size="50" />
<span class="fr"><?php echo form_error('email');?></span>

<div><input type="submit" value="Submit" /></div>

</form>
</body>
</html>
