<div class="box_center">  
    <div class="box_center_top">
        <div class="box_center_top_al">                     
            <a href="<?php echo site_url('san-pham-ban-chay.html'); ?>">Sản phẩm bán chạy</a>       
        </div> 
    </div>                 
     <div class="box_center_main">     
        <ul class="breadcrumb" style="margin:15px;">
            <li><a href="<?php echo base_url(); ?>">Trang chủ</a></li>                
            <li class="active">Sản phẩm bán chạy</li>    
            <div class="clear"></div>                        
        </ul>            
            <?php 
                if($sanphamnb->num_rows() >0)
                {
                    $sp=1;
                    foreach($sanphamnb->result() as $itemsanphamnb)
                    {                         
                        $tenallvn=$itemsanphamnb->ten;                                                                        
                    ?>
                    <div class="sanpham_item">
                        <a href="<?php echo site_url(LocDau($itemsanphamnb->ten).'-sp'.$itemsanphamnb->id.'.html'); ?>" class="sanpham_item_name" title="<?php echo $itemsanphamnb->ten; ?>"><?php echo $itemsanphamnb->ten; ?></a>
                        <a href="<?php echo site_url(LocDau($itemsanphamnb->ten).'-sp'.$itemsanphamnb->id.'.html'); ?>" class="sanpham_item_img" title="<?php echo $itemsanphamnb->ten; ?>"><img title="<?php echo $itemsanphamnb->ten; ?>" alt="<?php echo $itemsanphamnb->ten; ?>" src="<?php echo $itemsanphamnb->anh_thumb; ?>" /></a>
                        <p class="sanpham_item_gia">Giá:<span>
                        <?php 
                        if($itemsanphamnb->gia==0)
                        {
                            echo 'Liên hệ';
                        }
                        else
                        {
                            echo number_format($itemsanphamnb->gia,0,'.','.');
                        }
                        ?>
                        </span></p>
                        <a href="<?php echo site_url(LocDau($itemsanphamnb->ten).'-sp'.$itemsanphamnb->id.'.html'); ?>" class="sanpham_item_read" title="<?php echo $itemsanphamnb->ten; ?>">Chi tiết</a>
                        <p class="sanpham_item_stt">Mã SP<span><?php echo $itemsanphamnb->masp; ?></span></p>
                    </div>
                    <?php   
                        $sp++;
                    }
                }
                else
                {
                ?>
                <p style="text-align:center;">Dữ liệu đang cập nhật</p>
                <?php    
                }
            ?>
            <div class="clear"></div>                        
            <div style="padding:20px;"><?php echo $pagination;?></div>  
            <div class="clearfix"></div>       
     </div>
</div>