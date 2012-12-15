<html>
<head>
<title>My Form</title>
</head>
<body>

	<?php echo validation_errors(); ?>

	<?php echo form_open('c_signup'); ?>

	<h5>Username</h5>
	<input type="text" name="user_name" value="" size="15" />

	<h5>Nama Depan</h5>
	<input type="text" name="user_first_name" value="" size="25" />

	<h5>Nama Belakang</h5>
	<input type="text" name="user_last_name" value="" size="25" />

	<h5>Alamat</h5>
	<textarea rows="5" cols="30" name="user_address"></textarea>

	<h5>Email Address</h5>
	<input type="text" name="user_email" value="" size="20" />

	<h5>Password</h5>
	<input type="password" name="user_password" value="" size="20" />

	<h5>Ulangi Password</h5>
	<input type="password" name="passconf" value="" size="20" />

	<div>
		<input type="submit" value="Submit" />
	</div>

	<?php echo form_close();?>

</body>
</html>
