<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2><?= $tab ?></h2>
		<ol class="breadcrumb">
			<li>
				<strong>Edit Curriculum</strong>
			</li>
		</ol>
	</div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-md-10 col-md-offset-1 text-center">
			<div class="ibox float-e-margins" id="ibox1">
				<div class="ibox-title">
					<button id="save" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Save</button>
					<h2><?= $course ?> <?php switch($year) {
						case 1: echo 'FIRST YEAR '; break; case 2: echo 'SECOND YEAR '; break; case 3: echo 'THIRD YEAR '; break; case 4: echo 'FOURTH YEAR '; break; case 5: echo 'FIFTH YEAR '; break;
					} ?> <?php switch($sem) {
						case '1st': echo 'First Semester'; break; case '2nd': echo 'Second Semester'; break; } ?></h2>
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
					<div class="table-responsive">
						<table class="table table-striped">
              <thead>
	              <tr>
	              	<th class="col-md-1 text-center">Action</th>
	                <th class="col-md-6 text-center">Course Title</th>
	                <th class="col-md-2 text-center">Course Code</th>
	                <th class="col-md-0 text-center">Units</th>
	              </tr>
              </thead>
              <tbody>
              	<?php for ($i=0,$j=count($c); $i < $j; $i++){ ?>
	          		<tr id="td<?= $c[$i]['id'] ?>">
	          			<td><div class="tooltip-demo"><button style="background:inherit;border:0;" type="button" onclick="remove(<?= $c[$i]['id'] ?>);"><i class="fa fa-times-circle text-danger" style="font-size: 24px;" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Delete"></i></button></div></td>
	          			<td><input class="form-control" type="text" name="title[]" value="<?= $c[$i]['course_title'] ?>"></td>
	          			<td><input class="form-control" type="text" name="code[]" value="<?= $c[$i]['course_code'] ?>"></td>
	          			<td><input class="form-control text-center" type="number" name="unit[]" value="<?= $c[$i]['units'] ?>"></td>
	          		</tr>
	          		<input type="hidden" name="id[]" value="<?= $c[$i]['id'] ?>">
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
	$(document).ready(function(){
	  $('#save').on('click', function(){
	  	$('#ibox1').children('.ibox-content').toggleClass('sk-loading');
	  	saveCurriculum();
	  });
	});

	function saveCurriculum(){
		var sid 	 = $("input[name='id[]']").map(function(){return $(this).val();}).get();
		var stitle = $("input[name='title[]']").map(function(){return $(this).val();}).get();
		var scode  = $("input[name='code[]']").map(function(){return $(this).val();}).get();
		var sunit  = $("input[name='unit[]']").map(function(){return $(this).val();}).get();

		$.ajax({
			type: 'POST',
			url: '<?= base_url() ?>semester/saveCurriculum',
			data: ({
				id: sid,
				title: stitle,
				code: scode,
				unit: sunit
			}),
			dataType: "json",
			success: function(data){
				if(data.status == 'success'){
					setTimeout(function(){
						toastr.success('Curriculum Updated Successful!')
						$('#ibox1').children('.ibox-content').toggleClass('sk-loading');
					},500);
				}
			}
		});

	}

	function remove(id){
		$.ajax({
			type: 'POST',
			url: '<?= base_url() ?>semester/dlFromRefCourse',
			data: ({
				id: id
			}),
			dataType: "json",
			success: function(data){
				if(data.status == 'success'){
					toastr.success('Curriculum Updated Successful!');
					$( "#td"+id).remove();
				}
			}
		});


	}
</script>

