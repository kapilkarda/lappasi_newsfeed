<?php
$user_id = $this->session->userdata('id');

$user_type = $this->session->userdata('user_type');
if (($user_type == 3) || ($user_type == 4)) {
    include("view_left_menu.php");
} else if($user_type==2){
    include("user_left_menu_view.php");
}else if($user_type==1){
    include("modaretor_left_menu_view.php");
}
?>
<aside class="right-side">

    <section class="content col-sm-4">
        <div class="page_heading"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp; <?php echo display('update')?> <?php echo display('category')?></div>

        <?php 
        $at = array('method' =>'post','name'=>'f_name');
        echo form_open_multipart('admin/Category/update_category/'.$this->uri->segment(4),$at);
        ?>
        <div class="form-group">
                <label><?php echo display('category_name')?></label>
                <input type="text" name="category_name" class="form-control" value="<?php echo $cate_info->category_name; ?>">
            </div>
            <div class="form-group">
                <label><?php echo display('slug')?></label>
                <input type="text" name="slug" class="form-control" value="<?php echo $cate_info->slug; ?>">

            </div>
            <div class="form-group">
                <label><?php echo display('in_menu')?></label> &nbsp;
                <input type="checkbox" name="menu" class="form-control" value="1" <?php echo $cate_info->menu == 1 ? "checked" : ""; ?>>
            </div>

            <!-- <div class="form-group">
                <label>If you Change, Select your Preant menu(Your Language)</label>
                <select class="form-control" name="m_menu">
                    <option value="">--select--</option>
                    <?php foreach ($all_categories as $key => $value) {
                        ?>
                        <option value="<?php echo $value->category_id; ?>"> <?php echo $value->category_name; ?> </option>
                        <?php
                    }
                    ?>  
                </select>
            </div> -->

            <div class="form-group">
            <label><?php echo display('category_imgae')?> (1350*350 & max size 1MB)</label> &nbsp;
                <img src="<?php echo base_url().@$cate_info->category_imgae;?>">
                <input type="file" accept="image/*" name="cate_pic" class="form-control">
            </div> 
            <input type="hidden" name="pic" value="<?php echo @$cate_info->category_imgae;?>">


            <div class="form-group">
                <label>
                    <a href="<?php echo base_url(); ?>admin/Category/list_of_categories" class="btn btn-default"><i class="glyphicon glyphicon-backward"></i> Go Back</a>
                </label>
                <input type="submit" name="Update" value="<?php echo display('update')?>" class="btn btn-primary">
            </div>
        <?php echo form_close();?>
<?php
if ($this->session->flashdata('message')) {
    echo '<div class="alert alert-success"><button class="close" data-dismiss="alert">&times;</button><b>';
    echo $this->session->flashdata('message');
    echo '</b></div>';
}
if ($this->session->flashdata('exception')) {
    echo '<div class="alert alert-danger"><button class="close" data-dismiss="alert">&times;</button><b>';
    echo $this->session->flashdata('exception');
    echo '</b></div>';
}
?>
</section>

</aside>
<script type="text/javascript">
    document.forms['f_name'].elements['m_menu'].value = "<?php echo $cate_info->parents_id; ?>";
</script>
