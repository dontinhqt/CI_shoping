<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    THÊM ĐỊA ĐIỂM
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Địa điểm</a></li>
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
              <?php if(isset($mess) && $mess!="") echo $mess; ?>
              </h4>
            </div>

            <form method="post" action="" enctype="multipart/form-data" role="form">
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Tên Địa Điểm
                    <small>Nhập Tên Địa Điểm</small>
                  </h3>
                  <div class="pull-right box-tools">
                    <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fa fa-minus"></i></button>
                      <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body pad">
                  <input type="text" class="form-control s1" id="txtname" name="txtname" />
                </div>
              </div>

              <div class="box box-info">
                <div class="box-header">
                <h3 class="box-title">Địa Chỉ 
                  <small>Nhập địa chỉ</small>
                </h3>
                <div class="pull-right box-tools">
                  <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i></button>
                </div>
                </div><!-- /.box-header -->
                <div class="box-body pad">
                  <textarea name="txtadress" ></textarea><br />
                  <script language="javascript">
                      CKEDITOR.replace( 'txtadress' );
                  </script>
                </div>
              </div>

              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">GoogleMap
                  </h3>
                  <div class="pull-right box-tools">
                    <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body pad">
                  <input type="text" class="form-control s1" id="txtmap" name="txtmap" />
                </div>
              </div>

             <div class="box-footer text-center">
               <button type="submit" class="btn btn-primary" name="ok" id="ok" value="Submit">Thêm</button>
             </div>
            </form>


        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>
  </div>
</section><!-- /.content -->

