			<div class="row wrapper border-bottom white-bg page-heading">
					<div class="col-lg-10">
							<h2><?= $tab ?></h2>
							<ol class="breadcrumb">
									<li>
											<a href="#"><strong>View All</strong></a>
									</li>
							</ol>
					</div>
			</div>

			<div class="wrapper wrapper-content blog">
				<div class="row">
					<div class="col-lg-4">
					<?php $ctr = 0; foreach($posts as $post){ $ctr++; ?>
						<?php switch($ctr){ case 4:case 7: ?>
					</div>
					<div class="col-lg-4">
						<?php break; ?>
						<?php } ?>
						<div class="ibox">
							<div class="ibox-title">
								<a href="<?= base_url().'announcement/view/'.$post['id'] ?>" class="btn-link">
									<h5 class="text-center"><?php echo $post['title']; ?></h5>
								</a>
								<div class="ibox-tools">
									<span class="tooltip-demo">
										<a href="<?= base_url().'announcement/edit/'.$post['slug'].'/'.$post['id'] ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Announcement"><i class="fa fa-edit"></i></a>
									</span>
									<span class="tooltip-demo">
										<a href="<?= base_url().'announcement/delete/'.$post['slug'].'/'.$post['id'] ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Announcement"><i class="fa fa-times"></i></a>
									</span>
								</div>
							</div>
							<div class="ibox-content">
								<div class="small m-b-xs text-center">
									<span class="text-muted"><i class="fa fa-clock-o"></i>&nbsp;<?php echo $post['created_at']; ?></span>
								</div>
									<img class="img-responsive img-thumbnail center-block" src="<?php echo base_url().'assets/img/posts/'.$post['post_image']; ?>">
										<?php echo word_limiter($post['body'], 160); ?>
							</div>
						</div>
					<?php } ?>
					</div>
				</div>
			</div>

			<div class="text-center">
				<div class="btn-group" style="margin-bottom: 100px;">
						<?php echo $this->pagination->create_links(); ?>
				</div>
			</div>

			<div class="tooltip-demo"><a class="posBotRight" href="<?= base_url() ?>announcement/create"><button type="button" class="btn btn-primary dim btn-large-dim btn-outline round" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add Announcement"><i class="fa fa-sticky-note"></i></button></a></div>

	<script>
			$(document).ready(function(){
					toastr.options = {"closeButton": true,"debug": false,"progressBar": true,"preventDuplicates": false,"positionClass": "toast-top-right","onclick": null,"showDuration": "400","hideDuration": "1000","timeOut": "3000","extendedTimeOut": "1000","showEasing": "swing","hideEasing": "linear","showMethod": "fadeIn","hideMethod": "fadeOut"
					};

					<?php if($this->session->flashdata('post_created')): ?>
					<?php echo "toastr.success('Announcement Added!')"; ?>
					<?php endif; ?>

					<?php if($this->session->flashdata('post_updated')): ?>
					<?php echo "toastr.success('Announcement Updated!')"; ?>
					<?php endif; ?>

					<?php if($this->session->flashdata('post_deleted')): ?>
					<?php echo "toastr.error('Announcement Deleted!')"; ?>
					<?php endif; ?>
			});
	</script>
