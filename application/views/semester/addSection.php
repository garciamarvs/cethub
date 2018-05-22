			<div class="row wrapper border-bottom white-bg page-heading">
					<div class="col-lg-10">
							<h2><?= $tab ?></h2>
							<ol class="breadcrumb">
									<li>
											<a href=""><strong>Add Section</strong></a>
									</li>
							</ol>
					</div>
			</div>

			<div class="wrapper wrapper-content animated fadeInRight">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center">
						<div class="ibox float-e-margins">
							<div class="ibox-title">
								<h2>Add Section</h2>
							</div>
							<div class="ibox-content">
								<?php echo form_open('semester/addSection', array('class' => 'form-horizontal')) ?>
									<div class="form-group">
										<label class="col-md-2 col-md-offset-2 control-label">Section: </label>
										<div class="col-md-4"><input name="section" type="text" class="form-control" required=""><small>(e.g IT41, EK21, CO32)</small></div>										
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