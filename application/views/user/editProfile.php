<div class="row m-t-lg"></div>

<div class="wrapper wrapper-content animated fadeInRight m-t-md">
	<div class="row">
		<div class="col-md-9 col-md-offset-1">
			<div class="tabs-container panel panel-default">
				<div class="panel-heading custom-panel">
				<ul class="nav nav-tabs">
					<li class="custom-tab active"><a data-toggle="tab" href="#tab-1" aria-expanded="true"><i class="fa fa-user-o"></i>Profile Detail</a></li>
					<li class="custom-tab"><a id="a2" data-toggle="tab" href="#tab-2" aria-expanded="false"><i class="fa fa-gear"></i>Setting</a></li>
				</ul>
				</div>
				<div class="tab-content">
					<div id="tab-1" class="tab-pane active">
						<div class="panel-body">
							<?php echo form_open_multipart('user/updateProfile', array('class' => 'form-horizontal')); ?>
              <input type="hidden" name="old_image" value="<?php echo $info['user_image']; ?>">

              <div class="form-group">
                <label class="col-sm-2 control-label">Upload Image</label>
                <div class="fileinput fileinput-new input-group col-sm-6" data-provides="fileinput" style="padding-left: 15px !important;">
                    <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span><input type="file" name="userfile" size="20" onchange="$('#save1').prop('disabled', false);"></span>
                    <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span>
                    </div>                            
                    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                </div>
              </div>

								<div class="form-group">
									<label class="col-sm-2 control-label">Name</label>
	                <div class="col-sm-10 form-inline">
	                	<input type="text" class="form-control" name="fname" placeholder="First Name" value="<?= $info['fname'] ?>" required="" onchange="$('#save1').prop('disabled', false);">
	                	<input type="text" class="form-control" name="mname" placeholder="Middle Name" value="<?= $info['mname'] ?>" onchange="$('#save1').prop('disabled', false);">
	                	<input type="text" class="form-control" name="lname" placeholder="Last Name" value="<?= $info['lname'] ?>" required="" onchange="$('#save1').prop('disabled', false);">
	                </div>
	              </div>

	              <div class="form-group">
	              	<label class="col-sm-2 control-label">Student No.</label>
                  <div class="col-sm-4"><input type="text" class="form-control" name="id" value="<?= $info['id/student_no'] ?>" required="" onchange="$('#save1').prop('disabled', false);"></div>
                </div>

                <?php if($this->session->userdata('usertype') == 1){ ?>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Course</label>
                  <div class="col-sm-6">
                    <select class="form-control" name="course" required="" onchange="$('#save1').prop('disabled', false);">
                      <option value="" selected="selected"></option>
                      <option value="IT" <?php if($info['course'] == 'IT'){echo 'selected';} ?>>Information Technology</option>
                      <option value="COE" <?php if($info['course'] == 'COE'){echo 'selected';} ?>>Computer Engineering</option>
                      <option value="ECE" <?php if($info['course'] == 'ECE'){echo 'selected';} ?>>Electronics and Communications Engineering</option>
                    </select>
                  </div>
                </div>
                <?php } ?>

                <div class="form-group">
	              	<label class="col-sm-2 control-label">Address</label>
                  <div class="col-sm-6"><input type="text" class="form-control" name="address" value="<?= $info['address'] ?>" onchange="$('#save1').prop('disabled', false);"></div>
                </div>

                <div class="form-group">
	              	<label class="col-sm-2 control-label">Birthday</label>
                  <div class="col-sm-4">
                  	<div class="input-group date">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="birthday" value="<?= $info['birthday'] ?>" onchange="$('#save1').prop('disabled', false);">
                    </div>
                  </div>
                </div>

                <p class="bg-primary p-xs">Contact Information</p>
              	<div class="form-group">
	              	<label class="col-sm-2 control-label">Email Address</label>
                  <div class="col-sm-6"><input type="text" class="form-control" name="email" value="<?= $info['email'] ?>" onchange="$('#save1').prop('disabled', false);"></div>
              	</div>
              	<div class="form-group">
	              	<label class="col-sm-2 control-label">Phone</label>
                  <div class="col-sm-6"><input type="text" class="form-control" name="phone" value="<?= $info['phone'] ?>" onchange="$('#save1').prop('disabled', false);"></div>
              	</div>

                <div class="hr-line-dashed"></div>

                <div class="form-group">
                  <div class="col-sm-4 col-sm-offset-2">
	                  <button id="save1" class="btn btn-primary" type="submit" disabled="">Save changes</button>
                  </div>
                </div>
							<?php echo form_close(); ?>
						</div>
					</div>
					<div id="tab-2" class="tab-pane">
						<div class="panel-body">
							<?php echo form_open('user/updateSetting', array('class' => 'form-horizontal')); ?>
								<div class="form-group">
	              	<label class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-10"><p class="form-control-static"><?= $info['username'] ?></p></div>
                </div>
                
                <div class="form-group">
	              	<label class="col-sm-2 control-label">Old Password</label>
                  <div class="col-sm-3"><input class="form-control" type="password" name="old_password" value=""></div>
                </div>

                <?php if($this->session->flashdata('updateProfile_failed')){ ?>
                <div class="form-group">
                	<div class="col-sm-2"></div>
                		<div class="alert alert-danger col-sm-3"><i class="fa fa-warning"></i>
									<?= $this->session->flashdata('updateProfile_failed') ?>
										</div>
                </div>
                <?php } ?>
                

                <div class="form-group">
	              	<label class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-3"><input class="form-control" type="password" id="password" name="password" value=""></div>
                </div>

                <div class="form-group">
	              	<label class="col-sm-2 control-label">Confirm Password</label>
                  <div class="col-sm-3"><input class="form-control" type="password" id="confirm_password" name="confirm_password" value=""></div>
                </div>

                <div class="hr-line-dashed"></div>

                <div class="form-group">
                  <div class="col-sm-4 col-sm-offset-2">
	                  <button id="save2" class="btn btn-primary" type="submit" disabled="">Save changes</button>
                  </div>
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
		$('.input-group.date').datepicker({
      todayBtn: "linked",
      keyboardNavigation: false,
      forceParse: false,
      calendarWeeks: true,
      autoclose: true,
			format: "MM d, yyyy"
    });

    <?php if($this->session->flashdata('activeTabProfile') == 'Setting'){
						echo "$('#a2').tab('show');";
					} ?>
	});

var password = document.getElementById("password");
var confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
  	$('#save2').prop('disabled',false);
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>