<?php
class Sanpham extends MainController
{
	public function __construct(){
		parent::__construct();
		$this->load->model("Mproduct");
		$this->load->library('My_PHPMailer');
	}
    public function allproduct(){
        $this->_data['titlePage']="Tất Cả Sản Phẩm";
        $this->_data['loadPage']="sanpham/sanpham_allproduct";
        $config["total_rows"]=$this->Mproduct->countAll();
        $config["per_page"]=12;
        $config["base_url"]=base_url()."default/sanpham/allproduct";
        $config["uri_segment"]=4;
        $this->load->library("pagination",$config);
        $start=$this->uri->segment(4);
        $this->_data['sanpham']=$this->Mproduct->ListAllProdcut($config["per_page"],$start);
        $this->_data['pagelink']=$this->pagination->create_links();
        $this->load->view($this->_data['path'],$this->_data);
    }

	public function chitiet($id){
		$data=$this->Mproduct->getProductById($id);
		$this->_data['titlePage']=$data['name'];
        $this->_data['loadPage']="sanpham/index_view";
		if(count($data) > 0){
			$dataUpdate=array("view"=>$data['view']+1);
			$this->Mproduct->updateViewProduct($dataUpdate,$id);
		}
		$this->_data['info']=$data;
		$this->_data['lq']=$this->Mproduct->sanphamlienquan($id);

		$this->load->view($this->_data['path'],$this->_data);
	}

    public function GetproductByCategory($ao_id){
        $start=$this->uri->segment(5);
        $this->load->model('Mcategorie');
        $result = $this->Mcategorie->getCateById($ao_id);
        $this->_data['titlePage']=$result['cate_title'];
        $this->_data['loadPage']="sanpham/sanpham_danhmuc";
        if(isset($result) && is_array($result) && count($result)){
        $this->db->select('*');
        $this->db->from('product');

        $this->db->limit(8,$start);
        $this->db->order_by("id","desc");

        $this->db->where('(category IN (SELECT cate_id FROM category WHERE lft >= '.$result['lft'].' AND rgt <= '.$result['rgt'].'))');
        $result_2 = $this->db->get()->result_array();
        $this->_data['sanpham'] = $result_2;
        }
        $this->db->from('product');
        $this->db->where('(category IN (SELECT cate_id FROM category WHERE lft >= '.$result['lft'].' AND rgt <= '.$result['rgt'].'))');
        $total_record = $this->db->count_all_results();
        $config["total_rows"]=$total_record;
        $config["per_page"]=8;
        $config["base_url"]=base_url()."default/sanpham/GetproductByCategory/".$ao_id;
        $config["uri_segment"]=5;
        $this->load->library("pagination",$config);
        $this->_data['pagelink']=$this->pagination->create_links();


        $this->load->view($this->_data['path'],$this->_data);
    }
	public function giohang(){
		$id=$this->uri->segment(2);
		$this->_data['titlePage']="Giỏ Hàng Site";
		$this->_data['loadPage']="sanpham/sanpham_giohang";
		$this->load->model("Mproduct");
		$sanpham = $this->Mproduct->getProductById($id);
		if($id){
        $this->load->model("Mproduct");
		$sanpham = $this->Mproduct->getProductById($id);
        $tensp = $sanpham['name'];
        $gia = $sanpham['price'];
        $insert_data = array(
            'id'      => $id,
            'qty'     => 1,
            'price'   => $gia,
            'name'    => $tensp,
            'options' => array('image' => $sanpham['image'],'sl'=>$sanpham['qty']),
        );
        $this->cart->insert($insert_data);
        }
		$this->load->view($this->_data['path'],$this->_data);
	}
	function remove($rowid){
        if($rowid==="all"){
                $this->cart->destroy();
        }else{
            $data = array(
                'rowid' => $rowid,
                'qty' => 0
            );
        $this->cart->update($data);
        }
        redirect(base_url("default/sanpham/giohang"));
    }


    public function update(){
    	// ajax send id & quanlity
		$data = array(
           'rowid'   => $this->input->post('id'),
           'qty'     => $this->input->post('quanlity'),
		);
	    $this->cart->update($data);
	}
	function save_order(){
		$error="";
		$this->_data['titlePage']="Đặt Mua Thành Công";
		$this->_data['loadPage']="sanpham/sanpham_success";
		$mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Username = "demo.smtp.qhonline@gmail.com";
        $mail->Password = "demoABC123";
        $from = " info@dropshipping.vn";
        $to=$this->input->post('email');
        $name="Dropshipping.vn";
        $mail->CharSet = "utf-8";
        $mail->From = $from;
        $mail->FromName="Công ty TNHH MTV Giải pháp TNET Web Dropshipping.vn";
        $mail->AddAddress($to,$name);
        $mail->AddReplyTo($from,"Dropshipping.vn");
        $mail->WordWrap = 50; // set word wrap
        $mail->IsHTML(true); // send as HTML
        $mail->Subject = "Đơn Đặt Hàng Của Bạn";
        $message="";
        if ($cart = $this->cart->contents()){
        	foreach ($cart as $item){
	        	$message.="<tr>";
	        	$message.= "<td class='text-left'>".$item['name']."</td>";
	        	$message.= " <td class='text-left'>".$item['qty']."</td>";
	        	$message.= "<td class='text-left'>".number_format($item['price'])."VNĐ</td>";
	        	$message.= "<td class='text-left'>".number_format($item['subtotal']) ."VNĐ</td>";
	        	$message.="</tr>";
        	}
        }
        $message1 = '
        Thân, <b>' .$this->input->post('name'). '<br><br>
        Cảm ơn bạn đã đặt hàng từ website của chúng tôi</a><br><br>
        Bạn vưa đặt một đơn đặt hàng với #Order <strong>9002</strong><br><br>
        <table width="720px">
        	<tr>
        		<td colspan="2"><br><br>
        			<p class="lead" style="box-sizing: border-box; padding: 0px; margin: 0px 0px 20px; list-style: none; font-size: 21px; line-height: 1.4;">
        				Đơn Đặt Hàng:</p>
        				<div class="row" style="font-family:sans-serif; color: rgb(51, 51, 51); box-sizing: border-box; margin-right: -15px; margin-left: -15px; line-height: 17.1429px;">
        					<div class="col-xs-12 table" style="box-sizing: border-box; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px; float: left; width: 100%; max-width: 100%; margin-bottom: 20px;">
        						<table class="table table-striped" style="box-sizing: border-box; border-spacing: 0px; border-collapse: collapse; margin: 0px 0px 20px; width: 100%; max-width: 100%;">
        							<thead style="box-sizing: border-box;">
        								<tr style="box-sizing: border-box;">
        									<th style="text-align: left; box-sizing: border-box; padding: 8px; line-height: 1.42857; vertical-align: bottom; border-top-width: 0px; border-bottom-width: 2px; border-bottom-style: solid; border-bottom-color: rgb(221, 221, 221);">
                                                                #Tên Mặt Hàng
        									</th>
        									<th style="text-align: left; box-sizing: border-box; padding: 8px; line-height: 1.42857; vertical-align: bottom; border-top-width: 0px; border-bottom-width: 2px; border-bottom-style: solid; border-bottom-color: rgb(221, 221, 221);">
        										Số Lượng</th>
        										<th style="text-align: left;box-sizing: border-box; padding: 8px; line-height: 1.42857; vertical-align: bottom; border-top-width: 0px; border-bottom-width: 2px; border-bottom-style: solid; border-bottom-color: rgb(221, 221, 221);">
        											Giá</th>
        											<th style="text-align: left;box-sizing: border-box; padding: 8px; line-height: 1.42857; vertical-align: bottom; border-top-width: 0px; border-bottom-width: 2px; border-bottom-style: solid; border-bottom-color: rgb(221, 221, 221);">
        												Thành Tiền</th>
        											</tr>
        										</thead>
        										<tbody style="box-sizing: border-box;">
        											' . $message . '
        										</tbody>
        									</table>
        								</div>
        							</div>
        						</td>
        					</tr>

        				</tbody>
        			</table>
        		</td>
        	</tr>
        </table>
        <span style="text-align:right">Cảm Ơn !</span>
        <br><br>
        Đây Là Email Đơn Đặt Hàng Tự Đông gữi đi. Xin cảm ơn quý khách !';
        $mail->Body =  $message1;
        $mail->AltBody = "Cảm Ơn bạn đã nhận mail của tôi - info@tnets.vn";
        //$mail->SMTPDebug = 2;
        if(!$mail->Send()){
        	$this->_data['error'] = " Lổi khi gửi mail : " . $mail->ErrorInfo.'';   
        }else{
        	$this->_data['error'] = "Đơn đặt hàng đã được gửi vào e-mail của bạn, vui lòng kiểm tra e-mail";
        }
        $customer = array(
        	'name'          => $this->input->post('name'),
        	'email'         => $this->input->post('email'),
        	'phone'         => $this->input->post('phone'),
        	'address'       => $this->input->post('address'),
        );
        $this->load->model("Muser");
        $cust_id = $this->Muser->insertGuest($customer);

        $order = array(
        	'date' => date('Y-m-d H:i:s'),
        	'idthanhvien' => $cust_id,
        	'tinh'=>$this->input->post('tinhthanh'),
        	'quan'=>$this->input->post('quan_huyen'),
        	);

        $ord_id = $this->Muser->insert_order($order);

        if ($cart = $this->cart->contents()):
        	foreach ($cart as $item):
        		$order_detail = array(
        			'orderid' => $ord_id,
        			'idsp' => $item['id'],
        			'quantity' => $item['qty'],
        			'price' => $item['price'],
        			'tongtien' => $item['subtotal'],
        			'tinhtrang'=>0,
        			);
        	$this->load->model("Mproduct");
        	$dats=$this->Mproduct->getProductById($item['id']);  
        	$sl=$item['qty'];
        	$dataUpdate = array("buys"=>$dats['buys'] + $sl);
        	$this->Mproduct->updateProdcut($dataUpdate,$item['id']);
        	$cust_id = $this->Muser->insert_order_detail($order_detail);
        	endforeach;
        	endif;
        	$this->cart->destroy();

            $mail1 = new PHPMailer();
            $mail1->IsSMTP();
            $mail1->Host = "smtp.gmail.com";
            $mail1->Port = 465;
            $mail1->SMTPAuth = true;
            $mail1->SMTPSecure = 'ssl';
            $mail1->Username = "demo.smtp.qhonline@gmail.com";
            $mail1->Password = "demoABC123";
            $from = "info@dropshipping.vn";
            $to1='info@dropshipping.vn';
            $name="Dropshipping.vn";
            $mail1->CharSet = "utf-8";
            $mail1->From = $from;
            $mail1->FromName="Dropshipping.vn";
            $mail1->AddAddress($to1,$name);
            $mail1->AddReplyTo($from,"Dropshipping.vn");
            $mail1->WordWrap = 50; // set word wrap
            $mail1->IsHTML(true); // send as HTML
            $mail1->Subject = "Đơn Đặt Hàng Của Bạn";

            $mail1->Body = "<h3>Có Một Đơn Đặt Hàng Từ website của bạn. Vui lòng vào trang quản trị để check</h3>"; //HTML Body
            $mail1->AltBody = "Cảm Ơn bạn đã nhận mail của tôi - itlc.tnus.edu.vn";
            //$mail->SMTPDebug = 2;
            if(!$mail1->Send()){
            	$this->_data['error'] = " Loi khi goi mail: " . $mail1->ErrorInfo.'';   
            }else{
            	$this->_data['error'] = "Đơn đặt hàng đã được gửi vào E-mail của bạn vui lòng kiểm tra";
            }

            $this->load->view($this->_data['path'],$this->_data);
	}

	public function thanhtoan(){
        $this->_data['titlePage']="Thanh Toán";
        $this->_data['loadPage']="sanpham/sanpham_thanhtoan";
        $this->load->view($this->_data['path'],$this->_data);
    }




    public function tinhthanh(){
		$id=$this->input->post("id");
		$this->load->model("Mproduct");
		$data=$this->Mproduct->listquanhuyen($id);
		foreach ($data as $item){
		    echo "<option value='$item[id]'>$item[name]</option>";
		}
    }
	public function show(){
		$cart = $this->cart->contents();
		echo "<pre>";
		print_r($cart);
		echo "</pre>";
	}
}