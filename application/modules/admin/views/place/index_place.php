<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Admin Địa Điểm
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Admin Địa Điểm</a></li>
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
                if(isset($mess) && $mess!="") echo $mess;
                ?>
              </h4>
            </div>
            <a href="<?php echo base_url()."$module/place/addplace";?>"><button type="button"  class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-plus-square-o"></i> Thêm Thông tin công ty</button>
            </a><br><br>
            <table class="table table-hover">
            <tr class="bg-blue">
              <th>STT</th>
              <th>Địa Chỉ</th>
              <th>Thông Tin</th>
              <th>Địa Chỉ Map</th>
               <th>Sửa</th>
              <th>Xóa</th>
            </tr>
            <?php
              $stt = 0;
              foreach ($place as $value) {
                $stt++;
                echo "<tr>";
                echo "<td>$stt</td>";
                echo "<td>{$value['name']}</td>";
                echo "<td>{$value['adress']}</td>";
                echo "<td>{$value['map']}</td>";
                echo "<td><a class='btn btn-xs- btn-info btn-flat'  href='".base_url()."$module/place/edit/{$value['id']}' onclick=''>Sửa</a></td>";
                echo "<td>
                        <a title='Del' class='btn btn-xs- btn-danger btn-flat' href='".base_url()."$module/place/del/{$value['id']}' onclick='return confirm_delete(\"Bạn chắc chắn muốn xóa?\")'>Xóa</a>
                      </td>";
                echo "</tr>";
              }
            ?>
          </table>
          </div>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>
  </div>
</section><!-- /.content -->

