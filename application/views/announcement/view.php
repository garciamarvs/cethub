<div class="wrapper wrapper-content  animated fadeInRight article">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="text-center article-title">
                    <span class="text-muted"><i class="fa fa-clock-o"></i> <?= $post['created_at'] ?></span><br>
                    <img class="img-responsive img-thumbnail" src="<?php echo base_url().'assets/img/posts/'.$post['post_image']; ?>">
                        <h1>
                            <?= $post['title'] ?>
                        </h1>
                    </div>
                    <?= $post['body'] ?>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>