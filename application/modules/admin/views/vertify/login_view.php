<!DOCTYPE html>
<html lang="en">
<head>
    <title> Admin Login </title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">

    <!-- Web Fonts -->
    <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>

    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/page_log.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/custom.css">
</head>

<body>
<!--=== Content Part ===-->
<div class="container">
    <!--Reg Block-->
    <div class="reg-block">
        <div class="reg-block-header">
            <h2> Đăng Nhập </h2>
            <p> Đăng nhập để sử dụng hệ thống !</p>
            <?php
			    if($mess != ""){
			        echo "<div class='alert alert-warning' role='alert'>";
				        echo "<ul class='list-unstyled'>";
				        	echo "<li><i class='glyphicon glyphicon-ok color-red'></i> $mess</li>";
				        echo "</ul>";
			        echo "</div>";
			    }
		    ?>
        </div>
        <form action="<?php echo base_url()."admin/vertify/login"?>" method="post">
        <div class="input-group margin-bottom-20">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input type="text" class="form-control" placeholder="Tên truy cập" name="txtuser">
        </div>
        <div class="input-group margin-bottom-20">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input type="password" class="form-control" placeholder=" Mật khẩu " name="txtpass">
        </div>
        <p align="right"> <a href="<?php echo base_url();?>user/fogetpass">Quên mật khẩu ?</a> | <a href="<?php echo base_url();?>"> Trang chủ</a></p>
        <hr>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <input type="submit" class="btn-u btn-block" name="ok" value=" Đăng nhập ">
            </div>
        </div>
    	</form>
    </div>
    <!--End Reg Block-->
</div><!--/container-->
<!--=== End Content Part ===-->

<!-- JS Global Compulsory -->
<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- JS Implementing Plugins -->
<script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/jquery.backstretch.min.js"></script>
<script type="text/javascript">
    $.backstretch([
      "http://localhost/shoping/assets/admin/image/19.jpg",
      "http://localhost/shoping/assets/admin/image/18.jpg",
      ], {
        fade: 1000,
        duration: 7000
    });
</script>
</body>
</html>
<?php 
// $this->output->enable_profiler(TRUE);
// echo $this->db->last_query();
?>