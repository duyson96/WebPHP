<div class="box_center">
    <div class="box_center_top"> 
        <div class="box_center_top_l">                                                      
            <a href="">Tìm thấy <?php echo $query->num_rows(); ?> kết quả sản phẩm với từ khóa "<?php echo $ten; ?>"</a> 
        </div>
        <div class="box_center_top_r"></div>
        <div class="clearfix"></div>                
    </div>      
        <div class="box_center_main">            
            <ol class="breadcrumb" style="margin-bottom:0;">                
                <li><a href="<?php echo base_url(); ?>">Trang chủ</a></li>
                <li class="active">Kết quả tìm kiếm</li>
                <div class="clear"></div>
            </ol>                           
             <?php 
                if($query->num_rows() > 0)
                {
                    $demdmsp=1;
                    foreach($query->result() as $itemsanphamcaocap)
                    {  
                                                                                                                                            
                    ?>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        <div class="sanpham_item" onmouseover='showtip("<div style=\"width:250px;\"><div style=\"background:#ed1c24;height:35px;line-height:35px;width:100%;line-height:35px;padding-left:10px;font-size:12px;font-weight:bold;color:#fff;\"><?php echo $itemsanphamcaocap->ten; ?></div><p style=\"text-align:left;padding-top:9px;padding-left:10px;margin-bottom:0;\"><strong>Giá:</strong>&nbsp;<span style=\"color:red;\"><?php if($itemsanphamcaocap->gia==0){ echo 'Liên hệ';}else{ echo number_format($itemsanphamcaocap->gia,0,'.','.').'&nbsp;'.$itemsanphamcaocap->donvitinh;}?></span></p><p style=\"text-align:left;padding-top:9px;padding-left:10px;margin-bottom:0;\"><strong>Bảo hành:&nbsp;</strong><?php echo $itemsanphamcaocap->baohanh; ?></p><?php if(($itemsanphamcaocap->khuyenmai1=='')&&($itemsanphamcaocap->khuyenmai2=='')&&($itemsanphamcaocap->khuyenmai3=='')&&($itemsanphamcaocap->khuyenmai4=='')&&($itemsanphamcaocap->khuyenmai5=='')){}else{ ?><p style=\"text-align:left;padding-top:9px;padding-left:10px;\"><strong>Khuyễn mại:&nbsp;</strong></p><span style=\"display:block;padding-left:10px;text-align:left;font-size:12px;color:#000;font-weight:normal;\"><?php echo $itemsanphamcaocap->khuyenmai1; ?></span><span style=\"display:block;padding-left:10px;text-align:left;font-size:12px;color:#000;font-weight:normal;\"><?php echo $itemsanphamcaocap->khuyenmai2; ?></span><span style=\"display:block;padding-left:10px;text-align:left;font-size:12px;color:#000;font-weight:normal;\"><?php echo $itemsanphamcaocap->khuyenmai3; ?></span><span style=\"display:block;padding-left:10px;text-align:left;font-size:12px;color:#000;font-weight:normal;\"><?php echo $itemsanphamcaocap->khuyenmai4; ?></span><span style=\"display:block;padding-left:10px;text-align:left;font-size:12px;color:#000;font-weight:normal;\"><?php echo $itemsanphamcaocap->khuyenmai5; ?></span><?php } ?><p style=\"border-top:1px solid #ddd;margin-top:10px;;text-align:left;padding-top:9px;padding-left:10px;\"><strong>Thông tin</strong></p><span style=\"display:block;padding-left:10px;text-align:left;font-size:12px;color:#000;font-weight:normal;\"><?php echo $itemsanphamcaocap->chip; ?></span><span style=\"display:block;padding-left:10px;text-align:left;font-size:12px;color:#000;font-weight:normal;\"><?php echo $itemsanphamcaocap->ram; ?></span><span style=\"display:block;padding-left:10px;text-align:left;font-size:12px;color:#000;font-weight:normal;\"><?php echo $itemsanphamcaocap->pin; ?></span><span style=\"display:block;padding-left:10px;text-align:left;font-size:12px;color:#000;font-weight:normal;\"><?php echo $itemsanphamcaocap->hedieuhanh; ?></span><span style=\"display:block;padding-left:10px;text-align:left;font-size:12px;color:#000;font-weight:normal;\"><?php echo $itemsanphamcaocap->manhinh; ?></span><span style=\"display:block;padding-left:10px;text-align:left;font-size:12px;color:#000;font-weight:normal;padding-bottom:10px;\"><?php echo $itemsanphamcaocap->camera; ?></span></div>");' onmouseout="hidetip();">
                            <?php 
                                if($itemsanphamcaocap->khuyenmai==1)
                                {
                                ?>
                                <div class="pro_gif"></div>
                                <?php 
                                }
                            ?>
                            <a href="<?php echo site_url(LocDau($itemsanphamcaocap->ten).'-sp'.$itemsanphamcaocap->id.'.html'); ?>" class="sanpham_item_img" title="<?php echo $itemsanphamcaocap->ten; ?>"><img src="<?php echo $itemsanphamcaocap->anh_thumb; ?>" title="<?php echo $itemsanphamcaocap->ten; ?>" alt="<?php echo $itemsanphamcaocap->ten; ?>"></a>
                            <a href="<?php echo site_url(LocDau($itemsanphamcaocap->ten).'-sp'.$itemsanphamcaocap->id.'.html'); ?>" class="sanpham_item_name" title="<?php echo $itemsanphamcaocap->ten; ?>"><?php echo $itemsanphamcaocap->ten; ?></a>
                            <p>
                                <?php 
                                    if($itemsanphamcaocap->gia==0)
                                    {
                                        echo 'Liên hệ';
                                    }
                                    else
                                    {
                                        echo number_format($itemsanphamcaocap->gia,0,'.','.').'&nbsp;'.$itemsanphamcaocap->donvitinh;
                                    }
                                ?>
                            </p>
                        </div>
                    </div>
                    <?php
                    if($demdmsp%4==0)
                    {
                        echo "<div class='clearfix'></div>";
                    } 
                $demdmsp++;
                }                
            }
            else
            {
            ?>
                <p style="text-align:center;color:#fff;">Dữ liệu đang cập nhật</p>
            <?php    
            }
            ?> 
            <div class="clearfix"></div>
            <div style="padding:10px;"><?php echo $pagination;?></div>                                      
        </div>
    </div>    