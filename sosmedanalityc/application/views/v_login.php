<html>
<center>

<?php echo validation_errors(); ?>

<?php echo form_open('c_login/do_login'); ?>
		<table border="1">
			<tr>
				<td>Username</td>
				<td><input type="text" name="user_name">
				</td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="user_password">
				</td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="Login">
				</td>
			</tr>
		</table>
	</form>
</center>
</html>
