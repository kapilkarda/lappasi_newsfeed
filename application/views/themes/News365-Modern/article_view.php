<?php
    if (isset($ads) && is_array(@$ads)) {
        extract($ads);
    }
    $bu = base_url();
    $zone = json_decode($time_zone);
    date_default_timezone_set("$zone->website_timezone");

?>

<script type="text/javascript">
   function pb_changeFontSize(element, step)
    {
        var step = parseInt(step, 10);
        var el = document.getElementById(element);
        var curFont = parseInt(el.style.fontSize, '10px');
        var curLineHeight = parseInt(el.style.lineHeight, 10);        
        if ((step == "2" && curFont < 30) || (step == "-2" && curFont > 12)) {
            el.style.fontSize = (curFont + step) + 'px';
            el.style.lineHeight = (curLineHeight + step) + 'px';
        }
        return;
    }
</script>

<style type="text/css">
    p img{
        width: 100%;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <article class="content">
                 <div class="ad-s <?php echo (@$lg_status_31==0?'hidden-lg hidden-md':'')?> <?php echo (@$sm_status_31==0?'hidden-xs hidden-sm':'')?>">
                        <?php echo @$news_view_31; ?>
                    </div>

                <div class="video-container">
                    <?php $img_url = (is_file('uploads/' . $image)) ? $bu . 'uploads/' . $image : $bu . 'uploads/' . $image; ?>
                    <?php
                        if (@$videos!=NULL) {
                            echo '<iframe width="100%" height="370px" src="https://www.youtube.com/embed/' . $videos . '" frameborder="0" allowfullscreen></iframe>';
                        }else{
                    ?>
                    <img src="<?php echo $img_url; ?>" class="img-responsive" width="100%">
                    <?php } ?> 
                </div>

                <div class="paragraph-padding">
                    <!-- Shear button -->
                    <div class="shareBtm">
                        <div class="shareButton">
                            <div class="bss" >
                                <span class='st_googleplus_hcount' displayText='Google +'></span>
                                <span class='st_sharethis_hcount' displayText='ShareThis'></span>
                                <span class='st_facebook_hcount' displayText='Facebook'></span>
                                <span class='st_twitter_hcount' displayText='Tweet'></span>
                                <span class='st_linkedin_hcount' displayText='LinkedIn'></span>
                                <span class='st_pinterest_hcount' displayText='Pinterest'></span>
                                <span class='st_email_hcount' displayText='Email'></span>

                                <script type="text/javascript">var switchTo5x = true;</script>
                                <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
                                <script type="text/javascript">stLight.options({publisher: "5dc9678d-5925-46e1-8f2c-e74ca68e941d", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
                            </div>
                        </div>
                    </div>
                    <div class="pull-right zoom" style="padding-right: 10px;">               
                        <a href="<?php echo $bu . 'Print_article/print_page/' . $news_id; ?>" class="icon_n_d"  target="_blank" title="Click to Print"><img src="<?php echo $bu; ?>assets/icon/print.jpg" height="23" width="25" alt="No icon"/></a>
                    </div>
                    <p class="short-head"><?php echo @$stitle;?></p>
                    <h1><?php echo $title; ?></h1>
                    
                    <div class="date">
                        <ul>
                            <li>By <a title="" href="#"><span><?php echo $name; ?></span></a> --</li>
                            <li><a title="" href="#"><?php echo date('l, d M, Y',$time_stamp); ?></a> </li>
                        </ul>
                    </div>

                     <div class="ad-s <?php echo (@$lg_status_32==0?'hidden-lg hidden-md':'')?> <?php echo (@$sm_status_32==0?'hidden-xs hidden-sm':'')?>">
                        <?php echo @$news_view_32; ?>
                    </div>

                    <div id="DetailsNews" style='font-size: 18px; line-height: 28px; color:rgb(51,51,51);'>       
                        <?php echo $news; ?>
                        <?php if($reference!=NULL){?>
                        <b><?php echo $reference;?></b>
                        <?php } ?>
                    </div>
                    <div class="<?php echo (@$lg_status_33==0?'hidden-lg hidden-md':'')?> <?php echo (@$sm_status_33==0?'hidden-xs hidden-sm':'')?>">
                         <?php echo @$news_view_33; ?>
                    </div>
                </div>
                

                <?php
                // reader_hit count -------------------------------------------------- ;
                $data_arr = array('reader_hit' => $reader_hit + 1);
                $this->db->where('news_id', $news_id);
                $this->db->update('news_mst', $data_arr);
                // reader_hit count -------------------------------------------------- ;
                ?> 
                <!-- tags -->
                <div class="tags">
                    <ul>
                        <?php
                            if (@$post_meta['meta_keyword']) {
                                $keyword = explode(',', @$post_meta['meta_keyword']);
                                foreach ($keyword as $value) {
                                    echo '<li> <a href="#">' . $value . '</a></li>';
                                }
                            }
                        ?>
                    </ul>
                </div>  
                <!-- Related news area
                ============================================ -->
                <div class="related-news-inner">
                    <h3 class="category-headding "><?php echo @$category_name . @$lan['such_more_news']; ?></h3>
                    <div class="headding-border"></div>
                    <div class="row">
                        <div id="content-slide-5" class="owl-carousel">
                            <!-- item-1 -->
                            <div class="item">
                                <div class="row rn_block">

                                    <?php
                                    for ($i = 2; $i <= 4; $i++) {
                                        if (!isset($sn['hn']['title_' . $i]))
                                            continue;
                                        ?>
                                        <div class="col-xs-12 col-md-4 col-sm-4 padd">
                                            <div class="post-wrapper wow fadeIn" data-wow-duration="2s"><!-- image -->
                                                <div class="post-thumb">
                                                <?php
                                                    if ($sn['hn']['image_check_' . $i]) {
                                                ?>        
                                                    <a href="<?php echo @$sn['hn']['news_link_' . $i]?>">
                                                        <img class="img-responsive" src="<?php echo @$sn['hn']['image_thumb_' . $i];?>" alt="">
                                                    </a>
                                                <?php } else {
                                                        echo '<img width="250" src="http://img.youtube.com/vi/' . $sn['hn']['video_' . $i] . '/0.jpg" alt="photography" class="img-responsive"/>';
                                                    }
                                                ?>
                                                </div>

                                                <div class="post-info meta-info-rn">
                                                    <div class="slide">
                                                        <a target="_blank" href="<?php echo @$sn['hn']['category_link_' . $i]; ?>" class="post-badge btn_five"><?php echo @$sn['hn']['category_' . $i]; ?></a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="post-title-author-details">

                                                <h4><a href="<?php echo @$sn['hn']['news_link_' . $i] ?>"><?php echo @$sn['hn']['news_title_' . $i]; ?></a></h4>
                                                <div class="post-editor-date">
                                                    <div class="post-date">
                                                        <i class="pe-7s-clock"></i> <?php echo (date('l, d M, Y', @$sn['hn']['ptime_' . $i])); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>


                            <!-- item-2 -->
                            <div class="item">
                                <div class="row rn_block">
                                    <?php
                                    for ($i = 4; $i <= 6; $i++) {
                                        if (!isset($sn['hn']['title_' . $i]))
                                            continue;
                                        ?>

                                        <div class="col-xs-12 col-md-4 col-sm-4 padd">
                                            <div class="post-wrapper wow fadeIn" data-wow-duration="2s" data-wow-delay="0.6s"><!-- image -->
                                                <div class="post-thumb">
                                                    <?php
                                                        if ($sn['hn']['image_check_' . $i]) {
                                                    ?>        
                                                        <a href="<?php echo @$sn['hn']['news_link_' . $i]?>">
                                                                <img class="img-responsive" src="<?php echo @$sn['hn']['image_thumb_' . $i];?>" alt="">
                                                            </a>
                                                    <?php  } else {
                                                            echo '<img width="250" src="http://img.youtube.com/vi/' . $sn['hn']['video_' . $i] . '/0.jpg" alt="photography" class="img-responsive"/>';
                                                        }
                                                    ?>
                                                </div>
                                                <div class="post-info meta-info-rn">
                                                    <div class="slide">
                                                        <a target="_blank" href="<?php echo @$sn['hn']['category_link_' . $i] ?>" class="post-badge btn_eight"><?php echo @$sn['hn']['category_' . $i]; ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post-title-author-details">
                                                <h4><?php echo @$sn['hn']['title_' . $i]; ?></h4>
                                                <div class="post-editor-date">
                                                    <div class="post-date">
                                                        <i class="pe-7s-clock"></i> <?php echo (date('l, d M, Y', @$hn['ptime_' . $i])); ?>
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





                <!-- commet area -->
                    <div class="row">
                        <div class="col-md-12">

                            <div class="comment-bx-area">
                             <?php echo form_open('Comments_controller/comments', 'id="CommentForm"');?>
                                <div class="comment-body">
                                    <div class="comment-as">
                                        <span class="com-title">Comment As:</span>
                                        
                                        <div class="dropdown main-nav">
                                            <?php if($this->session->userdata('id')!=NULL){?>
                                           
                                            <button class="btn btn-com dropdown-toggle" type="button" data-toggle="dropdown"> <?php echo $this->session->userdata('name');?>
                                                    <span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <li><a href="<?php echo base_url(); ?>Signout/index" class="popup-with-zoom-anim"><?php echo display('signout')?></a></li>
                                            </ul>
                                            <?php } else{?>
                                                <button class="btn btn-com dropdown-toggle" type="button" data-toggle="dropdown">Sign In
                                                    <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="<?php echo base_url();?>Registration/index" class="cd-signin" >Sign in</a></li>
                                                    <li><a href="<?php echo base_url();?>Registration/index" class="cd-signup" >Sign up</a></li>
                                                   <!-- <li><a class="popup-with-zoom-anim" href="<?php echo base_url()?>Registration/index">Login</a></li>
                                                   <li><a class="popup-with-zoom-anim" href="<?php echo base_url()?>Registration/index">Register</a></li>
                                                 -->
                                                </ul>

                                            <?php }?>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <span class="successMessage"></span>

                                <?php if($this->session->userdata('id')!=NULL){?>
                                    <textarea class="form-control" id="message" name="comment" placeholder="Entter Your Comment ..." maxlength="140" rows="4"></textarea>
                                    <input type="hidden" name="news_id" value="<?=$news_id;?>">

                                    <div class="comment-footer">
                                        <button type="submit" class="btn btn-com active">Publish</button>
                                    </div>
                                
                                <?php }?>
                                <?php echo form_close();?>
                            </div>



                            <!-- comment box
                            ============================================ -->
                            <div class="comments-container">

                                <div class="block">
                                    <!-- filters select -->
                                    <h4 class="block-title"><span>Comment (<?php echo @$total_comments;?>)</span></h4>
                                </div>

                                <div class="mid-content">
                                <?php
                                if (isset($comments)) {
                                    foreach ($comments as $comment) {
                                ?>
                                <ul id="comments-list" class="comments-list loadMoreicon">
                                    <li>
                                        <div class="comment-main-level">
                                            <!-- Avatar -->
                                            <div class="comment-avatar">
                                                <?php if($comment->photo!=NULL){?>
                                                <img src="<?php echo base_url(). $comment->photo;?>" class="img-responsive" alt="">
                                                <?php } else{ ?>
                                                <img src="<?php echo base_url();?> uploads/user/user.png" class="img-responsive" alt="">
                                                <?php } ?>
                                            </div>
                                            <!-- Contenedor del Comentario -->
                                            <div class="comment-box">
                                                <div class="comment-head">
                                                    <h6 class="comment-name"><a href="#"><?php echo $comment->name;?></a></h6>
                                                    <span>
                                                        <?php 
                                                            echo $comment->com_date_time;
                                                        ?>   
                                                    </span>
                                                    
                                                    <i class="fa fa-reply replayComment"></i>
                                                    <input type="hidden" value="<?php echo $comment->com_id;?>">
                                                </div>
                                                <div class="comment-content">
                                                    <?php echo $comment->comments?>
                                                </div>
                                                 <?php
                                                    $c_u_isLogedIn=$this->session->userdata("id");
                                                    if ($c_u_isLogedIn != null) {
                                                ?>

                                                <div class="comment-bx-area hide replayCommentBox" style="margin-bottom: 0px">
                                                   <?php echo form_open('Comments_controller/re_comments', 'class="reComments"');?>
                                                    <div class="comment-body">
                                                        <textarea class="form-control" name="comments" placeholder="Enter Your Message" rows="4"></textarea>
                                                        
                                                        <input type="hidden" name="com_replay_id" value="<?php echo $comment->com_id?>">
                                                        <input type="hidden" name="news_id" value="<?php echo $news_id;?>">
                                                    </div>
                                                    <div class="comment-footer">
                                                        <button type="submit" class="btn btn-com active">Publish</button>
                                                    </div>
                                                    <?php echo form_close();?>
                                                </div>

                                                <?php }?>
                                            </div>
                                        </div>

                                        <!-- Respuestas de los comentarios -->
                                        <ul class="comments-list reply-list">
                                                <?php
                                                   $replies = $this->db->select('user_info.id,user_info.name,user_info.photo,comments_info.*')
                                                    ->from('comments_info')
                                                    ->join('user_info', 'comments_info.com_user_id = user_info.id')
                                                    ->where('com_replay_id', $comment->com_id)
                                                    ->where('com_status', '1')
                                                    ->where_not_in('com_status', '0')
                                                    ->get()
                                                    ->result();
                                                    foreach ($replies as $reply) {
                                                ?>
                                            <li>
                                                <!-- Avatar -->
                                            <div class="comment-avatar">
                                                <?php if($reply->photo!=NULL){?>
                                                <img src="<?php echo base_url(). $reply->photo;?>" class="img-responsive" alt="">
                                                <?php } else{ ?>
                                                <img src="<?php echo base_url();?> uploads/user/user.png" class="img-responsive" alt="">
                                                <?php } ?>
                                            </div>
                                                <!-- Contenedor del Comentario -->
                                                <div class="comment-box">
                                                    <div class="comment-head">
                                                        <h6 class="comment-name"><a href="#"><?php echo @$reply->name?></a></h6>
                                                        <span>

                                                        <?php 
                                                            echo $reply->com_date_time;
                                                        ?>

                                                        </span>
                                                        <i class="fa fa-reply replayComment1"></i>
                                                    </div>

                                                    <div class="comment-content">
                                                       <?php echo $reply->comments?>
                                                    </div>


                                                    <?php
                                                    $c_u_isLogedIn=$this->session->userdata("id");
                                                    if ($c_u_isLogedIn != null) {
                                                    ?>
                                                    <div class="comment-bx-area hide replayCommentBox" style="margin-bottom: 10px">
                                                        
                                                        <?php echo form_open('Comments_controller/re_comments', 'class="reComments1"');?>
                                                        
                                                        <div class="comment-body">
                                                            <textarea class="form-control" name="comments" placeholder="Enter Your Message" rows="4"></textarea>
                                                            <input type="hidden" name="com_replay_id" value="<?php echo $reply->com_id?>">
                                                            <input type="hidden" name="news_id" value="<?php echo $news_id;?>">
                                                        </div>
                                                        <div class="comment-footer">
                                                            <button type="submit" class="btn btn-com active">Publish</button>
                                                        </div>

                                                        <?php echo form_close();?>
                                                    </div>
                                                    <?php } ?>
                                                </div>


                                                <ul class="comments-list reply-list">
                                                    <?php
                                                       $recommentrep = $this->db->select('user_info.id,user_info.name,user_info.photo,comments_info.*')
                                                        ->from('comments_info')
                                                        ->join('user_info', 'comments_info.com_user_id = user_info.id')
                                                        ->where('com_replay_id', $reply->com_id)
                                                        ->where('com_status', '1')
                                                        ->where_not_in('com_status', '0')
                                                        ->get()
                                                        ->result();

                                                        foreach ($recommentrep as $reply1) {
                                                     ?>
                                                    <li>
                                                        <!-- Avatar -->
                                                         <div class="comment-avatar">
                                                            <?php if(@$reply1->photo!=NULL){?>
                                                            <img src="<?php echo base_url(). $reply1->photo;?>" class="img-responsive" alt="">
                                                            <?php } else{ ?>
                                                            <img src="<?php echo base_url();?> uploads/user/user.png" class="img-responsive" alt="">
                                                            <?php } ?>
                                                        </div>
                                                        <!-- Contenedor del Comentario -->
                                                        <div class="comment-box">
                                                            <div class="comment-head">
                                                                <h6 class="comment-name"><a href="#"><?php echo $reply1->name?></a></h6>
                                                                <span>
                                                                <?php 
                                                                    echo $reply1->com_date_time;
                                                                    $now = date("Y-m-d H:i:s");
                                                                     
                                                                ?> 
                                                                </span>
                                                                <input type="hidden" name="com_replay_id" value="<?php echo $reply1->com_id;?>">
                                                                <input type="hidden" name="news_id" value="<?php echo $news_id;?>">
                                                            </div>
                                                            <div class="comment-content">
                                                               <?php echo $reply1->comments?>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <?php
                                                    }
                                                    ?>  
                                                </ul>
                                            </li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                </ul>
                                <?php
                                    }
                                }
                                ?>
                                </div>
                            </div>
                        </div>
                    </div><!--END OF COMMENTS AREA-->

                <!-- form
                ============================================ -->
                <!-- comment box
                ============================================ -->
                <!-- <div class="comments-container">
                <?php echo @$news_view_34; ?>
                    <h1>Comment </h1>
                    <?php
                        $url = base_url() . $this->uri->segment(1) . '/' . $news_id;
                    ?>
                    <div>
                        <div id="fb-root"></div>
                        <script>(function (d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0];
                                if (d.getElementById(id))
                                    return;
                                js = d.createElement(s);
                                js.id = id;
                                js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5";
                                fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));
                        </script>
                        <div class="fb-comments" data-href="<?php echo $url; ?>" data-width="100%" data-numposts="5"></div>
                    </div> 
                </div> -->
            </article>
        </div>

        <div class="col-sm-4 left-padding">
            <aside class="sidebar">
                <div class="banner-add <?php echo (@$lg_status_35==0?'hidden-lg hidden-md':'')?> <?php echo (@$sm_status_35==0?'hidden-xs hidden-sm':'')?>"> <!-- add -->
                    <span class="add-title"></span>
                    <?php echo @$news_view_35; ?>
                </div>
                <div class="tab-inner">
                        <ul class="tabs">
                            <li><a href="#"><?php echo @$lan['latest_news'];?></a></li>
                            <li><a href="#"><?php echo @$lan['most_read']; ?></a></li>
                        </ul><hr> <!-- tabs -->
                        <div class="tab_content">
                            <div class="tab-item-inner">
                            <?php for($i=1; $i<=5; $i++){ 
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
               
                <!-- slider widget -->
                <div class="widget-slider-inner">
                    <h3 class="category-headding "><?php echo  @$Editor['hn']['category_1']; ?></h3>
                    <div class="headding-border"></div>
                    <div id="widget-slider" class="owl-carousel owl-theme">
                        <!-- widget item -->
                      <!-- widget item -->
                            <?php for($i=1;$i<=3;$i++){
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
                                            <li><a title="" href="#"><?php echo @$Editor['hn']['ptime_'.$i]?></a></li>
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
                    <span class="archive-title ">-<?php echo display('archive')?>-</span>
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
    </div>
</div>



<script type="text/javascript">

    function goBack() {
        var pathArray = window.location.pathname.split( '/' );
        
        if(pathArray[2]){
            var newURL = window.location.protocol + "//" + window.location.host + "/" + pathArray[1];
            window.location = newURL;
        }else{
            var newURL = window.location.protocol + "//" + window.location.host + "/" + pathArray[1];
            window.location = newURL;
        }
    }


    //Comment form submit by ajax start
    $("#CommentForm").submit(function(event){ 

        event.preventDefault(); 
        var formdata = new FormData($(this)[0]);

        $.ajax({

            url: $(this).attr("action"),
            type: $(this).attr("method"),

            data: formdata, 
            processData: false,
            contentType: false,
            success: function (msg){

                if (msg==1) {
                    toastr.success('Success! - Your comment will appear after it is approved!');
                    setTimeout(function(){
                        window.location.href = window.location.href;
                    }, 2000);
                    $("#commentField").val(" ");
                }else if (msg == 3) {
                    $("#loginModal").modal('show');
                    $(".loginMessage").html('<span class="alert text-danger text-center">Plz,login first.</span>');
                }else if (msg == 4){
                    toastr.error('Error! - Comment field is required!');
                    setTimeout(function(){
                        window.location.href = window.location.href;
                    },2000);
                }
            },
            error: function (xhr, desc, err){
                 alert('failed');
            }
        });        
    });
    //Comment form submit by ajax end



    //Re Comments submit start
    $('body').on('submit','.reComments',function(e){

        e.preventDefault(); 
        var formdata = $(this).serialize();;
        $.ajax({
            url: $(this).attr("action"),
            type: $(this).attr("method"),
            data: formdata, 
            dataType:'json',
            success: function (data){    
                if (data.message == 1) {
                    $(".replayCommentBox").hide();
                     toastr.success('Success! Your comment will appear after it is approved!')
                   
                    setTimeout(function(){
                        window.location.href = window.location.href;
                    }, 2000);
                }else if(data.message == 4){
                    toastr.error('Error! Comment field are required.')
                    setTimeout(function(){
                        window.location.href = window.location.href;
                    }, 2000);
                }
            },
            error: function (exc){
                 alert('failed');
            }
        });        
    });


    //Re Comments submit by ajax end

    //Re Comments submit start
     $('body').on('submit','.reComments1',function(e){
        e.preventDefault(); 
        var formdata = $(this).serialize();;
        $.ajax({
            url: $(this).attr("action"),
            type: $(this).attr("method"),
            data: formdata, 
            dataType:'json',
            success: function (data){
               if (data.message == 1) {
                    $(".replayCommentBox").hide();
                     toastr.success('Success! Your comment will appear after it is approved!')
                   
                    setTimeout(function(){
                        window.location.href = window.location.href;
                    }, 2000);
                }else if(data.message == 4){
                    toastr.error('Error! Comment field are required.')
                    setTimeout(function(){
                        window.location.href = window.location.href;
                    }, 2000);
                }
            },
            error: function (exc){
                 alert('failed');
            }
        });        
    });
    //Re Comments submit by ajax end



    //Replay comment box show
    $('body').on('click','.replayComment',function() {
        var replay = $(this).parent().next().next();
        replay.toggleClass('hide');
        $(".replayCommentBox").not(replay).addClass('hide'); 
    });

    $('body').on('click','.replayComment1',function() {
        var replay = $(this).parent().next().next();
        replay.toggleClass('hide');
        $(".replayCommentBox").not(replay).addClass('hide'); 
    });



    


</script>       

