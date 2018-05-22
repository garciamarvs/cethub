<div class="row m-t-lg"></div>

<div class="wrapper wrapper-content animated fadeInRight m-t-md">
	<div class="row">
		<div class="col-md-9 col-md-offset-1">
			<div class="tabs-container panel panel-default">
				<div class="panel-heading custom-panel">
				<a class="btn btn-primary pull-right" style="margin: 5px 5px;" href="<?= base_url() ?>user/editProfile">Edit Account</a>
				<ul class="nav nav-tabs">
					<li class="custom-tab active"><a id="a1" data-toggle="tab" href="#tab-1" aria-expanded="true"><i class="fa fa-user-o"></i>Profile Detail</a></li>
					<li class="custom-tab"><a id="a2" data-toggle="tab" href="#tab-2" aria-expanded="false"><i class="fa fa-gear"></i>Setting</a></li>
				</ul>
				</div>
				<div class="tab-content">
					<div id="tab-1" class="tab-pane active">
						<div class="panel-body">
							<div class="row widget-head-color-box navy-bg p-h-sm custom-profile m-b-sm" style="padding-bottom: 0 !important;">
                <div class="col-md-6 m-l-sm">
                    <div class="profile-image">
                        <img src="<?= base_url().'assets/img/users/'.$info['user_image'] ?>" class="img-circle circle-border m-b-md" alt="profile">
                    </div>
                    <div class="profile-info">
                        <div class="align-middle">
                            <div>
                                <h2 class="">
                                  <?= $info['fname'].' '.$info['mname'].' '.$info['lname'] ?>
                                </h2>
                                <h4><?php switch ($info['course']) {
                                  case 'IT': echo 'Bachelor of Science In Information Technology'; break;
                                  case 'COE': echo 'Bachelor of Science In Computer Engineering'; break;
                                  case 'ECE': echo 'Bachelor of Science In Electronics and Communcations Engineering'; break;
                                  case 'admin': echo 'Administrator'; break;
                                  case 'faculty': echo 'Faculty'; break;
                                } ?></h4>
                                <small>College of Engineering and Technology</small>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-3">
                </div>
                <div class="col-md-3">
                </div>


            </div>

							<?php echo form_open('', array('class' => 'form-horizontal')); ?>
	              <div class="form-group">
	              	<label class="col-sm-2 control-label"><?php if($this->session->userdata('usertype')==1){echo 'Student No.';}else{echo 'ID No.';} ?></label>
                  <div class="col-sm-10">
                  	<p class="form-control-static"><?= $info['id/student_no'] ?></p>
                  </div>
                </div>

                <div class="form-group">
	              	<label class="col-sm-2 control-label">Address</label>
                  <div class="col-sm-10">
                  	<p class="form-control-static"><?= $info['address'] ?></p>
                  </div>
                </div>

                <div class="form-group">
	              	<label class="col-sm-2 control-label">Birthday</label>
                  <div class="col-sm-10">
                    <p class="form-control-static"><?= $info['birthday'] ?></p>
                  </div>
                </div>

                <p class="bg-primary p-xs">Contact Information</p>
              	<div class="form-group">
	              	<label class="col-sm-2 control-label">Email Address</label>
                  <div class="col-sm-10">
                  	<p class="form-control-static"><?= $info['email'] ?></p>
                  </div>
              	</div>
              	<div class="form-group">
	              	<label class="col-sm-2 control-label">Phone</label>
                  <div class="col-sm-6">
                  	<p class="form-control-static"><?= $info['phone'] ?></p>
                  </div>
              	</div>
							<?php echo form_close(); ?>
						</div>
					</div>
					<div id="tab-2" class="tab-pane">
						<div class="panel-body">
							<?php echo form_open('', array('class' => 'form-horizontal')); ?>
								<div class="form-group">
	              	<label class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-10"><p class="form-control-static"><?= $info['username'] ?></p></div>
                </div>

                <div class="form-group">
	              	<label class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-3"><p class="form-control-static">***********</p></div>
                </div>
							<?php echo form_close(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		<?php if($this->session->flashdata('activeTabProfile') == 'Setting'){
						echo "$('#a2').tab('show');";
					} ?>
	});	
</script>
