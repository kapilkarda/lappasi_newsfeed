<?php 
    date_default_timezone_set($website_timezone);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <?php
        if(@$pd['seo_keyword']!=NULL){
          ?>  
            <meta name="keywords" content="<?php echo @$pd['seo_keyword']; ?>" />
            <meta name="description" content="<?php echo @$pd['seo_description']; ?>" />
        <?php
        }
        else if (@$post_meta !=false) {
        ?>
            <meta name="keywords" content="<?php echo @$post_meta['meta_keyword']; ?>" />
            <meta name="description" content="<?php echo @$post_meta['meta_description']; ?>" />
           
        <?php
        } else {
        ?>
             <meta name="keywords" content="<?php echo @$seo['fixed_keyword']; ?> <?php echo @$meta['keyword']; ?>" />
            <meta name="description" content="<?php echo @$meta['description']; ?>" />
        <?php
        }
        ?>
        <!-- facebook meta tag -->
        <?php 
            $this->load->helper('text');
            @$img_url = (is_file('uploads/'. @$image)) ? base_url().'uploads/' . @$image : base_url(). 'uploads/' . @$image;
        ?>
        <meta property="og:title" content="<?php echo @$title; ?>" />
        <meta property="og:description" content='<?php echo strip_tags(word_limiter(@$news, 20)); ?>' />
        <meta property="og:url" content="<?php echo @$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" />
        <meta property="og:site_name" content="<?php echo base_url(); ?>" />
        <meta property="og:image" content="<?php echo @$img_url; ?>"/>
        <meta property="og:image:width" content="760" />
        <meta property="og:image:height" content="420" />
        <!-- Favicon -->
        <link rel="shortcut icon" href="<?php echo base_url(). @$website_favicon;?>"/>
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
       
        <title>
            <?php
            if(isset($title)){
                echo @$title;
            }
            else{
                echo @$website_title;
            }
            ?>
        </title>
        <?php
        if(@$seo['analytics_code']!=NULL){
            echo (@$seo['analytics_code']);
        }
        ?>
        <?php
        if(@$seo['alexa_code']!=NULL){
            echo (@$seo['alexa_code']);
        }
        ?>
        <!-- google fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i|Ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>application/views/themes/<?php echo $default_theme; ?>/web-assets/css/bootstrap.min.css">
        <!-- Scrollbar css -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/views/themes/<?php echo $default_theme; ?>/web-assets/css/jquery.mCustomScrollbar.css"/>
        <!-- Owl Carousel css -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/views/themes/<?php echo $default_theme; ?>/web-assets/owl-carousel/owl.carousel.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/views/themes/<?php echo $default_theme; ?>/web-assets/owl-carousel/owl.theme.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/views/themes/<?php echo $default_theme; ?>/web-assets/owl-carousel/owl.transitions.css"/>
        <!-- youtube css -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/views/themes/<?php echo $default_theme; ?>/web-assets/css/RYPP.css"/>
        <!-- jquery-ui css --> 
        <link rel="stylesheet" href="<?php echo base_url(); ?>application/views/themes/<?php echo $default_theme; ?>/web-assets/css/jquery-ui.css">
        <!-- animate -->
        <!-- toster -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>application/views/themes/<?php echo $default_theme; ?>/web-assets/toster/toastr.css">

        <link rel="stylesheet" href="<?php echo base_url(); ?>application/views/themes/<?php echo $default_theme; ?>/web-assets/css/animate.min.css">


        <!-- fonts css -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>application/views/themes/<?php echo $default_theme; ?>/web-assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/views/themes/<?php echo $default_theme; ?>/web-assets/css/Pe-icon-7-stroke.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/views/themes/<?php echo $default_theme; ?>/web-assets/css/flaticon.css"/>
        <!-- custom css -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>application/views/themes/<?php echo $default_theme; ?>/web-assets/css/comments.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>application/views/themes/<?php echo $default_theme; ?>/web-assets/css/style.css">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script type="text/javascript" src="<?php echo base_url(); ?>application/views/themes/<?php echo $default_theme; ?>/web-assets/js/jquery.min.js"></script>

    </head>


    <body>
    <div class="se-pre-con"></div>
      <div id="fb-root"></div>
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>

        <header>
            <!-- Mobile Menu Start -->
            <div class="mobile-menu-area navbar-fixed-top hidden-sm hidden-md hidden-lg">
                <nav class="mobile-menu" id="mobile-menu">
                    <div class="sidebar-nav">
                        <ul class="nav side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn mobile-menu-btn" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                                <!-- /input-group -->
                            </li>

<?php
    $bu = base_url();
    if (isset($ads) && is_array($ads)) {
        extract($ads);
    }

$menu_slug = $this->uri->segment(1);
$selected = 'style="background-color:#f60d2b;color:#fff;"';

?>
                             
          <li class="active"><a href="<?php echo $bu ?>" class="active"><?php echo @$lan['home']?></a></li>
            <?php
                $i = 2;
                foreach ($main_menu as $key => $value) {
                    $query1 = $this->db->query("SELECT * FROM menu_content WHERE parents_id='$value->menu_content_id' ORDER BY menu_position ASC");
                    $num_rows1 = $query1->result();

                    if($value->slug!=NULL){
                        $slug1 = $bu.$value->slug;
                    }elseif ($value->link_url!=NULL) {
                        $slug1 = $value->link_url;
                    }else{
                        $slug1 = $bu."#";
                    }

                    if ($num_rows1) {
                        echo '<li>';
                        echo '<a  href="' . $slug1 . '">' . $value->menu_lavel . '<span class="fa arrow"></span></a>';
                        echo '<ul class="nav nav-third-level">';
                        foreach ($num_rows1 as $key1 => $value1) {

                            if($value1->slug!=NULL){
                                $slug2 = $bu.$value1->slug;
                            }elseif ($value1->link_url!=NULL) {
                                $slug2 = $value1->link_url;
                            }else{
                                $slug2 = $bu."#";
                            }

                            echo' <li><a '.(($slug2 == $menu_slug) ? $selected : '').' href="' .  $slug2. '">' . $value1->menu_lavel. '</a></li>';
                        }
                        echo '</ul>';
                    } else {
                        echo '<li> <a '.(($slug1 == $menu_slug) ? $selected : '').' href="' . $slug1 . '">' . $value->menu_lavel . '</a>';
                    }
                    echo '</li>';
                }
                ?>

                        </ul>
                    </div>
                </nav>

                <div class="container">
                    <div class="top_header_icon">
                        <span class="top_header_icon_wrap">
                            <a target="_blank" href="#" title="Twitter"><i class="fa fa-twitter"></i></a>
                        </span>
                        <span class="top_header_icon_wrap">
                            <a target="_blank" href="#" title="Facebook"><i class="fa fa-facebook"></i></a>
                        </span>
                        <span class="top_header_icon_wrap">
                            <a target="_blank" href="#" title="Google"><i class="fa fa-google-plus"></i></a>
                        </span>
                        <span class="top_header_icon_wrap">
                            <a target="_blank" href="#" title="Vimeo"><i class="fa fa-vimeo"></i></a>
                        </span>
                        <span class="top_header_icon_wrap">
                            <a target="_blank" href="#" title="Pintereset"><i class="fa fa-pinterest-p"></i></a>
                        </span>
                    </div>
                    <div id="showLeft" class="nav-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu End -->