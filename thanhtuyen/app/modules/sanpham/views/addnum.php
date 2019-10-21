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
                    <td class="lightbox"><a href="<?php echo $sp->anh;?>"><img src="<?php echo $sp->anh_thumb;?>" width="120"/></a></td>
                    <td><?php                                                                                                                               
                        echo number_format($item['2'],0,'.','.');
                        echo 'đ';                                                                                                                                                                                                          
                   ?>                                                                                                                                           
                    </td>
                    <td>
                            <input style="width:30px;text-align:center;" type="text" name="soluong<?php echo $sp->id ?>" id="soluong<?php echo $sp->id; ?>" value="<?php echo $item['1']; ?>" />                          		
                          </td>

                          <td>
                          <?php
                                $tong=($item['1'])*($item['2']);
                                echo number_format($tong,0,'.','.').' đ';
                                $sum=$sum+$tong;                                                                                                          
                            ?>
                          </td>
                          <td><a id="delete_order<?php echo $sp->id.$dem?>" class="delete_order" title="Xóa sản phẩm" style="cursor:pointer;"><img src="images/1335283990_button_cancel.png" width="20" border="0" /></a></td>
                        </tr>
                        <?php
						}?>
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
										 }
										});
						}
					   });
					  });
					 </script>
                        <?php
						$sanpham=$sanpham.'-Sản phẩm '.$dem.' | Số lượng : ['.$item['1'].' ] | Thành tiền : ['.$tong.'VNĐ]----------';
						$dem++;
					}
					?>
                    <tr class="sum_money">

                    	<td colspan="4" style="text-align: center;color:red;"><b>Tổng tiền</b></td> <td colspan="7" style="text-align:center;color:#0d81c9;"><b><?php echo number_format($sum,0,'.','.');?> VNĐ</b></td>

                    </tr>

                    <?php

					}?>

                  </table>
                  <tr>
                    <td>
                        <div id="tieptuc">
                            <a href="<?php echo base_url(); ?>" class="nut">Tiếp tực mưa hàng</a>
                            <a style="background:#f51b1b !important;" href="<?php echo site_url('sanpham/thanhtoan'); ?>" class="nut">Thanh toán</a>
                        </div>
                    </td>
                  </tr>
</table>                  