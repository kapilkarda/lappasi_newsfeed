<?php
    if (isset($ads) && is_array(@$ads)) {
        extract($ads);
    }
    $bu = base_url();
?>

<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <article class="content">
                <p><?php echo @$pd['title'];?></p>
                <?php if($pd['video_url']!='' || $pd['image_id']!=''){?>
                <div class="video-container">
                <?php if($pd['image_id']!=''){?>
                    <img src="<?php echo base_url().@$pd['image_id']?>">
                 <?php } else{ 
                     echo '<iframe width="100%" height="370px" src="https://www.youtube.com/embed/' . @$pd['video_url'] . '" frameborder="0" allowfullscreen></iframe>';
                    }
                ?>
                </div>
                <?php } ?>


                <div class="paragraph-padding">
                    <?php echo @$pd['description'];?>
                </div>
            </article>
        </div>

        <div class="col-sm-4 left-padding">
            <aside class="sidebar">
                <div class="banner-add"> <!-- add -->
                    <span class="add-title"></span>
                    <?php echo @$news_view_35; ?>
                </div>
            </aside>
        </div>
    </div>
</div>
