<html>
<head>
<title>My Form</title>
</head>
<body>
<?php if($form_action == "c_login"){?>
<a href="c_signup">Sign Up</a> |
<a href="c_login/forget_password">Forget Password</a>
<?php }?>

<?php echo validation_errors(); ?>

<?php echo form_open($form_action); ?>

<h5>Username</h5>
<input type="text" name="user_name" value="" size="50" />

<h5>Password</h5>
<input type="password" name="user_password" value="" size="50" />

<div><input type="submit" value="Submit" /></div>

<?php echo form_close()?>

</body>
</html>
