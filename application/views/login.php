<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>CET Hub | Login</title>
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>assets/img/icons/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>assets/img/icons/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/img/icons/favicon-16x16.png">
		<link rel="manifest" href="<?php echo base_url(); ?>assets/img/icons/manifest.json">
		<link rel="mask-icon" href="<?php echo base_url(); ?>assets/img/icons/safari-pinned-tab.svg" color="#5bbad5">
		<meta name="theme-color" content="#ffffff">

		<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

		<link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

		<style> html, body {height: auto;} </style>
</head>

<body class="gray-bg">
		<div class="text-center animated fadeInDown m-t-md">
				<img class="img-responsive center-block" style="width: 80%;" src="<?php echo base_url(); ?>assets/img/cethub_login.png">
		</div>

		<div class="middle-box text-center loginscreen animated fadeInDown" style="padding-top: 0px;">
				<div>
						<h3>Welcome to CET Hub</h3>
						<p>Student Information and Communication System</p>
						<p class="font-italic">Experience the spread of Information</p>
						<?php echo form_open('login', array('class' => 'm-t')); ?>
								<div class="form-group">
										<input name="username" type="text" class="form-control" placeholder="Username" required="" value="<?php if($this->session->flashdata('dump')){echo $this->session->flashdata('dump');} ?>">
								</div>
								<div class="form-group">
										<input name="password" type="password" class="form-control" placeholder="Password" required="">
								</div>
								<button type="submit" class="btn btn-primary block full-width m-b">Login</button>

								<?php if($this->session->flashdata('login_failed')): ?>
									<?php echo '<div class="alert alert-danger"><i class="fa fa-warning"></i> '.$this->session->flashdata('login_failed').'</div>'; ?>
								<?php endif; ?>								
								<p class="text-muted text-center"><small>Do not have an account? Look for us.</small></p>
						<?php echo form_close(); ?>
						<p class="m-t"> <small>IT41-Team GG EZ &copy; 2017</small> </p>
				</div>
		</div>

		<!-- Mainly scripts -->
		<script src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

</body>
</html>
