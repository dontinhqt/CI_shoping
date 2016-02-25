<h3 class="title text-center text-primary"><span> TẤT CẢ SẢN PHẨM : <?php echo $titlePage; ?></span></h3>
<div class="pro-sec clearfix wow bounceInUp" data-wow-duration="2s">
  <?php
    foreach ($sanpham as $value) {
      $seo=unicode($value['name']);
  ?>
  <div class="pro-item col-md-3 col-sm-3 ">
    <a href="<?php echo base_url()."san-pham/$value[id]-$seo.html";?>" title="<?php echo $value['name']; ?>">
      <img src="<?php echo base_url();?>uploads/images/<?php echo $value['image'];?>" alt="<?php echo $seo ?>" class="img-responsive" style="height: 230px;width: 230px;">
    </a>
    <p class="font-15" style="height: 45px;"><?php echo $value['name']; ?></p>
    <p class="font-15 orange font-bold"><?php echo $value['price']; ?> VND</p>
    <div class="clearfix"> <a class="cart" href="<?php echo base_url()."gio-hang/$value[id]-$seo.html";?>">add to cart</a> </div>
  </div>
  <?php
    }
  ?>
</div>
<div class="paging">
  <?php echo $pagelink;?>
</div>