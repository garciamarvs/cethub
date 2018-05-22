<div class="row wrapper border-bottom white-bg page-heading">
	<div class="">
		<h2><?= $tab ?></h2>
		<ol class="breadcrumb">
			<li>
				<?php echo form_open('submit/index', array('id' => 'changeSem', 'onchange' => 'setSem()')); ?>
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
			<i class="fa fa-info-circle"></i> Click on the course title to begin encoding grades for your students.
		</div>
	</div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
				</div>
				<div class="ibox-content">
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th class="col-md-1 text-center">#</th>
									<th class="col-md-4">Course Title</th>									
									<th class="col-md-2">Course Code</th>
									<th class="col-md-1">Section</th>
									<th class="col-md-2">Schedule</th>
									<th class="col-md-1">Room</th>
								</tr>
							</thead>
							<tbody>								
							</tbody>
							<?php for($i=0,$j=count($c);$i<$j;$i++){ ?>
							<tr>
								<td align="middle"><?= $i+1 ?></td>
								<td><a href="<?= base_url().'submit/grade/'.$c[$i]['id'] ?>"><?= $c[$i]['course_title'] ?></a></td>
								<td><?= $c[$i]['course_code'] ?></td>
								<td><?= $c[$i]['section_name'] ?></td>
								<td><?= $c[$i]['schedule'] ?></td>
								<td><?= $c[$i]['room'] ?></td>
							</tr>
							<?php } ?>
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
