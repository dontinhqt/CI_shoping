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
            <form class="form-inline">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                  </div>
                  <input type="text" class="form-control item-header" placeholder="Nhập từ khóa tìm kiếm...">
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-3 col-sm-5 col-xs-12">
          <div class="cart-text">
            <div class="text-right dropdown">
              <ul class="list-unstyled list-inline wish">
                <li> <a data-toggle="dropdown" class="dropdown-toggle social fa  fa-shopping-cart round-border pink-color" href="#" aria-expanded="true"></a>
                  <div class="dropdown-menu items-drop">
                    <div class="line-grey"> Recently Added Item(s) </div>
                    <div class="row mar-bot-20">
                      <div class="items-iner mar-bot-20">
                        <div class="col-xs-4 "><img alt="" src="assets/images/party-shirt.jpg" style="width:56px;height:60px;
                      margin-bottom:20px;
                      padding-left:2px;"></div>
                        <div class="col-xs-8">
                          <p class="font-13 light-grey mar-bot-0 black-imp">Et harum quide dress</p>
                          <p class="font-13 mar-top-0">01 X $260.00<a href="#"><span class="pull-right"><img src="assets/images/delete.png" alt="" class="img-responsive"></span></a></p>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="line-full"></div>
                    <br>
                    <div class="row mar-bot-20">
                      <div class="items-iner mar-bot-20">
                        <div class="col-xs-4 "><img alt="" src="assets/images/party-shirt.jpg" style="width:56px;height:60px;
                      margin-bottom:20px;
                      padding-left:2px;"></div>
                        <div class="col-xs-8">
                          <p class="font-13 light-grey mar-bot-0 black-imp">Et harum quide dress</p>
                          <p class="font-13 mar-top-0">01 X $260.00<a href="#"><span class="pull-right"><img src="assets/images/delete.png" alt="" class="img-responsive"></span></a></p>
                        </div>
                      </div>
                    </div>
                    <div class="line-full"></div>
                    <br>
                    <div class="clearfix mar-bot-10">SUBTOTAL:<span class="pull-right font-bold">$780.00 </span></div>
                    <div class="mar-top-30 clearfix mar-bot-20 btns">
                      <div class="col-md-6 col-xs-6">
                        <div class="row"> <a class="no-border" href="#"><img class="img-responsive" alt="" src="assets/images/view.png"></a></div>
                      </div>
                      <div class="col-md-6 col-xs-6">
                        <div class="row"> <a class="no-border" href="#"><img style="margin-left:4px;" class="img-responsive" alt="" src="assets/images/checkout.png"></a></div>
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <p class="text-left"><span class="font-bold">My</span> Bag (02)<br>
                    $ 260.00</p>
                </li>
              </ul>
            </div>
          </div>
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
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a class="navbar-brand hidden-md hidden-lg visible-sm visible-xs" href="#"><img src="assets/images/logo-no-line.jpg" alt=""></a> </div>
              <!-- end navbar-header -->
              



              <div class="navbar-collapse collapse" style="background-color: #C5F8DE;">
                <ul class="nav navbar-nav">
                  <li class="dropdown ttmenu-full"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Trang Chủ</a>
                  </li>
                  <li class="dropdown ttmenu-full"><a href="home-2.html" data-toggle="dropdown" class="dropdown-toggle">Sản Phẩm</a> </li>
                  <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">blog</a> </li>
                  <li class="dropdown ttmenu-full"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Portfolio</a> </li>
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