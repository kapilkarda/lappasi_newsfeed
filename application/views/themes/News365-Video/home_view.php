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
                <div class="hidden-xs col-sm-3 col-padding">
                    <?php 
                        for($i=2;$i<=3;$i++){
                            if(!isset($hn['news_title_'.$i]))
                                continue
                    ?>
                    <div class="post-wrapper post-grid-1 wow fadeIn" data-wow-duration="2s">
                        <div class="post-thumb">
                            <?php
                                if (@$hn['image_check_'.$i]!=NULL){
                                    echo'<a href="'.@$hn['news_link_'.$i].'">
                                            <img class="entry-thumb" src="'. @$hn['image_thumb_'.$i].'" alt="">
                                        </a>';
                                } else {
                                    echo '<a class="entry-thumb" href="'.@$hn['news_link_'.$i].'"><img  src="http://img.youtube.com/vi/' . @$hn['video_' . $i] . '/0.jpg" /></a>';
                                }
                            ?>     
                        </div>

                        <div class="post-info">
                            <span class="color-3"><?php echo @$hn['category_'.$i]?></span>
                            <h3 class="post-title post-title-size"><a href="<?php echo @$hn['news_link_'.$i];?>" rel="bookmark"> <?php echo @$hn['news_title_'.$i];?></a></h3>
                            <div class="post-editor-date">
                                <div class="post-date">
                                    <i class="pe-7s-clock"></i><?php echo (date('l, d M, Y', @$hn['ptime_' . $i])); ?>
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
                <?php if(@$hn['news_title_1']!=NULL) {?>
                    <div class="post-wrapper post-grid-3 effects">
                        <div class="post-thumb">
                            <?php
                                if (@$hn['image_check_1']!=NULL) {
                                    echo' <div class="videoWrapper-1"><a href="'.@$hn['news_link_1'].'">
                                            <img  src="'. @$hn['image_large_1'].'" alt="">
                                        </a></div>';
                                } else {
                                  echo' <div class="videoWrapper-1"><a href="'.@$hn['news_link_1'].'">
                                    <img  src="http://img.youtube.com/vi/' . @$hn['video_1'] . '/0.jpg" />
                                    </a></div>';
                                }
                            ?>     
                            <div class="overlay" id="player">
                            <?php if(@$hn['video_1']!=NULL) {?>
                             <a href="<?php echo @$hn['news_link_1'];?>" class="expand" id="player-button"><i class="fa fa-play"></i></a>
                            <?php } else{?>
                             <a href="<?php echo @$hn['news_link_1'];?>" class="expand12"><i class="pe-7s-angle-right"></i></a>
                            <?php } ?>
                                
                                <a class="close-overlay hidden">x</a>
                            </div>
                        </div>
                        <div class="post-info hidden-xs" id="post-info">
                            <span class="color-4"><?php echo @$hn['category_1'];?></span>
                            <h3 class="post-title"><a href="<?php echo @$hn['news_link_1'];?>" rel="bookmark"><?php echo @$hn['news_title_1'];?></a></h3>
                            <div class="post-editor-date">
                                <!-- post date -->
                                <div class="post-date">
                                    <i class="pe-7s-clock"></i> <?php echo (date('l, d M, Y', @$hn['ptime_1'])); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>

                <div class="hidden-xs col-sm-3 col-padding">
                    <?php 
                        for($i=4;$i<=5;$i++){
                            if(!isset($hn['news_title_'.$i]))
                                continue
                    ?>
                    <div class="post-wrapper post-grid-4 wow fadeIn" data-wow-duration="2s">
                        <div class="post-thumb">
                            <?php
                            if (@$hn['image_check_'.$i]!=NULL) {
                                echo' <a href="'.@$hn['news_link_'.$i].'">
                                                <img class="entry-thumb" src="'. @$hn['image_thumb_'.$i].'" alt="">
                                            </a>';
                                } else {
                                      echo '<a href="'.@$hn['news_link_'.$i].'"><img width="100%" src="http://img.youtube.com/vi/' . @$hn['video_' . $i] . '/0.jpg" alt="photography" /></a>';
                                }
                            ?>
                        </div>

                        <div class="post-info">
                            <span class="color-1"><?php echo  @$hn['category_'.$i]; ?></span>
                            <h3 class="post-title post-title-size"><a href="<?php echo @$hn['news_link_'.$i]; ?>" rel="bookmark"><?php echo @$hn['news_title_'.$i];?></a></h3>
                            <div class="post-editor-date">
                                <!-- post date -->
                                <div class="post-date">
                                    <i class="pe-7s-clock"></i><?php echo (date('l, d M, Y', @$hn['ptime_' . $i])); ?>
                                </div>
                                <?php if (@$hn['video_'.$i]!=NULL) {?>
                                <a class="playvideo pull-right" href="<?php echo @$hn['news_link_'.$i];?>"><i class="fa fa-play-circle-o"></i></a>
                                <?php } else{?>
                                <a class="readmore pull-right" href="<?php echo @$hn['news_link_'.$i];?>"><i class="pe-7s-angle-right"></i></a>
                                 <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php 
                       }
                    ?>
                </div>
            </div>
        </div>
    </section>


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8">
                <div class="banner <?php echo (@$lg_status_12==0?'hidden-lg hidden-md':'')?> <?php echo (@$sm_status_12==0?'hidden-xs hidden-sm':'')?>">
                    <?php echo @$home_12; ?>
                </div> 
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
                                if(!isset($pn['position_1']['news_title_'.$i]))
                                continue
                            ?>
                            <div class="item home2-post effects">
                                <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                                    <!-- image -->
                                    <div class="post-thumb">
                                            <?php
                                                if (@$pn['position_1']['image_check_'.$i]!=NULL) {
                                                echo' <a href="'.@$pn['position_1']['news_link_'.$i].'">
                                                            <img class="img-responsive" src="'. @$pn['position_1']['image_thumb_'.$i].'" alt="">
                                                        </a>';
                                                } else {
                                                    echo '<a href="'.@$pn['position_1']['news_link_'.$i].'">
                                                    <img width="100%" src="http://img.youtube.com/vi/' . @$pn['position_1']['video_' . $i] . '/0.jpg" alt="photography" /></a>';
                                                }
                                            ?>
                                            <div class="overlay">
                                                <?php if(@$$pn['position_1']['video_1']!=NULL) {?>
                                                 <a href="<?php echo @$pn['position_1']['news_link_'.$i]; ?>" class="expand"><i class="fa fa-play"></i></a>
                                                <?php } else{?>
                                                 <a href="<?php echo @$pn['position_1']['news_link_'.$i]; ?>" class="expand12"><i class="pe-7s-angle-right"></i></a>
                                                <?php } ?>
                                                <a class="close-overlay hidden">x</a>
                                            </div>
                                    </div>
                                </div>
                                <h3><a href="<?php echo @$pn['position_1']['news_link_'.$i]; ?>"><?php echo @$pn['position_1']['news_title_'.$i]; ?></a></h3>
                            </div>
                            <?php 
                                }
                            ?>
                        </div>
                    </div>

                    <div class="row rn_block">
                        <?php 
                            for($i=4; $i<=6; $i++){
                             if(!isset($pn['position_1']['news_title_'.$i]))
                                continue   
                        ?>
                        <div class="col-md-4 col-sm-4 padd">
                            <div class="home2-post">
                                <div class="post-wrapper wow fadeIn effects" data-wow-duration="1s">
                                    <!-- image -->
                                    <div class="post-thumb">
                                        
                                            <?php
                                                if (@$pn['position_1']['image_check_'.$i]!=NULL) {
                                                  echo' <a href="'.@$pn['position_1']['news_link_'.$i].'">
                                                            <img class="img-responsive" src="'. @$pn['position_1']['image_thumb_'.$i].'" alt="">
                                                        </a>';
                                                } else {
                                                    echo '<a href="'.@$pn['position_1']['news_link_'.$i].'">
                                                    <img width="100%" src="http://img.youtube.com/vi/' . @$pn['position_1']['video_' . $i] . '/0.jpg" alt="photography" /></a>';
                                                 
                                                }
                                            ?>
                                            <div class="overlay">
                                             <?php if(@$pn['position_1']['video_'.$i]!=NULL) {?>
                                             <a href="<?php echo @$pn['position_1']['news_link_'.$i]; ?>" class="expand"><i class="fa fa-play"></i></a>
                                            <?php } else{?>
                                             <a href="<?php echo @$pn['position_1']['news_link_'.$i]; ?>" class="expand12"><i class="pe-7s-angle-right"></i></a>
                                            <?php } ?>

                                                <a class="close-overlay hidden">x</a>
                                            </div>
                                        
                                    </div>
                                </div>
                                <h4><a href="<?php echo @$pn['position_1']['news_link_'.$i]; ?>"><?php echo @$pn['position_1']['news_title_'.$i]; ?></a></h4>
                            </div>
                        </div>
                        <?php 
                           }
                        ?>
                    </div>
                </section>
                <?php
                    }
                ?>

                <!-- Politics Area
                    ============================================ -->
            <?php
                if (@$home_page_positions[2]['status'] == 1) {
            ?>
                <section class="politics_wrapper">
                    <h3 class="category-headding "><?php echo @$home_page_positions[2]['cat_name']; ?></h3>
                    <div class="headding-border"></div>
                    <div class="row">
                        <div id="content-slide-2" class="owl-carousel">
                            <!-- item-1 -->
                            <div class="item">
                                <div class="row">
                                    <!-- main post -->
                                    <?php  if (@$pn['position_2']['news_title_1']!=NULL) {?>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="post-wrapper wow fadeIn effects" data-wow-duration="2s">
                                            <!-- post title -->
                                            <h3><a href="<?php echo @$pn['position_2']['news_link_1']; ?>"><?php echo @$pn['position_2']['news_title_1']; ?></a></h3>
                                            <!-- post image -->
                                            <div class="post-thumb">
                                                <a href="<?php echo @$pn['position_2']['news_link_1']; ?>">
                                                    
                                            <?php
                                                if (@$pn['position_2']['image_check_1']!=NULL) {
                                                            echo' <a href="'.@$pn['position_2']['news_link_1'].'">
                                                                <img class="img-responsive" src="'. @$pn['position_2']['image_thumb_1'].'" alt="">
                                                            </a>';
                                                 } else {
                                                     echo '<a href="'.@$pn['position_2']['news_link_1'].'">
                                                    <img width="100%" src="http://img.youtube.com/vi/' . @$pn['position_2']['video_1'] . '/0.jpg" alt="photography" /></a>';
                                                
                                                }
                                            ?>
                                                    <div class="overlay">
                                                    <?php if(@$pn['position_2']['video_1']!=NULL) {?>
                                                     <a href="<?php echo @$pn['position_2']['news_link_1']; ?>" class="expand"><i class="fa fa-play"></i></a>
                                                    <?php } else{?>
                                                     <a href="<?php echo @$pn['position_2']['news_link_1']; ?>" class="expand12"><i class="pe-7s-angle-right"></i></a>
                                                    <?php } ?>
                                                        <a class="close-overlay hidden">x</a>
                                                    </div>
                                                </a>
                                            </div>

                                            <div class="post-title-author-details">
                                                <div class="post-editor-date">
                                                    <!-- post date -->
                                                    <div class="post-date">
                                                        <i class="pe-7s-clock"></i> <?php echo @$pn['position_1']['ptime_1']; ?>
                                                    </div>
                                                    <!-- post comment -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }?>
                                    <!-- right side post -->
                                    <div class="col-sm-6 col-md-6">
                                        <div class="row rn_block">
                    <?php 
                        for($i=2;$i<=5;$i++){
                            if(!isset($pn['position_2']['news_title_'.$i]))
                                continue
                    ?>
                                            <div class="col-xs-6 col-md-6 col-sm-6 post-padding">
                                                <div class="home2-post effects">
                                                    <!-- post image -->
                                                    <div class="post-thumb wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                                                        <?php
                                                            if (@$pn['position_2']['image_check_'.$i]!=NULL) {
                                                                echo'<img class="img-responsive" src="'. $pn['position_2']['image_thumb_'.$i].'" alt="">';
                                                            } else {
                                                                echo '<img width="100%" src="http://img.youtube.com/vi/' . @$pn['position_2']['video_' . $i] . '/0.jpg" alt="photography" />';
                                                            }
                                                        ?>
                                                            <div class="overlay">
                                                                <?php if(@$pn['position_2']['video_'.$i]!=NULL) {?>
                                                                 <a href="<?php echo @$pn['position_2']['news_link_'.$i]; ?>" class="expand"><i class="fa fa-play"></i></a>
                                                                <?php } else{?>
                                                                 <a href="<?php echo @$pn['position_2']['news_link_'.$i]; ?>" class="expand12"><i class="pe-7s-angle-right"></i></a>
                                                                <?php } ?>
                                                                <a class="close-overlay hidden">x</a>
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="post-title-author-details">
                                                        <!-- post image -->
                                                        <h5><a href="<?php echo @$pn['position_2']['news_link_'.$i]; ?>"><?php echo @$pn['position_2']['news_title_'.$i]; ?></a></h5>
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
                                        <div class="post-wrapper wow fadeIn effects" data-wow-duration="2s">
                                            <!-- post title -->
                                            <h3><a href="<?php echo @$pn['position_2']['news_link_6']; ?>"><?php echo @$pn['position_2']['news_title_6']; ?></a></h3>
                                            <!-- post image -->
                                            <div class="post-thumb">
                                                <a href="<?php echo @$pn['position_2']['news_link_6']; ?>">
                                                   <?php if(@$pn['position_2']['image_check_6']){?>
                                                    <img src="<?php echo @$pn['position_2']['image_large_6']; ?>" class="img-responsive" alt="">
                                                    <?php }else{?>
                                                     <img src="<?php echo @$pn['position_2']['vodeo_6']; ?>" class="img-responsive" alt="">
                                                    <?php } ?>
                                                    <div class="overlay">
                                                        <?php if(@$pn['position_2']['video_6']!=NULL) {?>
                                                                 <a href="<?php echo @$pn['position_2']['news_link_6']; ?>" class="expand"><i class="fa fa-play"></i></a>
                                                                <?php } else{?>
                                                                 <a href="<?php echo @$pn['position_2']['news_link_6']; ?>" class="expand12"><i class="pe-7s-angle-right"></i></a>
                                                                <?php } ?>
                                                         <a class="close-overlay hidden">x</a>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="post-title-author-details">
                                                <div class="post-editor-date">
                                                    <!-- post date -->
                                                    <div class="post-date">
                                                        <i class="pe-7s-clock"></i><?php echo @$pn['position_1']['ptime_6']; ?>
                                                    </div>
                                                    <!-- post comment -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- right side post -->
                                    <div class="col-sm-6 col-md-6">
                                        <div class="row rn_block">
                                    <?php 
                                        for($i=7;$i<=10;$i++){
                                            if(!isset($pn['position_2']['news_title_'.$i]))
                                            continue
                                    ?>
                                            <div class="col-xs-6 col-md-6 col-sm-6 post-padding">
                                                <div class="home2-post effects">
                                                    <!-- post image -->
                                                    <div class="post-thumb wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                                                            <?php
                                                                if (@$pn['position_2']['image_check_'.$i]) {
                                                                  echo'<img class="img-responsive" src="'.@$pn['position_2']['image_thumb_'.$i].'" alt="">';
                                                                } else {
                                                                    echo '<img width="100%" src="http://img.youtube.com/vi/' . @$pn['position_2']['video_'.$i] . '/0.jpg" alt="photography" />';
                                                                }
                                                            ?>
                                                            <div class="overlay">
                                                                <?php if(@$pn['position_2']['video_'.$i]!=NULL) {?>
                                                                 <a href="<?php echo @$pn['position_2']['news_link_'.$i]; ?>" class="expand"><i class="fa fa-play"></i></a>
                                                                <?php } else{?>
                                                                 <a href="<?php echo @$pn['position_2']['news_link_'.$i]; ?>" class="expand12"><i class="pe-7s-angle-right"></i></a>
                                                                <?php } ?>
                                                                <a class="close-overlay hidden">x</a>
                                                            </div>
                                                       
                                                    </div>
                                                    <div class="post-title-author-details">
                                                        <!-- post image -->
                                                        <h5><a href="<?php echo @$pn['position_2']['news_link_'.$i]; ?>"><?php echo @$pn['position_2']['news_title_'.$i]; ?></a></h5>
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
            <?php
                }
            ?>
                <!-- /.Politics -->
                <div class="ads <?php echo (@$lg_status_13==0?'hidden-lg hidden-md':'')?> <?php echo (@$sm_status_13==0?'hidden-xs hidden-sm':'')?>">
                   <?php echo @$home_14;?>
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
                <div class="banner-add <?php echo (@$lg_status_14==0?'hidden-lg hidden-md':'')?> <?php echo (@$sm_status_14==0?'hidden-xs hidden-sm':'')?>">
                    <!-- add -->
                    <span class="add-title"> </span>
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
                                    for($i=1; $i<=3; $i++){ 
                                        if(!isset($ln['news_title_'.$i]))
                                        continue
                                ?>
                                <div class="box-item wow fadeIn" data-wow-duration="1s">
                                    <div class="img-thumb">
                                        <?php if(@$ln['image_check_'.$i]!=NULL){?>
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
                             <?php for($i=1; $i<=3; $i++){ 
                                     if(!isset($mr['news_title_'.$i]))
                                    continue
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


    <!-- Video News Area
           <!-- Video News Area
 ============================================ -->
        <?php if(@$home_page_positions[3]['status']==1){ ?>
        <section class="video-post-inner">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="category-headding "><?php echo @$home_page_positions[3]['cat_name'];?></h3>
                        <div class="headding-border"></div>
                    </div>
                    <?php 
                    for($i=1; $i<=3; $i++){ 
                        if(!isset($pn['position_3']['news_title_'.$i]))
                            continue
                    ?>

                    <div class="col-sm-4">
                        <div class="post-style1">
                            <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                                <!-- post image -->
                                <?php
                                    if(@$pn['position_3']['image_check_'.$i]!=NULL) {
                                      echo'<a href="'.@$pn['position_3']['news_link_'.$i].'" class="video-img-icon"><i class="fa fa-play"></i>
                                      <img class="img-responsive" src="'.@$pn['position_3']['image_thumb_'.$i].'">
                                      </a>';
                                    } else {

                                        echo '<a href="'.@$pn['position_3']['news_link_'.$i].'" class="video-img-icon">
                                                <i class="fa fa-play"></i>
                                                <img  src="http://img.youtube.com/vi/'. @$pn['position_3']['video_' . $i].'/0.jpg" alt="" class="img-responsive">
                                            </a>';
                                    }
                                ?>
                                
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
    <section class="article-post-inner">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="row">
                    <?php if(@$home_page_positions[4]['status']==1){ ?>
                        <!-- business Area
                            ============================================ -->
                        <div class="col-sm-6 col-md-6">
                            <div class="buisness">
                                <h3 class="category-headding "><?php echo @$home_page_positions[4]['cat_name']?></h3>
                                <div class="headding-border bg-color-5"></div>
                                <?php  if (@$pn['position_4']['news_title_1']!=NULL) { ?>
                                <div class="post-wrapper wow fadeIn effects" data-wow-duration="1s">
                                    <!-- post title -->
                                    <h3><a href="<?php echo @$pn['position_4']['news_link_1']?>"> <?php echo @$pn['position_4']['news_title_1']?></a></h3>
                                    <!-- post image -->
                                    <div class="post-thumb">
                                        <?php
                                                if (@$pn['position_4']['image_check_1']) {
                                                  echo'<img class="img-responsive" src="'.@$pn['position_4']['image_thumb_1'].'" alt="">';
                                                } else {
                                                    echo '<img  class="img-responsive"  src="http://img.youtube.com/vi/' . @$pn['position_4']['video_1'] . '/0.jpg" alt="photography" />';
                                                }
                                            ?>
                                            <div class="overlay">
                                            <?php if(@$pn['position_4']['video_1']!=NULL) {?>
                                             <a href="<?php echo @$pn['position_4']['news_link_1']?>" class="expand"><i class="fa fa-play"></i></a>
                                            <?php } else{?>
                                             <a href="<?php echo @$pn['position_4']['news_link_1']?>" class="expand12"><i class="pe-7s-angle-right"></i></a>
                                            <?php } ?>
                                                <a class="close-overlay hidden">x</a>
                                            </div>
                                      
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
                                </div>
                                <?php }?>

                                 <?php 
                                 for($i=2;$i<=3;$i++){
                                    if(!isset($pn['position_4']['news_title_'.$i]))
                                    continue
                                ?>
                                    <div class="box-item wow fadeIn effects" data-wow-duration="1s" data-wow-delay="0.2s">
                                        <div class="img-thumb">
                                            
                                            <?php
                                                    if (@$pn['position_4']['image_check_'.$i]) {
                                                      echo'<img class="entry-thumb" src="'.@$pn['position_4']['image_thumb_'.$i].'" alt=""  height="70" width="100">';
                                                    } else {
                                                        echo '<img  class="entry-thumb"  height="70" width="100"  src="http://img.youtube.com/vi/' . @$pn['position_4']['video_'.$i] . '/0.jpg" alt="photography" />';
                                                    }
                                                ?>

                                                <div class="overlay">
                                                    <?php if(@$pn['position_4']['video_'.$i]!=NULL) {?>
                                                     <a href="<?php echo @$pn['position_4']['news_link_'.$i]?>" class="expand"><i class="fa fa-play"></i></a>
                                                    <?php } else{?>
                                                     <a href="<?php echo @$pn['position_4']['news_link_'.$i]?>" class="expand12"><i class="pe-7s-angle-right"></i></a>
                                                    <?php } ?>
                                                    <a class="close-overlay hidden">x</a>
                                                </div>
                                            
                                        </div>
                                        <div class="item-details">
                                            <h3 class="td-module-title"><a href="<?php echo @$pn['position_4']['news_link_'.$i]?>"><?php echo @$pn['position_4']['news_title_'.$i]?></a></h3>
                                            <div class="post-editor-date">
                                                <!-- post date -->
                                                <div class="post-date">
                                                    <i class="pe-7s-clock"></i> <?php echo @$pn['position_4']['ptime_'.$i]?>
                                                </div>
                                                <!-- post comment -->
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                
                            </div>
                        </div>

                        <?php }?>

                        <?php if(@$home_page_positions[5]['status']==1){ ?>
                        <!-- international Area
                            ============================================ -->
                        <div class="col-sm-6 col-md-6">
                            <div class="international">
                                <h3 class="category-headding "><?php echo @$home_page_positions[5]['cat_name']?></h3>
                                <div class="headding-border bg-color-2"></div>
                                <?php  if (@$pn['position_5']['news_title_1']!=NULL) {?>
                                <div class="post-wrapper wow fadeIn effects" data-wow-duration="1s">
                                    <!-- post title -->
                                    <h3><a href="<?php echo @$pn['position_5']['news_link_1']?>"><?php echo @$pn['position_5']['news_title_1']?></a></h3>
                                    <!-- post image -->
                                    <div class="post-thumb">
                                            <?php
                                                if (@$pn['position_5']['image_check_1']!=NULL) {
                                                  echo'<img class="img-responsive" src="'.@$pn['position_5']['image_large_1'].'" alt="">';
                                                } else {
                                                    echo '<img  class="img-responsive"  src="http://img.youtube.com/vi/' . @$pn['position_5']['video_1'] . '/0.jpg" alt="photography" />';
                                                }
                                            ?>
                                            <div class="overlay">
                                            <?php if(@$pn['position_5']['video_1']!=NULL) {?>
                                             <a href="<?php echo @$pn['position_5']['news_link_1']?>" class="expand"><i class="fa fa-play"></i></a>
                                            <?php } else{?>
                                             <a href="<?php echo @$pn['position_5']['news_link_1']?>" class="expand12"><i class="pe-7s-angle-right"></i></a>
                                            <?php } ?>

                                               <a class="close-overlay hidden">x</a>
                                            </div>
                                       
                                    </div>
                                </div>
                                <div class="post-title-author-details">
                                    <div class="post-editor-date">
                                        <!-- post date -->
                                        <div class="post-date">
                                            <i class="pe-7s-clock"></i> <?php echo @$pn['position_5']['ptime_1']?>
                                        </div>
                                        <!-- post comment -->
                                    </div>
                                </div>
                                <?php }?>
                                 <?php 
                                 for($i=2;$i<=3;$i++){
                                    if(!isset($pn['position_5']['news_title_'.$i]))
                                    continue
                                ?>
                                <div class="box-item wow fadeIn effects" data-wow-duration="1s" data-wow-delay="0.2s">
                                    <div class="img-thumb">
                                        
                                        <?php
                                                if (@$pn['position_5']['image_check_'.$i]!=NULL) {
                                                  echo'<img class="entry-thumb" src="'.@$pn['position_5']['image_thumb_'.$i].'" alt=""  height="70" width="100">';
                                                } else {
                                                    echo'<img  class="entry-thumb"  height="70" width="100"  src="http://img.youtube.com/vi/' . @$pn['position_5']['video_'.$i] . '/0.jpg" alt="photography" />';
                                                }
                                            ?>
                                            <div class="overlay">
                                            <?php if(@$pn['position_5']['video_'.$i]!=NULL) {?>
                                             <a href="<?php echo @$pn['position_5']['news_link_'.$i]?>" class="expand"><i class="fa fa-play"></i></a>
                                            <?php } else{?>
                                             <a href="<?php echo @$pn['position_5']['news_link_'.$i]?>" class="expand12"><i class="pe-7s-angle-right"></i></a>
                                            <?php } ?>
                                               <a class="close-overlay hidden">x</a>
                                            </div>
                                       
                                    </div>
                                    <div class="item-details">
                                        <h3 class="td-module-title"><a href="<?php echo @$pn['position_5']['news_link_'.$i]?>"><?php echo @$pn['position_5']['news_title_'.$i]?></a></h3>
                                        <div class="post-editor-date">
                                            <!-- post date -->
                                            <div class="post-date">
                                                <i class="pe-7s-clock"></i> <?php echo @$pn['position_5']['ptime_'.$i]?>
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
                    <?php if(@$home_page_positions[6]['status']==1){ ?>
                    <!-- technology Area
                        ============================================ -->
                    <section class="politics_wrapper">
                        <h3 class="category-headding "><?php echo @$home_page_positions[6]['cat_name']?></h3>
                        <div class="headding-border"></div>
                        <div class="row">
                            <div id="content-slide-3" class="owl-carousel">
                                <!-- item-1 -->
                                <div class="item">
                                    <div class="row">
                                        <!-- left side post -->
                                        <div class="col-sm-6 col-md-6">
                                        <?php  if (@$pn['position_6']['news_title_1']!=NULL) { ?>
                                            <div class="post-wrapper wow fadeIn effects" data-wow-duration="1s">
                                                <!-- post title -->
                                                <h3><a href="<?php echo @$pn['position_6']['news_link_1']?>"><?php echo @$pn['position_6']['news_title_1']?></a></h3>
                                                <!-- post image -->
                                                <div class="post-thumb">
                                            <?php
                                                if (@$pn['position_6']['image_check_1']!=NULL) {
                                                  echo'<img class="img-responsive" src="'.@$pn['position_6']['image_large_1'].'" alt="">';
                                                } else {
                                                  echo'<img  class="img-responsive"  src="http://img.youtube.com/vi/' . @$pn['position_6']['video_1'] . '/0.jpg" alt="photography" />';
                                                }
                                            ?>
                                                        <div class="overlay">
                                                        <?php if(@$pn['position_6']['video_1']!=NULL) {?>
                                                         <a href="<?php echo @$pn['position_6']['news_link_1']?>" class="expand"><i class="fa fa-play"></i></a>
                                                        <?php } else{?>
                                                         <a href="<?php echo @$pn['position_6']['news_link_1']?>" class="expand12"><i class="pe-7s-angle-right"></i></a>
                                                        <?php } ?>
                                                            <a class="close-overlay hidden">x</a>
                                                        </div>
                                                   
                                                </div>
                                            </div>
                                            <div class="post-title-author-details">
                                                <div class="post-editor-date">
                                                    <!-- post date -->
                                                    <div class="post-date">
                                                        <i class="pe-7s-clock"></i><?php echo @$pn['position_6']['ptime_1']?>
                                                    </div>
                                                    <!-- post comment -->
                                                </div>
                                            </div>
                                            <?php }?>
                                        </div>
                                        <!-- right side post -->
                                        <div class="col-sm-6 col-md-6">
                                            <div class="row rn_block">
                                            <?php 
                                            for($i=2;$i<=5;$i++){
                                                if(!isset($pn['position_6']['news_title_'.$i]))
                                                continue
                                            ?>
                                                <div class="col-xs-6 col-md-6 col-sm-6 post-padding effects">
                                                    <!-- post image -->
                                                <div class="post-thumb wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                                            
                                            <?php
                                                if (@$pn['position_6']['image_check_'.$i]!=NULL) {
                                                  echo'<img class="img-responsive" src="'.@$pn['position_6']['image_thumb_'.$i].'" alt="">';
                                                } else {
                                                   echo'<img  class="img-responsive"  src="http://img.youtube.com/vi/' . @$pn['position_6']['video_'.$i] . '/0.jpg" alt="photography" />';
                                                }
                                            ?>
                                                    <div class="overlay">
                                                    <?php if(@$pn['position_6']['video_'.$i]!=NULL) {?>
                                                         <a href="<?php echo @$pn['position_6']['news_link_'.$i]?>" class="expand"><i class="fa fa-play"></i></a>
                                                        <?php } else{?>
                                                         <a href="<?php echo @$pn['position_6']['news_link_'.$i]?>" class="expand12"><i class="pe-7s-angle-right"></i></a>
                                                        <?php } ?>
                                                        <a class="close-overlay hidden">x</a>
                                                    </div>
                                                       
                                                    </div>
                                                    <div class="post-title-author-details">
                                                        <!-- post image -->
                                                        <h5><a href="<?php echo @$pn['position_6']['news_link_'.$i]?>"><?php echo @$pn['position_6']['news_title_'.$i]?></a></h5>
                                                    </div>
                                                </div>
                                                <?php }?>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- item-2 -->
                                <div class="item">
                                    <div class="row">
                                        <!-- left side post -->
                                        <div class="col-sm-6 col-md-6">
                                        <?php  if (@$pn['position_6']['news_title_6']!=NULL) {?>
                                            <div class="post-wrapper wow fadeIn effects" data-wow-duration="1s">
                                                <!-- post title -->
                                                <h3><a href="<?php echo @$pn['position_6']['news_link_6']?>"><?php echo @$pn['position_6']['news_title_6']?></a></h3>
                                                <!-- post image -->
                                                <div class="post-thumb">
                                            <?php
                                                if (@$pn['position_6']['image_check_6']!=NULL) {
                                                  echo'<img class="img-responsive" src="'.@$pn['position_6']['image_large_6'].'" alt="">';
                                                } else {
                                                    echo'<img  class="img-responsive"  src="http://img.youtube.com/vi/' . @$pn['position_6']['video_6'] . '/0.jpg" alt="photography" />';
                                                }
                                            ?>
                                                        <div class="overlay">
                                                        <?php if(@$pn['position_6']['video_6']!=NULL) {?>
                                                         <a href="<?php echo @$pn['position_6']['news_link_6']?>" class="expand"><i class="fa fa-play"></i></a>
                                                        <?php } else{?>
                                                         <a href="<?php echo @$pn['position_6']['news_link_6']?>" class="expand12"><i class="pe-7s-angle-right"></i></a>
                                                        <?php } ?>
                                                            <a class="close-overlay hidden">x</a>
                                                        </div>
                                                   
                                                </div>
                                            </div>
                                            <div class="post-title-author-details">
                                                <div class="post-editor-date">
                                                    <!-- post date -->
                                                    <div class="post-date">
                                                        <i class="pe-7s-clock"></i><?php echo @$pn['position_6']['ptime_6']?>
                                                    </div>
                                                    <!-- post comment -->
                                                </div>
                                            </div>
                                            <?php }?>
                                        </div>
                                        <!-- right side post -->
                                        <div class="col-sm-6 col-md-6">
                                            <div class="row rn_block">
                                                <?php 
                                                for($i=7;$i<=10;$i++){
                                                    if(!isset($pn['position_6']['news_title_'.$i]))
                                                    continue
                                                ?>
                                                <div class="col-xs-6 col-md-6 col-sm-6 post-padding effects">
                                                    <!-- post image -->
                                                    <div class="post-thumb wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                                                    <?php
                                                        if (@$pn['position_6']['image_check_'.$i]!=NULL) {
                                                          echo'<img class="img-responsive" src="'.@$pn['position_6']['image_thumb_'.$i].'" alt="">';
                                                        } else {
                                                            echo'<img  class="img-responsive"  src="http://img.youtube.com/vi/' . @$pn['position_6']['video_'.$i] . '/0.jpg" alt="photography" />';
                                                        }
                                                    ?>
                                                    <div class="overlay">
                                                    <?php if(@$pn['position_6']['video_'.$i]!=NULL) {?>
                                                         <a href="<?php echo @$pn['position_6']['news_link_'.$i]?>" class="expand"><i class="fa fa-play"></i></a>
                                                        <?php } else{?>
                                                         <a href="<?php echo @$pn['position_6']['news_link_'.$i]?>" class="expand12"><i class="pe-7s-angle-right"></i></a>
                                                        <?php } ?>
                                                        <a class="close-overlay hidden">x</a>
                                                    </div>
                                                </div>
                                                    <div class="post-title-author-details">
                                                        <!-- post image -->
                                                        <h5><a href="<?php echo @$pn['position_6']['news_link_'.$i]?>"><?php echo @$pn['position_6']['news_title_'.$i]?></a></h5>
                                                    </div>
                                                </div>
                                                <?php }?>
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
                <div class="col-sm-4 left-padding">
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
                                        if (@$Editor['hn']['image_check_'.$i]!=NULL) {
                                              echo'<img  src="'. @$Editor['hn']['image_thumb_'.$i].'" alt="">';
                                            } else {
                                              echo'<img  class="img-responsive"  src="http://img.youtube.com/vi/'.@$Editor['hn']['video_'.$i].'/0.jpg" alt="photography" />';
                                            }
                                        ?>
                                    </a>
                                    <h4><a href="<?php echo @$Editor['hn']['news_link_'.$i]?>"><?php echo @$Editor['hn']['news_title_'.$i]?></a></h4>
                                    <div class="date">
                                        <ul>
                                            <li>By<a title="" href="#"><span><?php echo @$Editor['hn']['post_by_name_'.$i]?></span></a> --</li>
                                            <li><a title="" href="#"><?php echo date('l, d M, Y', @$Editor['hn']['ptime_'.$i]) ;?></a></li>
                                        </ul>
                                    </div>
                                    <p>
                                    <?php 
                                        @$news_details = @$Editor['hn']['full_news_'.$i];
                                     echo $exploded = implode(' ', array_slice(explode(' ', $news_details), 0, 20));
                                    ?></p>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- video -->
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
                                    <?php 
                                    for($i=1;$i<=5;$i++){
                                        if(!isset($pn['position_7']['news_title_'.$i]))
                                        continue
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
                </div>
            </div>
        </div>
    </section>
    <!-- pagination
============================================ -->
<div class="container">
    <div class="row">
        <div class="col-md-12 col-ofset-2">
            <div class="banner <?php echo (@$lg_status_15==0?'hidden-lg hidden-md':'')?> <?php echo (@$sm_status_15==0?'hidden-xs hidden-sm':'')?>">
                <?php echo @$home_15; ?>
            </div>
        </div>
    </div>
</div>

   