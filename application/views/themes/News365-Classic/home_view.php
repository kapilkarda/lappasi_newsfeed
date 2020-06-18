<?php
    $bu = base_url();
    if (isset($ads) && is_array($ads)) {
        extract($ads);
    }
?>
    <!-- newsfeed Area
        ============================================ -->
    <section class="news-feed">
        <div class="container-fluid">
            <div class="row row-margin">
                <div class="col-sm-3 hidden-xs col-padding">
                <?php if(@$hn['news_title_1']!=NULL){?>
                    <div class="post-wrapper wow fadeIn" data-wow-duration="2s">
                        <div class="post-thumb img-zoom-in">
                             <?php if(@$hn['image_check_1']!=NULL){?>
                            <a href="<?php echo @$hn['news_link_4'];?>">
                                <img class="entry-thumb" src="<?php echo @$hn['image_large_4']?>" alt="">
                            </a>
                            <?php } else{ ?>
                                <a href="<?php echo @$hn['news_link_4'];?>" rel="bookmark">
                                    <img class="entry-thumb" src="http://img.youtube.com/vi/<?php echo @$hn['video_4'];?>/0.jpg" alt="" >
                                </a>
                            <?php }?>
                        </div>

                        <div class="post-info">
                            <span class="color-4"><a href="<?php echo @$hn['category_link_4']?>"><?php echo @$hn['category_4']?></a> </span>
                            <h3 class="post-title post-title-size"><a href="<?php echo @$hn['news_link_4'];?>" rel="bookmark"><?php echo @$hn['news_title_4'];?></a></h3>
                            <div class="post-editor-date">
                                <!-- post date -->
                                <div class="post-date">
                                    <i class="pe-7s-clock"></i> <?php echo (date('l, d M, Y', @$hn['ptime_4'])); ?>
                                </div>
                                <!-- read more -->
                               <?php if(@$hn['video_4']!=NULL) {?>
                                <a class="playvideo pull-right" href="<?php echo @$hn['news_link_4'];?>"><i class="fa fa-play-circle-o"></i></a>
                                <?php } else{?>
                                <a class="readmore pull-right" href="<?php echo @$hn['news_link_4']?>"><i class="pe-7s-angle-right"></i></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>

                <div class="col-xs-12 col-md-6 col-sm-6 col-padding">
                    <div id="news-feed-carousel" class="owl-carousel owl-theme">
                        <?php for($i=1;$i<=3;$i++){
                            if (!isset($hn['news_title_'.$i]))
                            continue;
                        ?>
                        <div class="item">
                            <div class="post-wrapper wow fadeIn" data-wow-duration="2s">
                                <div class="post-thumb img-zoom-in">
                                <?php if(@$hn['image_check_'.$i]!=NULL){?>
                                    <a href="<?php echo @$hn['news_link_'.$i]?>">
                                        <img class="entry-thumb" src="<?php echo @$hn['image_large_'.$i]?>" alt="">
                                    </a>
                                <?php } else{ ?>
                                    <a href="<?php echo @$hn['news_link_'.$i];?>" rel="bookmark">
                                        <img class="entry-thumb" src="http://img.youtube.com/vi/<?php echo @$hn['video_'.$i];?>/0.jpg" alt="" >
                                    </a>
                                <?php }?>
                                    
                                </div>
                                <div class="post-info">
                                    <span class="color-2"><a href="<?php echo @$hn['category_link_'.$i]?>"><?php echo @$hn['category_'.$i]?></a></span>
                                    <h3 class="post-title"><a href="#" rel="bookmark"><?php echo @$hn['news_title_'.$i]?> </a></h3>
                                    <div class="post-editor-date">
                                        <!-- post date -->
                                        <div class="post-date">
                                            <i class="pe-7s-clock"></i> <?php echo (date('l, d M, Y', @$hn['ptime_'.$i])); ?>
                                        </div>
                                        <!-- read more -->
                                <?php if(@$hn['video_'.$i]!=NULL) {?>
                                <a class="playvideo pull-right" href="<?php echo @$hn['news_link_'.$i];?>"><i class="fa fa-play-circle-o"></i></a>
                                <?php } else{?>
                                <a class="readmore pull-right" href="<?php echo @$hn['news_link_'.$i]?>"><i class="pe-7s-angle-right"></i></a>
                                <?php } ?>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="col-sm-3 hidden-xs col-padding">
                <?php if(@$hn['news_title_5']!=NULL){?>
                    <div class="post-wrapper wow fadeIn" data-wow-duration="2s">
                        <div class="post-thumb img-zoom-in">
                           
                            <?php if(@$hn['image_check_5']!=NULL){?>
                            <a href="<?php echo @$hn['news_link_5']?>">
                                <img class="entry-thumb" src="<?php echo @$hn['image_large_5']?>" alt="">
                            </a>
                            <?php } else{ ?>
                                <a href="<?php echo @$hn['news_link_5'];?>" rel="bookmark">
                                    <img class="entry-thumb" src="http://img.youtube.com/vi/<?php echo @$hn['video_5'];?>/0.jpg" alt="" >
                                </a>
                            <?php }?>
                        </div>
                        <div class="post-info">
                            <span class="color-5"><a href="<?php echo @$hn['category_link_5']?>"><?php echo @$hn['category_5']?></a> </span>
                            <h3 class="post-title post-title-size"><a href="<?php echo @$hn['news_link_5']?>" rel="bookmark"><?php echo @$hn['news_title_5']?></a></h3>
                            <div class="post-editor-date">
                                <!-- post date -->
                                <div class="post-date">
                                    <i class="pe-7s-clock"></i> <?php echo (date('l, d M, Y', @$hn['ptime_5'])); ?>
                                </div>
                               <!-- read more -->
                               <?php if(@$hn['video_5']!=NULL) {?>
                                <a class="playvideo pull-right" href="<?php echo @$hn['news_link_5'];?>"><i class="fa fa-play-circle-o"></i></a>
                                <?php } else{?>
                                <a class="readmore pull-right" href="<?php echo @$hn['news_link_5']?>"><i class="pe-7s-angle-right"></i></a>
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
            <div class="col-md-8 col-sm-8">

            <?php
                if (@$home_page_positions[1]['status'] == 1) {
             ?>
                <!-- left content inner -->
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
                                                <a href="<?php echo @$pn['position_1']['news_link_'.$i];?>" rel="bookmark">
                                                    <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo @$pn['position_1']['video_'.$i];?>/0.jpg" alt="" >
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
                                        ?> <a href="<?php echo @$pn['position_1']['news_link_'.$i]; ?>"><?php echo @$lan['details'];?></a>
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
                                        <?php if(@$pn['position_1']['image_check_'.$i]){?>
                                            <a href="<?php echo @$pn['position_1']['news_link_'.$i]; ?>">
                                                <img class="img-responsive" src="<?php echo @$pn['position_1']['image_thumb_'.$i]; ?>" alt="">
                                            </a>
                                            <?php } else{ ?>
                                                <a href="<?php echo @$pn['position_1']['news_link_'.$i];?>" rel="bookmark">
                                                    <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo @$pn['position_1']['video_'.$i];?>/0.jpg" alt="" >
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

                <?php
                    }
                ?>

                <!-- Politics Area
                    ============================================ -->
                <?php
                    if ($home_page_positions[2]['status'] == 1) {
                ?>
                <section class="politics_wrapper">
                    <h3 class="category-headding "><?php echo @$home_page_positions[2]['cat_name'];?></h3>
                    <div class="headding-border"></div>
                    <div class="row">
                        <div id="content-slide-2" class="owl-carousel">
                            <!-- item-1 -->
                            <div class="item">
                                <div class="row">
                                    <!-- main post -->
                                    <div class="col-sm-6 col-md-6">
                                    <?php if(@$pn['position_2']['news_title_1']!=NULL){?>
                                        <div class="post-wrapper wow fadeIn" data-wow-duration="2s">
                                            <!-- post title -->
                                            <h3><a href="<?php echo @$pn['position_2']['news_link_1']; ?>"><?php echo @$pn['position_2']['news_title_1']; ?></a></h3>
                                            <!-- post image -->
                                            <div class="post-thumb">
                                            <?php if(@$pn['position_2']['image_check_1']!=NULL){?>
                                                <a href="<?php echo @$pn['position_2']['news_link_1']; ?>">
                                                    <img src="<?php echo @$pn['position_2']['image_large_1']; ?>" class="img-responsive" alt="">
                                                </a>
                                                <?php } else{ ?>
                                                    <a href="<?php echo @$pn['position_2']['news_link_1'];?>" rel="bookmark">
                                                        <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo @$pn['position_2']['video_1'];?>/0.jpg" alt="" >
                                                    </a>
                                            <?php }?>
                                                
                                            </div>
                                        </div>
                                        <div class="post-title-author-details">
                                            <div class="post-editor-date">
                                                <!-- post date -->
                                                <div class="post-date">
                                                    <i class="pe-7s-clock"></i> <?php echo @$pn['position_2']['ptime_1']; ?>
                                                </div>
                                                <!-- post comment -->
                                            </div>
                                            <p>
                                        <?php
                                            $news_details = (@$pn['position_2']['full_news_1']); 
                                            echo $exploded = implode(' ', array_slice(explode(' ', $news_details), 0, 20));
                                        ?> <a href="<?php echo @$pn['position_2']['news_link_1']; ?>"><?php echo @$lan['details'];?></a>
                                            </p>
                                        </div>
                                        <?php }?>
                                    </div>


                                    <!-- right side post -->
                                    <div class="col-sm-6 col-md-6">
                                        <div class="row rn_block">
                                           <?php 
                                           for($i=2; $i<=5; $i++){
                                            if (!isset($pn['position_2']['news_title_'.$i]))
                                            continue;
                                            ?>
                                                <div class="col-xs-6 col-md-6 col-sm-6 post-padding">
                                                    <div class="home2-post">
                                                        <!-- post image -->
                                                        <div class="post-thumb wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                                                            
                                                            <?php if(@$pn['position_2']['image_check_'.$i]){?>
                                                            <a href="<?php echo @$pn['position_2']['news_link_'.$i]; ?>">
                                                                <img src="<?php echo @$pn['position_2']['image_thumb_'.$i]; ?>" class="img-responsive" alt="">
                                                            </a>
                                                            <?php } else{ ?>
                                                                <a href="<?php echo @$pn['position_2']['news_link_'.$i];?>" rel="bookmark">
                                                                    <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo @$pn['position_2']['video_'.$i];?>/0.jpg" alt="" >
                                                                </a>
                                                            <?php }?>
                                                        </div>
                                                        <div class="post-title-author-details">
                                                            <!-- post image -->
                                                            <h5><a href="<?php echo @$pn['position_2']['news_link_'.$i]; ?>"><?php echo @$pn['position_2']['news_title_'.$i]; ?></a></h5>
                                                            <div class="date">
                                                                <ul>
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
                                    <?php if(@$pn['position_2']['news_title_1']!=NULL){?>
                                        <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                                            <!-- post title -->
                                            <h3><a href="<?php echo @$pn['position_2']['news_link_6']; ?>"><?php echo @$pn['position_2']['news_title_6']; ?></a></h3>
                                            <!-- post image -->
                                            <div class="post-thumb">
                                            <?php if(@$pn['position_2']['image_check_6']!=NULL){?>
                                                    <a href="<?php echo @$pn['position_2']['news_link_6']; ?>">
                                                    <img src="<?php echo @$pn['position_2']['image_large_6']; ?>" class="img-responsive" alt="">
                                                </a>
                                                <?php } else{ ?>
                                                    <a href="<?php echo @$pn['position_2']['news_link_6'];?>" rel="bookmark">
                                                        <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo @$pn['position_2']['video_6'];?>/0.jpg" alt="" >
                                                    </a>
                                                <?php }?>
                                            </div>
                                        </div>
                                        <div class="post-title-author-details">
                                            <div class="post-editor-date">
                                                <!-- post date -->
                                                <div class="post-date">
                                                    <i class="pe-7s-clock"></i> <?php echo @$pn['position_2']['ptime_6']; ?>
                                                </div>
                                                <!-- post comment -->
                                            </div>
                                            <p>
                                        <?php
                                        $news_details = (@$pn['position_2']['full_news_6']); 
                                        echo $exploded = implode(' ', array_slice(explode(' ', $news_details), 0, 20));
                                        ?> <a href="<?php echo @$pn['position_2']['news_link_6']; ?>"><?php echo @$lan['details'];?></a>
                                            </p>
                                        </div>

                                        <?php }?>
                                    </div>
                                    <!-- right side post -->
                                    <div class="col-sm-6 col-md-6">
                                        <div class="row rn_block">
                                            <?php 
                                            for($i=7; $i<=10; $i++){
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
                                                            <?php } else{ ?>
                                                                <a href="<?php echo @$pn['position_2']['news_link_'.$i];?>" rel="bookmark">
                                                                    <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo @$pn['position_2']['video_'.$i];?>/0.jpg" alt="" >
                                                                </a>
                                                            <?php }?>

                                                        </div>
                                                        <div class="post-title-author-details">
                                                            <!-- post image -->
                                                            <h5><a href="<?php echo @$pn['position_2']['news_link_'.$i]; ?>"><?php echo @$pn['position_2']['news_title_'.$i]; ?></a></h5>
                                                            <div class="date">
                                                                <ul>
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
                    </div>
                    <!-- /.row -->
                </section>

                <?php } ?>
                <!-- /.Politics -->
               <div class="ads <?php echo (@$lg_status_12==0?'hidden-lg hidden-md':'')?> <?php echo (@$sm_status_12==0?'hidden-xs hidden-sm':'')?>">
                        <?php echo @$home_12;?>
                </div>
            </div>
            <!-- /.left content inner -->
            <div class="col-md-4 col-sm-4 left-padding">
                <!-- right content wrapper -->
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
                <!-- /.search area -->

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
                </div>
                <!-- /.twitter feed -->

                <div class="banner-add <?php echo (@$lg_status_13==0?'hidden-lg hidden-md':'')?> <?php echo (@$sm_status_13==0?'hidden-xs hidden-sm':'')?>">
                    <!-- add -->
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
                            for($i=1; $i<=4; $i++){ 
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
                             <?php for($i=1; $i<=4; $i++){ 
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

              
                <!-- / tab -->
            </div>
            <!-- side content end -->
        </div>
        <!-- row end -->
    </div>
    <!-- container end -->


    <!-- Weekly News Area
        ============================================ -->
<?php if(@$home_page_positions[3]['status']==1){ ?>
    <section class="weekly-news-inner">
        <div class="container-fluid">
            <div class="row row-margin">
                <h3 class="category-headding-two "><?php echo @$home_page_positions[3]['cat_name'];?></h3>
                <div class="headding-border bg-color-two"></div>
                <div id="content-slide-4" class="owl-carousel">
                    <?php for($i=1; $i<=6; $i++){ 
                        if (!isset($pn['position_3']['news_title_'.$i]))
                                    continue;
                    ?>
                    <div class="item">
                        <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                            <div class="post-thumb img-zoom-in">
                            <?php if(@$pn['position_3']['image_check_'.$i]){?>
                                <a href="<?php echo @$pn['position_3']['news_link_'.$i]?>">
                                    <img class="entry-thumb" src="<?php echo @$pn['position_3']['image_large_'.$i]?>" alt="">
                                </a>
                            <?php } else{ ?>
                                <a href="<?php echo @$pn['position_3']['news_link_'.$i]?>" rel="bookmark">
                                    <img class="entry-thumb" src="http://img.youtube.com/vi/<?php echo @$pn['position_2']['video_'.$i];?>/0.jpg" alt="" >
                                </a>
                            <?php }?>
                                
                            </div>
                            <div class="post-info">
                                <span class="color-4"><a href="<?php echo @$pn['position_3']['category_link_'.$i]?>"><?php echo @$pn['position_3']['category_'.$i]?></a> </span>
                                <h3 class="post-title"><a href="<?php echo @$pn['position_3']['news_link_'.$i]?>" rel="bookmark"><?php echo @$pn['position_3']['news_title_'.$i]?> </a></h3>
                                <div class="post-editor-date">
                                    <!-- post date -->
                                    <div class="post-date">
                                        <i class="pe-7s-clock"></i> <?php echo @$pn['position_3']['ptime_'.$i]?>
                                    </div>
                                    <!-- read more -->
                                <?php if(@$hn['video_'.$i]!=NULL) {?>
                                <a class="playvideo pull-right" href="<?php echo @$pn['position_3']['news_link_'.$i]?>"><i class="fa fa-play-circle-o"></i></a>
                                <?php } else{?>
                                 <a class="readmore pull-right" href="<?php echo @$pn['position_3']['news_link_'.$i]?>"><i class="pe-7s-angle-right"></i></a>
                                <?php } ?>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </section>

    <?php  } ?>
    <!-- second content -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8">
                    <div class="row">
                        <!-- business Area
                            ============================================ -->
                        
                    <?php if(@$home_page_positions[4]['status']==1){ ?>
                        <div class="col-sm-6 col-md-6">
                            <div class="buisness">
                                <h3 class="category-headding "><?php echo @$home_page_positions[4]['cat_name'];?></h3>
                                <div class="headding-border bg-color-5"></div>
                                <?php  if(@$pn['position_4']['news_title_1']!=NULL){?>
                                <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                                    <!-- post title -->
                                    <h3><a href="<?php echo @$pn['position_4']['news_link_1']?>"><?php echo @$pn['position_4']['news_title_1']?></a></h3>
                                    <!-- post image -->
                                    <div class="post-thumb">
                                        <?php if(@$pn['position_4']['image_check_1']){?>
                                            <a href="<?php echo @$pn['position_4']['news_link_1']?>">
                                                <img src="<?php echo @$pn['position_4']['image_large_1']?>" class="img-responsive" alt="">
                                            </a>
                                        <?php } else{ ?>
                                            <a href="<?php echo @$pn['position_4']['news_link_1']?>" rel="bookmark">
                                                <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo @$pn['position_4']['video_1'];?>/0.jpg" alt="" >
                                            </a>
                                        <?php }?>
                                       
                                    </div>
                                </div>
                                <div class="post-title-author-details">
                                    <div class="post-editor-date">
                                        <!-- post date -->
                                        <div class="post-date">
                                            <i class="pe-7s-clock"></i> <?php echo @$pn['position_4']['ptime_1']?>
                                        </div>
                                        <!-- post comment -->
                                    </div>
                                    <p><?php
                                            $news_details = (@$pn['position_4']['full_news_1']); 
                                            echo $exploded = implode(' ', array_slice(explode(' ', $news_details), 0, 20));
                                            ?>
                                        <a href="<?php echo @$pn['position_4']['news_link_1']?>"><?php echo $lan['details'];?></a>
                                    </p>
                                </div>
                                <?php }?>

                            <?php for($i=2; $i<=3; $i++){
                                if (!isset($pn['position_4']['news_title_'.$i]))
                                    continue;
                            ?>
                                <div class="box-item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                                    <div class="img-thumb">
                            <?php if(@$pn['position_4']['image_check_'.$i]){?>
                                <a href="<?php echo @$pn['position_4']['news_link_'.$i]?>" rel="bookmark">
                                        <img class="entry-thumb" src="<?php echo @$pn['position_4']['image_thumb_'.$i]?>" alt="" height="70" width="100"></a>
                            <?php } else{ ?>
                                <a href="<?php echo @$pn['position_4']['news_link_'.$i]?>" rel="bookmark">
                                    <img class="entry-thumb" src="http://img.youtube.com/vi/<?php echo @$pn['position_4']['video_'.$i];?>/0.jpg" alt="" height="70" width="100" >
                                </a>
                            <?php }?>
                                        
                                    </div>
                                    <div class="item-details">
                                        <h3 class="td-module-title"><a href="<?php echo @$pn['position_4']['news_link_'.$i]?>"><?php echo @$pn['position_4']['news_title_'.$i]?></a></h3>
                                        <div class="post-editor-date">
                                            <!-- post date -->
                                            <div class="post-date">
                                                <i class="pe-7s-clock"></i> <?php echo @$pn['position_4']['ptime_'.$i]?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                            </div>

                        </div>
                        <?php }?>


                        <!-- international Area
                            ============================================ -->
                           <?php if(@$home_page_positions[5]['status']==1){ ?>
                        <div class="col-sm-6 col-md-6">
                            <div class="international">
                                <h3 class="category-headding "><?php echo @$home_page_positions[5]['cat_name'];?></h3>
                                <div class="headding-border bg-color-2"></div>
                                 <?php if(@$pn['position_5']['news_title_1']!=NULL){?>
                                <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                                    <!-- post title -->
                                    <h3><a href="<?php echo @$pn['position_5']['news_link_1']?>"><?php echo @$pn['position_5']['news_title_1']?></a></h3>
                                    <!-- post image -->
                                    <div class="post-thumb">
                                        <?php if(@$pn['position_5']['image_check_1']){?>
                                            <a href="<?php echo @$pn['position_5']['news_link_1']?>">
                                                        <img src="<?php echo @$pn['position_5']['image_large_1']?>" class="img-responsive" alt="">
                                                    </a>
                                        <?php } else{ ?>
                                            <a href="<?php echo @$pn['position_5']['news_link_1']?>" rel="bookmark">
                                                <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo @$pn['position_5']['video_1'];?>/0.jpg" alt="" >
                                            </a>
                                        <?php }?>
                                    </div>
                                </div>
                                <div class="post-title-author-details">
                                    <div class="post-editor-date">
                                        <!-- post date -->
                                        <div class="post-date">
                                            <i class="pe-7s-clock"></i> <?php echo @$pn['position_5']['ptime_1']?>
                                        </div>
                                    </div>
                                    <p>
                                    <?php
                                            $news_details = (@$pn['position_5']['full_news_1']); 
                                            echo $exploded = implode(' ', array_slice(explode(' ', $news_details), 0, 20));
                                            ?>
                                        <a href="<?php echo @$pn['position_5']['news_link_1']?>"><?php echo $lan['details'];?></a>
                                    </p>
                                </div>
                                <?php } ?>

                                <?php for($i=2; $i<=3; $i++){
                                    if (!isset($pn['position_5']['news_title_'.$i]))
                                    continue;
                                ?>
                                <div class="box-item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                                    <div class="img-thumb">
                                        <?php if(@$pn['position_5']['image_check_'.$i]){?>
                                           <a href="<?php echo @$pn['position_5']['news_link_'.$i]?>" rel="bookmark"><img class="entry-thumb" src="<?php echo @$pn['position_5']['image_thumb_'.$i]?>" alt="" height="70" width="100"></a>
                                        <?php } else{ ?>
                                            <a href="<?php echo @$pn['position_5']['news_link_'.$i]?>" rel="bookmark">
                                                <img class="entry-thumb" src="http://img.youtube.com/vi/<?php echo @$pn['position_5']['video_'.$i];?>/0.jpg" alt="" height="70" width="100">
                                            </a>
                                        <?php }?>
                                    </div>
                                    <div class="item-details">
                                        <h3 class="td-module-title"><a href="<?php echo @$pn['position_5']['news_link_'.$i]?>"><?php echo @$pn['position_5']['news_title_'.$i]?></a></h3>
                                        <div class="post-editor-date">
                                            <!-- post date -->
                                            <div class="post-date">
                                                <i class="pe-7s-clock"></i><?php echo @$pn['position_5']['ptime_'.$i]?>
                                            </div>
                                            <!-- post comment -->
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <!-- /.international -->
                        </div>
                        <?php } ?>

                    </div>
                    <!-- technology Area
                        ============================================ -->
                    <?php if(@$home_page_positions[6]['status']==1){ ?>
                    <section class="politics_wrapper">
                        <h3 class="category-headding "><?php echo @$home_page_positions[6]['cat_name'];?></h3>
                        <div class="headding-border"></div>
                        <div class="row">
                            <div id="content-slide-3" class="owl-carousel">
                                <!-- item-1 -->
                                <div class="item">
                                    <div class="row">
                                        <!-- left side post -->
                                        <div class="col-sm-6 col-md-6">
                                         <?php if(@$pn['position_6']['news_title_1']!=NULL){?>
                                            <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                                                <!-- post title -->
                                                <h3><a href="<?php echo @$pn['position_6']['news_link_1']?>"><?php echo @$pn['position_6']['news_title_1']?></a></h3>
                                                <!-- post image -->
                                                <div class="post-thumb">

                                                <?php if(@$pn['position_6']['image_check_1']){?>
                                                    <a href="<?php echo @$pn['position_6']['news_link_1']?>">
                                                        <img src="<?php echo @$pn['position_6']['image_large_1']?>" class="img-responsive" alt="">
                                                    </a>
                                                <?php } else{ ?>
                                                    <a href="<?php echo @$pn['position_6']['image_large_1']?>" rel="bookmark">
                                                        <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo @$pn['position_6']['video_1'];?>/0.jpg" alt="" >
                                                    </a>
                                                <?php }?>
                                                </div>
                                            </div>
                                            <div class="post-title-author-details">
                                                <div class="post-editor-date">
                                                    <!-- post date -->
                                                    <div class="post-date">
                                                        <i class="pe-7s-clock"></i> <?php echo @$pn['position_6']['ptime_1']?>
                                                    </div>
                                                    <!-- post comment -->
                                                </div>
                                                <p>
                                                    <?php
                                                        $news_details = (@$pn['position_6']['full_news_1']); 
                                                        echo $exploded = implode(' ', array_slice(explode(' ', $news_details), 0, 20));
                                                    ?>
                                                        <a href="<?php echo @$pn['position_6']['news_link_1']?>"><?php echo $lan['details'];?></a>
                                                </p>
                                            </div>
                                            <?php }?>
                                        </div>

                                        <!-- right side post -->
                                        <div class="col-sm-6 col-md-6">
                                            <div class="row rn_block">
                                            <?php for($i=2; $i<=5; $i++){
                                                if (!isset($pn['position_6']['news_title_'.$i]))
                                                continue;
                                            ?>
                                                <div class="col-xs-6 col-md-6 col-sm-6 post-padding">
                                                    <!-- post image -->
                                                    <div class="post-thumb wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                                                         <?php if(@$pn['position_6']['image_check_'.$i]){?>
                                                        <a href="<?php echo @$pn['position_6']['news_link_'.$i]?>">
                                                            <img src="<?php echo @$pn['position_6']['image_thumb_'.$i]?>" class="img-responsive" alt="">
                                                        </a>
                                                        <?php } else{ ?>
                                                            <a href="<?php echo @$pn['position_6']['news_link_'.$i];?>" rel="bookmark">
                                                                <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo @$pn['position_6']['video_'.$i];?>/0.jpg" alt="" >
                                                            </a>
                                                        <?php }?>
                                                    </div>
                                                    <div class="post-title-author-details">
                                                        <!-- post image -->
                                                        <h5><a href="<?php echo @$pn['position_6']['news_link_'.$i]?>"><?php echo @$pn['position_6']['news_title_'.$i]?></a></h5>
                                                        <div class="post-editor-date">
                                                            <!-- post date -->
                                                            <div class="post-date">
                                                                <i class="pe-7s-clock"></i> <?php echo @$pn['position_6']['ptime_'.$i]?>
                                                            </div>
                                                            <!-- post comment -->
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
                                        <!-- left side post -->
                                        <div class="col-sm-6 col-md-6">
                                         <?php if(@$pn['position_6']['news_title_6']!=NULL){?>
                                            <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                                                <!-- post title -->
                                                <h3><a href="<?php echo @$pn['position_6']['news_link_6']?>"><?php echo @$pn['position_6']['news_title_6']?></a></h3>
                                                <!-- post image -->
                                                <div class="post-thumb">
                                                    <?php if(@$pn['position_6']['image_check_6']){?>
                                                    <a href="<?php echo @$pn['position_6']['news_link_6']?>">
                                                        <img src="<?php echo @$pn['position_6']['image_large_6']?>" class="img-responsive" alt="">
                                                    </a>
                                                        <?php } else{ ?>
                                                            <a href="<?php echo @$pn['position_6']['news_link_6']?>" rel="bookmark">
                                                                <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo @$pn['position_6']['video_6'];?>/0.jpg" alt="" >
                                                            </a>
                                                        <?php }?>
                                                    
                                                </div>
                                            </div>
                                            <div class="post-title-author-details">
                                                <div class="post-editor-date">
                                                    <!-- post date -->
                                                    <div class="post-date">
                                                        <i class="pe-7s-clock"></i> <?php echo @$pn['position_6']['ptime_6']?>
                                                    </div>
                                                    <!-- post comment -->
                                                 </div>
                                                <p>
                                                    <?php
                                                        $news_details = (@$pn['position_6']['full_news_6']); 
                                                        echo $exploded = implode(' ', array_slice(explode(' ', $news_details), 0, 20));
                                                        ?>
                                                    <a href="<?php echo @$pn['position_6']['news_link_6']?>"><?php echo $lan['details'];?></a>
                                                </p>
                                            </div>
                                            <?php }?>
                                        </div>
                                        <!-- right side post -->
                                        <div class="col-sm-6 col-md-6">
                                            <div class="row rn_block">
                                            <?php for($i=7;$i<=10; $i++){
                                                if (!isset($pn['position_6']['news_title_'.$i]))
                                                continue;
                                            ?>
                                                <div class="col-xs-6 col-md-6 col-sm-6 post-padding">
                                                    <!-- post image -->
                                                    <div class="post-thumb wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                                                        
                                                        <?php if(@$pn['position_6']['image_check_'.$i]){?>
                                                        <a href="<?php echo @$pn['position_6']['news_link_'.$i]?>">
                                                            <img src="<?php echo @$pn['position_6']['image_thumb_'.$i]?>" class="img-responsive" alt="">
                                                        </a>
                                                        <?php } else{ ?>
                                                            <a href="<?php echo @$pn['position_6']['news_link_'.$i];?>" rel="bookmark">
                                                                <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo @$pn['position_6']['video_'.$i];?>/0.jpg" alt="" >
                                                            </a>
                                                        <?php }?>

                                                       
                                                    </div>
                                                    <div class="post-title-author-details">
                                                        <!-- post image -->
                                                        <h5><a href="<?php echo @$pn['position_6']['news_link_'.$i]?>"><?php echo @$pn['position_6']['news_title_'.$i]?></a></h5>
                                                        <div class="post-editor-date">
                                                            <!-- post date -->
                                                            <div class="post-date">
                                                                <i class="pe-7s-clock"></i><?php echo @$pn['position_6']['ptime_'.$i]?>
                                                            </div>
                                                            <!-- post comment -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </section>
                    <?php } ?>
                </div>


                <!-- second content aside -->
                <div class="col-md-4 col-sm-4 left-padding">
                    <aside>
                        <!-- online vote -->
                        <div class="online-vote">
                            <h3 class="category-headding "><?php echo display('online_vot')?></h3>
                            <div class="headding-border"></div>
                            <div class="vote-inner">
                                <?php
                                    $this->load->view('themes/' . $default_theme . '/voting.php');
                                ?>
                            </div>
                        </div>
                        <!-- /.online vote -->

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
                        </div>
                        <!-- /.social icon -->

                         <?php if(@$home_page_positions[7]['status']==1){ ?>
                        <!-- video -->
                        <div class="video-headding"><?php echo display('video_striming')?></div>
                        <div id="rypp-demo-4" class="RYPP r16-9" data-playlist="PLw8TejMbmHM6IegrJ4iECWNoFuG7RiCV_">
                            <div class="RYPP-playlist">
                                <script type="text/javascript" src="<?php echo base_url(); ?>movi/highslide-with-html.js"></script>
                                <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>movi/highslide.css" />
                                
                                <script type="text/javascript">
                                    // Apply the Highslide settings
                                    hs.graphicsDir = '<?php echo base_url(); ?>movi/graphics/';
                                    hs.outlineType = 'rounded-white';
                                    hs.outlineWhileAnimating = true;
                                </script>
                                <div class="RYP-items">
                                    <ol>
                                    <?php for($i=1;$i<=5;$i++){
                                        if (!isset($pn['position_7']['news_title_'.$i]))
                                        continue;
                                    ?>
                                       <li class="selected" >
                                           <p class="title" style="width: 67%">
                                           <a style="width: 67%; color: #fff;" href="http://www.youtube.com/embed/<?php echo @$pn['position_7']['video_'.$i]?>?rel=0&amp;wmode=transparent"
                                                onclick="return hs.htmlExpand(this, {objectType: 'iframe', width: 480, height: 385, 
                                                        allowSizeReduction: false, wrapperClassName: 'draggable-header no-footer', 
                                                        preserveContent: false, objectLoadTime: 'after'})">
                                           <?php echo @$pn['position_7']['news_title_'.$i]?>
                                           </a>
                                           <small class="author"><br><?php echo @$pn['position_7']['post_by_name_'.$i]?></small></p>
                                                <a href="http://www.youtube.com/embed/<?php echo @$pn['position_7']['video_'.$i]?>?rel=0&amp;wmode=transparent"
                                                onclick="return hs.htmlExpand(this, {objectType: 'iframe', width: 480, height: 385, 
                                                        allowSizeReduction: false, wrapperClassName: 'draggable-header no-footer', 
                                                        preserveContent: false, objectLoadTime: 'after'})">    
                                                  
                                            <?php
                                                if (@$pn['position_7']['image_check_'.$i]!=NULL) {
                                                  echo'<img class="img-responsive" style="width: 85px" src="'.@$pn['position_7']['image_thumb_'.$i].'" alt="">';
                                                } else {
                                                    echo'<img style="width: 85px" src="https://i.ytimg.com/vi/'. @$pn['position_7']['video_'.$i].'/default.jpg" class="thumb">';
                                                }
                                            ?>

                                                </a>
                                       </li>
                                    <?php } ?>
                                    </ol>   
                                </div>

                            </div>
                        </div>
                         <?php } ?>
                        <!-- /.video -->
                    </aside>
                </div>
            </div>
        </div>
    </section>


    <!-- second content end -->
    <div class="container">
        <!-- /.adds -->
        <div class="row">
            <div class="<?php echo (@$lg_status_14==0?'hidden-lg hidden-md':'')?> <?php echo (@$sm_status_14==0?'hidden-xs hidden-sm':'')?>">
                <div class="ads">
                    <?php echo @$home_14;?>
                </div>
            </div>
        </div>
    </div>
    <!-- /.adds-->
    <!-- all category  news Area
        ============================================ -->
    <section class="all-category-inner">
        <div class="container">
            <div class="row">

                <div class="col-md-4 col-sm-4">
                 <?php if(@$home_page_positions[8]['status']==1){ ?>
                    <!-- sports -->
                    <div class="sports-inner">
                        <h3 class="category-headding "><?php echo @$home_page_positions[8]['cat_name'];?></h3>
                        <div class="headding-border bg-color-1"></div>
                         <?php if(@$pn['position_8']['news_title_1']!=NULL){?>
                        <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                            <!-- post title -->
                            <h3><a href="<?php echo @$pn['position_8']['news_link_1']?>"><?php echo @$pn['position_8']['news_title_1']?></a></h3>
                            <!-- post image -->
                            <div class="post-thumb">
                            <?php if(@$pn['position_8']['image_check_1']){?>
                              <a href="<?php echo @$pn['position_8']['news_link_1']?>">
                                    <img src="<?php echo @$pn['position_8']['image_large_1']?>" class="img-responsive" alt="">
                                </a>
                            <?php } else{ ?>
                                <a href="<?php echo @$pn['position_8']['news_link_1']?>" rel="bookmark">
                                    <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo @$pn['position_8']['video_1'];?>/0.jpg" alt="" >
                                </a>
                            <?php }?>

                                
                            </div>
                        </div>
                        <div class="post-title-author-details">
                            <div class="post-editor-date">
                                <!-- post date -->
                                <div class="post-date">
                                    <i class="pe-7s-clock"></i> <?php echo @$pn['position_8']['ptime_1']?>
                                </div>
                                <!-- post comment -->
                            </div>
                            <p>
                                <?php
                                    $news_details = (@$pn['position_8']['full_news_1']); 
                                    echo $exploded = implode(' ', array_slice(explode(' ', $news_details), 0, 20));
                                ?>
                                <a href="<?php echo @$pn['position_8']['news_link_1']?>"><?php echo $lan['details'];?></a>
                            </p>
                        </div>
                        <?php }?>
                    </div>
                     <?php } ?>
                </div>
                <!-- /.sports -->
                <div class="col-md-4 col-sm-4">
                <?php if(@$home_page_positions[9]['status']==1){?>
                    <!-- fashion -->
                    <div class="fashion-inner">
                        <h3 class="category-headding "><?php echo @$home_page_positions[9]['cat_name']?></h3>
                        <div class="headding-border bg-color-4"></div>
                         <?php if(@$pn['position_9']['news_title_1']!=NULL){?>
                        <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                            <!-- post title -->
                            <h3><a href="<?php echo @$pn['position_9']['news_link_1']?>">
                            <?php echo @$pn['position_9']['news_title_1']?></a></h3>
                            <!-- post image -->
                            <div class="post-thumb">

                            <?php if(@$pn['position_9']['image_check_1']){?>
                              <a href="<?php echo @$pn['position_9']['news_link_1']?>">
                                    <img src="<?php echo @$pn['position_9']['image_large_1']?>" class="img-responsive" alt="">
                                </a>
                            <?php } else{ ?>
                                <a href="<?php echo @$pn['position_9']['news_link_1']?>" rel="bookmark">
                                    <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo @$pn['position_9']['video_1'];?>/0.jpg" alt="" >
                                </a>
                            <?php }?>
                                
                            </div>
                        </div>
                        <div class="post-title-author-details">
                            <div class="post-editor-date">
                                <!-- post date -->
                                <div class="post-date">
                                    <i class="pe-7s-clock"></i> <?php echo @$pn['position_9']['ptime_1']?>
                                </div>
                                <!-- post comment -->
                            </div>
                            <p>
                                <?php
                                $news_details = (@$pn['position_9']['full_news_1']); 
                                echo $exploded = implode(' ', array_slice(explode(' ', $news_details), 0, 20));
                                ?>
                                <a href="<?php echo @$pn['position_9']['news_link_1']?>"><?php echo $lan['details'];?></a>
                            </p>
                        </div>
                        <?php }?>
                    </div>
                    <?php }?>
                </div>
                <!-- /.fashion -->
                <div class="col-md-4 col-sm-4">
                <?php if(@$home_page_positions[10]['status']==1){?>
                    <!-- travel -->
                    <div class="travel-inner">
                        <h3 class="category-headding "><?php echo $home_page_positions[10]['cat_name']?></h3>
                        <div class="headding-border bg-color-3"></div>
                         <?php if(@$pn['position_10']['news_title_1']!=NULL){?>
                        <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                            <!-- post title -->
                            <h3><a href="<?php echo @$pn['position_10']['news_link_1']?>"><?php echo @$pn['position_10']['news_title_1']?></a></h3>
                            <!-- post image -->
                            <div class="post-thumb">

                            <?php if(@$pn['position_10']['image_check_1']){?>
                               <a href="<?php echo @$pn['position_10']['news_link_1']?>">
                                    <img src="<?php echo @$pn['position_10']['image_large_1']?>" class="img-responsive" alt="">
                                </a>
                            <?php } else{ ?>
                                <a href="<?php echo @$pn['position_10']['news_link_1']?>" rel="bookmark">
                                    <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo @$pn['position_10']['video_1'];?>/0.jpg" alt="" >
                                </a>
                            <?php }?>

                               
                            </div>
                        </div>
                        <div class="post-title-author-details">
                            <div class="post-editor-date">
                                <!-- post date -->
                                <div class="post-date">
                                    <i class="pe-7s-clock"></i> <?php echo @$pn['position_10']['ptime_1']?>
                                </div>
                                <!-- post comment -->
                            </div>
                          <p>
                                <?php
                                    $news_details = (@$pn['position_10']['full_news_1']); 
                                    echo $exploded = implode(' ', array_slice(explode(' ', $news_details), 0, 20));
                                ?>
                                <a href="<?php echo @$pn['position_10']['news_link_1']?>"><?php echo $lan['details'];?></a>
                            </p>
                         </div>
                         <?php }?>
                    </div>
                </div>
                <?php } ?>
                <!-- /.travel -->
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4">
                <?php if(@$home_page_positions[11]['status']==1){?>
                    <!-- food -->
                    <div class="food-inner">
                        <h3 class="category-headding "><?php echo @$home_page_positions[11]['cat_name']?></h3>
                        <div class="headding-border bg-color-4"></div>
                         <?php if(@$pn['position_11']['news_title_1']!=NULL){?>
                        <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                            <!-- post title -->
                            <h3><a href="<?php echo @$pn['position_11']['news_link_1']?>"><?php echo @$pn['position_11']['news_title_1']?></a></h3>
                            <!-- post image -->
                            <div class="post-thumb">

                            <?php if(@$pn['position_11']['image_check_1']){?>
                               <a href="<?php echo @$pn['position_11']['news_link_1']?>">
                                    <img src="<?php echo @$pn['position_11']['image_large_1']?>" class="img-responsive" alt="">
                                </a>
                            <?php } else{ ?>
                                <a href="<?php echo @$pn['position_11']['news_link_1']?>" rel="bookmark">
                                    <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo @$pn['position_11']['video_1'];?>/0.jpg" alt="" >
                                </a>
                            <?php }?>
                            </div>
                        </div>
                        <div class="post-title-author-details">
                            <div class="post-editor-date">
                                <!-- post date -->
                                <div class="post-date">
                                    <i class="pe-7s-clock"></i> <?php echo @$pn['position_11']['ptime_1']?>
                                </div>
                                <!-- post comment -->
                            </div>
                            <p>
                                <?php
                                $news_details = (@$pn['position_11']['full_news_1']); 
                                echo $exploded = implode(' ', array_slice(explode(' ', $news_details), 0, 20));
                                ?>
                                <a href="<?php echo @$pn['position_11']['news_link_1']?>"><?php echo $lan['details'];?></a>
                            </p>
                       </div>
                       <?php }?>
                    </div>
                    <?php }?>
                </div>
                <!-- /.food -->
                <div class="col-md-4 col-sm-4">
                <?php if(@$home_page_positions[12]['status']==1){?>
                    <!-- politics -->
                    <div class="politics-inner">
                        <h3 class="category-headding "><?php echo $home_page_positions[12]['cat_name']?></h3>
                        <div class="headding-border bg-color-5"></div>
                         <?php if(@$pn['position_12']['news_title_1']!=NULL){?>
                        <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                            <!-- post title -->
                            <h3><a href="<?php echo @$pn['position_12']['news_link_1']?>"><?php echo @$pn['position_12']['news_title_1']?></a></h3>
                            <!-- post image -->
                            <div class="post-thumb">

                            <?php if(@$pn['position_12']['image_check_1']){?>
                                <a href="<?php echo @$pn['position_12']['news_link_1']?>">
                                    <img src="<?php echo @$pn['position_12']['image_large_1']?>" class="img-responsive" alt="">
                                </a>
                            <?php } else{ ?>
                                <a href="<?php echo @$pn['position_12']['news_link_1']?>" rel="bookmark">
                                    <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo @$pn['position_12']['video_1'];?>/0.jpg" alt="" >
                                </a>
                            <?php }?>
                                
                            </div>
                        </div>
                        <div class="post-title-author-details">
                            <div class="post-editor-date">
                                <!-- post date -->
                                <div class="post-date">
                                    <i class="pe-7s-clock"></i> <?php echo @$pn['position_12']['ptime_1']?>
                                </div>
                                <!-- post comment -->
                            </div>
                          <p>
                                <?php
                                $news_details = (@$pn['position_12']['full_news_1']); 
                                echo $exploded = implode(' ', array_slice(explode(' ', $news_details), 0, 20));
                                ?>
                                <a href="<?php echo @$pn['position_12']['news_link_1']?>"><?php echo $lan['details'];?></a>
                            </p>
                         </div>
                         <?php }?>
                    </div>
                    <?php }?>
                </div>
                <!-- /.politics -->
                <div class="col-md-4 col-sm-4">
                <?php if(@$home_page_positions[13]['status']==1){?>
                    <!-- health -->
                    <div class="health-inner">
                        <h3 class="category-headding "><?php echo $home_page_positions[13]['cat_name']?></h3>
                        <div class="headding-border bg-color-3"></div>
                         <?php if(@$pn['position_13']['news_title_1']!=NULL){?>
                        <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                            <!-- post title -->
                            <h3><a href="<?php echo @$pn['position_13']['news_link_1']?>"><?php echo @$pn['position_13']['news_title_1']?></a></h3>
                            <!-- post image -->
                            <div class="post-thumb">

                                <?php if(@$pn['position_13']['image_check_1']){?>
                                    <a href="<?php echo @$pn['position_13']['news_link_1']?>">
                                    <img class="img-responsive" src="<?php echo @$pn['position_13']['image_thumb_1']?>" alt="">
                                </a>
                                    <?php } else{ ?>
                                        <a href="<?php echo @$pn['position_13']['news_link_1']?>" rel="bookmark">
                                            <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo @$pn['position_13']['video_1'];?>/0.jpg" alt="" >
                                        </a>
                                    <?php }?>
                            </div>
                        </div>
                        <div class="post-title-author-details">
                            <div class="post-editor-date">
                                <!-- post date -->
                                <div class="post-date">
                                    <i class="pe-7s-clock"></i> <?php echo @$pn['position_13']['ptime_1']?>
                                </div>
                                <!-- post comment -->
                            </div>
                        <p>
                                <?php
                                $news_details = (@$pn['position_13']['full_news_1']); 
                                echo $exploded = implode(' ', array_slice(explode(' ', $news_details), 0, 20));
                                ?>
                                <a href="<?php echo @$pn['position_13']['news_link_1']?>"><?php echo $lan['details'];?></a>
                            </p>
                        </div>
                        <?php }?>
                    </div>
                    <?php }?>
                </div>
                <!-- /.health -->
            </div>
        </div>
    </section>
    <!-- article section Area
        ============================================ -->
    <div class="lat_arti_cont_wrap">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <!-- article -->
                  
                    <?php if(@$home_page_positions[14]['status']==1){?>
                    <section class="articale-inner">
                        <h3 class="category-headding "><?php echo $home_page_positions[14]['cat_name']?></h3>
                        <div class="headding-border"></div>
                        <div class="row">
                            <div id="content-slide-5" class="owl-carousel">
                                <!-- item-1 -->
                                <div class="item">
                                    <div class="row rn_block">
                                    <?php for($i=1; $i<=6; $i++){
                                        if (!isset($pn['position_14']['news_title_'.$i]))
                                    continue;
                                    ?>
                                        <div class="col-xs-6 col-md-4 col-sm-4 padd">
                                            <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                                                <!-- image -->
                                                <div class="post-thumb">
                                                    
                                                <?php if(@$pn['position_14']['image_check_'.$i]){?>
                                                        <a href="<?php echo @$pn['position_14']['news_link_'.$i]?>">
                                                        <img class="img-responsive" src="<?php echo @$pn['position_14']['image_thumb_'.$i]?>" alt="">
                                                    </a>
                                                        <?php } else{ ?>
                                                            <a href="<?php echo @$pn['position_14']['news_link_'.$i]?>" rel="bookmark">
                                                                <img class="img-responsive" src="http://img.youtube.com/vi/<?php echo @$pn['position_14']['video_'.$i];?>/0.jpg" alt="" >
                                                            </a>
                                                        <?php }?>
                                                </div>
                                                <div class="post-info meta-info-rn">
                                                    <div class="slide">
                                                        <a target="_blank" href="<?php echo @$pn['position_14']['news_link_'.$i]?>" class="post-badge btn_five"><?php echo @$pn['position_14']['category_'.$i]?></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post-title-author-details">
                                                <h4><a href="<?php echo @$pn['position_14']['news_link_'.$i]?>"><?php echo @$pn['position_14']['news_title_'.$i]?></a></h4>
                                                <div class="post-editor-date">
                                                    <div class="post-date">
                                                        <i class="pe-7s-clock"></i> <?php echo @$pn['position_14']['ptime_'.$i]?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php }?>
                                    </div>
                                </div>
                                <!-- item-2 -->
                                <div class="item">
                                    <div class="row rn_block">
                                    <?php for($i=7; $i<=12; $i++){
                                        if (!isset($pn['position_14']['news_title_'.$i]))
                                    continue;
                                    ?>
                                        <div class="col-xs-6 col-md-4 col-sm-4 padd">
                                            <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                                                <!-- image -->
                                                <div class="post-thumb">
                                                    <a href="<?php echo @$pn['position_14']['news_link_'.$i]?>">
                                                        <img class="img-responsive" src="<?php echo @$pn['position_14']['image_large_'.$i]?>" alt="">
                                                    </a>
                                                </div>
                                                <div class="post-info meta-info-rn">
                                                    <div class="slide">
                                                        <a target="_blank" href="<?php echo @$pn['position_14']['news_link_'.$i]?>" class="post-badge btn_five"><?php echo @$pn['position_14']['category_'.$i]?></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post-title-author-details">
                                                <h4><a href="<?php echo @$pn['position_14']['news_link_'.$i]?>"><?php echo @$pn['position_14']['news_title_'.$i]?></a></h4>
                                                <div class="post-editor-date">
                                                    <div class="post-date">
                                                        <i class="pe-7s-clock"></i> <?php echo @$pn['position_14']['ptime_'.$i]?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php }?>
                </div>


                <!-- /.article -->
                 <!-- /.article -->
                <div class="col-sm-4 left-padding">
                    <aside>
                        <h3 class="category-headding ">
                        <?php 
                         if($footer_menu>0)
                         foreach (@$footer_menu as $key => $name) {}
                        echo @$name->menu_name;
                        ?>
                            
                        </h3>
                        <div class="headding-border bg-color-2"></div>
                        <div class="cats-widget">
                            <ul>
                                <?php 
                                if (isset($footer_menu) && is_array($footer_menu)) {
                                    foreach ($footer_menu as $value) {
                                       echo '<li><a href="' . base_url() . $value->slug . '">' . $value->menu_lavel . '</a></li>';
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>

    