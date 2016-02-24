<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Admin Banner
    <small>Quản lý banner</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Admin banner</a></li>
    <li class="active">Chi tiết</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-body table-responsive">

          <div class="text-center text-purple">
            <h4>
            <?php
                echo validation_errors("<li>","</li>");
            ?>
            </h4>
          </div>

          <form method="post" action="<?php echo base_url();?>index.php/admin/banner/edit/<?php echo $banner['id'];?>" enctype="multipart/form-data" role="form" id="editbanner">
            <input type="hidden" name="oldimg" value="<?php echo $banner['image']; ?>">
            <div class="box box-info">
              <div class="box-header">
                <h3 class="box-title">Hình Ảnh
                  <small>Nhập Hình Ảnh</small>
                </h3>
                <div class="pull-right box-tools">
                  <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i></button>
                </div>
              </div><!-- /.box-header -->
              <div class="box-body pad">
                <input type="file" name="userfile" id="userfile"  class="none" />
                <?php
              	if($banner['image'] != "") {
                      echo "<label></label><img src='".base_url()."uploads/images/{$banner['image']}' width='150px' /><br />";
                  }
                ?>
              </div>
            </div>

            <div class="box box-info">
              <div class="box-header">
              <h3 class="box-title">Từ Khóa SEO thẻ alt
                <small>Nhập Từ Khóa</small>
              </h3>
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
              </div>
              </div><!-- /.box-header -->
              <div class="box-body pad">
                <input type="text" class="form-control s1" id="txtkeyword" value="<?php echo $banner['keyword'] ?>" name="txtkeyword" />
              </div>
           </div>

           <div class="box-footer text-center">
             <button type="submit" class="btn btn-primary" name="ok" id="ok" value="Submit">Cập nhật banner</button>
           </div>

          </form>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>
  </div>
</section><!-- /.content -->
