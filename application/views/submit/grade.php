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
					<div class="table-responsive">
						<table class="table table-striped">
              <thead>
              <tr>
                <th class="col-md-0 text-center">#</th>
                <th class="col-md-4">Name</th>
                <th class="col-md-2 text-center">Final Grade</th>
                <th class="col-md-2 text-center"><div class="label label-primary">New</div>Point Equivalent</th>
                <th class="col-md-2 text-center"><div class="label">Old</div>Point Equivalent</th>
                <th class="col-md-1 text-center">Letter Equivalent</th>
                <th class="col-md-1 text-center">Remarks</th>
              </tr>
              </thead>
              <tbody>
              <?php for($i=0,$j=count($st);$i<$j;$i++) { ?>              
              	<tr>
              		<td align="middle"><?= $i+1 ?></td>
              		<td><?= $st[$i]['fname'].' '.$st[$i]['mname'].' '.$st[$i]['lname'] ?></td>
              		<td><input class="form-control text-center equip" type="number" name="grades[]" id="g<?= $i ?>" value="<?= $st[$i]['grade'] ?>" onkeyup="calcEq(<?= $i ?>)" step="any"></td>
              		<td id="npe<?= $i ?>" align="middle"><?= $st[$i]['npe'] ?></td>
              		<td id="ope<?= $i ?>" align="middle"><?= $st[$i]['ope'] ?></td>
              		<td id="le<?= $i ?>" align="middle"><?= $st[$i]['le'] ?></td>
              		<td id="remarks<?= $i ?>" align="middle"><?= $st[$i]['remarks'] ?></td>
              		<input type="hidden" name="names[]" value="<?= $st[$i]['user_id'] ?>">
              		<input type="hidden" id="xnpe<?= $i ?>" name="npe[]" value="<?= $st[$i]['npe'] ?>">
              		<input type="hidden" id="xope<?= $i ?>" name="ope[]" value="<?= $st[$i]['ope'] ?>">
              		<input type="hidden" id="xle<?= $i ?>" name="le[]" value="<?= $st[$i]['le'] ?>">
              		<input type="hidden" id="xremarks<?= $i ?>" name="remarks[]" value="<?= $st[$i]['remarks'] ?>">
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
	$(document).ready(function(){
	  $('#save').on('click', function(){
	  	$('#ibox1').children('.ibox-content').toggleClass('sk-loading');
	  	saveGrades();
	  });

	  $('.equip').on('keydown keyup', function(e){
	    if (($(this).val() > 100 || $(this).val() < 0) && e.keyCode != 46 && e.keyCode != 8) {
	       e.preventDefault();
	       $(this).val('');
	    }
		});
	});

	function saveGrades(){
		var course = '<?= $course ?>';
		var names  = $("input[name='names[]']").map(function(){return $(this).val();}).get();
		var grades = $("input[name='grades[]']").map(function(){return $(this).val();}).get();
		var npe		 = $("input[name='npe[]']").map(function(){return $(this).val();}).get();
		var ope 	 = $("input[name='ope[]']").map(function(){return $(this).val();}).get();
		var le 		 = $("input[name='le[]']").map(function(){return $(this).val();}).get();
		var remarks= $("input[name='remarks[]']").map(function(){return $(this).val();}).get();

		console.log();


		$.ajax({
			type: 'POST',
			url: '<?= base_url() ?>submit/saveGrades',
			data: ({
				course: course,
				names: names,
				grades: grades,
				npe: npe,
				ope: ope,
				le: le,
				remarks: remarks
			}),
			dataType: "json",
			success: function(data){
				if(data.status == 'success'){
					setTimeout(function(){
						toastr.success('Grades Updated Successful!')
						$('#ibox1').children('.ibox-content').toggleClass('sk-loading');
					},500);
				}
			}
		});
	}

	function calcEq(i){
		var x = $('#g'+i).val();
		x = parseFloat(x);

		var a,b,c,d;

		if(x>=98.00&&x<=100.00)		 {a = '4.00'; b = '1.00'; c = 'A+'; d = 'PASSED';}
		else if(x>=95.00&&x<=97.99){a = '3.75'; b = '1.25'; c = 'A'; d = 'PASSED';}
		else if(x>=92.00&&x<=94.99){a = '3.50'; b = '1.50'; c = 'A-'; d = 'PASSED';}
		else if(x>=89.00&&x<=91.99){a = '3.25'; b = '1.75'; c = 'B+'; d = 'PASSED';} 
		else if(x>=86.00&&x<=88.99){a = '3.00'; b = '2.00'; c = 'B'; d = 'PASSED';} 
		else if(x>=83.00&&x<=85.99){a = '2.75'; b = '2.25'; c = 'B-'; d = 'PASSED';} 
		else if(x>=79.00&&x<=82.99){a = '2.50'; b = '2.50'; c = 'C+'; d = 'PASSED';} 
		else if(x>=76.00&&x<=78.99){a = '2.25'; b = '2.75'; c = 'C'; d = 'PASSED';} 
		else if(x>=75.00&&x<=75.99){a = '2.00'; b = '3.00'; c = 'C-'; d = 'PASSED';} 
		else if(x>= 0.00&&x<=74.99){a = '1.00'; b = '5.00'; c = 'D'; d = 'FAILED';} 
		else {a = ""; b = ""; c = ""; d = "";}

		$('#npe'+i).text(a); 		 $('#xnpe'+i).val(a);
		$('#ope'+i).text(b); 		 $('#xope'+i).val(b);
		$('#le'+i).text(c);  		 $('#xle'+i).val(c);
		$('#remarks'+i).text(d); $('#xremarks'+i).val(d);
	}
</script>
