    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2><?= $tab ?></h2>
            <ol class="breadcrumb">
                <li>
                    <a href="#"><strong>Edit Announcement</strong></a>
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-sm-offset-2">
            <div class="ibox float-e-margins">
                <div class="ibox-title text-center">
                    <i class="fa fa-clock-o" style="font-size:84px;"></i>
                    <h4 style="line-height: 1.42857143;font-size: 26px;">Edit Announcement</h4>
                </div>

                <div class="ibox-content">
                    <?php echo form_open_multipart('announcement/update', array('class' => 'form-horizontal')); ?>
                    <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
                    <input type="hidden" name="old_image" value="<?php echo $post['post_image']; ?>">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-10">
                        <input type="text" name="title" class="form-control" value="<?php echo $post['title']; ?>" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Upload Image</label>
                        <div class="fileinput fileinput-new input-group col-sm-10" style="padding-left: 15px !important;padding-right: 15px !important;" data-provides="fileinput">
                            <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span><input type="file" name="userfile" size="20"></span>
                            <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span>
                            </div>                            
                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Body</label>
                        <div class="col-sm-10">
                        <textarea id="summernote" name="body" required=""><?php echo $post['body']; ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary pull-right">Save Changes</button>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function(){
            $('#summernote').summernote({
                height:200,minHeight:100,maxHeight:400
            });
       });
    </script>