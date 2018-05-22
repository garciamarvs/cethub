<div class="row wrapper border-bottom white-bg page-heading">			
	<div class="">
		<h2>School Year</h2>
		<ol class="breadcrumb">
			<li>
				<?php echo form_open('semester/index', array('id' => 'changeSem', 'onchange' => 'setSem()')); ?>
				<select class="form-control" name="sy">
					<?php foreach ($semesters as $s) { ?>
					<option value="<?= $s['sem_id'] ?>" <?php if($s['sem_id'] == $sem){echo 'selected';} ?> ><?= $s['sem_name'] ?></option>
					<?php } ?>
				</select>
				<?php echo form_close(); ?>
			</li>
		</ol>
	</div>
	<div class="row m-t">
		<div class="col-md-offset-2 col-md-8 alert alert-info" style="margin-bottom:0;">
			<i class="fa fa-info-circle"></i> Click on the subject title to enroll students to their course.
		</div>
	</div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-md-12">
					<div class="gray-bg">
						<div class="tabs-container">
							<ul class="nav nav-tabs">
								<li class="custom-tab active"><a data-toggle="tab" href="#tab-1" aria-expanded="true">IT</a></li>
								<li class="custom-tab"><a data-toggle="tab" href="#tab-2" aria-expanded="false">COE</a></li>
								<li class="custom-tab"><a data-toggle="tab" href="#tab-3" aria-expanded="false">ECE</a></li>
							</ul>
							<div class="tab-content">
								<div id="tab-1" class="tab-pane active">
									<div class="panel-body">
										<div class="row">
										<?php foreach ($IT as $s) { ?>
										<div class="col-md-6 pull-left">
										<div class="ibox">
											<div class="ibox-title">
												<h3 class="pull-left"><?= $s['section_name'] ?></h3>
													<div class="ibox-tools">
														<a href="<?php echo base_url().'semester/editCourseInfo/'.$s['section_id'].'/'.$sem ?>"><i class="fa fa-edit fa-2x text-info"></i></a>
													</div>
											</div>
											<div class="ibox-content">
												<div class="table-responsive">
													<table class="table table-striped">
														<thead>
															<tr>
																<th>Subject Title</th>
																<th>Subject Code</th>
																<th>Schedule</th>
																<th>Room</th>
																<th>Instructor</th>
															</tr>
														</thead>
														<tbody>
															<?php 
															$courses = $this->semester_model->getCourseForSection($s['section_id'],$sem);
															foreach ($courses as $c) { ?>
															<tr>
																<td><a href="<?= base_url().'semester/enroll/'.$c['id'] ?>"><?= $c['course_title'] ?></a></td>
																<td><?= $c['course_code'] ?></td>
																<td><?= $c['schedule'] ?></td>
																<td><?= $c['room'] ?></td>
																<td><?php $i = $this->user_model->getUserById($c['instructor']); echo $i['fname'].' '.$i['mname'].' '.$i['lname'];?></td>
															</tr>
															<?php } ?>
														</tbody>
													</table>
												</div>
											</div>
										</div>
										</div>
										<?php } ?>
										</div>
									</div>
								</div>

								<div id="tab-2" class="tab-pane">
									<div class="panel-body">
										<div class="row">
			<?php $i=0;
						$j=1;			
						$total=count($CO);
			foreach ($CO as $s) { ?>
					<div class="col-md-6">
						<div class="ibox float-e-margins">
							<div class="ibox-title">
							<h3 class="pull-left"><?= $s['section_name'] ?></h3>
								<div class="ibox-tools">
									<a href="<?php echo base_url().'semester/editCourseInfo/'.$s['section_id'].'/'.$sem ?>"><i class="fa fa-edit fa-2x text-info"></i></a>
								</div>
							</div>
							<div class="ibox-content">
								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
										<tr>
											<th>Subject Title</th>
											<th>Subject Code</th>
											<th>Schedule</th>
											<th>Room</th>
											<th>Instructor</th>
										</tr>
										</thead>
										<tbody>
											<?php 
											$courses = $this->semester_model->getCourseForSection($s['section_id'],$sem);
											foreach ($courses as $c) { ?>
											<tr>
												<td><a href="<?= base_url().'semester/enroll/'.$c['id'] ?>"><?= $c['course_title'] ?></a></td>
												<td><?= $c['course_code'] ?></td>
												<td><?= $c['schedule'] ?></td>
												<td><?= $c['room'] ?></td>
												<td><?php $i = $this->user_model->getUserById($c['instructor']); echo $i['fname'].' '.$i['mname'].' '.$i['lname'];?></td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<?php if($i==1){
									$j=$i+2;	?>				
				</div>
				<div class="row">
					<?php } else if($i==$total){						
								} else if($j==$i){
									$j=$i+2;	?>
				</div>
				<div class="row">
					<?php } ?>
			<?php $i++;
			} ?>
				</div>
									</div>
								</div>

								<div id="tab-3" class="tab-pane">
									<div class="panel-body">
										<div class="row">
			<?php $i=0;
						$j=1;			
						$total=count($EK);
			foreach ($EK as $s) { ?>
					<div class="col-md-6">
						<div class="ibox float-e-margins">
							<div class="ibox-title">
							<h3 class="pull-left"><?= $s['section_name'] ?></h3>
								<div class="ibox-tools">
									<a href="<?php echo base_url().'semester/editCourseInfo/'.$s['section_id'].'/'.$sem ?>"><i class="fa fa-edit fa-2x text-info"></i></a>
								</div>
							</div>
							<div class="ibox-content">
								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
										<tr>
											<th>Subject Title</th>
											<th>Subject Code</th>
											<th>Schedule</th>
											<th>Room</th>
											<th>Instructor</th>
										</tr>
										</thead>
										<tbody>
											<?php 
											$courses = $this->semester_model->getCourseForSection($s['section_id'],$sem);
											foreach ($courses as $c) { ?>
											<tr>
												<td><a href="<?= base_url().'semester/enroll/'.$c['id'] ?>"><?= $c['course_title'] ?></a></td>
												<td><?= $c['course_code'] ?></td>
												<td><?= $c['schedule'] ?></td>
												<td><?= $c['room'] ?></td>
												<td><?php $i = $this->user_model->getUserById($c['instructor']); echo $i['fname'].' '.$i['mname'].' '.$i['lname'];?></td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<?php if($i==1){
									$j=$i+2;	?>				
				</div>
				<div class="row">
					<?php } else if($i==$total){						
								} else if($j==$i){
									$j=$i+2;	?>
				</div>
				<div class="row">
					<?php } ?>
			<?php $i++;
			} ?>
				</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
	</div>
</div>

			<!-- <div class="wrapper wrapper-content animated fadeInRight">
				<div class="row">
			<?php $i=0;
						$j=1;			
						$total=count($sections);
			foreach ($sections as $s) { ?>
					<div class="col-md-6">
						<div class="ibox float-e-margins">
							<div class="ibox-title">
							<h3 class="pull-left"><?= $s['section_name'] ?></h3>
								<div class="ibox-tools">
									<a href="<?php echo base_url().'semester/editCourseInfo/'.$s['section_id'].'/'.$sem ?>"><i class="fa fa-edit"></i></a>
									<a href="#"><i class="fa fa-times"></i></a>
								</div>
							</div>
							<div class="ibox-content">
								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
										<tr>
											<th>Subject Title</th>
											<th>Subject Code</th>
											<th>Schedule</th>
											<th>Room</th>
											<th>Instructor</th>
										</tr>
										</thead>
										<tbody>
											<?php 
											$courses = $this->semester_model->getCourseForSection($s['section_id'],$sem);
											foreach ($courses as $c) { ?>
											<tr>
												<td><a href="<?= base_url().'semester/enroll/'.$c['id'] ?>"><?= $c['course_title'] ?></a></td>
												<td><?= $c['course_code'] ?></td>
												<td><?= $c['schedule'] ?></td>
												<td><?= $c['room'] ?></td>
												<td><?php $i = $this->user_model->getUserById($c['instructor']); echo $i['fname'].' '.$i['mname'].' '.$i['lname'];?></td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<?php if($i==1){
									$j=$i+2;	?>				
				</div>
				<div class="row">
					<?php } else if($i==$total){						
								} else if($j==$i){
									$j=$i+2;	?>
				</div>
				<div class="row">
					<?php } ?>
			<?php $i++;
			} ?>
				</div>
			</div> -->

			<script>
				function setSem(){
					 document.getElementById('changeSem').submit();
				}
			</script>
