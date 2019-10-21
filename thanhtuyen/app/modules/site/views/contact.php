<?php
$CI=&get_instance();
$CI->load->model('site/site_model');
$contactinfo=$CI->site_model->gettablename('tblthongtincongty','id,tencongty,diachi,dienthoai,dienthoai2,dienthoai3,dienthoai4,dienthoai5','');
$tencongtyctvn=$contactinfo->tencongty;
$diachictvn=$contactinfo->diachi;
$address = get_infor_from_address($contactinfo->diachi);
?> 
<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script>
	function initialize() {
		var myLatlng = new google.maps.LatLng(20.643035,105.921335);
		var mapOptions = {
			zoom: 16,
			center: myLatlng
		};
		var map = new google.maps.Map(document.getElementById('div_id'), mapOptions);
		var contentString = "<table><tr><th><?php echo $tencongtyctvn; ?></th></tr><tr><td><strong>Địa chỉ:</strong>:&nbsp;<?php echo $diachictvn; ?></td></tr><tr><td><strong>Hỗ trợ sửa chữa phần cứng:</strong>:&nbsp;<?php echo $contactinfo->dienthoai; ?></td></tr><tr><td><strong>Hỗ trợ sửa lỗi phần mềm:</strong>:&nbsp;<?php echo $contactinfo->dienthoai2; ?></td></tr><tr><td><strong>Hỗ trợ mua trả góp:</strong>:&nbsp;<?php echo $contactinfo->dienthoai3; ?></td></tr><tr><td><strong>Sim số thẻ cào:</strong>:&nbsp;<?php echo $contactinfo->dienthoai4; ?></td></tr><tr><td><strong>Khuyễn nại chất lượng, dịch vụ:</strong>:&nbsp;<?php echo $contactinfo->dienthoai5; ?></td></tr></table>";
		var infowindow = new google.maps.InfoWindow({
			content: contentString
		});
		var marker = new google.maps.Marker({
			position: myLatlng,
			map: map,
			title: '<?php echo $tencongtyctvn; ?>'
		});
		infowindow.open(map, marker);
	}
	google.maps.event.addDomListener(window, 'load', initialize);
</script>
<div class="box_center">
    <div class="box_center_top"> 
    	<div class="box_center_top_l">                                       
        	<a href="">Liên hệ</a>   
        </div> 
        <div class="box_center_top_r"></div>
        <div class="clearfix"></div>                                                                                                                         
    </div>         
        <div class="box_center_main" style="padding:0 10px;">                             
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>"><i style="font-size:20px;color:#f36e1e;" class="fa fa-home"></i></a></li>
                <li class="active">Liên hệ</li>
                
            </ol>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3733.6578291654937!2d105.91912501444843!3d20.642799406218963!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135c927c1713407%3A0x1a1456c049e09d8c!2zU2hvcCDEkGnhu4duIFRob-G6oWkgMlQuTW9iaWxlLVRoYW5oIFR1eeG7g24!5e0!3m2!1svi!2s!4v1462412043929" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div id="info_contact" style="padding-top:15px;padding-right:15px;">                           
             <div style="font-size:13px;font-family:arial;">                        
            <ul>
				<li id="name-contact">
				    <h3 style="margin:0;background:none;margin-bottom:10px;color:#ed1c24;font-size:18px;font-weight:bold;text-transform:uppercase;"><?php echo $tencongtyctvn; ?></h3>
				</li>                
				<li style="color:#333;"><span><b>Địa chỉ:</b></span>&nbsp;<?php echo $diachictvn; ?></li>                                                             
				<li style="color:#333;"><span><b>Hỗ trợ sửa chữa phần cứng:</b></span>&nbsp;<?php echo $contactinfo->dienthoai; ?></li>                                
				<li style="color:#333;"><span><b>Hỗ trợ sửa lỗi phần mềm:</b></span>&nbsp;<?php echo $contactinfo->dienthoai2; ?></li>
				<li style="color:#333;"><span><b>Hỗ trợ mua trả góp:</b></span>&nbsp;<?php echo $contactinfo->dienthoai3; ?></li>
				<li style="color:#333;"><span><b>Sim số thẻ cào:</b></span>&nbsp;<?php echo $contactinfo->dienthoai4; ?></li>
				<li style="color:#333;"><span><b>Khiếu nại chất lượng, dịch vụ:</b></span>&nbsp;<?php echo $contactinfo->dienthoai5; ?></li>
            </ul>
        </div>  
            
        <div>
        <?php 
            if(isset($errors_register))
            {
                echo $errors_register;
            }
            elseif(isset($kq))
            {
                echo $kq;
            }
        ?>
        <form method="post" name="frmcontact" action="<?php echo site_url('site/docontact'); ?>">				
				<div class="request-formm">
					<div class="caption">
						<span>Họ và tên:</span>
					</div>
					<div class="column">
						<input type="text" name="txthoten" value=""/>
					</div>
				</div>
				<div class="request-formm">
					<div class="caption">
						<span>Địa chỉ:</span>
					</div>
					<div class="column">
						<input type="text" name="txtdc" value=""/>
					</div>
				</div>
				<div class="request-formm">
					<div class="caption">
						<span>Điện thoại:</span>
					</div>
					<div class="column">
						<input type="text" name="txtdt" value=""/>
					</div>
				</div>
				<div class="request-formm">
					<div class="caption">
						<span>Email:</span>
					</div>
					<div class="column">
						<input type="text" name="txtemail" value=""/>
					</div>
				</div>
				<div class="request-formm">
					<div class="caption">
						<span>Nội dung:</span>
					</div>
					<div class="column">
						<textarea rows="5" style="width:100%; " name="txtnd" id="txtnd"></textarea>
					</div>
				</div>
				<div class="request-formm">
					<br/>
					<input type="submit" class="nut" name="cbg" value="Gửi"/>
					<input type="reset" class="nut" value="Làm lại"/>
				</div>
			</form> 
			<br>           
    </div><!---------->        
        <div class="clear"></div>
    </div><!--End #info_contact-->             
                </div>
            </div>                                                                                          
    <div class="clear"></div>
    </div>       
    <div class="clear"></div>             
</div>  