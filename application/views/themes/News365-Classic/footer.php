<?php
// archive selected date
if ($this->uri->segment(1) == 'archive' && $this->uri->segment(2) != '') {
    $current_archive_date = $this->uri->segment(2);
} else {
    $current_archive_date = date("Y-m-d");
}
?>
<!-- footer Area
============================================ -->

<?php 
#------------------------------------------
#  user analytics, save the database
#------------------------------------------
$status = $this->db->select('*')->from('settings')->where('id', 8)->get()->row();
$an = json_decode(@$status->details);

if($an->user_analytics=='active'){


    $ip = $_SERVER['REMOTE_ADDR'];

    function get_content($URL){
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($ch, CURLOPT_URL, $URL);
          $data = curl_exec($ch);
          curl_close($ch);
          return $data;
    }
    
    @$info = (object)json_decode(get_content("https://ipinfo.io/{$ip}/json"));  
    

    @$news_id = $this->uri->segment(3);
    @$link = base_url(uri_string());
    $user_analiytics = array(
        'ip' => @$ip,
        'country' => @$info->country,
        'city' => @$info->city,
        'link' => @$link,
        'news_id' => @$news_id,
        'date_time' => date("Y-m-d h:i:s"),
        'browser' =>  $this->input->user_agent(),
        'session' => session_id()
    );

if (preg_match('/bot|crawl|curl|dataprovider|search|get|spider|find|java|majesticsEO|google|yahoo|teoma|contaxe|yandex|libwww-perl|facebookexternalhit/i', $_SERVER['HTTP_USER_AGENT'])) {


} else {   
    $this->db->insert('user_analiytics',$user_analiytics);
}

}

#------------------------------------------
#  user analytics, save the database 
#------------------------------------------
?>


<!-- footer Area
   ============================================ -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                <div class="subscribe" style="background: #e80042;  width: 100px; margin: 20px;">
                    <a style="color: #fff" href="<?php echo base_url();?>Subscription/index" class="btn">Subscribe</a>
                </div>
            </div>

            <div class="col-sm-8">
                <div class="footer-box footer-logo-address"> <!-- address  -->
                    <img style="" src="<?php echo base_url() . @$footer_logo; ?>" class="img-responsive" alt="">
                    <address>
                        <?php echo @$website_footer['website_footer']; ?>
                    </address>
                </div> <!-- /.address  -->
            </div>

            

            
            <div class="col-sm-2">
            </div>
        </div>
    </div>
</footer>

<?php
    $social_link = json_decode('[' . $social_link . ']');
?>
<div class="sub-footer">  <!-- sub footer -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <p><?php echo @$website_footer['copy_right'];?></p>
                <div class="social">
                    <ul>
                        <li><a href="<?php if (isset($social_link[0]->fb)) echo @$social_link[0]->fb; ?>" class="facebook"><i class="fa  fa-facebook"></i> </a></li>
                        <li><a href="<?php if (isset($social_link[0]->tw)) echo @$social_link[0]->tw; ?>" class="twitter"><i class="fa  fa-twitter"></i></a></li>
                        <li><a href="<?php if (isset($social_link[0]->google)) echo @$social_link[0]->google; ?>" class="google"><i class="fa  fa-google-plus"></i></a></li>
                        <li><a href="<?php if (isset($social_link[0]->flickr)) echo @$social_link[0]->flickr; ?>" class="flickr"><i class="fa fa-flickr"></i></a></li>
                        <li><a href="<?php if (isset($social_link[0]->youtube)) echo @$social_link[0]->youtube; ?>" class="youtube"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="<?php if (isset($social_link[0]->vimo)) echo @$social_link[0]->vimo; ?>" class="vimeo"><i class="fa fa-vimeo"></i></a></li>
                        <li><a href="<?php if (isset($social_link[0]->vk)) echo @$social_link[0]->vk; ?>" class="vk"><i class="fa fa-vk"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> 


<!-- Include all compiled plugins (below), or include individual files as needed -->
<script type="text/javascript" src="<?php echo base_url(); ?>application/views/themes/<?php echo $default_theme; ?>/web-assets/js/bootstrap.min.js"></script>
<!-- Metis Menu Plugin JavaScript -->
<script type="text/javascript" src="<?php echo base_url(); ?>application/views/themes/<?php echo $default_theme; ?>/web-assets/js/metisMenu.min.js"></script>
<!-- toster -->
<script type="text/javascript" src="<?php echo base_url(); ?>application/views/themes/<?php echo $default_theme; ?>/web-assets/toster/toastr.min.js"></script>
<!-- Scrollbar js -->
<script type="text/javascript" src="<?php echo base_url(); ?>application/views/themes/<?php echo $default_theme; ?>/web-assets/js/jquery.mCustomScrollbar.concat.min.js" ></script>
<!-- animate js -->
<script type="text/javascript" src="<?php echo base_url(); ?>application/views/themes/<?php echo $default_theme; ?>/web-assets/js/wow.min.js"></script>
<!-- Newstricker js -->
<script type="text/javascript" src="<?php echo base_url(); ?>application/views/themes/<?php echo $default_theme; ?>/web-assets/js/jquery.newsTicker.js"></script>
<!--  classify JavaScript -->
<script type="text/javascript" src="<?php echo base_url(); ?>application/views/themes/<?php echo $default_theme; ?>/web-assets/js/classie.js"></script>
<!-- owl carousel js --> 
<script type="text/javascript" src="<?php echo base_url(); ?>application/views/themes/<?php echo $default_theme; ?>/web-assets/owl-carousel/owl.carousel.js"></script>
<!-- youtube js -->
<script type="text/javascript" src="<?php echo base_url(); ?>application/views/themes/<?php echo $default_theme; ?>/web-assets/js/RYPP.js"></script>
<!-- jquery ui js --> 
<script type="text/javascript" src="<?php echo base_url(); ?>application/views/themes/<?php echo $default_theme; ?>/web-assets/js/jquery-ui.js"></script>
<!-- form -->
<script type="text/javascript" src="<?php echo base_url(); ?>application/views/themes/<?php echo $default_theme; ?>/web-assets/js/form-classie.js"></script>
<!-- custom js --> 
<script type="text/javascript" src="<?php echo base_url(); ?>application/views/themes/<?php echo $default_theme; ?>/web-assets/js/custom.js"></script>

<script type="text/javascript">
    $(function () {
        $("#archive").datepicker({
            autoOpen: true,
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd",
            onSelect: function (dateText, inst) {
                window.location = '<?php echo base_url(); ?>' + 'archive/' + dateText, '_parent';
            }
        });
    });
    $(function () {
        $("#archive-date").datepicker({
            autoOpen: true,
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd",
        });
    });
</script>

</body>
</html>