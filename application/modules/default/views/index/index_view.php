<h3 class="title text-center text-primary"><span> SẢN PHẨM XEM NHIỀU</span></h3>
<div class="pro-sec clearfix wow bounceInUp" data-wow-duration="2s">
  <?php
    foreach ($xemnhieu as $value) {
      $seo=unicode($value['name']);
  ?>
  <div class="pro-item col-md-3 col-sm-3 ">
    <a href="<?php echo base_url()."san-pham/$value[id]-$seo.html";?>" title="<?php echo $value['name']; ?>">
      <img src="<?php echo base_url();?>uploads/images/<?php echo $value['image'];?>" alt="<?php echo $seo ?>" class="img-responsive" style="height: 230px;width: 230px;">
    </a>
    <p class="font-15" style="height: 45px;"><?php echo $value['name']; ?></p>
    <p class="font-15 orange font-bold"><!-- <del class="light-grey lighter"></del> --><?php echo $value['price']; ?> VND</p>
    <div class="clearfix"> <a class="cart" href="<?php echo base_url()."gio-hang/$value[id]-$seo.html";?>">add to cart</a> </div>
  </div>
  <?php
    }
  ?>
</div>


<div class="clearfix"></div>
<div class="row wow home-1 bounceInLeft hidden-sm hidden-xs" data-wow-duration="2s">
  <div class="col-md-6 col-sm-12"> <img src="<?php echo base_url();?>assets/<?php echo $module; ?>/images/b-4.jpg" alt="" class="img-responsive hvr-float"></div>
  <div class="col-md-3 col-sm-3">
    <div class="row">
      <ul class="list-unstyled man-li">
        <li><img src="<?php echo base_url();?>assets/<?php echo $module; ?>/images/b-7.jpg" alt="" class="img-responsive hvr-float"></li>
        <li><img src="<?php echo base_url();?>assets/<?php echo $module; ?>/images/b-9.jpg" alt="" class="img-responsive hvr-float"></li>
      </ul>
    </div>
  </div>
  <div class="col-md-3 col-sm-3 last-item">
    <div class="row"> <img src="<?php echo base_url();?>assets/<?php echo $module; ?>/images/b-5.jpg" alt="" class="img-responsive hvr-float"></div>
  </div>
</div>


<div class="clearfix"></div>
<div class="pro-sec clearfix wow bounceInUp" data-wow-duration="2s">
  <?php
    foreach ($spmoi as $value) {
      $seo=unicode($value['name']);
  ?>
  <div class="pro-item col-md-3 col-sm-3 ">
    <a href="<?php echo base_url()."san-pham/$value[id]-$seo.html";?>" title="<?php echo $value['name']; ?>">
      <img src="<?php echo base_url();?>uploads/images/<?php echo $value['image'];?>" alt="<?php echo $seo ?>" class="img-responsive" style="height: 230px;width: 230px;" >
    </a>
    <p class="font-15" style="height: 45px;"><?php echo $value['name']; ?></p>
    <p class="font-15 orange font-bold"><!-- <del class="light-grey lighter"></del> --><?php echo $value['price']; ?> VND</p>
    <div class="clearfix"> <a class="cart" href="<?php echo base_url()."gio-hang/$value[id]-$seo.html";?>">add to cart</a> </div>
  </div>
  <?php
    }
  ?>
</div>