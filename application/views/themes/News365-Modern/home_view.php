<?php

    $bu = base_url();
    if (isset($ads) && is_array($ads)) {
        extract($ads);
    }
?>
        <!-- header news Area
        ============================================ -->
        <section class="headding-news">
            <div class="container">
                <div class="row row-margin">
                    <div class="col-sm-3 col-padding">
                    <?php 

                        for($i=2;$i<=3;$i++){
                        if (!isset($hn['news_title_'.$i]))
                        continue;
                    ?>
                        <div class="post-wrapper post-grid-1 wow fadeIn" data-wow-duration="2s">
                            <div class="post-thumb img-zoom-in">
                                <?php if(@$hn['image_check_'.$i]!=NULL){?>
                                <a href="<?php echo @$hn['news_link_'.$i];?>">
                                    <img class="entry-thumb" src="<?php echo @$hn['image_thumb_'.$i]?>" alt="">
                                </a>
                                <?php } else{ ?>
                                    <a href="<?php echo @$hn['news_link_'.$i];?>" rel="bookmark">
                                        <img  src="http://img.youtube.com/vi/<?php echo @$hn['video_'.$i];?>/0.jpg" alt=""  class="entry-thumb">
                                    </a>
                                <?php }?>
                            </div>
                            <div class="post-info">
                                <span class="color-3"><a href="<?php echo @$hn['category_link_'.$i]?>"><?php echo @$hn['category_'.$i]?></a></span>
                                <h3 class="post-title post-title-size"><a href="<?php echo @$hn['news_link_'.$i];?>" rel="bookmark"> <?php echo @$hn['news_title_'.$i];?></a></h3>
                                <div class="post-editor-date">
                                    <!-- post date -->
                                    <div class="post-date">
                                        <i class="pe-7s-clock"></i> <?php echo (date('l, d M, Y', @$hn['ptime_' . $i])); ?>
                                    </div>
                                <?php if(@$hn['video_'.$i]!=NULL) {?>
                                <a class="playvideo pull-right" href="<?php echo @$hn['news_link_'.$i];?>"><i class="fa fa-play-circle-o"></i></a>
                                <?php } else{?>
                                <a class="readmore pull-right" href="<?php echo @$hn['news_link_'.$i];?>"><i class="pe-7s-angle-right"></i></a>
                                 <?php } ?>
                                </div>
                            </div>
                        </div>

                        <?php }?>
                    </div>

                    <div class="col-sm-6 col-padding">
                     <?php if(@$hn['news_title_1']!=NULL){?>
                        <div class="post-wrapper post-grid-3 wow fadeIn" data-wow-duration="2s">
                            <div class="post-thumb img-zoom-in">
                                <?php if(@$hn['image_check_1']!=NULL){?>
                                <a href="<?php echo @$hn['news_link_1'];?>">
                                    <img class="entry-thumb-middle" src="<?php echo @$hn['image_large_1'];?>" alt="">
                                </a>
                                <?php } else{ ?>
                                    <a href="<?php echo @$hn['news_link_1'];?>" rel="bookmark">
                                        <img  src="http://img.youtube.com/vi/<?php echo @$hn['video_1'];?>/0.jpg" alt="" class="entry-thumb-middle">
                                    </a>
                                <?php } ?>
                            </div>
                            <div class="post-info">
                                <span class="color-4"><a href="<?php echo @$hn['category_link_1']?>"><?php echo @$hn['category_1'];?></a></span>
                                <h3 class="post-title"><a href="<?php echo @$hn['news_link_1'];?>" rel="bookmark"><?php echo @$hn['news_title_1'];?> </a></h3>
                                <div class="post-editor-date">
                                    <!-- post date -->
                                    <div class="post-date">
                                        <i class="pe-7s-clock"></i> <?php echo (date('l, d M, Y', @$hn['ptime_1'])); ?>
                                    </div>
                                    <!-- post comment -->
                                    <!-- read more -->
                                <?php if(@$hn['video_'.$i]!=NULL) {?>
                                <a class="playvideo pull-right" href="<?php echo @$hn['news_link_1'];?>"><i class="fa fa-play-circle-o"></i></a>
                                <?php } else{?>
                                 <a class="readmore pull-right" href="<?php echo @$hn['news_link_1'];?>"><i class="pe-7s-angle-right"></i></a>
                                 <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>


                    <div class="col-sm-3 col-padding">
                        <?php 
                            for($i=4;$i<=5;$i++){
                            if (!isset($hn['news_title_'.$i]))
                            continue;
                        ?>
                        <div class="post-wrapper post-grid-4 wow fadeIn" data-wow-duration="2s">
                            <div class="post-thumb img-zoom-in">
                                <?php if(@$hn['image_check_'.$i]!=NULL){?>
                                    <a href="<?php echo @$hn['news_link_'.$i];?>">
                                        <img class="entry-thumb" src="<?php echo @$hn['image_thumb_'.$i]?>" alt="">
                                    </a>
                                <?php } else{ ?>
                                        <a href="<?php echo @$hn['news_link_'.$i];?>" rel="bookmark">
                                            <img  src="http://img.youtube.com/vi/<?php echo @$hn['video_'.$i];?>/0.jpg" alt="" class="entry-thumb">
                                           </a>
                                <?php }?>
                            </div>
                            <div class="post-info">
                                <span class="color-1"><a href="<?php echo @$hn['category_link_'.$i]?>"><?php echo @$hn['category_'.$i];?></a></span>
                                <h3 class="post-title post-title-size"><a href="<?php echo @$hn['news_link_'.$i];?>" rel="bookmark"><?php echo @$hn['news_title_'.$i];?></a></h3>
                                <div class="post-editor-date">
                                    <!-- post date -->
                                    <div class="post-date">
                                        <i class="pe-7s-clock"></i> <?php echo (date('l, d M, Y', @$hn['ptime_' . $i])); ?>
                                    </div>
                                    <!-- read more -->
                                   <?php if(@$hn['video_'.$i]!=NULL) {?>
                                <a class="playvideo pull-right" href="<?php echo @$hn['news_link_'.$i];?>"><i class="fa fa-play-circle-o"></i></a>
                                <?php } else{?>
                                <a class="readmore pull-right" href="<?php echo @$hn['news_link_'.$i];?>"><i class="pe-7s-angle-right"></i></a>
                                 <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </section> 

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8"> <!-- left content inner -->
                    <div class="banner <?php echo (@$lg_status_12==0?'hidden-lg hidden-md':'')?> <?php echo (@$sm_status_12==0?'hidden-xs hidden-sm':'')?>">
                        <?php echo @$home_12; ?>
                    </div> 

            <?php
                if ($home_page_positions[1]['status'] == 1) { 
            ?>
                    <section class="recent_news_inner">
                        <h3 class="category-headding "><?php echo @$home_page_positions[1]['cat_name']; ?></h3>
                        <div class="headding-border"></div>
                        <div class="row">
                            <div id="content-slide" class="owl-carousel">
                                <!-- item-1 -->
                                <?php 
                                    for($i=1; $i<=3; $i++){
                                        if (!isset($pn['position_1']['news_title_'.$i]))
                                        continue;
                                ?>
                                <div class="item home2-post">
                                    <div class="post-wrapper wow fadeIn" data-wow-duration="1s"><!-- image -->
                                        <div class="post-thumb">
                                            <?php if(@$pn['position_1']['image_check_'.$i]!=NULL){?>
                                                <a href="<?php echo @$pn['position_1']['news_link_'.$i]; ?>">
                                                    <img class="img-responsive" src="<?php echo @$pn['position_1']['image_large_'.$i]; ?>" alt="">
                                                </a>
                                            <?php } else{ ?>
                                                <a href="<?php echo @$pn['position_1']['news_link_'.$i]; ?>" rel="bookmark">
                                                    <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo @$pn['position_1']['video_'.$i]; ?>/0.jpg" alt="">
                                                </a>
                                            <?php }?>
                                        </div>

                                        <div class="post-info meta-info-rn">
                                            <div class="slide">
                                                <a target="_blank" href="<?php echo @$pn['position_1']['category_link_'.$i]; ?>" class="post-badge btn_six"><?php echo @$pn['position_1']['category_'.$i]; ?></a>
                                            </div>
                                        </div>
                                    </div>

                                    <h3><a href="<?php echo @$pn['position_1']['news_link_'.$i]; ?>"><?php echo @$pn['position_1']['news_title_'.$i]; ?></a></h3>
                                    <div class="post-title-author-details">
                                        <div class="date">
                                            <ul>
                                                <li>By <a title="" href="#"><span><?php echo @$pn['position_1']['post_by_name_'.$i]; ?></span></a> --</li>
                                                <li><a title="" href="#"><?php echo @$pn['position_1']['ptime_'.$i]; ?></a> </li>
                                            </ul>
                                        </div>
                                        <?php
                                        $news_details = (@$pn['position_1']['full_news_'.$i]); 
                                        echo $exploded = implode(' ', array_slice(explode(' ', $news_details), 0, 20));
                                        ?> <a href="<?php echo @$pn['position_1']['news_link_'.$i]; ?>"><?php echo $lan['details']?></a>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row rn_block">
                    <?php 
                        for($i=4;$i<=6;$i++){
                            if (!isset($pn['position_1']['news_title_'.$i]))
                            continue;
                    ?>
                            <div class="col-md-4 col-sm-4 padd">
                                <div class="home2-post">
                                    <div class="post-wrapper wow fadeIn" data-wow-duration="1s"><!-- image -->
                                        <div class="post-thumb">
                                            <?php if(@$pn['position_1']['image_check_'.$i]!=NULL){?>
                                             <a href="<?php echo @$pn['position_1']['news_link_'.$i]; ?>">
                                                <img class="img-responsive" src="<?php echo @$pn['position_1']['image_thumb_'.$i]; ?>" alt="">
                                             </a>
                                            <?php } else{ ?>
                                                <a href="<?php echo @$pn['position_1']['news_link_'.$i]; ?>" rel="bookmark">
                                                    <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo @$pn['position_1']['video_'.$i]; ?>/0.jpg" alt="">
                                                </a>
                                            <?php }?>
                                        </div>

                                        <div class="post-info meta-info-rn">
                                            <div class="slide">
                                                <a target="_blank" href="<?php echo @$pn['position_1']['category_link_'.$i]; ?>" class="post-badge btn_eight"><?php echo @$pn['position_1']['category_'.$i]; ?></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post-title-author-details">
                                        <h4><a href="<?php echo @$pn['position_1']['news_link_'.$i]; ?>"><?php echo @$pn['position_1']['news_title_'.$i]; ?></a></h4>
                                        <div class="date">
                                            <ul>
                                                <li>By <a title="" href="#"><span><?php echo @$pn['position_1']['post_by_name_'.$i]; ?></span></a> --</li>
                                                <li><a title="" href="#"><?php echo @$pn['position_1']['ptime_'.$i]; ?></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </section>
                    <?php }?>

                    <!-- Politics Area
                    ============================================ -->
                   
                    <?php if(@$home_page_positions[2]['status']==1){ ?>
                    <section class="politics_wrapper">
                        <h3 class="category-headding "><?php echo $home_page_positions[2]['cat_name'];?></h3>
                        <div class="headding-border"></div>
                        <div class="row">
                            <div id="content-slide-2" class="owl-carousel">
                                <!-- item-1 -->
                                <div class="item">
                                    <div class="row">
                                        <!-- main post -->
                                        <div class="col-sm-6 col-md-6">
                                        <?php if(@$pn['position_2']['image_check_1']!=NULL){?>
                                            <div class="home2-post">
                                                <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                                                    <!-- post image -->
                                                    <div class="post-thumb">
                                                    <?php if(@$pn['position_2']['image_check_1']!=NULL){?>
                                                        <a href="<?php echo @$pn['position_2']['news_link_1']; ?>">
                                                            <img src="<?php echo @$pn['position_2']['image_large_1']; ?>" class="img-responsive" alt="">
                                                        </a>
                                                    <?php } else{?>
                                                     <a href="<?php echo @$pn['position_2']['news_link_1']; ?>" rel="bookmark">
                                                            <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo @$pn['position_2']['video_1']; ?>/0.jpg" alt="">
                                                        </a>
                                                    <?php } ?>    
                                                    </div>
                                                    <!-- post title -->
                                                    <h3><a href="<?php echo @$pn['position_2']['news_link_1']; ?>"><?php echo @$pn['position_2']['news_title_1']; ?></a></h3>
                                                </div>
                                                <div class="post-title-author-details">
                                                    <div class="date">
                                                        <ul>
                                                            <li>By <a title="" href="#"><span><?php echo @$pn['position_2']['post_by_name_1']; ?></span></a> --</li>
                                                            <li><a title="" href="#"><?php echo @$pn['position_2']['ptime_1']; ?></a> </li>
                                                        </ul>
                                                    </div>
                                                <?php
                                                    $news_details = (@$pn['position_2']['full_news_1']); 
                                                    echo $exploded = implode(' ', array_slice(explode(' ', $news_details), 0, 20));
                                                    ?> <a href="<?php echo @$pn['position_2']['news_link_1']; ?>"><?php echo @$lan['details'];?></a>
                                                </div>
                                            </div>
                                            <?php } ?>  
                                        </div>

                                        <!-- right side post -->
                                        <div class="col-sm-6 col-md-6">
                                            <div class="row rn_block">

                                            <?php for($i=2; $i<=5; $i++){
                                                if (!isset($pn['position_2']['news_title_'.$i]))
                                                continue;
                                            ?>
                                                <div class="col-xs-6 col-md-6 col-sm-6 post-padding">
                                                    <div class="home2-post">
                                                        <!-- post image -->
                                                        <div class="post-thumb wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                                                            
                                                    <?php if(@$pn['position_2']['image_check_'.$i]!=NULL){?>
                                                        <a href="<?php echo @$pn['position_2']['news_link_'.$i]; ?>">
                                                            <img src="<?php echo @$pn['position_2']['image_thumb_'.$i]; ?>" class="img-responsive" alt="">
                                                        </a>
                                                    <?php } else{?>
                                                     <a href="<?php echo @$pn['position_2']['news_link_'.$i]; ?>" rel="bookmark">
                                                            <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo @$pn['position_2']['video_'.$i]; ?>/0.jpg" alt="">
                                                        </a>
                                                    <?php } ?>

                                                            
                                                        </div>
                                                        <div class="post-title-author-details">
                                                            <!-- post image -->
                                                            <h5><a href="<?php echo @$pn['position_2']['news_link_'.$i]; ?>"><?php echo @$pn['position_2']['news_title_'.$i]; ?></a></h5>
                                                            <div class="date">
                                                                <ul>
                                                                    <li><a title="" href="#"><span><?php echo @$pn['position_2']['post_by_name_'.$i]; ?></span></a> --</li>
                                                                    <li><a title="" href="#"><?php echo @$pn['position_2']['ptime_'.$i]; ?></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- item-2 -->
                                <div class="item">
                                    <div class="row">
                                        <!-- main post -->
                                        <div class="col-sm-6 col-md-6">
                                            <div class="home2-post">
                                                <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                                                    <!-- post image -->
                                                    <div class="post-thumb">
                                                    <?php if(@$pn['position_2']['image_check_6']!=NULL){?>
                                                        <a href="<?php echo @$pn['position_2']['news_link_6']; ?>">
                                                            <img src="<?php echo @$pn['position_2']['image_large_6']; ?>" class="img-responsive" alt="">
                                                        </a>
                                                    <?php } else{?>
                                                     <a href="<?php echo @$pn['position_2']['news_link_6']; ?>" rel="bookmark">
                                                        <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo @$pn['position_2']['video_6']; ?>/0.jpg" alt="">
                                                     </a>
                                                    <?php } ?>
                                                    </div>
                                                <!-- post title -->
                                                <h3><a href="<?php echo @$pn['position_2']['news_link_6']; ?>"><?php echo @$pn['position_2']['news_title_6']; ?></a></h3>
                                            </div>

                                                <div class="post-title-author-details">
                                                    <div class="date">
                                                        <ul>
                                                            <li>By <a title="" href="#"><span><?php echo @$pn['position_2']['post_by_name_6']; ?></span></a> --</li>
                                                            <li><a title="" href="#"><?php echo @$pn['position_2']['ptime_6']; ?></a> </li>
                                        
                                                        </ul>
                                                    </div>
                                                    <p>
                                                    <?php
                                                        $news_details = (@$pn['position_2']['full_news_6']); 
                                                        echo $exploded = implode(' ', array_slice(explode(' ', $news_details), 0, 20));
                                                    ?> 
                                                    <a href="<?php echo @$pn['position_2']['news_link_6']; ?>"><?php echo @$lan['details']?></a></p>
                                    
                                                </div>
                                            </div>
                                        </div>
                                        <!-- right side post -->
                                        <div class="col-sm-6 col-md-6">
                                            <div class="row rn_block">
                                               
                                                <?php for($i=7; $i<=10; $i++){
                                                    if (!isset($pn['position_2']['news_title_'.$i]))
                                                    continue;
                                                ?>

                                                <div class="col-xs-6 col-md-6 col-sm-6 post-padding">
                                                    <div class="home2-post">
                                                        <!-- post image -->
                                                        <div class="post-thumb wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                                                            <?php if(@$pn['position_2']['image_check_'.$i]!=NULL){?>
                                                                <a href="<?php echo @$pn['position_2']['news_link_'.$i]; ?>">
                                                                    <img src="<?php echo @$pn['position_2']['image_thumb_'.$i]; ?>" class="img-responsive" alt="">
                                                                </a>
                                                            <?php } else{?>
                                                             <a href="<?php echo @$pn['position_2']['news_link_'.$i]; ?>" rel="bookmark">
                                                                <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo @$pn['position_2']['video_'.$i]; ?>/0.jpg" alt="">
                                                             </a>
                                                            <?php } ?>     
                                                        </div>
                                                        <div class="post-title-author-details">
                                                            <!-- post image -->
                                                            <h5><a href="<?php echo @$pn['position_2']['news_link_'.$i]; ?>"><?php echo @$pn['position_2']['news_title_'.$i]; ?></a></h5>
                                                            <div class="date">
                                                                <ul>
                                                                    <li><a title="" href="#"><span><?php echo @$pn['position_2']['post_by_name_'.$i]; ?></span></a> --</li>
                                                                    <li><a title="" href="#"><?php echo @$pn['position_2']['ptime_'.$i]; ?></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>

             
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- /.row -->
                    </section> <!-- /.Politics -->
                    <?php } ?>
                    <div class="ads <?php echo (@$lg_status_14==0?'hidden-lg hidden-md':'')?> <?php echo (@$sm_status_14==0?'hidden-xs hidden-sm':'')?>">
                        <?php echo @$home_14;?>
                    </div>
                </div> <!-- /.left content inner -->

                <div class="col-md-4 col-sm-4 left-padding"> <!-- right content wrapper -->
                <?php
                $fa = array('method' =>'GET' ); 
                echo form_open('search',$fa);?>
                    <div class="input-group search-area"> <!-- search area -->
                        <input type="text" class="form-control" placeholder="<?php echo display('search')?>" name="q">
                        <div class="input-group-btn">
                            <button class="btn btn-search" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                    </div> <!-- /.search area -->
                <?php echo form_close();?>
                
                   <!-- social icon -->
                    <h3 class="category-headding "><?php echo display('social_pixel')?></h3>
                    <div class="headding-border"></div>
                    <div class="social">
                    <?php
                        $social_sites = json_decode('[' . @$seo['social_sites'] . ']');

                            if (@$social_sites[0]->fb->h_p == 1) {
                                echo @$social_sites[0]->fb->URL;
                            }
                        ?>
                    </div> <!-- /.social icon -->

                    <div class="banner-add <?php echo (@$lg_status_13==0?'hidden-lg hidden-md':'')?> <?php echo (@$sm_status_13==0?'hidden-xs hidden-sm':'')?>"> <!-- add -->
                        <span class="add-title"></span>
                       <?php echo @$home_13; ?>
                    </div>

                    <div class="tab-inner">
                        <ul class="tabs">
                            <li><a href="#"><?php echo @$lan['latest_news'];?></a></li>
                            <li><a href="#"><?php echo @$lan['most_read']; ?></a></li>
                        </ul><hr> <!-- tabs -->
                        <div class="tab_content">
                            <div class="tab-item-inner">
                            <?php 
                            for($i=1; $i<=5; $i++){
                                if (!isset($ln['news_title_'.$i]))
                                continue; 
                            ?>
                                <div class="box-item wow fadeIn" data-wow-duration="1s">
                                    <div class="img-thumb">
                                        <?php if(@$ln['image_check_' . $i]!=NULL){?>
                                             <a href="<?php echo @$ln['news_link_'.$i];?>" rel="bookmark"><img class="entry-thumb" src="<?php echo @$ln['image_thumb_' . $i]; ?>" alt="" height="80" width="90"></a>
                                       <?php } else{?>
                                        <a href="<?php echo @$ln['news_link_'.$i];?>" rel="bookmark">
                                        <img  src="http://img.youtube.com/vi/<?php echo @$ln['video_' . $i]; ?>/0.jpg" alt=""  height="80" width="90">
                                       </a>
                                        <?php }?>
                                    </div>
                                    <div class="item-details">
                                        <h6 class="sub-category-title bg-color-1">
                                            <a href="<?php echo @$ln['category_link_'.$i];?>"><?php echo @$ln['category_'.$i];?></a>
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
                             <?php for($i=1; $i<=5; $i++){ 
                                if (!isset($mr['news_title_'.$i]))
                                continue;
                            ?>
                                <div class="box-item">
                                    <div class="img-thumb">
                                        <?php if(@$mr['image_check_' . $i]!=NULL){?>
                                             <a href="<?php echo @$mr['news_link_'.$i];?>" rel="bookmark"><img class="entry-thumb" src="<?php echo @$mr['image_thumb_' . $i]; ?>" alt="" height="80" width="90"></a>
                                        <?php } else{?>
                                            <a href="<?php echo @$mr['news_link_'.$i];?>" rel="bookmark">
                                            <img  src="http://img.youtube.com/vi/<?php echo @$mr['video_' . $i]; ?>/0.jpg" alt=""  height="80" width="90">
                                           </a>
                                        <?php }?>
                                    </div>
                                    <div class="item-details">
                                        <h6 class="sub-category-title bg-color-5">
                                            <a href="<?php echo @$mr['category_link_'.$i];?>"><?php echo @$mr['category_'.$i];?></a>
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

                </div> <!-- side content end -->
            </div> <!-- row end -->
        </div> <!-- container end -->



        <!-- Video News Area
        ============================================ -->
        <?php if(@$home_page_positions[3]['status']==1){ ?>
        <section class="video-post-inner">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="category-headding "><?php echo $home_page_positions[3]['cat_name'];?></h3>
                        <div class="headding-border"></div>
                    </div>
                    <?php for($i=1; $i<=3; $i++){ 
                        if (!isset($pn['position_3']['news_title_'.$i]))
                            continue;
                    ?>

                    <div class="col-sm-4">
                        <div class="post-style1">
                            <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                                <!-- post image -->
                                
                                <?php if(@$pn['position_3']['image_check_'.$i]!=NULL){?>
                                    <a href="<?php echo @$pn['position_3']['news_link_'.$i]?>" class="video-img-icon">
                                     <i class="fa fa-play"></i> <img src="<?php echo @$pn['position_3']['image_thumb_'.$i]?>" alt="">
                                    </a>
                                <?php } else{?>
                                 <a href="<?php echo @$pn['position_3']['news_link_'.$i]?>" class="video-img-icon">
                                    <i class="fa fa-play"></i>
                                    <img  src="http://img.youtube.com/vi/<?php echo @$pn['position_3']['video_' . $i]; ?>/0.jpg" alt="" class="img-responsive">
                                </a>
                                <?php } ?>
                            </div>
                            <!-- post title -->
                            <h3><a href="<?php echo @$pn['position_3']['news_link_'.$i]?>"><?php echo @$pn['position_3']['news_title_'.$i]?></a></h3>
                            <div class="post-title-author-details">
                                <div class="date">
                                    <ul>
                                        <li><img src="<?php echo @$pn['position_3']['post_by_image_'.$i]?>" class="img-responsive" alt=""></li>
                                        <li>By <a title="" href="#"><span><?php echo @$pn['position_3']['post_by_name_'.$i]?></span></a> --</li>
                                        <li><a title="" href="#"><?php echo @$pn['position_3']['ptime_'.$i]?></a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>

                </div>
            </div>
        </section>
        <?php } ?>
        <!-- Article Post
        ============================================ -->
        <?php if(@$home_page_positions[4]['status']==1){?>
        <section class="article-post-inner">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                     <div class="ads <?php echo (@$lg_status_15==0?'hidden-lg hidden-md':'')?> <?php echo (@$sm_status_15==0?'hidden-xs hidden-sm':'')?>">
                        <?php echo @$home_15;?>
                    </div>
                        <div class="articale-list">
                            <h3 class="category-headding "><?php echo $home_page_positions[4]['cat_name']?></h3>
                            <div class="headding-border"></div>
                            <!--Post list-->
                                <?php for($i=1;$i<=9;$i++){
                                if (!isset($pn['position_4']['news_title_'.$i]))
                                    continue;
                                ?>
                            <div class="post-style2 wow fadeIn" data-wow-duration="1s">
                                
                                 <?php if(@$pn['position_4']['image_check_'.$i]!=NULL){?>
                                    <a href="<?php echo @$pn['position_4']['news_link_'.$i]?>"><img src="<?php echo @$pn['position_4']['image_thumb_'.$i]?>" alt=""></a>
                                <?php } else{?>
                                 <a href="<?php echo @$pn['position_4']['news_link_'.$i]; ?>" rel="bookmark">
                                    <img width="200px;" src="http://img.youtube.com/vi/<?php echo @$pn['position_4']['video_'.$i]; ?>/0.jpg" alt="">
                                 </a>
                                <?php } ?>
                                <div class="post-style2-detail">
                                    <h3><a href="<?php echo @$pn['position_4']['news_link_'.$i]?>" title=""><?php echo @$pn['position_4']['mews_title_'.$i]?></a></h3>
                                    <div class="date">
                                        <ul>
                                            <li><img src="<?php echo @$pn['position_4']['post_by_image_'.$i]?>" class="img-responsive" alt=""></li>
                                            <li>By <a title="" href="#"><span><?php echo @$pn['position_4']['post_by_name_'.$i]?></span></a> --</li>
                                            <li><a title="" href="#"><?php echo @$pn['position_4']['ptime_'.$i]?></a></li>
                        
                                        </ul>
                                    </div>
                                    <p><?php
                                        $news_details = (@$pn['position_4']['full_news_'.$i]); 
                                        echo $exploded = implode(' ', array_slice(explode(' ', $news_details), 0, 20));
                                        ?></p>
                                    <a href="<?php echo @$pn['position_4']['news_link_'.$i]?>" class="btn btn-style"><?php echo $lan['details'];?></a>
                                </div>
                            </div>
                            <?php } ?>
          
                        </div>
                    </div>


                    <div class="col-sm-4 left-padding">
                        <!-- online vote -->
                        <div class="online-vote">
                            <h3 class="category-headding "><?php echo display('online_vot')?></h3>
                            <div class="headding-border"></div>
                            <div class="vote-inner">
                                 <?php
                                    $this->load->view('themes/' . $default_theme . '/voting.php');
                                ?>
                            </div> 
                        </div> <!-- /.online vote --> 
                        <!-- slider widget -->
                        <div class="widget-slider-inner">
                            <h3 class="category-headding "><?php echo  @$Editor['hn']['category_1']; ?></h3>
                            <div class="headding-border"></div>
                            <div id="widget-slider" class="owl-carousel owl-theme">
                                <!-- widget item -->
                                <?php 
                                for($i=1;$i<=3;$i++){
                                    if (!isset($Editor['hn']['news_title_'.$i]))
                                    continue;
                                ?>
                                <div class="item">
                                <?php if(@$Editor['hn']['image_check_'.$i]!=NULL){?>
                                    <a href="<?php echo @$Editor['hn']['news_link_'.$i]?>">
                                        <img src="<?php echo @$Editor['hn']['image_thumb_'.$i]?>" alt="">
                                    </a>
                                <?php } else{?>
                                    <a href="<?php echo @$Editor['hn']['news_link_'.$i]; ?>" rel="bookmark">
                                        <img src="http://img.youtube.com/vi/<?php echo @$Editor['hn']['video_'.$i]; ?>/0.jpg" alt="">
                                    </a>
                                <?php }?>
                                    <h4><a href="<?php echo @$Editor['hn']['news_link_'.$i]?>"><?php echo @$Editor['hn']['news_title_'.$i]?></a></h4>
                                    <div class="date">
                                        <ul>
                                            <li>By<a title="" href="#"><span><?php echo @$Editor['hn']['post_by_name_'.$i]?></span></a> --</li>
                                            <li><a title="" href="#"><?php echo date('l, d M, Y', @$Editor['hn']['ptime_'.$i]) ;?></a></li>
                                        </ul>
                                    </div>
                                    <p>
                                        <?php 
                                            $news_details = @$Editor['hn']['full_news_'.$i];
                                           echo $exploded = implode(' ', array_slice(explode(' ', $news_details), 0, 20));
                                        ?>
                                    </p>
                                </div>
                                <?php } ?>
                     
                            </div>
                        </div>
                    <div class="ads <?php echo (@$lg_status_16==0?'hidden-lg hidden-md':'')?> <?php echo (@$sm_status_16==0?'hidden-xs hidden-sm':'')?>">
                        <?php echo @$home_16;?>
                    </div>
                        <!-- twitter feed -->
                        <h3 class="category-headding "><?php echo display('social_pixel')?></h3>
                        <div class="headding-border"></div>
                        <div class="feed-inner">
                            <?php
                            $social_sites = json_decode('[' . @$seo['social_sites'] . ']');
                            if (@$social_sites[0]->tw->h_p == 1) {
                                echo @$social_sites[0]->tw->URL;
                            }
                            ?>
                        </div>  <!-- /.twitter feed -->
                    </div>
                </div>
            </div>
        </section>
        <?php } ?>

<!-- pagination
============================================ -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-ofset-2">
            <div class="banner <?php echo (@$lg_status_17==0?'hidden-lg hidden-md':'')?> <?php echo (@$sm_status_17==0?'hidden-xs hidden-sm':'')?>">
                <?php echo @$home_17; ?>
            </div>
        </div>
    </div>
</div>
       



        
       


