<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
  $this->load->model("Mlogo");
  $logo = $this->Mlogo->listAllLogo();
  $icon = $logo['0']['image'];
?>
<link href="<?php echo base_url() . "uploads/images/$icon"; ?>" rel="icon" />

<title><?php echo $titlePage;?></title>

<!-- Font Awesome Styles -->
<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/<?php echo $module; ?>/css/font-awesome.css">
<!-- Bootstrap Styles -->

<link href="<?php echo base_url();?>assets/<?php echo $module; ?>/css/menu-horizontal.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/<?php echo $module; ?>/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/<?php echo $module; ?>/css/style-horizontal.css" rel="stylesheet">
<!--animations-->
<link href="<?php echo base_url();?>assets/<?php echo $module; ?>/css/animate.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/<?php echo $module; ?>/css/hover.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/<?php echo $module; ?>/css/style_code.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
  var baseurl = "<?php echo base_url(); ?>";
</script>
</head>
<body>
  <?php $this->load->view("$module/header");?>
  <?php
    if(isset($loadslider)){
      $this->load->view($loadslider);
    }

  ?>

<div class="clearfix"></div>
<div class="container" style="background-color: #FFFFFF;">
  <div class="col-md-9">
	 <?php $this->load->view($loadPage);?>
  </div>
  <div class="col-md-3">
    <?php
    if (uri_string()!="thanh-toan") {
      $this->load->view("$module/menu_right");
    }
   
    // $this->load->view("$module/menu_right");
    ?>
  </div>

</div>

<?php $this->load->view("$module/footer");?>
<div class="line-full"></div>
<br>
<div class="below-footer clearfix">
  <div class="container">
    <p class=" pull-left font-14">Copyright &copy; 2016 <span class="pink">NewBie.</span> </p>
    <div class="pull-right">
      <ul class="list-unstyled list-inline">
        <li><a href="#"><img src="<?php echo base_url();?>assets/<?php echo $module; ?>/images/visa.png" alt=""></a></li>
        <li><a href="#"><img src="<?php echo base_url();?>assets/<?php echo $module; ?>/images/card.png" alt=""></a></li>
      </ul>
    </div>
  </div>
</div>


<script src="<?php echo base_url();?>assets/<?php echo $module; ?>/js/jquery-v11.js"></script>

<script src="<?php echo base_url();?>assets/<?php echo $module; ?>/js/bootstrap.min.js"></script>

<script src="<?php echo base_url();?>assets/<?php echo $module; ?>/js/search.js"></script>
<script src="<?php echo base_url();?>assets/<?php echo $module; ?>/js/ttmenu.js"></script>
<script src="<?php echo base_url();?>assets/<?php echo $module; ?>/js/custom.js"></script>
<script src="<?php echo base_url();?>assets/<?php echo $module; ?>/js/menu.js"></script>
<script src="<?php echo base_url();?>assets/<?php echo $module; ?>/js/autocomplete.js"></script>
<script>
$(document).ready(function(){
  $("#left ul:first").attr("id","verticalmenu");
})
</script>
<script>

cdtd();</script>


<script src="<?php echo base_url();?>assets/<?php echo $module; ?>/js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
</body>

</html>