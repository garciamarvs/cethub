			<div class="row wrapper border-bottom white-bg page-heading">
				<div class="col-lg-10">
					<h2><?= $tab ?></h2>
					<ol class="breadcrumb">
						<li>
							<a href=""><strong>Add Course</strong></a>
						</li>
					</ol>
				</div>
			</div>

			<div class="wrapper wrapper-content animated fadeInRight">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center">
						<div class="ibox float-e-margins">
							<div class="ibox-title">
								<h2>Add Course</h2>
							</div>
							<div class="ibox-content">
								<?php echo form_open('semester/addCourse') ?>
									<div class="table-responsive">
										<table class="table table-striped">
	                    <thead>
	                    <tr>
                        <th class="col-md-1 text-center">#</th>
                        <th class="col-md-6 text-center">Subject Title</th>
                        <th class="col-md-2 text-center">Subject Code</th>
                        <th class="col-md-0 text-center">Units</th>
                        <th class="col-md-1 text-center">Course<br><small>(e.g IT)</small></th>
                        <th class="col-md-1 text-center">Year Level</th>
                        <th class="col-md-1 text-center">Semester<br><small>(e.g 1st)</small></th>
	                    </tr>
	                    </thead>
	                    <tbody>
	                    <?php for ($i=1; $i < 11; $i++) { ?>
	                    	<tr>
	                    		<td><?= $i ?></td>
	                        <td><input class="form-control" type="text" name="title[]" value="<?= set_value('title[$i-1]') ?>"></td>
	                        <td><input class="form-control" type="text" name="code[]" value="<?= set_value('code[$i-1]') ?>"></td>
	                        <td><input class="form-control" type="text" name="unit[]"></td>
	                        <td><input class="form-control" type="text" name="course[]" value="<?= set_value('course[$i-1]') ?>"></td>
	                        <td><input class="form-control" type="number" min="1" max="5" name="year[]" value="<?= set_value('year[$i-1]') ?>"></td>
	                        <td><input class="form-control" type="text" name="sem[]"></td>
	                    	</tr>
	                    <?php } ?>
	                    </tbody>
										</table>
									</div>
									<div class="row m-t">
										<button class="btn btn-primary" type="submit">Add Now!</button>
									</div>
								<?php echo form_close() ?>
							</div>
						</div>
					</div>
				</div>
			</div>