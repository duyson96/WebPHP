<?php 
$CI=&get_instance();
$CI->load->model('tag/tag_model');
?>
<div class="box_center">
    <div class="box_center_top">                                                   
            <a><?php echo $tag->tag; ?></a>                                                                  
    </div>     	
	<div class="box_center_main" style="padding:0 10px;">
        <ul class="breadcrumb" style="margin-bottom:0;">              
            <li><a href="<?php echo base_url(); ?>" id="a1">Trang chủ</a></li>            
            <li class="active"><?php echo $tag->tag; ?></li> 
            <div class="clear"></div>                   
        </ul> 
        <div id="thoivu_mb">
            <?php 
                foreach($query->result() as $row1mb)
                {
                    $rowmb=$CI->tag_model->getsanpham($row1mb->idnew);
                    if($rowmb->num_rows() > 0)
                    {
                        $itemsanphambyhomemb=$rowmb->row();
                        ?>
                        <div class="sanpham_mb_item">
                            <a title="<?php echo $itemsanphambyhomemb->ten; ?>" href="<?php echo site_url(LocDau($itemsanphambyhomemb->ten).'-sp'.$itemsanphambyhomemb->id.'.html'); ?>" class="sanpham_mb_item_img"><img title="<?php echo $itemsanphambyhomemb->ten; ?>" alt="<?php echo $itemsanphambyhomemb->ten; ?>" src="<?php echo $itemsanphambyhomemb->anh_thumb; ?>"></a>                                
                            <a title="<?php echo $itemsanphambyhomemb->ten; ?>" href="<?php echo site_url(LocDau($itemsanphambyhomemb->ten).'-sp'.$itemsanphambyhomemb->id.'.html'); ?>" class="sanpham_mb_item_name"><?php echo $itemsanphambyhomemb->ten; ?></a>
                            <p class="sanpham_mb_item_gia">Giá:<span>
                                <?php 

                                if($itemsanphambyhomemb->gia==0)

                                {

                                    echo 'Vui lòng gọi';

                                }

                                else

                                {

                                    echo number_format($itemsanphambyhomemb->gia,0,'.','.').'&nbsp;'.$itemsanphambyhomemb->donvitinh;

                                }

                                ?>

                                </span>
                            </p>                                
                            <a title="<?php echo $itemsanphambyhomemb->ten; ?>" href="<?php echo site_url(LocDau($itemsanphambyhomemb->ten).'-sp'.$itemsanphambyhomemb->id.'.html'); ?>" class="sanpham_mb_item_read"><i class="fa fa-caret-right fw"></i>&nbsp;Chi tiết</a>
                            <div class="clearfix"></div>
                        </div>
                        <?php    
                    }
                }
            ?>
        </div>
        <div id="thoivu_desk">                       
		<?php         		          
			$dem=1;
			foreach($query->result() as $row1)
			{
				$row=$CI->tag_model->getsanpham($row1->idnew);
                if($row->num_rows() > 0)
                {
                    $itemsanphambyhome=$row->row();                                                                    
                ?>
                <div class="sanpham_item1" style="margin-bottom:10px;">
                    <a href="<?php echo site_url(LocDau($itemsanphambyhome->ten).'-sp'.$itemsanphambyhome->id.'.html'); ?>" class="sanpham_item_img" title="<?php echo $itemsanphambyhome->ten; ?>"><img src="<?php echo $itemsanphambyhome->anh_thumb; ?>" title="<?php echo $itemsanphambyhome->ten; ?>" alt="<?php echo $itemsanphambyhome->ten; ?>"></a>
                    <a href="<?php echo site_url(LocDau($itemsanphambyhome->ten).'-sp'.$itemsanphambyhome->id.'.html'); ?>" class="sanpham_item_name" title="<?php echo $itemsanphambyhome->ten; ?>"><?php echo $itemsanphambyhome->ten; ?></a>
                    <p>
                    <?php 
                        if($itemsanphambyhome->gia==0)
                        {
                            echo 'Vui lòng gọi';
                        }
                        else
                        {
                            echo number_format($itemsanphambyhome->gia,0,'.','.').'&nbsp;'.$itemsanphambyhome->donvitinh;
                        }
                    ?>
                    </p>
                </div> 
	          <?php 
		         }
                 $dem++;
            }		
		?>    
        <div class="clearfix"></div>      
		<div style="padding:10px;"><?php echo $pagination;?></div> 
        </div>   
        <div class="clearfix"></div>                        
	</div>    
    <div class="clear"></div>	
</div>
