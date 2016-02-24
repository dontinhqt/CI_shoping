<!-- Content Header (Page header) -->

<section class="content-header">
  <h1>
    Admin Logo
    <small>Quản lý sản phẩm</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Admin sản phẩm</a></li>
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
                if($mess != "") echo $mess;
                ?>
              </h4>
            </div>
            
            <a href="<?php echo base_url()."$module/product/add";?>">
              <button type="button"  class="btn btn-primary pull-right" style="margin-right: 5px;">
              <i class="fa fa-plus-square-o"></i> Thêm Sản Phẩm
              </button>
            </a>


            <form name="appForm" id="appForm" method="post" action="">
              <a href="javascript:onSubmitForm('appForm','<?php echo base_url()."$module/product/del?type=multi";?>')">
                <button type="button"  class="btn btn-danger pull-left" style="margin-right: 5px;">
                <i class="glyphicon glyphicon-remove"></i> Xóa tất cả
              </button>
              </a>
              
            <table class="table table-striped">
              <thead>
                <tr>
                  <th class="title"><input type="checkbox" name="checkbox" id="checkbox" onclick="checkedAll();"></th>
                  <th>STT</th>
                  <th>Tên Sản Phẩm</th>
                  <th>Loại Sản Phẩm</th>
                  <th>Giá</th>
                  <th>Ngày Đăng</th>
                  <th>Hình Ảnh</th>
                  <th>Sửa</th>
                  <th>Xóa</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $stt=0;
                $this->load->model("Mcategorie");
                foreach ($info as $value){
                  $stt++;
                  echo "<tbody>";
                  echo "<tr>";
                  echo '<td><input type="checkbox" name="cid[]" id="cid" value="'.$value['id'].'"></td>';
                  echo "<td>$stt</td>";
                  echo "<td>{$value['name']}</td>";
                  $cate = $this->Mcategorie->getCateById($value['category']);
                  echo "<td>{$cate['cate_title']}</td>";
                  echo "<td>{$value['price']}</td>";
                  echo "<td>{$value['date']}</td>";
                  echo "<td><img src='".base_url()."uploads/images/".$value['image']."' width='100px' class='imgs' /></td>"; 
                  echo "<td><a class='btn btn-info btn-flat' href='".base_url()."$module/product/edit/{$value['id']}'> Edit</td>";
                  echo "<td><a class='btn btn-danger btn-flat' href='".base_url()."$module/product/del/{$value['id']}' onclick='return confirm_delete(\"Bạn có chắc chắn muốn xóa sản phẩm này không?\")'>Xóa</a></td>";
                  echo "</tr>";
                  echo "</tbody>";
                }
                ?>

              </tbody>
            </table>

            </form>

            <div class="paging">
              <?php echo $pagelink; ?>
            </div>
          
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>
  </div>
</section><!-- /.content -->
