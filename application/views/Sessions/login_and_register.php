<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="description" content="Login and Registration with CodeIgniter">
	<title>Login &amp; Register</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<style>
		body{
			background: #D9E9FF;
		}
		#register, #login{
			float: right;
		}
		p{
			color: red;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<h1>Welcome!</h1>
		</div>
		<div class="row">
			<div class="col-md-6">
				<fieldset>
					<legend>Register</legend>
				</fieldset>
				<form class="form-horizontal" action="/Users/create" method="post">
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-10">
							<input type="text" id="name" name="name" class="form-control">
							<?= form_error('name') ?>
						</div>
					</div>
					<div class="form-group">
						<label for="alias" class="col-sm-2 control-label">Alias</label>
						<div class="col-sm-10">
							<input type="text" id="alias" name="alias" class="form-control">
							<?= form_error('alias') ?>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
							<input type="text" id="email" name="email" class="form-control">
							<?= form_error('email') ?>
						</div>
					</div>
					<div class="form-group">
						<label for="password" class="col-sm-2 control-label">Password</label>
						<div class="col-sm-10">
							<input type="password" id="password" name="password" class="form-control">
							<?= form_error('password') ?>
						</div>
					</div>
					<div class="form-group">
						<label for="pass_confirm" class="col-sm-2 control-label">Confirm Password</label>
						<div class="col-sm-10">
							<input type="password" id="pass_confirm" name="pass_confirm" class="form-control">
							<?= form_error('pass_confirm') ?>
						</div>
					</div>
					<button id="register" type="submit" class="btn btn-default">Register</button>
					<div style="clear: both;"></div>
				</form>
			</div>
			<div class="col-md-6">
				<fieldset>
					<legend>Log In</legend>
				</fieldset>
				<form class="form-horizontal" action="/Sessions/create" method="post">
					<div class="form-group">
					<?php
						if($this->session->flashdata('registration_confirmed'))
						{
							echo $this->session->flashdata('registration_confirmed');
						}
					?>
						<label for="email2" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
							<input type="text" id="email2" name="email" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="password2" class="col-sm-2 control-label">Password</label>
						<div class="col-sm-10">
							<input type="password" id="password2" name="password" class="form-control">
						</div>
					</div>
					<button id="login" type="submit" class="btn btn-default">Log In</button>
					<?php
						if($this->session->flashdata('error'))
						{
							echo $this->session->flashdata('error');
						}
					?>
					<div style="clear: both;"></div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>