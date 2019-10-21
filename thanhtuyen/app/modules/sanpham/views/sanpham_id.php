<script type="text/javascript">
    $(document).ready(function(){
        $('.danhmuc_item:first').css('display','block'); 
        $('.fa_tab').click(function(){
            var name=$(this).attr('title');                            
            $('.danhmuc_item').css('display','none');                            
             $('#'+name).css('display','block');
             $('.fa_tab').removeClass('active');
             $(this).addClass('active');    
        });                             
    });
</script> 
<ol class="breadcrumb" style="margin-bottom:0;margin-top:-10px;">
    <li><a href="<?php echo base_url(); ?>"><i style="font-size:20px;color:#ed1c24;" class="fa fa-home"></i></a></li>
    <li class="active">Sản phẩm</li>
    <li class="active"><?php echo $query->ten; ?></li>
</ol>
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="product_detail_img">
            <div class="product_detail_img_box">
                <img src="<?php echo $query->anh; ?>">
            </div>
        </div>
        <div class="product_detail_img_color">
            <div class="product_detail_img_color_title">Màu sản phẩm</div>
            <?php 
                $this->db->where('sanpham',$query->id);
                $sqlmausacch=$this->db->get('anh');
                if($sqlmausacch->num_rows()>0)
                {
                ?>
                <div class="product_detail_img_color_value">
                    <?php 
                        $demren=1;
                        foreach ($sqlmausacch->result() as $itemmausacch) 
                        {  

                            $this->db->where('id',$itemmausacch->tenmau);
                            $sacne=$this->db->get('tblmausac')->row();
                            ?>
                            <div class="color_value_dt" data-price="<?php echo $itemmausacch->gia; ?>" data-img="<?php echo $itemmausacch->thumb; ?>" style="background: #<?php echo $sacne->mau; ?>;"></div>
                            <?php
                            $demren++;
                        }
                    ?> 
                    <script type="text/javascript">
                        jQuery(document).ready(function(){
                            jQuery('.color_value_dt').css('cursor','pointer');
                            jQuery('.color_value_dt').click(function(){                                
                                var color_value=jQuery(this);
                                var color_value_price=color_value.attr('data-price');                                
                                var color_value_img=color_value.attr('data-img');
                                jQuery('.price').attr('data-price',color_value_price);
                                jQuery('.product_detail_img_box').html('<img src="'+color_value_img+'"/>');
                                if(jQuery('.goldwarranty').prop('checked'))
                                {
                                    var pr_th=parseInt(color_value_price)+parseInt(200000);
                                    jQuery('.price').html(number_format(pr_th,0,',','.'));
                                }
                                else
                                {
                                    jQuery('.price').html(number_format(color_value_price,0,',','.'));
                                }
                            });
                        });
                    </script>                                   
                    <div class="clearfix"></div>
                </div>
                <?php 
                }
            ?>
        </div>
    </div>
    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
        <div class="product_detail_info">
            <h1><?php echo $query->ten; ?></h1>
            <div class="product_detail_social" style="margin-right:0;">
                <ul>
                    <li><div class="fb-like" data-href="<?php echo site_url(LocDau($query->ten).'-sp'.$query->id.'.html'); ?>" data-width="450" data-layout="button_count" data-show-faces="false" data-send="false"></div></li>
                    <li><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo site_url(LocDau($query->ten).'-sp'.$query->id.'.html'); ?>">Tweet</a></li>
                    <li><div class="g-plusone" data-size="medium" data-annotation="inline" data-width="300" data-href="<?php echo site_url(LocDau($query->ten).'-sp'.$query->id.'.html'); ?>"></div></li>
                    <div class="clearfix"></div>
                </ul>
                <script type="text/javascript" orig_index="16">!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','twitter-wjs');</script>
                <script src="https://apis.google.com/js/plusone.js" type="text/javascript" orig_index="17">
                    {lang: 'vi'}
                </script>
            </div>
            <div class="product_detail_basic_info">
                <ul>
                    <li><?php echo $query->chip; ?></li>
                    <li><?php echo $query->ram; ?></li>
                    <li><?php echo $query->hedieuhanh; ?></li>
                    <li><?php echo $query->manhinh; ?></li>
                    <li><?php echo $query->pin; ?></li>
                    <li><?php echo $query->camera; ?></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="product_detail_offer">
                <p class="price" data-price="<?php echo $query->gia; ?>">
                    <span>
                        <?php 
                            if($query->gia==0)
                            {
                                echo 'Liên hệ';
                            }
                            else
                            {
                                echo number_format($query->gia,0,'.','.');
                            }
                        ?>
                    </span>
                    <span style="font-size: italic;"><sup><?php echo $query->donvitinh; ?></sup></span>
                    <span class="instock">
                        (
                        <?php 
                            if($query->tinhtrang==0)
                            {
                                echo 'Còn hàng';
                            }
                            else
                            {
                                echo 'Hết hàng';
                            }
                        ?>)
                    </span>
                </p>
                <p class="warranty">Bảo hành:&nbsp;<?php echo $query->baohanh; ?></p>
                <div class="tr_gold_warranty">
                    <span class="txttext"><input type="checkbox" class="goldwarranty" value="200000"></span>
                    <span class="txtgold" onmouseover='showtip("<div style=\"width:280px;font-size:14px;line-height:23px;padding:10px;text-align:justify;color:#555;\"><b>Bảo hành vàng</b> <br />Chế độ bảo hành cao nhất, 1 đổi 1 trong vòng 15 ngày nếu máy có lỗi do nhà sản xuất.<br /> Bảo hành 12 tháng phần cứng bao gồm cả nguồn và màn hình. (Bảo hành 6 tháng với máy đã qua sử dụng, 1 đổi 1 trong 1 tuần)</div>");' onmouseout="hidetip();">Bảo hành vàng</span>
                </div>
                <script type="text/javascript">
                    function number_format(number,decimals,dec_point,thousands_sep)
                    {
                        number=(number+'').replace(/[^0-9+\-Ee.]/g,'');
                        var n=!isFinite(+number)?0:+number,prec=!isFinite(+decimals)?0:Math.abs(decimals),sep=(typeof thousands_sep==='undefined')?',':thousands_sep,dec=(typeof dec_point==='undefined')?'.':dec_point,s='',toFixedFix=function(n,prec){var k=Math.pow(10,prec);return''+(Math.round(n*k)/k).toFixed(prec);};s=(prec?toFixedFix(n,prec):''+Math.round(n)).split('.');if(s[0].length>3){s[0]=s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g,sep);}
                        if((s[1]||'').length<prec)
                        {
                            s[1]=s[1]||'';
                            s[1]+=new Array(prec-s[1].length+1).join('0');
                        }
                        return s.join(dec)+' đ';
                    }
                    jQuery(document).ready(function(){
                        jQuery('.goldwarranty').click(function(){
                            var goldwarranty=200000;
                            var data_price=$('.price').attr('data-price');
                            
                            if(data_price!='0')
                            {
                                //alert(data_price);
                                if($(this).prop('checked'))
                                {
                                    var pr_th=parseInt(data_price)+parseInt(goldwarranty);
                                    $('.price').html(number_format(pr_th,0,',','.'));
                                }
                                else{
                                    $('.price').html(number_format(data_price,0,',','.'));
                                }
                            }
                        });

                    });
                </script>
                <div class="product_detail_add_card"> 
                    <input type="hidden" name="idc" id="idc" value="<?php echo $query->id; ?>">                   
                    <a style="cursor: pointer;" class="pro_order_action" onmouseover='showtip("<div style=\"width:280px;font-size:14px;line-height:23px;padding:10px;text-align:justify;color:#555;\">Áp dụng với máy sách tay</div>");' onmouseout="hidetip();">Giảm ngay 50k khi đặt hàng</a>                    
                    <script type="text/javascript">
                        jQuery(document).ready(function(){
                            jQuery(".pro_order_action").click(function(){
                                var idc=jQuery("#idc").val(); 
                                var priceCard=jQuery('.price').attr('data-price');                                
                                jQuery.ajax({
                                    case:false,                                            
                                    type:"POST",                                            
                                    data:{idc : idc,priceCard : priceCard},
                                    url:"<?php echo site_url('sanpham/addorder_pro/');?>",
                                    success:function(html){
                                        alert('Sản phẩm đã thêm vào giỏ hàng');
                                        window.location.reload();    
                                    }                                              
                                });   
                            });
                        });
                    </script>
                    <?php 
                        $this->db->where('status',0);
                        $this->db->where('ct',1);
                        $this->db->order_by('ordernum','desc');
                        $this->db->order_by('id','desc');
                        $this->db->limit(1);
                        $sqlhuongdanmuahangct=$this->db->get('tbltintuc');
                        if($sqlhuongdanmuahangct->num_rows()>0)  
                        {  
                            $sqlhuongdanmuahangct=$sqlhuongdanmuahangct->row();                    
                        ?>
                        <a href="<?php echo site_url(LocDau($sqlhuongdanmuahangct->title).'-'.$sqlhuongdanmuahangct->id.'.html'); ?>" class="product_howToBuy">
                            <i class="icn-howtobuy"></i>
                            <span class="txt-howtobuy">Hướng dẫn<br>mua hàng</span>
                        </a>
                        <?php 
                        }
                        else
                        {
                        ?>
                        <a href="" class="product_howToBuy">
                            <i class="icn-howtobuy"></i>
                            <span class="txt-howtobuy">Hướng dẫn<br>mua hàng</span>
                        </a>    
                        <?php    
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="product_detail_promotion">
            <fieldset>
                <legend>Khuyễn mại</legend>
                <ul>
                    <li><?php echo $query->khuyenmai1; ?></li>
                    <li><?php echo $query->khuyenmai2; ?></li>
                    <li><?php echo $query->khuyenmai3; ?></li>
                    <li><?php echo $query->khuyenmai4; ?></li>
                    <li><?php echo $query->khuyenmai5; ?></li>
                </ul>
            </fieldset>
            <div class="new_promotion">
                <div class="sub-mc">
                    <div class="widget-title"><p>Thanh Tuyền Mobile</p></div>
                    <div class="div-title"></div>
                    <div class="container-sub">
                        <div class="g-ytsubscribe" data-channelid="UCsFilrMH2u0mjbu0Cw2HTkQ" data-layout="full" data-count="default" data-></div>
                    </div>
                </div>                
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<?php 
if($query->anhnho=='null'){
}
else
{
?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="anhdocu">
        <ul id="first-carousel" class="first-and-second-carousel jcarousel-skin-tango">
                <?php 
                    if(!empty($query->anhnho)){
                        $images1 =json_decode($query->anhnho); 
                        if(is_array($images1) && count($images1)>0){
                            foreach ($images1 as $image1) { 
                            ?>
                            <li><img style="height:auto !important;max-width:90% !important;" src="<?php echo  base_url().'upload/resized'.'/' . $image1; ?>" /></li>
                            <?php
                            }
                        }
                    }                                                        
                ?>
         </ul>   
    </div>
</div>
<?php 
}
?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div id="bai-viet-san-pham" class="product_detail_group">
            <div class="product_detail_group_tab">
                <p class="hboxtitle">Bài viết sản phẩm</p>
            </div>
            <div id="bvt" class="product_detail_group_main product_detail_baiviet" style="padding:10px;">
                <?php echo $query->noidung; ?>
            </div>
            <div class="showmorenew">
                <div id="xemthem">Xem thêm bài viết chi tiết ↓</div>
                <div id="rutgon">Thu gọn bài viết chi tiết ↓</div>
            </div>
            <script type="text/javascript">
                jQuery(document).ready(function(){
                    jQuery("#rutgon").css('display','none');
                    jQuery("#xemthem").click(function(){
                        jQuery("#bvt").css('height','auto');
                        jQuery("#xemthem").css('display','none');
                        jQuery("#rutgon").css('display','block');
                    });
                    jQuery("#rutgon").click(function(){
                        jQuery("#bvt").css('height','600px');
                        jQuery("#xemthem").css('display','block');
                        jQuery("#rutgon").css('display','none');
                    });          
                });
            </script>
        </div>        
    </div>    
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div id="thong-so-ky-thuat" class="product_detail_group">
            <div class="product_detail_group_tab">
                <p class="hboxtitle">Thông số kỹ thuật</p>
            </div>
            <div class="product_detail_group_main product_detail_baiviet" style="padding:10px;height:auto;">
                <?php echo $query->thongsokythuat; ?>
            </div>                        
        </div>        
    </div>    
</div>
<?php 
if($query->linkvideo=='')
{}
else
{
?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div id="video_ct" class="product_detail_group">
            <div class="product_detail_group_tab">
                <p class="hboxtitle">Video sản phẩm</p>
            </div>
            <div class="product_detail_group_main product_detail_baiviet" style="padding-top:10px;padding-bottom:10px;height:auto;">
                <div class="row">
                <?php 
                    $tachvideo=explode(',',$query->linkvideo);
                    foreach ($tachvideo as $itemtachvd) 
                    {
                        $tachvideo1=explode('=',$itemtachvd);                                                
                                      
                       ?>
                       
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <iframe class="embed-player" width="100%" height="360" src="http://www.youtube.com/embed/<?php echo $tachvideo1[1];?>" frameborder="0" allowfullscreen></iframe>
                            </div>
                       
                       <?php
                    }
                ?>
                </div>
            </div>                        
        </div>        
    </div>    
</div>
<?php 
}
?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div id="thong-so-ky-thuat" class="product_detail_group">
            <div class="product_detail_group_tab">
                <p class="hboxtitle">Sản phẩm cùng loại</p>
            </div>
            <div class="product_detail_group_main product_detail_baiviet" style="padding-top:10px;padding-bottom:10px;height:auto;">
                <div class="row">
                    <?php 
                        $this->db->where('status',0);
                        $this->db->where('id !=',$query->id);
                        $this->db->order_by('ordernum','desc');
                        $this->db->order_by('id','desc');
                        $this->db->limit(4);
                        $sqlsanphamcungloai=$this->db->get('tblsanpham');
                        if ($sqlsanphamcungloai->num_rows()>0) 
                        {
                            ?>
                            <div class="sanpham_mb">
                                <?php                                                                         
                                        $demkmmb=1;
                                        foreach ($sqlsanphamcungloai->result() as $itemsanphamkmmb) 
                                        {                     
                                        ?>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                            <div class="sanpham_item">                                
                                                <a href="<?php echo site_url(LocDau($itemsanphamkmmb->ten).'-sp'.$itemsanphamkmmb->id.'.html'); ?>" class="sanpham_item_img" title="<?php echo $itemsanphamkmmb->ten; ?>"><img src="<?php echo $itemsanphamkmmb->anh_thumb; ?>" title="<?php echo $itemsanphamkmmb->ten; ?>" alt="<?php echo $itemsanphamkmmb->ten; ?>"></a>
                                                <a href="<?php echo site_url(LocDau($itemsanphamkmmb->ten).'-sp'.$itemsanphamkmmb->id.'.html'); ?>" class="sanpham_item_name" title="<?php echo $itemsanphamkmmb->ten; ?>"><?php echo $itemsanphamkmmb->ten; ?></a>
                                                <p>
                                                    <?php 
                                                        if($itemsanphamkmmb->gia==0)
                                                        {
                                                            echo 'Liên hệ';
                                                        }
                                                        else
                                                        {
                                                            echo number_format($itemsanphamkmmb->gia,0,'.','.').'&nbsp;'.$itemsanphamkmmb->donvitinh;
                                                        }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                        <?php
                                        if($demkmmb%2==0)
                                        {
                                        ?>
                                        <div class="clearfix"></div>
                                        <?php    
                                        }
                                        $demkmmb++;
                                        }                                                                        
                                ?>
                            </div>
                            <div class="sanpham_desk">
                                <?php
                               foreach ($sqlsanphamcungloai->result() as $itemsanphamkhuyenmai) 
                               {
                               ?>
                               <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <div class="sanpham_item" onmouseover='showtip("<div style=\"width:250px;\"><div style=\"background:#ed1c24;height:35px;line-height:35px;width:100%;line-height:35px;padding-left:10px;font-size:12px;font-weight:bold;color:#fff;\"><?php echo $itemsanphamkhuyenmai->ten; ?></div><p style=\"text-align:left;padding-top:9px;padding-left:10px;margin-bottom:0;\"><strong>Giá:</strong>&nbsp;<span style=\"color:red;\"><?php if($itemsanphamkhuyenmai->gia==0){ echo 'Liên hệ';}else{ echo number_format($itemsanphamkhuyenmai->gia,0,'.','.').'&nbsp;'.$itemsanphamkhuyenmai->donvitinh;}?></span></p><p style=\"text-align:left;padding-top:9px;padding-left:10px;margin-bottom:0;\"><strong>Bảo hành:&nbsp;</strong><?php echo $itemsanphamkhuyenmai->baohanh; ?></p><?php if(($itemsanphamkhuyenmai->khuyenmai1=='')&&($itemsanphamkhuyenmai->khuyenmai2=='')&&($itemsanphamkhuyenmai->khuyenmai3=='')&&($itemsanphamkhuyenmai->khuyenmai4=='')&&($itemsanphamkhuyenmai->khuyenmai5=='')){}else{ ?><p style=\"text-align:left;padding-top:9px;padding-left:10px;\"><strong>Khuyễn mại:&nbsp;</strong></p><span style=\"display:block;padding-left:10px;text-align:left;font-size:12px;color:#000;font-weight:normal;\"><?php echo $itemsanphamkhuyenmai->khuyenmai1; ?></span><span style=\"display:block;padding-left:10px;text-align:left;font-size:12px;color:#000;font-weight:normal;\"><?php echo $itemsanphamkhuyenmai->khuyenmai2; ?></span><span style=\"display:block;padding-left:10px;text-align:left;font-size:12px;color:#000;font-weight:normal;\"><?php echo $itemsanphamkhuyenmai->khuyenmai3; ?></span><span style=\"display:block;padding-left:10px;text-align:left;font-size:12px;color:#000;font-weight:normal;\"><?php echo $itemsanphamkhuyenmai->khuyenmai4; ?></span><span style=\"display:block;padding-left:10px;text-align:left;font-size:12px;color:#000;font-weight:normal;\"><?php echo $itemsanphamkhuyenmai->khuyenmai5; ?></span><?php } ?><p style=\"border-top:1px solid #ddd;margin-top:10px;;text-align:left;padding-top:9px;padding-left:10px;\"><strong>Thông tin</strong></p><span style=\"display:block;padding-left:10px;text-align:left;font-size:12px;color:#000;font-weight:normal;\"><?php echo $itemsanphamkhuyenmai->chip; ?></span><span style=\"display:block;padding-left:10px;text-align:left;font-size:12px;color:#000;font-weight:normal;\"><?php echo $itemsanphamkhuyenmai->ram; ?></span><span style=\"display:block;padding-left:10px;text-align:left;font-size:12px;color:#000;font-weight:normal;\"><?php echo $itemsanphamkhuyenmai->pin; ?></span><span style=\"display:block;padding-left:10px;text-align:left;font-size:12px;color:#000;font-weight:normal;\"><?php echo $itemsanphamkhuyenmai->hedieuhanh; ?></span><span style=\"display:block;padding-left:10px;text-align:left;font-size:12px;color:#000;font-weight:normal;\"><?php echo $itemsanphamkhuyenmai->manhinh; ?></span><span style=\"display:block;padding-left:10px;text-align:left;font-size:12px;color:#000;font-weight:normal;padding-bottom:10px;\"><?php echo $itemsanphamkhuyenmai->camera; ?></span></div>");' onmouseout="hidetip();">
                                        <?php 
                                            if($itemsanphamkhuyenmai->khuyenmai==1)
                                            {
                                            ?>
                                            <div class="pro_gif"></div>
                                            <?php 
                                            }
                                        ?>
                                        <a href="<?php echo site_url(LocDau($itemsanphamkhuyenmai->ten).'-sp'.$itemsanphamkhuyenmai->id.'.html'); ?>" class="sanpham_item_img" title="<?php echo $itemsanphamkhuyenmai->ten; ?>"><img src="<?php echo $itemsanphamkhuyenmai->anh_thumb; ?>" title="<?php echo $itemsanphamkhuyenmai->ten; ?>" alt="<?php echo $itemsanphamkhuyenmai->ten; ?>"></a>
                                        <a href="<?php echo site_url(LocDau($itemsanphamkhuyenmai->ten).'-sp'.$itemsanphamkhuyenmai->id.'.html'); ?>" class="sanpham_item_name" title="<?php echo $itemsanphamkhuyenmai->ten; ?>"><?php echo $itemsanphamkhuyenmai->ten; ?></a>
                                        <p>
                                            <?php 
                                                if($itemsanphamkhuyenmai->gia==0)
                                                {
                                                    echo 'Liên hệ';
                                                }
                                                else
                                                {
                                                    echo number_format($itemsanphamkhuyenmai->gia,0,'.','.').'&nbsp;'.$itemsanphamkhuyenmai->donvitinh;
                                                }
                                            ?>
                                        </p>
                                    </div>
                                </div>
                               <?php
                               }
                               $sqlsanphamcungloai->free_result();
                            }
                        ?>
                    </div>
                </div>
            </div>                        
        </div>       
    </div>    
</div>
<?php 
    if($query->tinlienquan=='')
    {}
    else
    {
?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div id="video_ct" class="product_detail_group">
            <div class="product_detail_group_tab">
                <p class="hboxtitle">Tin tức liên quan</p>
            </div>
            <div class="product_detail_group_main product_detail_baiviet" style="padding-top:10px;padding-bottom:10px;height:auto;">
                <div class="row">
                    <?php 
                        $lienquantach=explode(',',$query->tinlienquan);
                        foreach ($lienquantach as $itemlqt) 
                        {
                           $this->db->where('id',$itemlqt);                          
                           $sqltinlienquan=$this->db->get('tbltintuc');
                           if($sqltinlienquan->num_rows()>0)
                           {
                            $tinlienquan=$sqltinlienquan->row();
                           ?>
                           <div class="sanpham_mb">
                                <div class="item_lt">
                                <div class="row"> 
                                        <?php 
                                            if($tinlienquan->anh_thumb=='' || $tinlienquan->anh_thumb=='0')
                                            {
                                            }
                                            else
                                            {
                                        ?>                                        
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 itemtt_img">                                                                   
                                            <a href="<?php echo site_url(LocDau($tinlienquan->title).'-'.$tinlienquan->id.'.html');?>"><img src="<?php echo $tinlienquan->anh_thumb; ?>" alt="<?php echo $tinlienquan->title; ?>" /></a>                               
                                        </div>
                                        <?php 
                                        }
                                        ?>                         
                                    <div class="<?php if($tinlienquan->anh_thumb=='' || $tinlienquan->anh_thumb=='0'){ ?>col-lg-12 col-md-12 col-sm-12 col-xs-12<?php }else{ ?>col-lg-9 col-md-9 col-sm-9 col-xs-9<?php } ?> itemtt_nd" >                                                   
                                        <a href="<?php echo site_url(LocDau($tinlienquan->title).'-'.$tinlienquan->id.'.html');?>" class="itemlt_name"><?php echo $tinlienquan->title; ?></a>                                                                                           
                                        <div class="p"><?php echo catchuoi(strip_tags($tinlienquan->tomtat),200);?></div>                    
                                        <div class="read1">
                                            <a href="<?php echo site_url(LocDau($tinlienquan->title).'-'.$tinlienquan->id.'.html');?>">+ Chi tiết</a>
                                        </div>                 
                                    </div>
                                    <div class="clear"></div>                    
                                </div>
                            </div>             
                           </div>
                           <div class="sanpham_desk">
                               <div class="col-lg-4 col-md4 col-sm-4 col-xs-4">
                                    <div class="tinlienquan_item">
                                        <a href="<?php echo site_url(LocDau($tinlienquan->title).'-'.$tinlienquan->id.'.html'); ?>" class="tinlienquan_img"><img src="<?php echo $tinlienquan->anh_thumb; ?>"></a>
                                        <a href="<?php echo site_url(LocDau($tinlienquan->title).'-'.$tinlienquan->id.'.html'); ?>" class="tinlienquan_name"><?php echo $tinlienquan->title; ?></a>
                                        <p><?php echo catchuoi($tinlienquan->tomtat,60); ?></p>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div> 
                           <?php
                            }
                        }
                    ?>                                    
                </div>
            </div>                                
        </div>        
    </div>    
</div>
<?php 
}
?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div style="margin-left:10px;margin-bottom:10px;margin-top:15px;" class="product_detail_social">
                    <ul>
                        <li><div class="fb-like" data-href="<?php echo site_url(LocDau($query->ten).'-sp'.$query->id.'.html'); ?>" data-width="450" data-layout="button_count" data-show-faces="false" data-send="false"></div></li>
                        <li><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo site_url(LocDau($query->ten).'-sp'.$query->id.'.html'); ?>">Tweet</a></li>
                        <li><div class="g-plusone" data-size="medium" data-annotation="inline" data-width="300" data-href="<?php echo site_url(LocDau($query->ten).'-sp'.$query->id.'.html'); ?>"></div></li>
                        <div class="clearfix"></div>
                    </ul>
                    <script type="text/javascript" orig_index="16">!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','twitter-wjs');</script>
                    <script src="https://apis.google.com/js/plusone.js" type="text/javascript" orig_index="17">
                        {lang: 'vi'}
                    </script>
                </div>      
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">    
    <div id="tab_new">
                <div id="tab_top">
                    <ul class="ul_tab_news" class="tab">
                        <li><a class="fa_tab active" title="item_1">Facebook</a></li>
                        <li><a style="margin-left:15px;" class="fa_tab" title="item_2">Google</a></li>                                                                               
                    </ul>
                </div>
                <div id="tab_main">
                    <div id="item_1" class="danhmuc_item" style="display:none;">                            
                        <div id="fb" style="padding-left:9px;">       
                           <div id="fb-root"></div>
                              <script>(function(d, s, id) {
                                  var js, fjs = d.getElementsByTagName(s)[0];
                                  if (d.getElementById(id)) return;
                                  js = d.createElement(s); js.id = id;
                                  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
                                  fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));</script>
                            <html xmlns:fb="http://ogp.me/ns/fb#">
                                <fb:comments href="<?php echo site_url(LocDau($query->ten).'-sp'.$query->id.'.html'); ?>" width="100%" num_posts="10" ></fb:comments>
                            </html>
                            <!--fb-->
                        </div> 
                        <div class="clearfix"></div>
                    </div>
                    <div id="item_2" class="danhmuc_item" style="display:none;">
                        <div class="g-comments" data-href="<?php echo site_url(LocDau($query->ten).'-sp'.$query->id.'.html'); ?>" data-width="800" data-first_party_property="BLOGGER" data-view_type="FILTERED_POSTMOD">
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>    
                </div>
                <div class="clearfix"></div>
            </div> 
    </div>                       
</div>