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
          <div id="reloaddata">

            <div class="text-center text-purple">
              <h4>
                <?php
                if($mess != "") echo $mess;
                ?>
              </h4>
            </div>

          <table class="table table-hover">
            <tr class="bg-blue">
              <th>STT</th>
              <th>Name logo</th>
              <th>Images</th>
              <th>Từ khóa thẻ ALT</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
            <?php
              $stt = 0;
              foreach ($logo as $value) {
                $stt++;
                echo "<tr>";
                echo "<td>$stt</td>";
                echo "<td>{$value['name']}</td>";
                echo "<td><img src='".base_url()."uploads/images/".$value['image']."' class='imgs'width='100' /></td>"; 
                echo "<td>{$value['keyword']}</td>";
                echo "<td>
                        <a title='Edit' class='btn btn-xs- btn-info btn-flat' href='".base_url()."$module/logo/edit/{$value['id']}'>Sửa</a>
                      </td>";
                echo "<td>
                        <a title='Del' class='btn btn-xs- btn-danger btn-flat' href='".base_url()."$module/logo/del/{$value['id']}' onclick='return confirm_delete(\"Bạn chắc chắn muốn xóa?\")'>Xóa</a>
                      </td>";
                echo "</tr>";
              }
            ?>
          </table>
          </div> 
          <br>
          <hr>
          <div class="col-md-6 col-md-offset-3 text-center">
            <button class="btn btn-primary btn-block add">Thêm Logo</button> 
          </div>
          <div class="clearfix"></div>
          <hr>
          <div id="formadd">
            <form method="post" action="" enctype="multipart/form-data" role="form" id="addlogo">
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
                  <input type="file" name="userfile" id="userfile" class="none" />
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
                  <input type="text" class="form-control s1" id="txtkeyword" name="txtkeyword" />
                </div>
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
