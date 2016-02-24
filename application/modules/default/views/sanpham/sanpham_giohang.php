<div class="title-widget">
  <div class="row-fluid heading-content">
  <div class="span12">
    <h4 class="title"><span>Chi tiết sản phẩm</span></h4>
  </div>
  </div>
</div>

<div class="table-responsive" style="min-height: .01%;overflow-x: auto;">
	<table class="table  table-bordered" id="giohang">
		<thead>
			<tr>
				<th>Hình ảnh</th>
				<th>Tên sản phẩm</th>
				<th>Số lượng</th>
				<th>Đơn giá</th>
				<th>Thành tiền</th>
				<th>Hủy</th>
			</tr>
		</thead>
		<tbody>
		<?php $cart = $this->cart->contents();
			if(empty($cart)) {
				echo ' <tr><td>Giỏ Hàng Của Bạn Chưa Có Sản Phẩm Nào !</td></tr>';
			}
			$grand_total = 0;
			if($cart)
			{
				$grand_total = 0;
				foreach ($cart as $item){
		?>
				<tr>
					<td>
						<img src="<?php echo base_url();?>uploads/images/<?php echo $item['options']['image'];?>" class="img-responsive" style="height:100px;">
					</td>
					<td><?php echo $item['name'];?> </td>
					<td>
						<input type="text" class="form-control qty" onkeyup="return updatePrice(this,'<?php echo $item['rowid'];?>','<?php echo $item['options']['sl'];?>')" value="<?php echo $item['qty'];?>" id="itemProduct[<?php echo $item['rowid'];?>]" ids="<?php echo $item['rowid']?>" name="<?php echo $item['rowid']?>" >

						<input type="hidden" value="<?php echo $item['price']?>" id="price_<?php echo $item['rowid'];?>" name="price_<?php echo $item['rowid'];?>">
					</td>
					<?php $grand_total = $grand_total + $item['subtotal']; ?>
					<td style="color:#159ec6;">
						<?php echo number_format($item['price']);?> VNĐ
					</td>
					<td style="color:red;">
						<span class="spanSoTien" id="thanhtien_<?php echo $item['rowid']?>"><?php echo number_format($item['subtotal']);?>VNĐ</span>
					</td>
					<td>
						<a href="<?php echo base_url('default/sanpham/remove/' . $item['rowid']); ?>"><img src="<?php echo base_url();?>assets/<?php echo $module; ?>/images/huygiohang.png" class="img-responsive" style="height:20px; margin:auto;"></a>
					</td>
				</tr>
		<?php 	}
			}
		?>
		</tbody>
		<tr class="tbody all-total">
			<td></td>
			<td></td>
			<td class="total td">
				<button type="submit" onclick="muahang()" class="btn btn-primary">Tiếp tục mua hàng</button>
			</td>
			<td class="price td">
				<button type="submit" onclick="thanhtoan()" class="btn btn-success">Thanh Toán</button>
			</td>
			<td class="price td" id="tongtienxx">
				<?php echo number_format($grand_total); ?> vnđ
			</td>
			<td class="price td">
				<button type="button" class="btn btn-danger" onclick="clear_cart()">Xóa giỏ hàng</button>
			</td>
		</tr>
	</table>
</div>
<br>
<div class="pull-right">
	<i class="cart-icon"></i>
	<div class="bot-info">
		<!-- <p><strong>Tổng tiền:</strong> <b id="tongtienxx"><?php echo number_format($grand_total);?>vnđ</b></p> -->
		<p style="color:#999">Phí giao hàng (nếu có) sẽ được tính khi khách hàng nhập địa chỉ giao hàng</p>
	</div>
</div>


<script type="text/javascript">
  	function formatCurrency(num) {
	  	num = num.toString().replace(/\$|\,/g,'');
	  	if(isNaN(num))
	  		num = "0";
	  	sign = (num == (num = Math.abs(num)));
	  	num = Math.floor(num*100+0.50000000001);
	  	cents = num%100;
	  	num = Math.floor(num/100).toString();
	  	if(cents<10)
	  		cents = "0" + cents;
	  	for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
	  		num = num.substring(0,num.length-(4*i+3))+'.'+
	  	num.substring(num.length-(4*i+3));
	            return (((sign)?'':'-') + '' + num);
	}
	function updatePrice(me,idpro,sl) {
		var value=parseInt(me.value);
		var soluong=sl;
		var m_price_id="#price_"+idpro;
		$.ajax({
			url: baseurl+'default/sanpham/update',
			data: {id:idpro,quanlity:value},
			type: 'post',
			success: function(data){
				console.log("don tinh");
				// console.log(data);
				var m_price = parseInt($(m_price_id).val());
				var m_total = value*m_price;
				m_total = (m_total>0)? formatCurrency(m_total) + "VNĐ": "0 VNĐ";
				$('#thanhtien_'+idpro).text(m_total);
// ----------------------------------------------------------------------------
				var total=0;
				var total_qty=0;
				$("#giohang .qty").each(function(){
					var input = $(this);
					var n_id=($(input).attr('ids'));
					var quanlity = $(input).val();
					var price_id="#price_"+n_id;
					var price=$(price_id).val();
					var t_price = price;
					total += t_price*quanlity;
					total_qty+=parseInt(jQuery(input).val());
				});
				total = (total>0)?formatCurrency(total)+ " VNĐ":"0 VNĐ";
				$('#tongtienxx').text(total);
// -------------------------------------------------------------------------------
			}
		});
	}
	//Cap nhat so luong
	// function setMax(me,idpro,sl){
	// 	var value=parseInt(me.value);
	// 	var soluong=sl;
	// 	var m_price_id="#price_"+idpro;
	// 	var m_sale_off_id ="#sale_off_"+idpro;
	// 	if(soluong < value ){
	// 		alert('Số lượng sản phẩm chỉ có: '+ soluong +' Xin vui lòng chọn lại số lượng');
	// 	}else{
	// 		jQuery.ajax({
	// 			url: baseurl+'default/sanpham/update',
	// 			data: {id:idpro,quanlity:value},
	// 			type: 'post',
	// 			success: function(output) {
	// 				var m_price = parseInt(jQuery(m_price_id).val());
	// 				var m_total = value*m_price;
	// 				m_total = (m_total>0)? formatCurrency(m_total) + "VNĐ": "0 VNĐ";
	// 				jQuery('#thanhtien_'+idpro).text(m_total);
	// 				//test
	// 				var total=0;
	// 				var total_qty=0;
	// 				jQuery("form#frmMain .inputCart").each(function(){
	// 					var input = jQuery(this);
	// 					var n_id=(jQuery(input).attr('ids'));
	// 					var quanlity = jQuery(input).val();
	// 					var price_id="#price_"+n_id;
	// 					var price=jQuery(price_id).val();
	// 					var t_price = price;
	// 					total += t_price*quanlity;
	// 					total_qty+=parseInt(jQuery(input).val());
	// 				});
	// 				total = (total>0)?formatCurrency(total)+ " VNĐ":"0 VNĐ";

	// 				jQuery('.subTotalTd').text(total);
	// 				jQuery('.totalQuanlity').text(formatCurrency(total_qty));
	// 				jQuery('.totalPrice').text(total);
	// 			}
	// 		});
	// 	}
	// }
</script>
<script type="text/javascript">
    function clear_cart(){
        var result = confirm('Bạn muốn xóa giỏ hàng ?');
        if (result){
            window.location = "<?php echo base_url('default/sanpham/remove/all'); ?>";
        }
        else{
            return false;
        }
    }
    function thanhtoan(){
    	window.location.href = baseurl+'thanh-toan.html';
	}
    function muahang(){
    	window.location.href = baseurl;
    }
</script>