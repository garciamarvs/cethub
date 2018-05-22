	<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2><?= $tab ?></h2>
            <ol class="breadcrumb">
                <li>
                    <a href="#"><strong>Edit Course Info</strong></a>
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
        <?php echo form_open('semester/editCourseInfo'); ?>
            <div class="ibox float-e-margins">
                <div class="ibox-title text-center">
                	<div class="ibox-tools">
                		<button type="submit" class="btn btn-primary pull-right">Save Changes!</button>
                	</div>
                	<h2><?= $s[0]['section_name'] ?></h2>                	
                </div>
                <div class="ibox-content">                
                	<div class="table-responsive">
										<table class="table table-striped">
											<thead>
											<tr>
												<th class="col-md-1 text-center">Action</th>
												<th class="col-md-4">Subject Title</th>
												<th class="col-md-2">Subject Code</th>
												<th class="col-md-0">Units</th>
												<th class="col-md-2">Schedule</th>
												<th class="col-md-1">Room</th>
												<th class="col-md-2">Instructor</th>
											</tr>
											</thead>
											<tbody>
											<?php $ctr=1; foreach ($course as $c) { ?>
											<tr id="td<?= $ctr ?>">
												<input type="hidden" name="id[]" value="<?= $c['id'] ?>">
												<input type="hidden" name="course_id[]" value="<?= $c['id'] ?>">
												<td align="middle"><div class="tooltip-demo"><button style="background:inherit;border:0;" type="button" onclick="remove(<?= $c['id'] ?>);"><i class="fa fa-times-circle text-danger" style="font-size: 24px;" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Delete"></i></button></div></td>
												<td><input class="form-control" type="text" name="title[]" value="<?= $c['course_title'] ?>"></td>
												<td><input type="text" class="form-control" name="code[]" value="<?= $c['course_code'] ?>"></td>
												<td><input type="number" class="form-control" name="unit[]" value="<?= $c['units'] ?>"></td>
												<td><input type="text" class="form-control" name="schedule[]" value="<?= $c['schedule'] ?>"></td>
												<td><input type="text" class="form-control" name="room[]" value="<?= $c['room'] ?>"></td>
												<td>
													<select name="instructor[]" class="form-control">
														<option></option>
														<?php foreach ($teachers as $t) { ?>
														<option value="<?= $t['user_id'] ?>" <?php if($c['instructor'] == $t['user_id']) echo 'selected'; ?> ><?= $t['fname'].' '.$t['mname'].' '.$t['lname'] ?></option>
														<?php }  ?>
													</select>												
												</td>
											</tr>
											<?php $ctr++; } ?>
											</tbody>
										</table>
									</div>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>

<script>
	function remove(id){
		$.ajax({
			type: 'POST',
			url: '<?= base_url() ?>semester/dlFromCourse',
			data: ({
				id: id
			}),
			dataType: "json",
			success: function(data){
				if(data.status == 'success'){
					toastr.success('Deleted Successfully!');
					$( "#td"+id).remove();
				}
			}
		});
	}
</script>
