<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2><?= $tab ?></h2>
		<ol class="breadcrumb">
			<li><a class="btn-link" href="<?= base_url()?>semester/addSemester"><i class="fa fa-plus"></i> Add Semester</a></li>
			<li><a class="btn-link" href="<?= base_url()?>semester/addSection"><i class="fa fa-plus"></i> Add Section</a></li>
			<li><a class="btn-link" href="<?= base_url()?>semester/addCourse"><i class="fa fa-plus"></i> Add Course</a></li>
		</ol>
	</div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="ibox float-e-margins">
				<div class="ibox-title text-center">
					<h2>Course Curriculum</h2>
				</div>
				<div class="ibox-content">
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
										<div class="col-md-10 col-md-offset-1">
											<?php $course='IT'; $year; $sem;
											for ($i=1; $i < 6; $i++) {
												$year=$i;
												for ($j=1; $j < 4; $j++) {
													switch ($j) {
														case 1: $sem = '1st'; break;
														case 2: $sem = '2nd'; break;
														case 3: $sem = 'summer'; break;
													}
													$totalUnits = 0;
													$courses = $this->semester_model->getCourseId($course, $year, $sem);
													if(count($courses) == 0){} else { ?>

	                    <div class="panel panel-primary">
	                      <div class="panel-heading">
	                      	<a href="<?= base_url().'semester/editCurriculum/IT/'.$year.'/'.$sem ?>" class="btn custom-button pull-right"><i class="fa fa-edit"></i>Edit</a>
	                        <h4><?php switch ($i) {
	                        	case 1: echo 'FIRST'; break;
	                        	case 2: echo 'SECOND'; break;
	                        	case 3: echo 'THIRD'; break;
	                        	case 4: echo 'FOURTH'; break;
	                        	case 5: echo 'FIFTH'; break;
	                        } ?> YEAR, <?php switch ($j) {
	                        	case 1: echo 'First'; break;
	                        	case 2: echo 'Second'; break;
	                        	case 3: echo 'Summer'; break;
	                        } ?> Semester</h4>
	                      </div>
	                      <div class="panel-body" style="padding-bottom: 0 !important;">
	                      	<div class="table-responsive">
														<table class="table table-border">
					                    <thead>
						                    <tr>
					                        <th class="col-md-5 text-center">Course Code</th>
					                        <th class="col-md-5">Course Title</th>
					                        <th class="col-md-2">Units</th>
						                    </tr>
					                    </thead>
					                    <tbody>
					                    	<?php foreach ($courses as $c) {
					                    		if(substr($c['course_code'],0,2) != 'PE'){
					                    			$totalUnits = $totalUnits + $c['units']; } ?>
						                    <tr>
						                    	<td align="middle"><?= $c['course_code'] ?></td>
						                    	<td><?= $c['course_title'] ?></td>
						                    	<td><?= $c['units'] ?></td>
						                    </tr>
						                    <?php } ?>						                    
					                    </tbody>
					                    <tr>
					                    	<td style="padding-bottom: 0 !important;"></td>
					                    	<td style="padding-bottom: 0 !important;" align="right"><h3>TOTAL</h3></td>
					                    	<td style="padding-bottom: 0 !important;"><h3><?= $totalUnits ?></h3></td>
						                   </tr>
		                  			</table>
		               				</div>
	                      </div>
	                    </div>

											<?php	}
												} 
	                     } ?>
                  	</div>
									</div>
								</div>
								<div id="tab-2" class="tab-pane">
									<div class="panel-body">
										<div class="col-md-10 col-md-offset-1">
											<?php $course='CO'; $year; $sem;
											for ($i=1; $i < 7; $i++) {
												$year=$i;
												for ($j=1; $j < 4; $j++) {
													switch ($j) {
														case 1: $sem = '1st'; break;
														case 2: $sem = '2nd'; break;
														case 3: $sem = 'summer'; break;
													}
													$totalUnits = 0;
													$courses = $this->semester_model->getCourseId($course, $year, $sem);
													if(count($courses) == 0){} else { ?>

	                    <div class="panel panel-primary">
	                      <div class="panel-heading">
	                      	<a href="<?= base_url().'semester/editCurriculum/CO/'.$year.'/'.$sem ?>" class="btn custom-button pull-right"><i class="fa fa-edit"></i>Edit</a>
	                        <h4><?php switch ($i) {
	                        	case 1: echo 'FIRST'; break;
	                        	case 2: echo 'SECOND'; break;
	                        	case 3: echo 'THIRD'; break;
	                        	case 4: echo 'FOURTH'; break;
	                        	case 5: echo 'FIFTH'; break;
	                        	case 6: echo 'SIXTH'; break;
	                        } ?> YEAR, <?php switch ($j) {
	                        	case 1: echo 'First'; break;
	                        	case 2: echo 'Second'; break;
	                        	case 3: echo 'Summer'; break;
	                        } ?> Semester</h4>
	                      </div>
	                      <div class="panel-body" style="padding-bottom: 0 !important;">
	                      	<div class="table-responsive">
														<table class="table table-border">
					                    <thead>
						                    <tr>
					                        <th class="col-md-5 text-center">Course Code</th>
					                        <th class="col-md-5">Course Title</th>
					                        <th class="col-md-2">Units</th>
						                    </tr>
					                    </thead>
					                    <tbody>
					                    	<?php foreach ($courses as $c) {
					                    		if(substr($c['course_code'],0,2) != 'PE'){
					                    			$totalUnits = $totalUnits + $c['units']; } ?>
						                    <tr>
						                    	<td align="middle"><?= $c['course_code'] ?></td>
						                    	<td><?= $c['course_title'] ?></td>
						                    	<td><?= $c['units'] ?></td>
						                    </tr>
						                    <?php } ?>						                    
					                    </tbody>
					                    <tr>
					                    	<td style="padding-bottom: 0 !important;"></td>
					                    	<td style="padding-bottom: 0 !important;" align="right"><h3>TOTAL</h3></td>
					                    	<td style="padding-bottom: 0 !important;"><h3><?= $totalUnits ?></h3></td>
						                   </tr>
		                  			</table>
		               				</div>
	                      </div>
	                    </div>

											<?php	}
												} 
	                     } ?>
                  	</div>
									</div>
								</div>
								<div id="tab-3" class="tab-pane">
									<div class="panel-body">
										<div class="col-md-10 col-md-offset-1">
											<?php $course='EK'; $year; $sem;
											for ($i=1; $i < 7; $i++) {
												$year=$i;
												for ($j=1; $j < 4; $j++) {
													switch ($j) {
														case 1: $sem = '1st'; break;
														case 2: $sem = '2nd'; break;
														case 3: $sem = 'summer'; break;
													}
													$totalUnits = 0;
													$courses = $this->semester_model->getCourseId($course, $year, $sem);
													if(count($courses) == 0){} else { ?>

	                    <div class="panel panel-primary">
	                      <div class="panel-heading">
	                      	<a href="<?= base_url().'semester/editCurriculum/EK/'.$year.'/'.$sem ?>" class="btn custom-button pull-right"><i class="fa fa-edit"></i>Edit</a>
	                        <h4><?php switch ($i) {
	                        	case 1: echo 'FIRST'; break;
	                        	case 2: echo 'SECOND'; break;
	                        	case 3: echo 'THIRD'; break;
	                        	case 4: echo 'FOURTH'; break;
	                        	case 5: echo 'FIFTH'; break;
	                        	case 6: echo 'SIXTH'; break;
	                        } ?> YEAR, <?php switch ($j) {
	                        	case 1: echo 'First'; break;
	                        	case 2: echo 'Second'; break;
	                        	case 3: echo 'Summer'; break;
	                        } ?> Semester</h4>
	                      </div>
	                      <div class="panel-body" style="padding-bottom: 0 !important;">
	                      	<div class="table-responsive">
														<table class="table table-border">
					                    <thead>
						                    <tr>
					                        <th class="col-md-5 text-center">Course Code</th>
					                        <th class="col-md-5">Course Title</th>
					                        <th class="col-md-2">Units</th>
						                    </tr>
					                    </thead>
					                    <tbody>
					                    	<?php foreach ($courses as $c) {
					                    		if(substr($c['course_code'],0,2) != 'PE'){
					                    			$totalUnits = $totalUnits + $c['units']; } ?>
						                    <tr>
						                    	<td align="middle"><?= $c['course_code'] ?></td>
						                    	<td><?= $c['course_title'] ?></td>
						                    	<td><?= $c['units'] ?></td>
						                    </tr>
						                    <?php } ?>						                    
					                    </tbody>
					                    <tr>
					                    	<td style="padding-bottom: 0 !important;"></td>
					                    	<td style="padding-bottom: 0 !important;" align="right"><h3>TOTAL</h3></td>
					                    	<td style="padding-bottom: 0 !important;"><h3><?= $totalUnits ?></h3></td>
						                   </tr>
		                  			</table>
		               				</div>
	                      </div>
	                    </div>

											<?php	}
												} 
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
	</div>
</div>
<script>
	
</script>
