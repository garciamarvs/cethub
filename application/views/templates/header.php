<!DOCTYPE html>
<html>

<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>CET Hub</title>
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>assets/img/icons/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>assets/img/icons/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/img/icons/favicon-16x16.png">
		<link rel="manifest" href="<?php echo base_url(); ?>assets/img/icons/manifest.json">
		<link rel="mask-icon" href="<?php echo base_url(); ?>assets/img/icons/safari-pinned-tab.svg" color="#5bbad5">
		<meta name="theme-color" content="#ffffff">

		<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

		<!-- summernote -->
		<link href="<?php echo base_url(); ?>assets/css/plugins/summernote/summernote.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">

		<!-- toastr -->
		<link href="<?php echo base_url(); ?>assets/css/plugins/toastr/toastr.min.css" rel="stylesheet">

		<!-- jasny -->
		<link href="<?php echo base_url(); ?>assets/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">

		<!-- ekko-lightbox -->
		<link href="<?php echo base_url(); ?>assets/css/plugins/ekko-lightbox/ekko-lightbox.min.css" rel="stylesheet">

		<link href="<?php echo base_url(); ?>assets/css/plugins/iCheck/custom.css" rel="stylesheet">

		<link href="<?php echo base_url(); ?>assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">

		<!-- custom css -->
		<link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

		<!-- Mainly scripts -->
		<script src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

		<!-- summernote -->
		<script src="<?php echo base_url(); ?>assets/js/plugins/summernote/summernote.min.js"></script>

		<!-- toastr -->
		<script src="<?php echo base_url(); ?>assets/js/plugins/toastr/toastr.min.js"></script>

		<!-- jasny -->
		<script src="<?php echo base_url(); ?>assets/js/plugins/jasny/jasny-bootstrap.min.js"></script>

		<!-- ekko-lightbox -->
		<script src="<?php echo base_url(); ?>assets/js/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>

		<!-- iCheck -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/iCheck/icheck.min.js"></script>
    
    <!-- Dual Listbox -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/dualListbox/jquery.bootstrap-duallistbox.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>

		<!-- Custom and plugin javascript -->
		<script src="<?php echo base_url(); ?>assets/js/inspinia.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/plugins/pace/pace.min.js"></script>
		<script> var base_url = '<?= base_url(); ?>';</script>
</head>

<body class="top-navigation">
	<div id="wrapper" class="fixed-nav">
		<div id="page-wrapper" class="gray-bg">
			<div class="row border-bottom white-bg">
				<nav class="navbar navbar-fixed-top" role="navigation" id="custom-navbar">
					<div class="navbar-header">
						<button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
							<i class="fa fa-reorder"></i>
						</button>
						<a href="<?= base_url()?>home" class="navbar-brand"><img style="display: inline;" src="<?php echo base_url(); ?>assets/img/cet_logo.png" height="32px">&nbsp;CET Hub</a>
					</div>
					<div class="navbar-collapse collapse" id="navbar">
						<ul class="nav navbar-nav">
							<li id="tab-home">
							<a href="<?= base_url()?>home"><i class="fa fa-home"></i> Home</a>
							</li>
							<li id="tab-announcement" class="">
							<a href="<?= base_url()?>announcement"><i class="fa fa-newspaper-o"></i> Announcements</a>
							</li>							
							<?php if($this->session->userdata('usertype') == 2){ ?>
							<li id="tab-submit">
							<a href="<?= base_url()?>submit"><i class="fa fa-edit"></i> Submit Grades</a>
							</li>
							<?php } ?>
							<?php if($this->session->userdata('usertype') == 1){ ?>
							<li id="tab-course" class="dropdown">
							<a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-university"></i> My Course<span class="caret"></span></a>
								<ul role="menu" class="dropdown-menu">
									<li><a href="<?= base_url()?>home/schedule"><i class="fa fa-calendar"></i> Schedule</a></li>
									<li><a href="<?= base_url()?>home/grades"><i class="fa fa-book"></i> Grades</a></li>
								</ul>
							</li>
							<?php } ?>
							<?php if($this->session->userdata('usertype') == 3){ ?>
							<li id="tab-semester">
							<a href="<?= base_url()?>semester"><i class="fa fa-calendar"></i> Semester</a>
							</li>
							<?php } ?>
						</ul>						
						<ul class="nav navbar-top-links navbar-right">
						<?php if($this->session->userdata('usertype') == 3){ ?>
							<li class="dropdown">
								<a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i> Manage<span class="caret"></span></a>
								<ul role="menu" class="dropdown-menu">
									<li><a tabindex="-1" href="<?= base_url()?>announcement/manage"><i class="fa fa-bullhorn"></i> Announcements</a>
									</li>
									<li>
										<a href="<?= base_url()?>semester/manage"><i class="fa fa-book"></i> Semester</a>
									</li>
									<li class="dropdown-submenu">
										<a class="test" tabindex="-1" href="#"><i class="fa fa-user"></i> Users <span class="fa fa-caret-right pull-right" style="margin-top:5px;"></span></a>
										<ul class="dropdown-menu">
											<li>
													<a tabindex="-1" href="<?= base_url()?>user/addUser"><i class="fa fa-plus"></i> Add User</a>
											</li>
										</ul>
									</li>
								</ul>
							</li>
						<?php } ?>
							<li>
								<a href="<?= base_url() ?>user/profile"><i class="fa fa-user"></i> Welcome <?=$this->session->userdata('fname') ?>!</a>
							</li>
							<li>
								<a href="<?= base_url()?>home/logout"><i class="fa fa-sign-out"></i> Log out</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
