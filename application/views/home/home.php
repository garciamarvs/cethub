<div class="row m-t-lg"></div>
<div class="row m-t"></div>
<div id="inSlider" class="landing-page m-t-md carousel carousel-fade" data-ride="carousel">
	<ol class="carousel-indicators">
			<li data-target="#inSlider" data-slide-to="0" class="active"></li>
			<li data-target="#inSlider" data-slide-to="1" class=""></li>
	</ol>
	<div class="carousel-inner" role="listbox">
		<div class="item active">
			<div class="container">
				<div class="carousel-caption p-sm b-r-md">
					<h1>Welcome to CET Hub</h1>
					<p>Student Information and Communication System</p>
					<p>A PORTAL TO UNIVERSIDAD DE MANILA'S<br>COLLEGE OF ENGINEERING &amp; TECHNOLOGY</p>
				</div>
			</div>
				<!-- Set background for slide in css -->
				<div class="header-back one"></div>
		</div>
		<div class="item">
			<div class="container">
				<div class="carousel-caption blank p-sm b-r-md">
					<h1>CET Hub</h1>
					<p>Provides students to view their schedule and academic records<br>
					Provides teachers to easily enter the grades of their students<br>
					Be informed on the latest college activities.</p>
				</div>
			</div>
			<!-- Set background for slide in css -->
			<div class="header-back two"></div>
		</div>
	</div>
	<a class="left carousel-control" href="#inSlider" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#inSlider" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>
<div class="row m-t"></div>
<div class="row m-t-lg animated fadeInRight">
	<div class="col-md-10 col-md-offset-1">
		<div class="row">

			<?php if($this->session->userdata('usertype') == 1){ ?>
			<a href="<?= base_url()?>announcement">
				<div class="col-md-4">
	        <div class="widget style1 navy-bg">
		        <div class="row">
	            <div class="col-xs-4">
		            <i class="fa fa-newspaper-o fa-5x"></i>
	            </div>
	            <div class="col-xs-8 text-right">
		            <span> Announcement </span>
		            <h2 class="font-bold">Go Now!</h2>
	            </div>
		        </div>
	        </div>
	      </div>
	    </a>

	    <a href="<?= base_url()?>home/schedule">
	      <div class="col-md-4">
	        <div class="widget style1 navy-bg">
		        <div class="row">
	            <div class="col-xs-4">
		            <i class="fa fa fa-calendar fa-5x"></i>
	            </div>
	            <div class="col-xs-8 text-right">
		            <span> My Schedule </span>
		            <h2 class="font-bold">Go Now!</h2>
	            </div>
		        </div>
	        </div>
	      </div>
	    </a>

	    <a href="<?= base_url()?>home/grades">
	      <div class="col-md-4">
	        <div class="widget style1 navy-bg">
		        <div class="row">
	            <div class="col-xs-4">
		            <i class="fa fa-book fa-5x"></i>
	            </div>
	            <div class="col-xs-8 text-right">
		            <span> My Grades </span>
		            <h2 class="font-bold">Go Now!</h2>
	            </div>
		        </div>
	        </div>
	      </div>
	    </a>
	    <?php } ?>

	    <?php if($this->session->userdata('usertype') == 2){ ?>
	    <a href="<?= base_url()?>announcement">
				<div class="col-md-4">
	        <div class="widget style1 navy-bg">
		        <div class="row">
	            <div class="col-xs-4">
		            <i class="fa fa-newspaper-o fa-5x"></i>
	            </div>
	            <div class="col-xs-8 text-right">
		            <span> Announcement </span>
		            <h2 class="font-bold">Go Now!</h2>
	            </div>
		        </div>
	        </div>
	      </div>
	    </a>

	    <a href="<?= base_url()?>submit">
	      <div class="col-md-4">
	        <div class="widget style1 navy-bg">
		        <div class="row">
	            <div class="col-xs-4">
		            <i class="fa fa-edit fa-5x"></i>
	            </div>
	            <div class="col-xs-8 text-right">
		            <span> Submit Grades </span>
		            <h2 class="font-bold">Go Now!</h2>
	            </div>
		        </div>
	        </div>
	      </div>
	    </a>
	    <?php } ?>

	    <?php if($this->session->userdata('usertype') == 3){ ?>
	    <a href="<?= base_url()?>announcement/manage">
				<div class="col-md-4">
	        <div class="widget style1 navy-bg">
		        <div class="row">
	            <div class="col-xs-4">
		            <i class="fa fa-bullhorn fa-5x"></i>
	            </div>
	            <div class="col-xs-8 text-right">
		            <span> Announcement </span>
		            <h2 class="font-bold">Manage</h2>
	            </div>
		        </div>
	        </div>
	      </div>
	    </a>

	    <a href="<?= base_url()?>semester">
				<div class="col-md-4">
	        <div class="widget style1 navy-bg">
		        <div class="row">
	            <div class="col-xs-4">
		            <i class="fa fa-book fa-5x"></i>
	            </div>
	            <div class="col-xs-8 text-right">
		            <span> Semester </span>
		            <h2 class="font-bold">Manage</h2>
	            </div>
		        </div>
	        </div>
	      </div>
	    </a>

	    <a href="<?= base_url()?>user/addUser">
				<div class="col-md-4">
	        <div class="widget style1 navy-bg">
		        <div class="row">
	            <div class="col-xs-4">
		            <i class="fa fa-user-circle-o fa-5x"></i>
	            </div>
	            <div class="col-xs-8 text-right">
		            <span> Users </span>
		            <h2 class="font-bold">Add User</h2>
	            </div>
		        </div>
	        </div>
	      </div>
	    </a>
	    <?php } ?>
		</div>
	</div>
</div>

<a class="posBotRight" href="<?= base_url() ?>home/chat"><button type="button" class="btn btn-info round dim btn-large-dim btn-outline chat-up"><i class="fa fa-comments"></i></button></a>
