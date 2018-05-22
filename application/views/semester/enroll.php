			<div class="row wrapper border-bottom white-bg page-heading">
				<div class="col-lg-10">
					<h2><?= $tab ?></h2>
					<ol class="breadcrumb">
						<li>
							<strong><?= $s['sem_name'] ?></strong>
						</li>
					</ol>
				</div>
			</div>

			<div class="wrapper wrapper-content animated fadeInRight">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="ibox float-e-margins" id="ibox1">
							<div class="ibox-title text-center">
							<button type="button" class="pull-right btn btn-primary" id="save">Save Now!</button>
								<h2><?= $r['course_title'] ?></h2>
							</div>
							<div class="ibox-content">							
								<div class="sk-spinner sk-spinner-cube-grid">
									<div class="sk-cube"></div>
                  <div class="sk-cube"></div>
                  <div class="sk-cube"></div>
                  <div class="sk-cube"></div>
                  <div class="sk-cube"></div>
                  <div class="sk-cube"></div>
                  <div class="sk-cube"></div>
                  <div class="sk-cube"></div>
                  <div class="sk-cube"></div>
								</div>
								<select id="dual_select" class="form-control" multiple>
								<?php foreach ($students as $student) {
									if (in_array($student['user_id'], $e)){ ?>
										<option value="<?= $student['user_id'] ?>" selected><?= $student['fname'].' '.$student['mname'].' '. $student['lname'] ?></option>
								<?php } else { ?>
										<option value="<?= $student['user_id'] ?>"><?= $student['fname'].' '.$student['mname'].' '. $student['lname'] ?></option>
								<?php	}
									} ?>
								</select>
							</div>
						</div>
					</div>					
				</div>
			</div>
			
			<script>
			$(document).ready(function(){
				$('#dual_select').bootstrapDualListbox({
	        selectorMinimalHeight: 200,
	        nonSelectedListLabel: '<strong>List of Students</strong>',
	        selectedListLabel: '<strong>Students Enrolled in this Subject</strong>'
	      });

	      $('#save').on('click', function(){
	      	$('#ibox1').children('.ibox-content').toggleClass('sk-loading');
	      	saveEnroll();
	      });

			});

			function saveEnroll(){
				var names = $('#dual_select').val();
				var course = '<?= $course['id'] ?>';

				$.ajax({
					type: 'POST',
					url: '<?= base_url() ?>semester/saveEnroll',
					data: ({
						course: course,
						names: names
					}),
					dataType: "json",
					success: function(data){
						if(data.status == 'success'){							
							setTimeout(function(){
								toastr.success('Added Successful!')
								$('#ibox1').children('.ibox-content').toggleClass('sk-loading');
							},1000);
						}
					}
				});
			}
			</script>
