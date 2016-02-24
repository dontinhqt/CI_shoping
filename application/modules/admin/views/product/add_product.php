<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Admin Logo
    <small>Quản lý logo</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Admin Logo</a></li>
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
                // echo validation_errors("<li>","</li>");
                if(isset($error)) { echo $error;}
            ?>
            </h4>
          </div>

          <form class="form-horizontal" role="form" method="post" action="<?php echo base_url();?>admin/product/add"  enctype="multipart/form-data">
            <div class="col-md-6">
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Tên Sản Phẩm
                    <small>Nhập Tên Sản Phẩm</small>
                  </h3>
                  <div class="pull-right box-tools">
                    <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fa fa-minus"></i></button>
                      <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body pad">
                  <input type="text"  class="form-control" placeholder="Điền tên sản phẩm" id="txttensp" name="txttensp" >
                </div>
                <?php echo form_error("txttensp"); ?>
              </div>

              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Mã Sản Phẩm
                    <small>Nhập Mã Sản Phẩm</small>
                  </h3>
                  <div class="pull-right box-tools">
                    <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body pad">
                  <input type="text" class="form-control" id="txtmasp" name="txtmasp" placeholder="Mã sản phẩm">
                </div>
              </div>

              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Giá
                    <small>Giá Sản Phẩm</small>
                  </h3>
                  <div class="pull-right box-tools">
                    <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                  <input type="text" class="form-control" id="txtgia" name="txtgia" placeholder="Giá sản phẩm">
                </div>
                <?php echo form_error("txtgia"); ?>
              </div>

              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Giảm Giá
                    <small>(Nhập giá giảm nếu có khuyến mãi)</small>
                  </h3>
                  <div class="pull-right box-tools">
                    <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                  <input type="text" class="form-control" id="txtgiamgia" name="txtgiamgia" placeholder="Giá khuyến mãi">
                </div>
              </div>
              <!-- ảnh -->
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Hình Ảnh
                    <small>Lựa chọn hình ảnh</small>
                  </h3>
                  <div class="pull-right box-tools">
                    <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fa fa-minus"></i></button>
                      <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                  <input type="file" name="img" id="exampleInputFile">
                </div>
              </div>
            </div> <!-- End col-md-6 -->

          <div class="col-md-6">
            <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Chon Mặt Hàng 
                <small>Lựa chọn Mặt Hàng </small>
              </h3>
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body pad">
              <!-- <select id="cate" name="cate" class="form-control"> 
                <option value="">Lựa Chọn Mặt Hàng Của Bạn</option>
                <?php
                  foreach ($cate as $item){
                      echo "<option value='$item[id]'>$item[cate_title]</option>";
                  }
                ?>
              </select> -->
              <select name="cate" class="form-control">
                <option value="">Lựa Chọn Mặt Hàng Của Bạn</option>
                <?php
                    callMenu($cate);
                ?>
              </select>
            </div>
            <?php echo form_error("cate"); ?>
            </div>

            <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Số lượng
                <small>Nhập Số lượng</small>
              </h3>
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body pad">
              <input type="text" class="form-control" id="txtsoluong" name="txtsoluong" placeholder="Nhập số lượng">
            </div>
            <?php echo form_error("txtsoluong"); ?>
            </div>

            <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Xuất xứ
                <small>Nhập Xuất xứ</small>
              </h3>
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body pad">
              <input type="text" class="form-control" id="txtxuatxu" name="txtxuatxu" placeholder="Xuất xứ sản phẩm">
            </div>
            </div>

            <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Từ Khóa Seo</h3>
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body pad">
             <input type="text" class="form-control" id="txttukhoaseo" name="txttukhoaseo" placeholder="Từ khóa seo website">
            </div>
            </div>

          </div> <!-- End col-md-6 -->


          <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Nội Dung Giới Thiệu
                <small>Nhập Nội Dung Giới Thiệu</small>
              </h3>
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body pad">
              <textarea name="txtnoidung" id="txtnoidung" ></textarea><br />
              <script type="text/javascript">
                CKEDITOR.replace( 'txtnoidung' );
              </script>
            </div>
          </div>
          </div>

          <div class="clearfix"></div>
          <div class="box-footer" style="text-align:center;">
            <button type="submit" class="btn btn-primary" name="ok" value="Submit">Thêm sản phẩm</button>
          </div>
        </form>

        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>
  </div>
</section><!-- /.content -->
