<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Admin Category
    <small>Quản lý Category</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Admin Category</a></li>
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
              <?php if(isset($mess) && $mess!="") echo $mess; ?>
              </h4>
            </div>

            <form method="post" action="" >

              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Category
                    <small>Chọn danh mục</small>
                  </h3>
                  <div class="pull-right box-tools">
                    <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
              </div>
              <div class="box-body pad">
                <select name="cate" class="form-control">
                    <option value="0" selected>Root</option>
                    <?php
                        callMenu($cate);
                    ?>
                </select>
              </div>

              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Category
                    <small>Nhập danh mục sản phẩm</small>
                  </h3>
                  <div class="pull-right box-tools">
                    <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i>
                    </button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body pad">
                  <input type="text" class="form-control s1" id="txttitle" name="txttitle" />
                </div>
                <?php echo form_error("txttitle"); ?>
              </div>
              

              <div class="box-footer text-center">
                <button type="submit" class="btn btn-primary" name="ok" id="ok" value="Submit">Thêm</button>
              </div>
               </form>

          </div>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>
  </div>
</section><!-- /.content -->

