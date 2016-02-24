<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <ul class="sidebar-menu">
      <li class="treeview">
        <a href="#">
          <i class="glyphicon glyphicon-euro"></i> <span>Quản lý sản phẩm</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="<?php echo base_url()."admin/product/index"?>"><i class="fa fa-circle-o"></i> Danh sách sản phẩm</a></li>
          <li class="active"><a href="<?php echo base_url()."admin/product/index2"?>"><i class="fa fa-circle-o"></i> Danh sách sản phẩm datables</a></li>
          <li><a href="<?php echo base_url()."admin/category/index"?>"><i class="fa fa-circle-o"></i> Danh mục</a></li>
        </ul>
      </li>
      

      <li class="treeview">
        <a href="#">
          <i class="fa fa-laptop"></i>
          <span>Cấu hình website</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url()."admin/banner/index"?>"><i class="
glyphicon glyphicon-apple"></i> Banner</a></li>
          <li><a href="<?php echo base_url()."admin/logo/index"?>"><i class="glyphicon glyphicon-tree-deciduous"></i> Logo</a></li>
          <li><a href="<?php echo base_url()."admin/seo/index"?>"><i class="glyphicon glyphicon-signal"></i> Seo</a></li>
          <li><a href="<?php echo base_url()."admin/slider/index"?>"><i class="glyphicon glyphicon-circle-arrow-right"></i> Sliders</a></li>
          <li><a href="<?php echo base_url()."admin/place/index"?>"><i class="glyphicon glyphicon-map-marker"></i> <span>Địa điểm</span></a></li>

        </ul>
      </li>
      <li class="treeview">
        <a href="<?php echo base_url()."admin/new/index"?>">
          <i class="fa fa-edit"></i> <span>Quản lý tin tức</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-table"></i> <span>Quản lí khách hàng</span>
        </a>
      </li>
      <li>
        <a href="pages/calendar.html">
          <i class="fa fa-calendar"></i> <span>Đơn đạt hàng</span>
        </a>
      </li>
      <li class="treeview">
        <a href="<?php echo base_url()."admin/introduce/index"?>">
          <i class="glyphicon glyphicon-globe"></i> <span>Giới thiệu</span>
        </a>
      </li>
      <li class="treeview">
        <a href="<?php echo base_url()."admin/user/index"?>">
          <i class="glyphicon glyphicon-user"></i> <span>Quản trị viên</span>
        </a>
      </li>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
<script type="text/javascript">
  $('.treeview').click(function(){
    $('.treeview').removeClass("active");
    $(this).addClass("active");
});
</script>