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
        <div class="page_heading"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp; <?php echo display('add_category')?></div>
        
        <?php 
        $form_attribute = array('method' =>'post');
            echo form_open_multipart('admin/Category/save_category',$form_attribute);
        ?>
        
        <div class="form-group">
                <label><?php echo display('category_name')?>(Your Language)</label>
                <input type="text" name="cat_name" class="form-control">
        </div>
            <div class="form-group">
                <label><?php echo display('slug')?></label>
                <input type="text" name="slug" class="form-control">
            </div>
            <div class="form-group">
                <label><?php echo display('in_menu')?></label> &nbsp;
                <input type="checkbox" name="menu" class="form-control" value="1">
            </div> 
            <div class="form-group">
               <label><?php echo display('category_image')?> (1350*350 & max size 1MB)</label> &nbsp;
                <input type="file" accept="image/*" name="cate_pic" class="form-control">
            </div>           
            <div class="form-group">
                <label></label>
                <input type="submit" name="save" value="<?php echo display('save')?>" class="btn btn-primary">
            </div>

        <?php echo form_close();?>
        <?php
        if ($this->session->userdata('message')) {
            echo '<div class="alert alert-success"><button class="close" data-dismiss="alert">&times;</button><b>';
            echo $this->session->userdata('message');
            $this->session->unset_userdata('message');
            echo '</b></div>';
        }
        if ($this->session->flashdata('execption')) {
            echo '<div class="alert alert-danger"><button class="close" data-dismiss="alert">&times;</button><b>';
            echo $this->session->flashdata('execption');
            echo '</b></div>';
        }
        ?>
    </section>
</aside>