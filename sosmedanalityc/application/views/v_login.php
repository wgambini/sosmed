<?php echo validation_errors(); ?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->

<head>
<meta charset="utf-8" />

<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
<meta name="description" content="" />
<meta name="author" content="" />

<!-- Bootstrap Stylesheet -->
<link rel="stylesheet" href="<?=base_url()?>bootstrap/css/bootstrap-login.min.css" media="screen" />

<!-- Uniform Stylesheet -->
<link rel="stylesheet" href="<?=base_url()?>plugins/uniform/css/uniform.default.css" />

<!-- Plugin Stylsheets first to ease overrides -->

<!-- End Plugin Stylesheets -->

<!-- Main Layout Stylesheet -->
<link rel="stylesheet" href="<?=base_url()?>assets/css/fonts/icomoon/style.css" media="screen" />
<link rel="stylesheet" href="<?=base_url()?>assets/css/login.min.css" media="screen" />

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<title>Social Media Analytics</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body>
    <div id="login-wrap">

		<div id="login-ribbon"><i class="icon-lock"></i></div>
		<div id="login-buttons">
			<div class="btn-wrap">
				<button type="button" class="btn btn-inverse" data-target="#login-form"><i class="icon-key"></i></button>
			</div>
			<div class="btn-wrap">
				<button type="button" class="btn btn-inverse" data-target="#register-form"><i class="icon-edit"></i></button>
			</div>
			<div class="btn-wrap">
				<button type="button" class="btn btn-inverse" data-target="#forget-form"><i class="icon-question-sign"></i></button>
			</div>
		</div>

		<div id="login-inner">

			<div id="login-circle">
				<section id="login-form" class="login-inner-form active" data-angle="0">
					<h1>Login</h1>
					<form class="form-vertical" action="c_login/do_login" method="post">
						<div class="control-group">

							<h5>Username</h5>
							<input type="text" name="user_name_login" placeholder="Username" id="input-username" class="big" />

							<h5>Password</h5>
							<input type="password" name="user_password_login" placeholder="Password" id="input-password" class="big" />
						</div>
							
						<div class="control-group">
							<label class="checkbox">
								<input type="checkbox" class="uniform" name="remember"/> Remember me
							</label>
						</div>
						<div class="form-actions">
							<button type="submit" value="Submit" class="btn btn-success btn-block btn-large">Login</button>
						</div>
					</form>

				</section>
				<section id="register-form" class="login-inner-form" data-angle="90">
					<h1>Register</h1>
					<form class="form-vertical" action="c_login/do_signup" method="post">			
						<div class="control-group">
							<label class="control-label">Username</label>
							<div class="controls">
							<input type="text" name="user_name" value="<?php echo set_value('user_name', $user_name); ?>" size="15" />
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Nama Depan</label>
							<div class="controls">
								<input type="text" name="user_first_name" value="<?php echo set_value('user_first_name', $user_first_name); ?>" size="25" />
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Nama Belakang</label>
							<div class="controls">
								<input type="text" name="user_last_name" value="<?php echo set_value('user_last_name', $user_last_name); ?>" size="25" />
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Alamat</label>
							<div class="controls">
								<textarea rows="5" cols="30" name="user_address"><?php echo set_value('user_address', $user_address); ?></textarea>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Alamat email</label>
							<div class="controls">
								<input type="text" name="user_email" value="<?php echo set_value('user_email', $user_email); ?>" size="20" />
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Password</label>
							<div class="controls">
									<input type="password" name="user_password" value="<?php echo set_value('user_password'); ?>" size="20" />
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Ulangi Password</label>
							<div class="controls">
									<input type="password" name="passconf" value="<?php echo set_value('passconf'); ?>" size="20" />
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Package Type</label>
							<div class="controls">
								<select name="package_type">
									<option value="1">Trial</option>
									<option value="2">Package 1</option>
									<option value="3">Package 2</option>
								</select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Payment Method</label>
							<div class="controls">
								<select name="payment_method">
									<option value="1">PayPal</option>
									<option value="2">Credit Card</option>
								</select>
							</div>
						</div>
						<div class="form-actions">
							<button type="submit" value="Submit" class="btn btn-danger btn-block btn-large">Register</button>
						</div>
					</form>
				</section>
				<section id="forget-form" class="login-inner-form" data-angle="180">
					<h1>Reset Password</h1>
					<form class="form-vertical" action="c_login/forget_password">
						<div class="control-group">
							<div class="controls">
								<input type="text" class="big" placeholder="Enter Your Email..." />
							</div>
						</div>
						<div class="form-actions">
							<button type="submit" class="btn btn-danger btn-block btn-large">Reset</button>
						</div>
					</form>
				</section>
			</div>

		</div>

    </div>

	<!-- Core Scripts -->
	<script src="<?=base_url()?>assets/js/libs/jquery-1.8.2.min.js"></script>
	<script src="<?=base_url()?>assets/js/libs/jquery.placeholder.min.js"></script>
    
    <!-- Login Script -->
    <script src="<?=base_url()?>assets/js/login.js"></script>

    <!-- Uniform Script -->
    <script src="<?=base_url()?>plugins/uniform/jquery.uniform.min.js"></script>

</body>

</html>
