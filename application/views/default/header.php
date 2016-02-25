<header>
  <div class="header clearfix">
    <div class="container">
      <div class="row">
      <!-- LOGO -->
        <?php 
          $this->load->model("Mlogo");
          $data=$this->Mlogo->listAllLogo();
        ?>
        <div class="col-md-3 col-sm-3 hidden-sm hidden-xs">
          <a href="<?php echo base_url(); ?>">
          <img src="<?php echo base_url()."uploads/images/".$data[0]['image'];?>" alt="<?php echo $data[0]['keyword'];?>" style="height: 80px;" class="img-responsive"></a>
        </div>
        <!-- END Logo -->
        <div class="col-md-6 col-sm-7 col-xs-12">
          <div class="header-search">



          </div>
        </div>
        <div class="col-md-3 col-sm-5 col-xs-12">
          <div class="cart-text">

            <div class="text-right dropdown">
              <ul class="list-unstyled list-inline wish">
                <li>
                <a data-toggle="dropdown" class="dropdown-toggle social fa  fa-shopping-cart round-border pink-color" href="#" aria-expanded="true"></a>
                  <div class="dropdown-menu items-drop">
                    <div class="line-grey"> Tất cả sản phẩm </div>
                    <?php
                      $grand_total = 0;
                      $cart = $this->cart->contents();
                      if(count($cart) > 0){
                        foreach ($cart as $key => $value) {
                          $grand_total = $grand_total + $value['subtotal'];
                    ?>
                      <div class="row mar-bot-20">
                        <a href="<?php echo base_url()."san-pham/".$value['id'].".html" ?>">
                        <div class="items-iner mar-bot-20">
                          <div class="col-xs-4 ">
                            <img alt="" src="<?php echo base_url()."uploads/images/".$value["options"]["image"];?>" style="width:56px;height:60px;margin-bottom:20px;padding-left:2px;">
                          </div>
                          <div class="col-xs-8">
                            <p class="font-13 light-grey mar-bot-0 black-imp"><?php echo $value['name']; ?></p>
                            <p class="font-13 mar-top-0"><?php echo number_format($value['price']); ?></p>
                          </div>
                        </div>
                        </a>
                      </div>
                      <div class="line-full"></div>
                      <br>
                    <?php
                        }
                      }

                    ?>
                    

                    <div class="clearfix mar-bot-10">Tổng Tiền : <span class="pull-right font-bold"><?php echo number_format($grand_total);?></span></div>
                    <div class="mar-top-30 clearfix mar-bot-20 btns">
                      <div class="col-md-6 col-xs-6">
                        <div class="row"> <a class="no-border" href="<?php echo base_url()."gio-hang.html"; ?>"><img class="img-responsive" alt="Giỏ Hàng" src="<?php echo base_url()."assets/".$module; ?>/images/view.png"></a></div>
                      </div>
                      <div class="col-md-6 col-xs-6">
                        <div class="row"> <a class="no-border" href="<?php echo base_url()."thanh-toan.html"; ?>"><img style="margin-left:4px;" class="img-responsive" alt="Thanh Toán" src="<?php echo base_url()."assets/".$module; ?>/images/checkout.png"></a></div>
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                <div class="empty text-left"><?php $cart_check = $this->cart->contents();
                        if(empty($cart_check)) {
                      echo 'Giỏ hàng!';
                  }else{
                      echo "<a href='".base_url()."gio-hang.html'>Số lượng : ".count($cart_check)." sản phẩm</a>";
                  }?>
                </div>

                </li>
              </ul>
            </div>

          </div> <!-- end cart-text -->
        </div>
      </div>
    </div>
  </div>
  <div class="below-header">
    <div class="container wow bounceInLeft" data-wow-duration="2s">
      <div class="">
        <div class="hero">
          <div class="clickablemenu ttmenu dark-style menu-red-gradient">
            <div class="navbar navbar-default" role="navigation">
              <div class="navbar-header">
              
              <div class="navbar-collapse collapse" style="background-color: #C5F8DE;">
                <ul class="nav navbar-nav">
                  <li class="dropdown ttmenu-full"><a href="<?php echo base_url(); ?>">Trang Chủ</a>
                  </li>
                  <li class="dropdown ttmenu-full"><a href="<?php echo base_url(); ?>/tat-ca-san-pham.html">Sản Phẩm</a> </li>
                  <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Giới Thiệu</a> </li>
                  <li class="dropdown ttmenu-full"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Liên Hệ</a> </li>
                </ul>
              </div>
            </div>
            <!-- end navbar navbar-default clearfix --> 
          </div>
          <!-- end menu 1 --> 
        </div>
        <!-- end hero --> 
        
      </div>
    </div>
  </div>
</header>