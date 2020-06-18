<?php $bu = base_url(); ?>
<?php $bu_img = base_url(); ?>
<?php 
    $results = $this->db->select('*')->from("settings")->where('id', 14)->get()->row();
    $website_logo = json_decode($results->details);

?>
<?php 
$slug1 = $this->uri->segment(1);
$slug = $this->uri->segment(2);
$slug3 = $this->uri->segment(3);
$selected = 'style="background-color:#dbdbdb;"';
?>

<div class="wrapper row-offcanvas row-offcanvas-left">
    <aside class="left-side sidebar-offcanvas">
        <section class="sidebar">
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li  <?php echo (($slug == 'News_post') ? $selected : '')?>>
                    <a href="<?php echo $bu; ?>admin/News_post/user_interface">
                        <i class="fa fa-dashboard"></i> <span><?php echo display('add_post')?></span>
                    </a>
                </li>

                <li <?php echo (($slug == 'News_list') ? $selected : '')?>>
                    <a href="<?php echo $bu; ?>admin/News_list/user_interface">
                        <i class="fa fa-th"></i> <span> <?php echo display('news_list')?></span>
                    </a>
                </li>
                <li <?php echo (($slug == 'Photo_list') ? $selected : '')?>>
                    <a href="<?php echo $bu; ?>admin/Photo_list">
                        <i class="fa fa-th"></i> <span> <?php echo display('picture_list')?></span>
                    </a>
                </li>
                <!-- <li class="treeview op">
                    <a href="#">
                        <i class="fa fa-bar-chart-o"></i>
                        <span><?php echo display('other_post')?></span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li <?php echo (($slug3 == 'breaking_news') ? $selected : '')?>><a href="<?php echo $bu; ?>admin/Common/breaking_news"><i class="fa fa-angle-double-right"></i> <?php echo display('breaking_news')?></a></li>
                        <li><a href="<?php echo $bu; ?>admin/Pulling"><i class="fa fa-angle-double-right"></i> <?php echo display('polling')?></a></li>
                    </ul>
                </li> -->

            </ul>
        </section> 
       <!--  <div class="navbar-brand" style="font-size: 15px;">
            <img src="<?php echo base_url().$website_logo->website_logo; ?>" class="img-responsive" width="60%"/>
        </div> -->
    </aside>



