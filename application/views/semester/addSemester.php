			<div class="row wrapper border-bottom white-bg page-heading">
					<div class="col-lg-10">
							<h2><?= $tab ?></h2>
							<ol class="breadcrumb">
									<li>
											<a href=""><strong>Add Semester</strong></a>
									</li>
							</ol>
					</div>
			</div>

			<div class="wrapper wrapper-content animated fadeInRight">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center">
						<div class="ibox float-e-margins">
							<div class="ibox-title">
								<h2>Add Semester</h2>
							</div>
							<div class="ibox-content">
								<?php echo form_open('semester/addSemester', array('class' => 'form-inline')) ?>
									<div class="form-group">
										<label class="control-label">School Year: </label>
										<select name="sy1" id="sy1" class="form-control" required="" onchange="changesy2();">
											<option value="<?= date('Y')+2 ?>"><?= date('Y')+2 ?></option>
											<option value="<?= date('Y')+1 ?>"><?= date('Y')+1 ?></option>
											<option value="<?= date('Y') ?>" selected><?= date('Y') ?></option>
											<option value="<?= date('Y')-1 ?>"><?= date('Y')-1 ?></option>
											<option value="<?= date('Y')-2 ?>"><?= date('Y')-2 ?></option>
										</select>
									</div>
									&mdash;
									<div class="form-group">
										<select class="form-control" disabled="">
											<option id="sy2" selected><?= date('Y')+1 ?></option>
										</select>										
										<input name="sy2" id="sy2_hide" type="hidden" value="<?= date('Y')+1 ?>">
									</div>
									<div class="form-group">
										<label class="control-label m-l">Semester: </label>
										<select name="sem" class="form-control" required="">
											<option value="1st Semester" selected>1st Semester</option>
											<option value="2nd Semester">2nd Semester</option>
											<option value="Summer">Summer</option>
										</select>
									</div>
									<div class="row m-t">
										<button class="btn btn-primary" type="submit">Add Now!</button>
									</div>									
								<?php echo form_close() ?>
								</div>
								<script type="text/javascript">
									function changesy2(){
										var sy1 = $('#sy1').val();										
										document.getElementById('sy2_hide').value = parseInt(sy1)+1;
										document.getElementById('sy2').innerHTML = parseInt(sy1)+1;
									}
								</script>
							</div>
						</div>
					</div>
				</div>
				