<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2><?= $tab ?></h2>
		<ol class="breadcrumb">
			<li>
				<?php echo form_open('home/schedule', array('id' => 'changeSem', 'onchange' => 'setSem()')); ?>
				<select class="form-control" name="sy">
					<?php foreach ($semesters as $s) { ?>
					<option value="<?= $s['sem_id'] ?>" <?php if($s['sem_id'] == $sem){echo 'selected';} ?> ><?= $s['sem_name'] ?></option>
					<?php } ?>
				</select>
				<?php echo form_close(); ?>
			</li>
		</ol>
	</div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="ibox float-e-margins">
				<div class="ibox-title text-center">
					<h2>Schedule</h2>
				</div>
				<div class="ibox-content">
					<div class="table-responsive">
						<table class="table table-striped">
              <thead>
              <tr>
                <th class="col-md-1 text-center">Subject Code</th>
                <th class="col-md-5 text-center">Subject Title</th>
                <th class="col-md-0 text-center">Units</th>
                <th class="col-md-2">Days | Time</th>
                <th class="col-md-1">Room</th>
                <th class="col-md-3">Instructor</th>
              </tr>
              </thead>
              <tbody>
              <?php foreach ($course as $c) { ?>
              	<tr>
              		<td><?= $c['course_code'] ?></td>
              		<td align="middle"><?= $c['course_title'] ?></td>
              		<td align="middle"><?= $c['units'] ?></td>
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
	</div>
</div>

<script>
	function setSem(){
		 document.getElementById('changeSem').submit();
	}
</script>
