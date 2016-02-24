<?php
    $cart_check = $this->cart->contents();
    if(empty($cart_check)) {
        redirect(base_url());
    }else{
?>

<div class="container">
    <div class="row-fluid">
        <div class="span12">

            <div class="title-widget">
                <div class="row-fluid heading-content">
                    <div class="span12">
                        <h4 class="title">
                            <span>THANH TOÁN ĐƠN HÀNG</span>
                        </h4>
                    </div>
                </div>
            </div>

            <div class="col-md-8 border-thanhtoan">
                <form action="<?php echo base_url(); ?>thanh-toan-thanh-cong.html" method="post" id="form_thanhtoan">
                <div class="col-md-6">
                    <p class="tit">Thông tin khách hàng</p>
                    <div class="row-form clearfix">
                        <label for="" class="font-19">Họ và tên</label>
                        <div class="form-right">
                            <input type="text" required="" id="name" name="name" class="cart_buy_name" placeholder="Mời bạn nhập tên !" value="<?php if($this->session->userdata('name'))
                              echo $this->session->userdata('name'); ?>">
                        </div>
                    </div><!--row form -->
                    <div class="row-form clearfix">
                        <label for="" class="font-19">Số điện thoại</label>
                        <div class="form-right">
                            <input type="text" required="" id="phone" name="phone" class="cart_buy_phone" placeholder="Mời bạn nhập điện thoại!" value="">
                        </div>
                    </div><!--row form -->
                    <div class="row-form clearfix">
                        <label for="" class="font-19">Email</label>
                        <div class="form-right">
                            <input type="email" required="" id="email" name="email" class="cart_buy_email" placeholder="Mời bạn nhập e-mail !" value="<?php if($this->session->userdata('email'))
                              echo $this->session->userdata('email'); ?>">
                        </div>
                    </div><!--row form -->
                    <div class="row-form clearfix">
                        <p style="padding:0 15px;line-height:18px;">* Thông tin đơn hàng sẽ được gửi vào email cho quý khách</p>
                    </div><!--row form -->
                </div>
                <div class="col-md-6">
                    <p class="tit">Thông tin giao hàng</p>
                    <div class="row-form clearfix">
                        <label for="" class="font-19">Địa chỉ</label>
                        <div class="form-right">
                            <input type="text" name="address" class="cart_buy_address" value="">
                        </div>
                    </div><!--row form -->
                    <div class="row-form clearfix">
                        <label for="" class="font-19">Tỉnh / TP</label>
                        <div class="form-right">
                            <div class="select-wrap">
                                <select name="tinhthanh" id="tinhthanh">
                                    <option value="">--- Chọn 1 thành phố ---</option>
                                    <?php 
                                        $this->load->model("Mproduct");
                                        $data= $this->Mproduct->listtinhthanh();
                                        foreach($data as $item){
                                            echo "<option value='$item[id]'>$item[name]</option>";
                                        }
                                      ?>
                                </select>
                            </div>
                        </div>

                    </div><!--row form -->
                    <div class="row-form clearfix">
                        <label for="" class="font-19">Quận / Huyện</label>
                        <div class="form-right">
                            <div class="select-wrap">
                                    <select name="quan_huyen" id="quan_huyen">
                                        <option value="">---Chọn 1 quận huyện---</option>
                                        </select>
                            </div>
                        </div>
                    </div><!--row form -->
                </div>

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
                <script type="text/javascript">
                $("document").ready(function(){
                    $("#tinhthanh").change(function(){
                    var id = $(this).val();
                        $.ajax({
                        type : "POST",
                        datatype : 'text',
                        url : "<?php echo base_url('default/sanpham/tinhthanh'); ?>",
                        data : "id="+id,
                        success : function(kq){
                            $("#quan_huyen").html(kq);
                        }
                        })
                    });
                });
                </script>

                <div class="clearfix"></div>
                <div class="col-md-10 col-md-offset-1">
                    <input type="hidden" class="weight_total" name="weight_total" value="0">
                    <input type="submit" value="MUA HÀNG" class="buypd clearfix">
                    <a href="<?php echo base_url()."gio-hang.html";?>" class="clearfix backcart" style="text-decoration: none;"> Trở lại giỏ hàng</a>
                </div>

                </form>
            </div><!-- END col-md-8 -->

            <div class="col-md-4">
                <div class="cart-right">
                    <div class="tit">Giỏ hàng</div>
                    <?php if($cart = $this->cart->contents()){
                        $grand_total = 0;
                        $i = 1;
                    ?>
                    <div class="ctn-info">
                    <?php
                        foreach ($cart as $item){
                    ?>
                    <p> <?php echo $item['name']?> </p>
                    <ul>
                        <li><span>Số lượng : </span> <strong><?php echo $item['qty']?></strong></li>
                        <?php $grand_total = $grand_total + $item['subtotal']; ?>
                        <li><span>Thành tiền : </span><strong class=""><?php echo number_format($item['subtotal']) ?> VNĐ</strong></li>
                    </ul>
                    <?php
                        }
                    ?>
                    <span class="title-total">Tổng tiền : </span><strong class="big-total"><?php echo number_format($grand_total); ?> vnđ</strong>
                    </div>
                <?php
                }
                ?>
                </div>

            </div><!-- END col-md-4 -->

        </div><!-- END span12 -->
    </div><!-- END row-fluid -->
</div><!-- END container -->


<?php
    }
?>