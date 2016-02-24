<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Admin Quản Lý Sản Phẩm
    <small>Danh sách sản phẩm</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Quản Trị Viên</a></li>
    <li class="active">Chi tiết</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-body table-responsive">

          <div class="pull-right">
            <a href="<?php echo base_url()."$module/product/add";?>"><button class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Thêm sản phẩm</button></a>
            <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
          </div>

          <br />
          <br />
          <table id="table_sp" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Tên Sản Phẩm</th>
                <th>Loại Sản Phẩm</th>
                <th>Giá</th>
                <th>Ngày Đăng</th>
                <th>Hình Ảnh</th>
                <th style="width:125px;">Action</th>
              </tr>
            </thead>
            <tbody>
            </tbody>

            <tfoot>
              <tr>
                <th>Tên Sản Phẩm</th>
                <th>Loại Sản Phẩm</th>
                <th>Giá</th>
                <th>Ngày Đăng</th>
                <th>Hình Ảnh</th>
                <th style="width:125px;">Action</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div><!-- /.box -->
    </div>
  </div>
</section><!-- /.content -->


<script>
    var table;
    $(document).ready(function() {
        table = $('#table').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
              "url": "ajax_list/",
              "type": "POST"
            },
            "columnDefs": [
            {
              "targets": [ -1 ],
              "orderable": false,
            },
            ],

        });
    }
</script>