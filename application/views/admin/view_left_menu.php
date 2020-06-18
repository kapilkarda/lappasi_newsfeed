<?php 
    $results = $this->db->select('*')->from("settings")->where('id', 14)->get()->row();
    $website_logo = json_decode($results->details);

?>
<script type="text/javascript">
    $(document).ready(function () {
        var segment_1 = '<?php echo $this->uri->segment(1); ?>';
        var segment_2 = '<?php echo $this->uri->segment(2); ?>';
        var segment_3 = '<?php echo $this->uri->segment(3); ?>';
        if (segment_2 === 'Photo_upload' || segment_2 === 'Photo_list') {
            $('.ml').addClass('active');
        }
        else if (segment_3 === 'breaking_news' || segment_2 === 'Pulling') {
            $('.op').addClass('active');
        }
        else if (segment_2 === 'Ad' || segment_3 === 'View_ads') {
            $('.as').addClass('active');
        }
        else if (segment_1 === 'add_category' || segment_1 === 'list_of_categories' || segment_1 === 'add_sub_categories' ) {
            $('.cat').addClass('active');
        }
        else if (segment_3 === 'registration' || segment_3 === 'repoter_list' || segment_3 === 'last_20_access' || segment_2 === 'Reports_controller') {
            $('.usr').addClass('active');
        }
        else if (segment_2 === 'View_setup' || segment_2 === 'Demo') {
            $('.vs').addClass('active');
        }
        else if (segment_2 === 'Seo') {
            $('.seo').addClass('active');
        }
        else if (segment_2 === 'News_list') {
            $('.news_list').addClass('active');
        }
        else if (segment_2 === 'Theme') {
            $('.theme').addClass('active');
        }
        else if (segment_3 === 'Create_new_page'|| segment_3 == 'Pages') {
            $('.pages').addClass('active');
        }
        else if (segment_2 === 'User_analytics'|| segment_2 == 'User_analytics') {
            $('.ana').addClass('active');
        }
    });
</script>

<?php $bu = base_url(); ?>
<?php $bu_img = base_url(); ?>

<?php 
$slug1 = $this->uri->segment(1);
$slug = $this->uri->segment(2);
$slug3 = $this->uri->segment(3);
$selected = 'style="background-color:#dbdbdb;"';
?>

<div class="wrapper row-offcanvas row-offcanvas-left">
    <aside class="left-side sidebar-offcanvas">
        <section class="sidebar">
            
            <ul class="sidebar-menu">
                <li <?php echo (($slug == 'News_post') ? $selected : '')?>>
                    <a href="<?php echo $bu; ?>admin/News_post">
                        <i class="fa fa-dashboard"></i> <span><?php echo display('add_post')?></span>
                    </a>
                </li>

                <li <?php echo (($slug == 'News_list') ? $selected : '')?> class="news_list">
                    <a href="<?php echo $bu; ?>admin/News_list">
                        <i class="fa fa-th"></i> <span><?php echo display('news_list')?></span>
                    </a>
                </li> 

                <li <?php echo (($slug == 'Positioning') ? $selected : '')?>>
                    <a href="<?php echo $bu; ?>admin/Positioning">
                        <i class="fa fa-th"></i> <span><?php echo display('positioning')?></span>
                    </a>
                </li> 

                <li class="treeview ml">
                    <a href="#">
                        <i class="fa fa-bar-chart-o"></i>
                        <span><?php echo display('media_library')?></span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu media_library">
                        <li <?php echo (($slug == 'Photo_upload') ? $selected : '')?>><a href="<?php echo $bu; ?>admin/Photo_upload"><i class="fa fa-angle-double-right"></i> <?php echo display('add_picture')?></a></li>
                        <li <?php echo (($slug == 'Photo_list') ? $selected : '')?>><a href="<?php echo $bu; ?>admin/Photo_list"><i class="fa fa-angle-double-right"></i> <?php echo display('picture_list')?></a></li>
                    </ul>
                </li>

                <li class="treeview op">
                    <a href="#">
                        <i class="fa fa-bar-chart-o"></i>
                        <span><?php echo display('other_post')?></span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li <?php echo (($slug3 == 'breaking_news') ? $selected : '')?>><a href="<?php echo $bu; ?>admin/Common/breaking_news"><i class="fa fa-angle-double-right"></i> <?php echo display('breaking_news')?></a></li>
                        <li <?php echo (($slug == 'Pulling') ? $selected : '')?>><a href="<?php echo $bu; ?>admin/Pulling"><i class="fa fa-angle-double-right"></i> <?php echo display('polling')?></a></li>
                    </ul>
                </li>

                <li>
                    <a href="<?php echo $bu; ?>admin/Comments_manage/index">
                        <i class="fa fa-comments"></i> <?php echo display('comments');?></span>
                    </a>
                </li>


                <li>
                    <a href="<?php echo $bu; ?>admin/Subscriber_manage/index">
                        <i class="fa fa-suitcase"></i> <?php echo display('subscribers');?> </span>
                    </a>
                </li>


                <li class="treeview ana">
                    <a href="#">
                        <i class="fa fa-mail-forward "></i>
                        <span> <?php echo display('analytics');?> </span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="<?php echo $bu; ?>admin/User_analytics/index">
                                <i class="fa fa-thumbs-up"></i> <?php echo display('live_now');?></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $bu; ?>admin/User_analytics/location_based">
                                <i class="fa fa-thumbs-up"></i> <?php echo display('location_based');?></span>
                            </a>
                        </li>
                         <li>
                            <a href="<?php echo $bu; ?>admin/User_analytics/news_based">
                                <i class="fa fa-thumbs-up"></i> <?php echo display('news_based');?></span>
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo $bu; ?>admin/User_analytics/clear_analytics">
                                <i class="fa fa-thumbs-up"></i> <?php echo display('clear_analytics');?> </span>
                            </a>
                        </li>
                       
                    </ul>
                </li>

                <li class="treeview as">
                    <a href="#">
                        <i class="fa fa-laptop"></i>
                        <span><?php echo display('advertise_settings')?></span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li <?php echo (@$active ==1? $selected : '')?>><a href="<?php echo $bu; ?>admin/Ad"><i class="fa fa-angle-double-right"></i> <?php echo display('new_advertise')?></a></li>
                        <li <?php echo (($slug3 == 'view_ads') ? $selected : '')?>><a href="<?php echo $bu; ?>admin/Ad/view_ads"><i class="fa fa-angle-double-right"></i> <?php echo display('update_advertise')?></a></li>
                    </ul>
                </li> 

                <li <?php echo (($slug3 == 'maximum_archive_settings_view') ? $selected : '')?>>
                    <a href="<?php echo $bu; ?>admin/Archive/maximum_archive_settings_view">
                        <i class="fa fa-dashboard"></i> <span><?php echo display('archive_setting')?></span>
                    </a>
                </li>

                <li class="treeview cat">
                    <a href="#">
                        <i class="fa fa-bar-chart-o"></i>
                        <span><?php echo display('category')?></span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li <?php echo (($slug1 == 'add_category') ? $selected : '')?>><a href="<?php echo $bu; ?>add_category"><i class="fa fa-angle-double-right"></i> <?php echo display('add_category')?></a></li>
                        <li <?php echo (($slug1 == 'list_of_categories') ? $selected : '')?>><a href="<?php echo $bu; ?>list_of_categories"><i class="fa fa-angle-double-right"></i> <?php echo display('category_list')?></a></li>
                        <!-- <li><a href="<?php echo $bu; ?>add_sub_categories"><i class="fa fa-angle-double-right"></i> Create Sub Category<?php echo display('add_post')?></a></li> -->
                    </ul>
                </li>
                <!-- pages area -->
                <li class="treeview pages">
                    <a href="#">
                        <i class="fa fa-bar-chart-o"></i>
                        <span><?php echo display('page')?></span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li <?php echo (($slug3 == 'Create_new_page') ? $selected : '')?>><a href="<?php echo $bu; ?>admin/Page/Create_new_page"><i class="fa fa-angle-double-right"></i> <?php echo display('add_new_page')?></a></li>
                        <li <?php echo (($slug3 == 'Pages') ? $selected : '')?>><a href="<?php echo $bu; ?>admin/Page/Pages"><i class="fa fa-angle-double-right"></i> <?php echo display('page_list')?></a></li>
                    </ul>
                </li><!-- end pages area -->

                <!-- Menu area -->
                <li <?php echo (($slug == 'Menu') ? $selected : '')?> class="menu">
                    <a href="<?php echo $bu; ?>admin/Menu"><i class="fa fa-angle-double-right"></i> <?php echo display('menu')?></a>
                </li><!-- end menu area -->
                
                <li class="treeview usr">
                    <a href="#">
                        <i class="fa fa-user"></i>
                        <span><?php echo display('user')?></span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li <?php echo (($slug3 == 'registration') ? $selected : '')?>><a href="<?php echo $bu; ?>admin/Users/registration"><i class="fa fa-angle-double-right"></i> <?php echo display('registration')?></a></li>
                        <li <?php echo (($slug3 == 'repoter_list') ? $selected : '')?>><a href="<?php echo $bu; ?>admin/Users/repoter_list"><i class="fa fa-angle-double-right"></i> <?php echo display('user_list')?></a></li>
                        <li <?php echo (($slug3 == 'last_20_access') ? $selected : '')?>><a href="<?php echo $bu; ?>admin/Users/last_20_access"><i class="fa fa-angle-double-right"></i> <?php echo display('last_20_access')?></a></li>
                        <li <?php echo (($slug == 'Reports_controller') ? $selected : '')?>><a href="<?php echo $bu; ?>admin/Reports_controller"><i class="fa fa-angle-double-right"></i> <?php echo display('reporter_news_list')?></a></li>
                        <li class="treeview">
                           <a href="#">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <span><?php echo display('general_user');?></span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu" style="display: none;">
                                <li><a href="<?php echo $bu; ?>admin/General_user/user_list"><i class="fa fa-angle-double-right"></i> <?php echo display('user_list');?></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                                                                    

                </li>

                <li class="treeview vs">
                    <a href="#">
                        <i class="fa fa-cogs" aria-hidden="true"></i>
                        <span><?php echo display('settings')?></span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li <?php echo (($slug3 == 'home_view_settings') ? $selected : '')?>><a href="<?php echo $bu; ?>admin/View_setup/home_view_settings"><i class="fa fa-angle-double-right"></i> <?php echo display('home_page')?></a></li>
                        <li <?php echo (($slug3 == 'contact_page_setup') ? $selected : '')?>><a href="<?php echo $bu; ?>admin/View_setup/contact_page_setup"><i class="fa fa-angle-double-right"></i> <?php echo display('contact_page_setting')?></a></li>
                        <li <?php echo (($slug3 == 'view_language_settings') ? $selected : '')?>><a href="<?php echo $bu; ?>admin/View_setup/view_language_settings"><i class="fa fa-angle-double-right"></i> <?php echo display('language_settings')?></a></li>
                        <li <?php echo (($slug3 == 'website_title') ? $selected : '')?>><a href="<?php echo $bu; ?>admin/View_setup/website_title"><i class="fa fa-angle-double-right"></i> <?php echo display('website_title')?></a></li>
                        <li <?php echo (($slug3 == 'website_footer') ? $selected : '')?>><a href="<?php echo $bu; ?>admin/View_setup/website_footer"><i class="fa fa-angle-double-right"></i> <?php echo display('website_footer')?></a></li>
                        <li <?php echo (($slug3 == 'website_logo') ? $selected : '')?>><a href="<?php echo $bu; ?>admin/View_setup/website_logo"><i class="fa fa-angle-double-right"></i> <?php echo display('website_logo')?></a></li>
                        <li <?php echo (($slug3 == 'website_favicon') ? $selected : '')?>><a href="<?php echo $bu; ?>admin/View_setup/website_favicon"><i class="fa fa-angle-double-right"></i> <?php echo display('website_favicon')?></a></li>
                        <li <?php echo (($slug3 == 'website_timezone') ? $selected : '')?>><a href="<?php echo $bu; ?>admin/View_setup/website_timezone"><i class="fa fa-angle-double-right"></i> <?php echo display('website_timezone')?></a></li>
                        <li <?php echo (($slug == 'Demo') ? $selected : '')?>><a href="<?php echo $bu; ?>admin/Demo"><i class="fa fa-angle-double-right"></i> Delete Demo Data </a></li>
                        
                        <li class="treeview">
                           <a href="#">
                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                <span><?php echo display('email_configaretion');?></span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu" style="display: none;">
                                <li><a href="<?php echo $bu; ?>admin/Email_setting/index"><i class="fa fa-angle-double-right"></i><?php echo display('view_email_config')?></a></li>
                            </ul>
                        </li>

                    </ul>
                </li>

                <li class="treeview seo">
                    <a href="#">
                        <i class="fa fa-laptop"></i>
                        <span><?php echo display('seo')?></span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li <?php echo (($slug3 == 'google_analytics') ? $selected : '')?>><a href="<?php echo $bu; ?>admin/Seo/google_analytics"><i class="fa fa-angle-double-right"></i> <?php echo display('googleanalytics')?></a></li>
                        <li <?php echo (($slug3 == 'social_sites') ? $selected : '')?>><a href="<?php echo $bu; ?>admin/Seo/social_sites"><i class="fa fa-angle-double-right"></i> <?php echo display('social_sites')?></a></li>
                        <li <?php echo (($slug3 == 'social_link') ? $selected : '')?>><a href="<?php echo $bu; ?>admin/Seo/social_link"><i class="fa fa-angle-double-right"></i> <?php echo display('social_site_link')?></a></li>
                        <li <?php echo (($slug3 == 'comments') ? $selected : '')?>><a href="<?php echo $bu; ?>admin/Seo/comments"><i class="fa fa-angle-double-right"></i> <?php echo display('comments')?></a></li>
                        <li <?php echo (($slug3 == 'fixed_keyword') ? $selected : '')?>><a href="<?php echo $bu; ?>admin/Seo/fixed_keyword"><i class="fa fa-angle-double-right"></i> <?php echo display('fixed_keyword')?></a></li>
                        <li <?php echo (($slug3 == 'alexa') ? $selected : '')?>><a href="<?php echo $bu; ?>admin/Seo/alexa"><i class="fa fa-angle-double-right"></i> <?php echo display('alexa')?></a></li>
                    </ul>
                </li>

                <!--Themes Menu-->
                <li <?php echo (($slug == 'Theme') ? $selected : '')?>>
                    <a href="<?php echo $bu; ?>admin/Theme"><i class="glyphicon glyphicon-picture"></i> <?php echo display('theme_activation')?></a>
                </li>
                

                <li <?php echo (($slug == 'Social_auth_setting') ? $selected : '')?>>
                    <a href="<?php echo $bu; ?>admin/Social_auth_setting" class="theme_de">
                        <span ><i class="fa fa-bar-chart-o"></i> <?php echo display('social_authentication');?>  </span>
                    </a>
                </li>
                <!--Themes Menu-->
                <li <?php echo (($slug1 == 'cache') ? $selected : '')?>>
                    <a href="<?php echo $bu; ?>cache" class="theme_de">
                        <span ><i class="fa fa-bar-chart-o"></i> <?php echo display('cache_system')?></span>
                    </a>
                </li>
                
                <li <?php echo (($slug == 'Language') ? $selected : '')?>>
                    <a href="<?php echo $bu; ?>admin/Language" class="theme_de">
                        <span ><i class="fa fa-bar-chart-o"></i> <?php echo display('language_settings');?></span>
                    </a>
                </li>
            </ul>
        </section>
        
        <!-- /.sidebar -->
    </aside>


    <script>
        $(document).ready(function () {

            $('.theme_de').click(function () {
                $('.theme_details').hide();
            });

            $('.layout').click(function () {
                $('.theme_details').toggle('slow');
            });
        });
    </script>


