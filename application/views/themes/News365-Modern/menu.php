<?php
    $bu = base_url();
    if (isset($ads) && is_array($ads)) {
        extract($ads);
    }
    $menu_slug = $this->uri->segment(1); 
    $selected = 'style="background-color:#f60d2b;color:#fff;"';
?>

<div class="top_banner_wrap">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-4 col-sm-4">
                <div class="header-logo">  <!-- logo -->
                    <a href="<?php echo $bu; ?>">
                        <img class="td-retina-data img-responsive"  src="<?php echo base_url() . @$website_logo; ?>" alt="">
                    </a>
                </div>
            </div>
            <div class="col-xs-8 col-md-8 col-sm-8 <?php echo (@$lg_status_11==0?'hidden-lg hidden-md':'')?> <?php echo (@$sm_status_11==0?'hidden-xs hidden-sm':'')?>">
                <div class="header-banner">
                    <?php echo @$home_11; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- navber -->
<div class="container hidden-xs">
    <nav class="navbar">
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo $bu ?>" class="category01 active"><?php echo @$lan['home']?></a></li>
            <?php
            if ($main_menu!=NULL) {
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
                        echo '<li class="dropdown">';
                        echo '<a  href="' . $slug1 . '" class="dropdown-toggle category0' . $i++ . '" data-toggle="dropdown">' . $value->menu_lavel . '<span class="pe-7s-angle-down"></span></a>';
                        echo '<ul class="dropdown-menu menu-slide">';
                        foreach ($num_rows1 as $key1 => $value1) {
                            if($value1->slug!=NULL){
                                $slug2 = $bu.$value1->slug;
                            }elseif ($value1->link_url!=NULL) {
                                $slug2 = $value1->link_url;
                            }else{
                                $slug2 = $bu."#";
                            }
                            echo' <li><a '.(($value1->slug == $menu_slug) ? $selected : '').' href="' . $slug2. '">' . $value1->menu_lavel . '</a></li>';
                        }
                        echo '</ul>';
                    } else {
                        if($value->parents_id!=false){

                        }else{
                        echo '<li> <a '.(($value->slug == $menu_slug) ? $selected : '').' href="' . $slug1 . '" class="category0' . $i++ . '">' . $value->menu_lavel . '</a>';
                            }            
                        }
                    echo '</li>';
                }
            }
                ?>
            </ul>
        </div> 
    </nav>
</div>


</header>   