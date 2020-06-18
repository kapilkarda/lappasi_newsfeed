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
                <h1>Search</h1>
                <div class="breadcrumbs">
                    <ul>
                        <li><i class="pe-7s-home"></i> <a href="<?php echo base_url();?>" title=""><?php echo display('home')?></a></li>
                        <li><a href="<?php echo base_url();?>" title=""><?php echo (@$_GET['q']?$_GET['q']:'');?></a></li>
                    </ul>
                </div>

                <?php
                $fa = array('method' =>'GET' ); 
                echo form_open('search',$fa);?>
                    <div class="col-sm-12 form-group">
                        <input type="text" class="form-control" required="1" placeholder="<?php echo display('search')?>" name="q">
                        <input class="btn btn-style" type="submit" value="<?php echo display('search')?>">
                    </div> 
                <?php echo form_close();?>    
            </div>
        </div>
    </div>
</section>


<section class="archive">
    <!-- left content -->
    <div class="container">
        <div class="row">
            <!-- Left content -->
            <?php
            $n_s = 1;
            $total = 0;
            if (is_array(@$search_newses)) {
                foreach (@$search_newses as $key => $value) {
                $exploded_TITLE = @trim(@implode('-', @preg_split("/[\s,-\:]+/", @$value->title)), '-')
            ?>
                    <div class="col-sm-12 col-md-12">
                        <!-- archive post -->
                        <div class="post-style2 archive-post-style-2">
                             <?php if($value->image!=NULL){?>
                                <a href="<?php echo base_url() . $value->page . '/details/' . $value->news_id . '/' . $exploded_TITLE; ?>"><img src="<?php echo base_url() . 'uploads/thumb/' . $value->image; ?>" alt="" ></a> 

                           <?php } else{?>
                            <a href="<?php echo base_url() . $value->page . '/details/' . $value->news_id . '/' . $exploded_TITLE; ?>" rel="bookmark">
                            <img width="200" src="http://img.youtube.com/vi/<?php echo $value->videos; ?>/0.jpg" alt="" >
                           </a>
                            <?php }?>
                            <div class="post-style2-detail">
                                <h4><a href="<?php echo base_url() . $value->page . '/details/' . $value->news_id . '/' . $exploded_TITLE; ?>" title=""><?php echo @$value->title; ?></a></h4>
                                <div class="date">
                                    <ul>
                                        <li>By<a title="" href="#"><span><?php echo @$value->name; ?></span></a> --</li>
                                        <li><a title="" href="#"><?php echo date('l, d M, Y',$value->time_stamp) ; ?></a> --</li>
                                        <li><div class="comments"><a href="#"><?php echo @$value->reader_hit; ?></a></div></li>

                                    </ul>
                                </div>
                                <?php
                                echo implode(' ', array_slice(explode(' ', htmlspecialchars_decode(strip_tags(@$value->news))), 0, 35));
                                ?><a href="<?php echo base_url() . $value->page . '/details/' . $value->news_id . '/' . $exploded_TITLE; ?>"> Read more...</a>
                            </div>
                        </div>
                    </div>

                    <?php
                    $total = ++$n_s;
                }

            }
            else {
            echo '<div class="col-sm-12 col-md-12">';
            echo '<div class="alert alert-success"><button class="close" data-dismiss="alert">&times;</button><b>';
            echo "<span style='font-weight:bold;font-size:25px;color:red;'>There is no news available on the Date = ". ($_GET['q']?$_GET['q']:'')."</span>";
            echo '</b></div>';
            echo '</div>';
               
            }
            ?>

              <!-- pagination -->
                    <div class="row">
                        <div class="col-sm-12">
                        <?php echo $links;?>
                        </div>
                    </div>
          
        </div>
        <!-- pagination -->     
    </div>
</section>

 
