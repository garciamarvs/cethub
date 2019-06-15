<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2><?= $tab ?></h2>
		<ol class="breadcrumb">
			<li>
				<?php echo form_open('home/grades', array('id' => 'changeSem', 'onchange' => 'setSem()')); ?>
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
					<h2>My Grades</h2>
				</div>
				<div class="ibox-content">
					<div class="table-responsive">
						<table class="table table-striped">
              <thead>
              <tr>
                <th class="col-md-1 text-center">Subject Code</th>
                <th class="col-md-4 text-center">Subject Title</th>
                <th class="col-md-1 text-center">Units</th>
                <th class="col-md-2 text-center">Final Grade</th>
                <th class="col-md-1 text-center"><div class="label label-primary">New</div>Point Equivalent</th>
                <th class="col-md-1 text-center"><div class="label">Old</div>Point Equivalent</th>
                <th class="col-md-1 text-center">Letter Equivalent</th>
                <th class="col-md-1 text-center">Remarks</th>
              </tr>
              </thead>
              <tbody>
              <?php $num1=0;$tUnits=0; foreach ($grades as $g) {$num1 += $g['grade']*$g['units']; $tUnits += $g['units'];  ?>
            	<tr>
            		<td align="middle"><?= $g['course_code'] ?></td>
            		<td align="middle"><?= $g['course_title'] ?></td>
            		<td align="middle"><?= $g['units'] ?></td>
            		<td align="middle"><?= $g['grade'] ?></td>
            		<td align="middle"><?= $g['npe'] ?></td>
            		<td align="middle"><?= $g['ope'] ?></td>
            		<td align="middle"><?= $g['le'] ?></td>
            		<td align="middle"><?= $g['remarks'] ?></td>            		
            	</tr>
            	<?php } ?>
            	<tr>
            		<td></td>
            		<td align="right"><h3><strong>Total :</strong></h3></td>
            		<td align="middle"><h3><strong><?= $tUnits ?></strong></h3></td>
            		<td align="middle"><h3><strong><?= number_format($num1/$tUnits, 2, '.', ' '); ?></strong></h3></td>
            	</tr>
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