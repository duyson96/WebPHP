<?PHP
if(isset($primaryKey))
{
	$lastest_id=$primaryKey;
}
?>
<hr />
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript">
$(document).ready(function() 
{ 
$('#photoimg').live('change', function()	
{ 
$("#preview").html('');
$("#preview").html('<img src="images/loader.gif" alt="Uploading...."/>');
$("#imageform").ajaxForm(
{
target: '#preview'
}).submit();
});
}); 
</script>
<style>
#anh_khachsan td
{
	padding:3px 5px;
}
#ten
{
	width:200px
}
</style>
<h3><b>Nhập Màu sắc cho hình ảnh</b></h3>
	<table id="anh_khachsan">
		<tr style="padding-bottom:10px;">
        	<td><b>Chọn màu sắc</b></td>
        	<td>
        		<select name="mausac" id="mausac">
        			<option value="-1">Chọn màu sắc</option>
        			<?php 
        				$this->db->where('status',0);
        				$sqlmausacchon=$this->db->get('tblmausac');
        				if ($sqlmausacchon->num_rows()>0) 
        				{
        					foreach ($sqlmausacchon->result() as $itemmausacchon) 
        					{
        					?>
        					<option value="<?php echo $itemmausacchon->id;?>"><?php echo $itemmausacchon->tenmau;?></option>
        					<?php
        					}
        					$sqlmausacchon->free_result();
        				}
        			?>
        		</select>
        	</td>
        </tr>	
    	<tr style="padding-bottom:10px;">
        	<td><b>Tên ảnh</b></td>
            <input type="hidden" name="id" id="id" value="<?php echo $lastest_id; ?>" />
            <td><input type="text" value="" name="ten" id="ten" /></td>
        </tr>
        <tr style="padding-bottom:10px;">
        	<td><b>Hình ảnh</b></td>
            <td><form id="imageform" method="post" enctype="multipart/form-data" action='ajaximage.php'>
<input type="file" name="photoimg" id="photoimg" />
</form>
</td>
        </tr>
        <tr><td colspan="2">
<div id='preview'>
<input type="hidden" name="anh" id="anh" value="" />
</div></td></tr>
    <tr style="padding-bottom:10px;">
            <td><b>Giá</b></td>            
            <td><input type="text" value="" name="gia" id="gia" /></td>
        </tr>
        <tr style="padding-bottom:10px;">
        	<td colspan="2">
        		<input class="button" id="nhap" type="submit" value="Nhập">
            </td>
        </tr>
        <td><td colspan="2"><div id="loadding"></div></td></td>
    </table>
    <script>
	  jQuery("#nhap").click(function() { 
		//$("#loadding").html('<img src="images/loader.gif" alt="Uploading...."/>');
        var id = jQuery("#id").val();
        var mausac=jQuery("#mausac").val();						
	  	var ten = jQuery('#ten').val();  
	  	var anh = jQuery('#anh').val();
        var gia = jQuery('#gia').val();
		if(ten==""||anh=="" || mausac=='-1')
		{
			alert('Bạn chưa nhập ảnh và tên sản phẩm');
			return false;
		}
		else
		{			
            jQuery.ajax({
                                     cache:false,
                                     type:"POST",
                                     data: {id : id,ten: ten,anh: anh,mausac: mausac,gia : gia},
                                     url:"<?php echo site_url('adminhp/themanh');?>", 
                                     success:function(html){                                     
                                        alert("Cám ơn bạn đã gửi phản hồi");
                                       // jquery("#listphanhoi").hide();
                                     }                                                          
                               });  
		}
		return false;
	  }); 
</script>
    