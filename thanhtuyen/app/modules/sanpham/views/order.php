<div class="box_center">
	<div class="box_center_top">
		<div class="box_center_top_l">    
			<a class="cufont_text">Giỏ hàng</a>
		</div>
		<div class="box_center_top_r"></div>
		<div class="clearfix"></div>     
	</div>
	<div class="box_center_main"> 
		<ol class="breadcrumb">                
			<li><a href="<?php echo base_url(); ?>" id="a1"><i style="font-size:20px;color:#205d9d;" class="fa fa-home"></i></a></li>
			<li class="active">Giỏ hàng</li>
		</ol>   
		<div id="content_b" style="padding:0 10px;">
			<div class="mid product_overlay" >
				<?php 
					if(isset($_SESSION['sanpham']))
					{
						if($_SESSION['sanpham']!='')
						{
						?>
						<p class="intro_h" style="font-size:20px;font-weight:bold;">Sản phẩm trong giỏ hàng của bạn</p>                    
							<div id="list_order">
								<div class="sanpham_mb">
									<table class="">
							            <tr id="title_table">							                      
					                      <td class="">Sản phẩm</td>
					                      <td class="">Thông tin</td>
							            </tr>
							            <?php
									$str=$_SESSION['sanpham'];
									if($str!='')
									{
										$num=explode(",",$str);
										$dem=1;
										$sum=0;
										$sanpham='';
										foreach($num as $row)
										{
											$item=explode("-",$row);
											{												
												$this->db->where('id',$item['0']);
												$sp=$this->db->get('tblsanpham')->row();
												?>
												<tr class="item_or" id="tr_<?php echo $sp->id.$dem?>">													
													<td><b style="display:block;"><?php echo $sp->ten;?></b>
														<img src="<?php echo $sp->anh_thumb;?>" width="120" style="text-align: center;"/>
														<p><a onclick="confirm('Bạn có thật sự muốn xóa?')" href="<?php echo site_url('sanpham/delete_order1/'.$row); ?>"><img src="images/1335283990_button_cancel.png" width="20" border="0" /></a></p>
													</td>													
													<td>
														 <p>Số lượng: <input style="width:30px;text-align:center;" type="text" name="soluong1<?php echo $sp->id ?>" id="soluong1<?php echo $sp->id; ?>" value="<?php echo $item['1']; ?>" />   </p>                            
														 <p>Giá: 
														<?php                           															
															//echo number_format($item['2'],0,'.','.');
															//echo 'đ';														                                                                                                                                                   
													   ?>	
													   </p>																																				
													<?php
														$tong=($item['1'])*($item['2']);
														echo number_format($tong,0,'.','.').' đ';
														$sum=$sum+$tong;															                                              
													?>
													</td>													
												</tr>
												<?php
											}
											?>
											<script type="text/javascript">
												jQuery(document).ready(function(){
													jQuery("#soluong1<?php echo $sp->id;?>").change(function(){
														var soluong1 = $("#soluong1<?php echo $sp->id;?>").val();
														jQuery.ajax({
															cache: false,
															type:"POST",
															data:{soluong1 : soluong1},
															url:"<?php echo site_url('sanpham/addnum1/'.$sp->id);?>",
															success:function(html){
																$("#list_order").html(html);                         
															}
														});
													});
												});
											</script>
											<script type="text/javascript">
												jQuery(document).ready(function(){
													jQuery("#delete_order<?php echo $sp->id.$dem?>").click(function(){
														r = confirm("Bạn có thật sự muốn xóa?");  
														if(r == false) return false;
														else
														{
															jQuery.ajax({
																cache: false,
																type:"POST",
																url:"<?php echo site_url('sanpham/delete_order/'.$row);?>",
																success:function(html){
																	$("#tr_<?php echo $sp->id.$dem?>").hide();
																	$("#list_order").html(html);
																	window.location.reload();
																}
															});
														}
													});
												});
											</script>
											<?php
												$sanpham=$sanpham.'-Sản phẩm '.$dem.' | Số lượng : ['.$item['1'].' ] | Thành tiền : ['.$tong.'đ]----------';
												$dem++;
										}
										?>
										<tr class="sum_money">                    											
											<td style="color:#0d81c9;" colspan="2">
												<b>Tổng tiền:<b><?php echo number_format($sum,0,'.','.').'&nbsp;đ';?></b>
											</td>
										</tr>
										<tr>
											<td colspan="2">
												<div id="tieptuc">
                            <a href="<?php echo base_url(); ?>" class="nut">Tiếp tục mua hàng</a>
                            <a style="background:#f51b1b !important;" href="<?php echo site_url('sanpham/thanhtoan'); ?>" class="nut">Thanh toán</a>
                        </div>
											</td>
										</tr>
										<?php

									}?>									
							        </table>
								</div>
								<div class="sanpham_desk">
								<table>
									<tr id="title_table">
									  <td>STT</td>
									  <td>Tên sản phẩm</td>
									  <td>Ảnh</td>
									  <td>Đơn giá</td>
									  <td>Số lượng</td>
									  <td>Thành tiền</td>
									  <td>Xóa</td>
									</tr>
									<?php
									$str=$_SESSION['sanpham'];
									if($str!='')
									{
										$num=explode(",",$str);
										$dem=1;
										$sum=0;
										$sanpham='';
										foreach($num as $row)
										{
											$item=explode("-",$row);
											{												
												$this->db->where('id',$item['0']);
												$sp=$this->db->get('tblsanpham')->row();
												?>
												<tr class="item_or" id="tr_<?php echo $sp->id.$dem?>">
													<td><?php echo $dem;?></td>
													<td><b><?php echo $sp->ten;?></b></td>
													<td class="lightbox" style="text-align:center;">
														<a href="<?php echo $sp->anh;?>"><img src="<?php echo $sp->anh_thumb;?>" width="120" style="text-align: center;"/></a>
													</td>
													<td>
														<?php                           															
															echo number_format($item['2'],0,'.','.');
															echo 'đ';														                                                                                                                                                   
													   ?>
													</td>
													<td>
														<br />
														<input style="width:30px;text-align:center;" type="text" name="soluong<?php echo $sp->id ?>" id="soluong<?php echo $sp->id; ?>" value="<?php echo $item['1']; ?>" />                              
													</td>
													<td>
													<?php
														$tong=($item['1'])*($item['2']);
														echo number_format($tong,0,'.','.').' đ';
														$sum=$sum+$tong;															                                              
													?>
													</td>
													<td>
														<a id="delete_order<?php echo $sp->id.$dem?>" class="delete_order" title="Xóa sản phẩm" style="cursor:pointer;"><img src="images/1335283990_button_cancel.png" width="20" border="0" /></a>
													</td>
												</tr>
												<?php
											}
											?>
											<script type="text/javascript">
												jQuery(document).ready(function(){
													jQuery("#soluong<?php echo $sp->id;?>").change(function(){
														var soluong = $("#soluong<?php echo $sp->id;?>").val();
														jQuery.ajax({
															cache: false,
															type:"POST",
															data:{soluong : soluong},
															url:"<?php echo site_url('sanpham/addnum/'.$sp->id);?>",
															success:function(html){
																$("#list_order").html(html);                         
															}
														});
													});
												});
											</script>
											<script type="text/javascript">
												jQuery(document).ready(function(){
													jQuery("#delete_order<?php echo $sp->id.$dem?>").click(function(){
														r = confirm("Bạn có thật sự muốn xóa?");  
														if(r == false) return false;
														else
														{
															jQuery.ajax({
																cache: false,
																type:"POST",
																url:"<?php echo site_url('sanpham/delete_order/'.$row);?>",
																success:function(html){
																	$("#tr_<?php echo $sp->id.$dem?>").hide();
																	$("#list_order").html(html);
																	window.location.reload();
																}
															});
														}
													});
												});
											</script>
											<?php
												$sanpham=$sanpham.'-Sản phẩm '.$dem.' | Số lượng : ['.$item['1'].' ] | Thành tiền : ['.$tong.'đ]----------';
												$dem++;
										}
										?>
										<tr class="sum_money">                    
											<td colspan="4" style="text-align: center;color:red;"><b>Tổng tiền</b></td> 
											<td style="text-align:center;color:#0d81c9;" colspan="7">
												<b><?php echo number_format($sum,0,'.','.').'&nbsp;đ';?></b>
											</td>
										</tr>
										<?php

									}?>
									<tr>
										<td colspan="7">                        
											<div id="tieptuc">
												<a href="<?php echo base_url(); ?>" class="nut">Tiếp tục mua hàng</a>
												<a style="background:#7fc142 !important;" href="<?php echo site_url('sanpham/thanhtoan'); ?>" class="nut">Thanh toán</a>
											</div>
										</td>
									 </tr>

								</table> 
								</div>                
							</div><!--End #list_order-->
							<?php   
						}
					}
					else
					{
					?>
					<p style="text-align:center;font-weight:bold;font-size:18px;font-family:Tahoma;">Hiện không có sản phẩm nào trong giỏ hàng</p>
					<?php    
					}
					?>                                                        
			</div><!--End product_overlay-->                            
		</div><!--End #content_b-->      
	 </div>     
</div>
                         