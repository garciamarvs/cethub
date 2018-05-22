			<div class="footer">
				<div class="pull-right">
						POWER!
				</div>
				<div>
						<strong>Copyright</strong> IT41-LEZGOW  &copy; 2017
				</div>
			</div>
		</div>
	</div>	
		<script>
			$(document).ready(function(){
				var currTab = '<?= $tab ?>';
				console.log(currTab);
				switch(currTab){
						case 'Home':
								$('#tab-home').addClass('active');
								$('#tab-home a').addClass('navActive');
						break;

						case 'Announcement':
								$('#tab-announcement').addClass('active');
								$('#tab-announcement a').addClass('navActive');
						break;

						case 'Submit Grades':
								$('#tab-submit').addClass('active');
								$('#tab-submit a').addClass('navActive');
						break;

						case 'My Course':
								$('#tab-course').addClass('active');
								$('#tab-course a').addClass('navActive');
						break;

						case 'Semester':
								$('#tab-semester').addClass('active');
								$('#tab-semester a').addClass('navActive');
						break;
				}
			});

			$(document).ready(function(){
        $('.i-checks').iCheck({
	        checkboxClass: 'icheckbox_square-green',
	        radioClass: 'iradio_square-green',
        });
      });
		</script>
		<script>
			$(document).ready(function(){
					toastr.options = {"closeButton": true,"debug": false,"progressBar": true,"preventDuplicates": false,"positionClass": "toast-top-right","onclick": null,"showDuration": "400","hideDuration": "1000","timeOut": "3000","extendedTimeOut": "1000","showEasing": "swing","hideEasing": "linear","showMethod": "fadeIn","hideMethod": "fadeOut"
					};

					<?php if($this->session->flashdata('login_success')): ?>
					<?php echo "toastr.success('Login Successful!')"; ?>
					<?php endif; ?>

					<?php if($this->session->flashdata('addSemester_success')): ?>
					<?php echo "toastr.success('Semester Added Successfully!')"; ?>
					<?php endif; ?>

					<?php if($this->session->flashdata('addSection_success')): ?>
					<?php echo "toastr.success('Section Added Successfully!')"; ?>
					<?php endif; ?>

					<?php if($this->session->flashdata('addCourse_success')): ?>
					<?php echo "toastr.success('Course Added Successfully!')"; ?>
					<?php endif; ?>
					
					<?php if($this->session->flashdata('editCourse_success')): ?>
					<?php echo "toastr.success('Course Edited Successfully!')"; ?>
					<?php endif; ?>

					<?php if($this->session->flashdata('addUser_success')): ?>
					<?php echo "toastr.success('Users Added Successfully!')"; ?>
					<?php endif; ?>

					<?php if($this->session->flashdata('updateProfile_success')): ?>
					<?php echo "toastr.success('Profile Updated Successfully!')"; ?>
					<?php endif; ?>

					
			});
	</script>
</body>
</html>