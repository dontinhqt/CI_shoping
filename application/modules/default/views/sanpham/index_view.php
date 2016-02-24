<script src='<?php echo base_url();?>assets/<?php echo $module; ?>/js/jquery-1.8.3.min.js'></script>
<script src='<?php echo base_url();?>assets/<?php echo $module; ?>/js/jquery.elevatezoom.js'></script>


<div class="title-widget">
	<div class="row-fluid heading-content">
		<div class="span12">
			<h4 class="title"><span>Chi tiết sản phẩm</span></h4>
		</div>
	</div>
</div>
<div class="col-md-12">
	<div class="col-md-4">
		<img id="zoom_01" src="<?php echo base_url();?>uploads/images/<?php echo $info['image'];?>" style='width:300px;height: 300px;' data-zoom-image="<?php echo base_url();?>uploads/images/<?php echo $info['image'];?>" alt="<?php echo $info['name'];?>">
	</div>
	<script>
	    $("#zoom_01").elevateZoom({scrollZoom : true});
	</script>

	<div class="col-md-7">
		<p>Lượt xem: <strong><?php echo $info['view'];?></strong></p>
		<h1><?php echo $info['name'];?></h1>
		<p><strong>Mã sản phẩm :</strong> <?php echo $info['code'];?></p>
		<p><strong>Xuất xứ :</strong> <?php echo $info['made_in'];?></p>
		<p class="des">
			<?php if($info['qty'] > 0){
				echo "( Số Lượng:".$info['qty'].")";
			}else{
				echo "<span color='red'>(Đã hết hàng)</span>";
			}?>
		</p>
		<div class="price-num price">
			<span class="price-new">Giá : <?php echo number_format($info['price']) ;?> vnđ</span> <br>
		</div>
		<?php $seo=unicode($info['name']); ?>
		<a href='<?php echo base_url()."gio-hang/$info[id]-$seo.html";?>' title="" class="btn btn-primary" >Thêm vào giỏ hàng</a>

	</div>
</div>
<div class="clearfix"></div>
<div class="container">
	<ul class="nav nav-tabs cmand">
		<li class="active"><a href="#home" data-toggle="tab" aria-expanded="true"><span>Mô tả sản phẩm</span></a></li>
		<li class=""><a href="#profile" data-toggle="tab" aria-expanded="false"><span>Comment khách hàng</span></a></li>
	</ul>
	<div id="myTabContent" class="tab-content">
		<div class="tab-pane fade active in" id="home">
			<?php echo $info['info'];?>
		</div>
		<div class="tab-pane fade" id="profile">
			<div class='fb-comments" data-href="<?php echo base_url()."san-pham/$info[id]-$seo.html";?>' data-width="100%" data-numposts="5">
			</div>

		</div>
	</div>
</div>

<div class="clearfix"></div>
<h3 class="title text-center text-primary"><span> SẢN PHẨM LIÊN QUAN</span></h3>
<div class="pro-sec clearfix wow bounceInUp" data-wow-duration="2s">
  <?php
    foreach ($lq as $value) {
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