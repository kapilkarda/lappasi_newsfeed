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
            <ul class="sidebar-menu">
                <li>
                    <a href="<?php echo $bu; ?>admin/Comments_manage/index">
                        <i class="fa fa-comments"></i> <?php echo display('comments')?></span>
                    </a>
                </li>
            </ul>
        </section> 
    </aside>



