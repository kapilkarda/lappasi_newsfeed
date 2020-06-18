<?php
    $bu = base_url();
    if (isset($ads) && is_array($ads)) {
        extract($ads);
    }
?>

<section class="block-inner">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1><?php echo display('archive')?></h1>
                <div class="breadcrumbs">
                    <ul>
                        <li><i class="pe-7s-home"></i> <a href="<?php echo base_url();?>" title=""><?php echo display('home')?></a></li>
                        <li><a href="<?php echo base_url();?>" title=""><?php echo (@$_GET['date']);?></a></li>
                    </ul>
                </div>

            <?php
                $fa = array('method' =>'GET' ); 
                echo form_open('archive',$fa);
            ?>
                    <div class="form-group">
                        <label for="from"><?php echo display('archive')?></label>
                        <input  class="form-control" type="text" id="archive-date" required="1" name="date">
                        <input class="btn btn-style" type="submit" value="<?php echo display('search')?>">
                    </div> 
            <?php echo form_close();?>    
            </div>
        </div>
    </div>
</section>


 <div class="space"></div>
    <section class="archive">
        <div class="container">
            <div class="row">
                <!-- side content wrapper -->

<?php
    if (isset($footer_menu) && is_array($footer_menu)) {
    foreach ($footer_menu as $category_name => $slug) {
?>
    <div class="col-sm-6 col-md-4">
        <h3 class="category-headding "><?php echo $slug->category_name;?></h3>
            <div class="headding-border bg-color-5"></div>
                <div class="archive-post archive-post-1">
        <?php
        if (is_array(@$archive_newses)) {
            foreach ($archive_newses as $key => $value) {
                if($slug->slug==$value->page){
                    $exploded_TITLE = @trim(@implode('-', @preg_split("/[\s,-\:]+/", @$value->title)), '-');
        ?>
                        <div class="box-item wow fadeIn" data-wow-duration="1s">
                            <div class="img-thumb">
                            <?php if($value->image!=NULL){?>
                                <a href="<?php echo base_url() . $value->page . '/details/' . $value->news_id . '/' . $exploded_TITLE; ?>"><img src="<?php echo base_url() . 'uploads/thumb/' . $value->image; ?>" height="80" width="105" alt="" ></a> 

                           <?php } else{?>
                            <a href="<?php echo base_url() . $value->page . '/details/' . $value->news_id . '/' . $exploded_TITLE; ?>" rel="bookmark">
                            <img height="80" width="105" src="http://img.youtube.com/vi/<?php echo $value->videos; ?>/0.jpg" alt="" >
                           </a>
                            <?php }?>
                            </div>
                            <div class="item-details">
                                <h6 class="sub-category-title bg-color-5">
                                        <a href="<?php echo base_url().$value->page; ?>"><?php echo $value->page; ?></a>
                                </h6>
                                <h3 class="td-module-title"><a href="<?php echo base_url() . $value->page . '/details/' . $value->news_id . '/' . $exploded_TITLE; ?>" title=""><?php echo @$value->title; ?></a></h3>
                                <div class="post-editor-date">
                                    <!-- post date -->
                                    <div class="post-date">
                                        <i class="pe-7s-clock"></i><span><?php echo date('l, d M, Y',$value->time_stamp); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
        <?php 
        } 
            } 
                }
        ?>
                    </div>
                </div>
                <?php } }?>
            </div>
            <div class="space"></div>
        </div>
    </section>

 
