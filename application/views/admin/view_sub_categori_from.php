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
        <div class="page_heading"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp; Add Sub Category</div>
        <?php 
        $at = array('method' =>'post');
        echo form_open_multipart('admin/Category/save_sub_category',$at);
        ?>
            <div class="form-group">
                <label>Select your Parents menu(Your Language)</label>
                <select class="form-control" name="m_menu">
                    <?php foreach ($all_categories as $key => $value) {
                        ?>
                        <option value="<?php echo $value->category_id; ?>"> <?php echo $value->category_name; ?> </option>
                        <?php
                    }
                    ?>  
                </select>
            </div>
            <div class="form-group">
                <label>Sub Menu Name </label>
                <input type="text" name="sub_menu" class="form-control" required />
            </div>
            <div class="form-group">
                <label>Sub Menu Slug</label>
                <input type="text" name="slug" class="form-control" required />
            </div>

            <div class="form-group">
            <label>Category Image (1350*350 & max size 1MB)</label> &nbsp;
                <input type="file" name="cate_pic" class="form-control">
            </div> 
            

            <div class="form-group">
                <label></label>
                <input type="submit" name="save" value="Save" class="btn btn-primary">
            </div>
        <?php echo form_close();?>

        <?php
        if (!empty($this->session->flashdata('message'))) {
            echo '<div class="alert alert-success"><button class="close" data-dismiss="alert">&times;</button><b>';
            echo $this->session->flashdata('message');
            echo '</b></div>';
        }
        if(!empty($this->session->flashdata('exception'))){
            echo '<div class="alert alert-danger"><button class="close" data-dismiss="alert">&times;</button><b>';
            echo $this->session->flashdata('exception');
            echo '</b></div>';
        }
        ?>
    </section>
</aside>