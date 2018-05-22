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

			<div class="wrapper wrapper-content animated fadeInRight blog">
				<div class="row">
					<div class="col-lg-4">
					<?php $ctr = 0; foreach($posts as $post){ $ctr++; ?>
						<?php switch($ctr){ case 4:case 7: ?>
					</div>
					<div class="col-lg-4">
						<?php break; ?>
						<?php } ?>
						<div class="ibox">
							<div class="ibox-content">
								<a href="<?= base_url().'announcement/view/'.$post['slug'] ?>" class="btn-link">
									<h2 class="text-center"><?php echo $post['title']; ?></h2>
								</a>
								<div class="small m-b-xs text-center">
									<span class="text-muted"><i class="fa fa-clock-o"></i>&nbsp;<?php echo $post['created_at']; ?></span>
								</div>
									<a href="<?php echo base_url().'assets/img/posts/'.$post['post_image']; ?>" data-toggle="lightbox">
										<img class="img-responsive img-thumbnail center-block" src="<?php echo base_url().'assets/img/posts/'.$post['post_image']; ?>">
									</a>
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

	<script>
		$(document).on('click', '[data-toggle="lightbox"]', function(event) {
			event.preventDefault();
			$(this).ekkoLightbox();
		});
	</script>
