<?php
    $bu = base_url();
    if (isset($ads) && is_array($ads)) {
        extract($ads);
    }
?>

<section class="block-inner" style="
background-image: url('<?php echo base_url().@$cat_imgae->category_imgae;?>');"
>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1><?php
                        @$menu_slug = $this->uri->segment(1);
                        $query = $this->db->select('category_name')
                                ->from('categories')
                                ->where('slug', $menu_slug)
                                ->get()
                                ->row();
                        echo @$query->category_name;
                    ?>
                    </h1>
                <div class="breadcrumbs">

                    <ul>
                        <li><i class="pe-7s-home"></i> <a href="<?php echo base_url(); ?>" title=""><?php echo display('home')?></a></li>
                        <li>
                        <a href="<?php echo base_url().@$menu_slug; ?>" title=""><?php echo @$query->category_name; ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <div class="banner-add <?php echo (@$lg_status_21==0?'hidden-lg hidden-md':'')?> <?php echo (@$sm_status_21==0?'hidden-xs hidden-sm':'')?>">
                <?php echo @$category_21; ?>
            </div>
            <div class="row">
                <div class="col-sm-6">
            <?php
            for($i = 1; $i <= 4; $i++) {
                if (!isset($pn['news_title_' . $i]))
                    continue;
            ?>
           
                        <div class="post-style1">
                            <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                                <!-- post image -->
                                <?php
                                    if (@$pn['image_check_' . $i]!=NULL) {
                                        echo'<a href="'.$pn['news_link_'.$i].'"><img src="'.@$pn['image_large_' . $i].'" class="img-responsive" alt=""></a>';
                                    } else {
                                        echo '<a href="'.$pn['news_link_'.$i].'"><img width="100%" src="http://img.youtube.com/vi/' . $pn['video_' . $i] . '/0.jpg" alt="photography" /></a>';
                                    }
                                ?>
                                <div class="post-info meta-info-rn">
                                    <div class="slide">
                                <?php
                                    if ($pn['video_' . $i]!=NULL) {
                                        echo '<a class="playvideo pull-right" href="'. @$pn['news_link_'.$i].'"><i class="fa fa-play-circle-o"></i></a>';
                                    } else {
                                        echo '<a class="readmore pull-right" href="'.$pn['news_link_'.$i].'"><i class="pe-7s-angle-right"></i></a>';
                                    }
                                ?>  
                                    </div>
                                </div>
                            </div>
                            <!-- post title -->
                            <h3><a href="<?php echo @$pn['news_link_'.$i];?>"><?php echo @$pn['news_title_'.$i];?></a></h3>
                            <div class="post-title-author-details">
                                <div class="date">
                                    <ul>
                                        <li><img src="<?php echo @$pn['post_by_image_'.$i];?>" class="img-responsive" alt=""></li>
                                        <li>By<a title="" href="#"><span><?php echo @$pn['post_by_name_'.$i];?></span></a> --</li>
                                        <li><a title="" href="#"><?php echo date('d-M-Y',@$pn['ptime_'.$i]);?></a> </li>
                                    </ul>
                                </div>
                             <p>
                                <?php
                                    $news_details = strip_tags(htmlspecialchars_decode(@$pn['full_news_' . $i]), '<p><a>');
                                    echo $exploded = implode(' ', array_slice(explode(' ', $news_details), 0, 20));
                                    ?>
                                <?php echo '<a href="' . @$pn['news_link_' . $i] . '"> '.$lan['details'].'</a>'; ?>
                            </p>
                            </div>
                        </div>
                 
                <?php
                    } 
                ?>
                </div>
        
        <div class="col-sm-6">
        <?php
            for($i = 5; $i <= 8; $i++) {
            if (!isset($pn['news_title_' . $i]))
            continue;
        ?>
            
                <div class="post-style1">
                    <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                        <!-- post image -->
                        <?php
                            if (@$pn['image_large_' . $i]!=NULL) {
                                echo'<a href="'.@$pn['news_link_'.$i].'"><img src="'.@$pn['image_large_' . $i].'" class="img-responsive" alt=""></a>';
                            } else {
                                echo '<a href="'.@$pn['news_link_'.$i].'"><img width="100%" src="http://img.youtube.com/vi/' . $pn['video_' . $i] . '/0.jpg" alt="photography" /></a>';
                            }
                        ?>
                        <div class="post-info meta-info-rn">
                            <div class="slide">
                                <a class="playvideo pull-right" href="<?php echo @$pn['news_link_'.$i];?>"><i class="fa fa-play-circle-o"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- post title -->
                    <h3><a href="<?php echo @$pn['news_link_'.$i];?>"><?php echo @$pn['news_title_'.$i];?></a></h3>
                    <div class="post-title-author-details">
                        <div class="date">
                            <ul>
                                <li><img src="<?php echo @$pn['post_by_image_'.$i];?>" class="img-responsive" alt=""></li>
                                <li>By<a title="" href="#"><span><?php echo @$pn['post_by_name_'.$i];?></span></a> --</li>
                                <li><a title="" href="#"><?php echo date('d-M-Y',@$pn['ptime_'.$i]);?></a> </li>
                            </ul>
                        </div>
                     <p>
                        <?php
                            $news_details = strip_tags(htmlspecialchars_decode(@$pn['full_news_' . $i]), '<p><a>');
                            echo $exploded = implode(' ', array_slice(explode(' ', $news_details), 0, 20));
                            ?>
                        <?php echo '<a href="' . @$pn['news_link_' . $i] . '"> '.$lan['details'].'</a>'; ?>
                    </p>
                    </div>
                </div>
                 
            <?php
                } 
            ?></div>
                 </div>
           </div>


            <aside class="col-sm-4 left-padding">
                    <?php
                        $fa = array('method' =>'GET' ); 
                        echo form_open('search',$fa);?>
                            <div class="input-group search-area"> <!-- search area -->
                                <input type="text" class="form-control" placeholder="Search articles here ..." name="q">
                                <div class="input-group-btn">
                                    <button class="btn btn-search" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </div>
                            </div> <!-- /.search area -->
                <?php echo form_close();?>
                <div class="banner-add <?php echo (@$lg_status_23==0?'hidden-lg hidden-md':'')?> <?php echo (@$sm_status_23==0?'hidden-xs hidden-sm':'')?>">
                    <?php echo @$category_23; ?>
                </div>

                
                <!-- social icon -->
                <h3 class="category-headding "><?php echo display('social_pixel')?></h3>
                <div class="headding-border"></div>
                <div class="social">
                    <div class="ssm">
                        <?php
                            $social_sites = json_decode('[' . @$seo['social_sites'] . ']');
                            if (@$social_sites[0]->fb->h_p == 1) {
                                echo @$social_sites[0]->fb->URL;
                            }
                        ?>
                    </div>
                </div>
                <!-- /.social icon -->

                <div class="tab-inner">
                        <ul class="tabs">
                            <li><a href="#"><?php echo @$lan['latest_news'];?></a></li>
                            <li><a href="#"><?php echo @$lan['most_read']; ?></a></li>
                        </ul><hr> <!-- tabs -->
                        <div class="tab_content">
                            <div class="tab-item-inner">
                            <?php 
                            for($i=1; $i<=3; $i++){ 
                                if(!isset($ln['news_title_'.$i]))
                                continue
                            ?>
                                <div class="box-item wow fadeIn" data-wow-duration="1s">
                                    <div class="img-thumb">
                                        <?php if(@$ln['image_check_' . $i]){?>
                                        
                                       <a href="<?php echo @$ln['news_link_'.$i];?>" rel="bookmark">
                                             <img class="entry-thumb" src="<?php echo @$ln['image_thumb_' . $i]; ?>" alt="" height="80" width="90">
                                             </a>  
                                       <?php } else{?>
                                        <a href="<?php echo @$ln['news_link_'.$i];?>" rel="bookmark">
                                        <img  src="http://img.youtube.com/vi/<?php echo @$ln['video_' . $i]; ?>/0.jpg" alt=""  height="80" width="90">
                                       </a>
                                        <?php }?>
                                    </div>

                                    <div class="item-details">
                                        <h6 class="sub-category-title bg-color-1">
                                            <a href="<?php echo @$ln['category_link_'.$i]?>"><?php echo @$ln['category_'.$i];?></a>
                                        </h6>
                                        <h3 class="td-module-title"><a href="<?php echo @$ln['news_link_'.$i];?>"><?php echo @$ln['news_title_'.$i];?></a></h3>
                                        <div class="post-editor-date">
                                            <!-- post date -->
                                            <div class="post-date">
                                                <i class="pe-7s-clock"></i><?php echo @$ln['ptime_'.$i];?>
                                            </div>
                                            <!-- post comment -->
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div> <!-- / tab item -->

                            <div class="tab-item-inner">
                             <?php 
                             for($i=1; $i<=3; $i++){ 
                                if(!isset($mr['news_title_'.$i]))
                                continue
                            ?>
                                <div class="box-item">
                                    <div class="img-thumb">
                                        <?php if(@$mr['image_check_' . $i]){?>
                                            
                                         <a href="<?php echo @$mr['news_link_'.$i];?>" rel="bookmark"><img class="entry-thumb" src="<?php echo @$mr['image_thumb_' . $i]; ?>" alt="" height="80" width="90"></a>
                                        <?php } else{?>
                                        <a href="<?php echo @$mr['news_link_'.$i];?>" rel="bookmark">
                                        <img  src="http://img.youtube.com/vi/<?php echo @$mr['video_' . $i]; ?>/0.jpg" alt=""  height="80" width="90">
                                       </a>
                                            
                                        <?php }?>
                               
                                    </div>
                                    <div class="item-details">
                                        <h6 class="sub-category-title bg-color-5">
                                            <a href="<?php echo @$mr['category_link_'.$i]?>"><?php echo @$mr['category_'.$i];?></a>
                                        </h6>
                                        <h3 class="td-module-title">
                                        <a href="<?php echo @$mr['news_link_'.$i];?>"><?php echo @$mr['news_title_'.$i];?></a>
                                        </h3>
                                        <div class="post-editor-date">
                                            <!-- post date -->
                                            <div class="post-date">
                                                <i class="pe-7s-clock"></i> <?php echo @$mr['ptime_'.$i];?>
                                            </div>
                                         </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div> <!-- / tab item -->
                        </div> <!-- / tab_content -->
                    </div> <!-- / tab -->
                <!-- / tab -->
                <!-- / tab -->


                <div class="banner-add <?php echo (@$lg_status_24==0?'hidden-lg hidden-md':'')?> <?php echo (@$sm_status_24==0?'hidden-xs hidden-sm':'')?>">
                    <!-- add -->
                    <span class="add-title"></span>
                    <?php echo @$category_24; ?>
                </div>
           
                <!-- slider widget -->
                <div class="widget-slider-inner">
                    <h3 class="category-headding "><?php echo  @$Editor['hn']['category_1']; ?></h3>
                    <div class="headding-border"></div>
                    <div id="widget-slider" class="owl-carousel owl-theme">
                       
                      <!-- widget item -->
                                <?php 
                                for($i=1;$i<=3;$i++){
                                   if(!isset($Editor['hn']['news_title_'.$i]))
                                    continue
                             ?>
                                <div class="item">
                                   <a href="<?php echo @$Editor['hn']['news_link_'.$i]?>">
                                    <?php
                                        if (@$Editor['hn']['image_check_'.$i]) {
                                              echo'<img  src="'. @$Editor['hn']['image_thumb_'.$i].'" alt="">';
                                            } else {
                                                echo '<img  class="img-responsive"  src="http://img.youtube.com/vi/' . @$Editor['hn']['video_'.$i] . '/0.jpg" alt="photography" />';
                                            }
                                        ?>
                                    </a>
                                   
                                    <h4><a href="<?php echo @$Editor['hn']['news_link_'.$i]?>"><?php echo @$Editor['hn']['news_title_'.$i]?></a></h4>
                                    <div class="date">
                                        <ul>
                                            <li>By<a title="" href="#"><span><?php echo @$Editor['hn']['post_by_name_'.$i]?></span></a> --</li>
                                            <li><a title="" href="#"><?php echo @$Editor['hn']['post_date_'.$i]?></a></li>
                                        </ul>
                                    </div>
                                    <p>
                                    <?php 
                                        $news_details = @$Editor['hn']['full_news_'.$i];
                                     echo $exploded = implode(' ', array_slice(explode(' ', $news_details), 0, 20));
                                    ?></p>
                                </div>
                                <?php } ?>
                    </div>
                </div>

                <!-- archive calander -->
            <div class="archive" >
                <span class="archive-title "><?php echo display('archive')?></span>
                <?php
                $fa = array('method' =>'GET' ); 
                echo form_open('archive/',$fa);?>
                    <div class="form-group">
                        <input  class="form-control col-md-3" onchange="submit()" placeholder="<?php echo display('archive')?>" type="text" id="archive-date" name="date">
                    </div> 
                <?php echo form_close();?> 
            </div>

            </aside>
        </div>
        <!-- pagination -->


        <!-- pagination -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="text-center">
                    <?php echo $this->pagination->create_links(); ?> 
                </div>
            </div>

            <div class="col-sm-12">
                <div class="banner <?php echo (@$lg_status_22==0?'hidden-lg hidden-md':'')?> <?php echo (@$sm_status_22==0?'hidden-xs hidden-sm':'')?>">
                    <?php echo @$category_22; ?>
                </div>
            </div>
        </div>
    </div>

    </div>



