			<div class="row wrapper border-bottom white-bg page-heading">
					<div class="col-lg-10">
							<h2><?= $tab ?></h2>
							<ol class="breadcrumb">
									<li>
											<a href=""><strong>Add Users</strong></a>
									</li>
							</ol>
					</div>
			</div>

			<div class="wrapper wrapper-content animated fadeInRight">
				<div class="row">
					<div class="col-md-12 text-center">
						<div class="ibox float-e-margins">
							<div class="ibox-title">
								<h2><i class="fa fa-user-plus"></i> Add User</h2>
							</div>

							<div class="ibox-content">
								<div class="table-responsive">
									<table class="table table-bordered" id="table">
										<thead>										
	                    <tr>
                        <th class="col-xs-0 text-center">#</th>
                        <th class="col-xs-2">First Name</th>
                        <th class="col-xs-2">Middle Name</th>
                        <th class="col-xs-2">Last Name</th>
                        <th class="col-xs-2">Username</th>
                        <th class="col-xs-2">ID/Student No.</th>
                        <th class="col-xs-2">User Type</th>
	                    </tr>
	                  </thead>
	                  <?php echo form_open('user/addUser') ?>
	                  <tbody>
	                  	<?php for ($i=1; $i < 11; $i++) { ?>
	                  	<tr>
	                  		<td align="middle"><?= $i ?></td>
	                  		<td align="left"><input name="fname[]" class="form-control" type="text"></td>
	                  		<td align="left"><input name="mname[]" class="form-control" type="text"></td>
	                  		<td align="left"><input name="lname[]" class="form-control" type="text"></td>
	                  		<td align="left"><input name="username[]" class="form-control" type="text"></td>
	                  		<td align="left"><input name="id[]" class="form-control" type="text"></td>
	                  		<td align="left">
	                  			<select class="form-control" name="usertype[]">
	                  				<option value="1" selected="selected">Student</option>
	                  				<option value="2">Teacher</option>
	                  				<option value="3">Administrator</option>
	                  			</select>
	                  		</td>
	                  	</tr>
	                  	<?php } ?>
	                  </tbody>	                  
									</table>									
								</div>
								<div class="row form-inline">
									<div class="form-group col-md-3">
										<input class="form-control input-sm text-right" style="margin-top:-5px;width:50px;" type="number" id="row" min="1" value="1">
										<button class="btn btn-default" type="button" id="btn1">Insert Rows</button>
									</div>									
								</div>
								<div class="row">
									<button class="btn btn-primary" type="submit">Add Now!</button>
								</div>
							</div>
							<?php echo form_close() ?>
						</div>
					</div>
				</div>
			</div>

			<script>
				$(document).ready(function(){					
					var min_row = 10;

	    		$("#btn1").click(function(){
	    			var rows = parseInt($('#row').val());

						var content = "";

						for(var i=min_row+1,max=(min_row+rows)+1;i<max;i++){
							content = '<tr><td align="middle">'+i+'</td><td align="left"><input name="fname[]" class="form-control" type="text"></td><td align="left"><input name="mname[]" class="form-control" type="text"></td><td align="left"><input name="lname[]" class="form-control" type="text"></td><td align="left"><input name="username[]" class="form-control" type="text"></td><td align="left"><input name="id[]" class="form-control" type="text"></td><td align="left"><select class="form-control" name="usertype[]"><option value="1" selected="selected">Student</option><option value="2">Teacher</option><option value="3">Administrator</option></select></td></tr>';
							$("#table").append(content);
						}
						min_row = min_row + rows;
	    		});
	    	});
			</script>
