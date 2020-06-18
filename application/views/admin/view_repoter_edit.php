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
    <section class="content col-sm-5">    
        <div class="page_heading"><i class="glyphicon glyphicon-user"></i>&nbsp; <?php echo display('user_profile')?></div>
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
        <?php 
            $attributes = array('name'=>'edit_user');
            echo form_open('admin/Users/update_reporter_info/'.$user_info['id'], $attributes);
        ?>
         
            <div class="form-group">    
                <div class="row single_field">
                    <div class="col-sm-4"><label><?php echo display('full_name')?></label></div>
                    <div class="col-sm-8">
                        <input type="text" name="name" class="form-control" required="" value="<?php echo @$user_info['name']; ?>">
                    </div>
                </div>
                <div class="row single_field">
                    <div class="col-sm-4"><label><?php echo display('email')?> </label></div>
                    <div class="col-sm-8">
                        <input type="email" name="email" class="form-control" required="" value="<?php echo @$user_info['email']; ?>">
                    </div>
                </div>                
                <div class="row single_field">
                    <div class="col-sm-4"><label><?php echo display('mobile')?> </label></div>
                    <div class="col-sm-8">
                        <input type="text" name="mobile" class="form-control" value="<?php echo @$user_info['mobile']; ?>">
                    </div>
                </div> 

                <div class="row single_field">
                    <div class="col-sm-4"><label><?php echo display('access_category')?> </label></div>
                    <div class="col-sm-8">
                        <select name="type" class="form-control">
                            <option value="">-<?php echo display('access_category')?>-</option>
                            <option value="4"><?php echo display('admin')?></option>
                            <option value="2"><?php echo display('writer')?></option>
                            <option value="1"><?php echo display('moderator')?></option>
                        </select>
                    </div>
                </div>

                <div class="row single_field">
                    <div class="col-sm-4"><label><?php echo display('new_password')?> </label></div>
                    <div class="col-sm-8">
                        <input type="password" name="password" class="form-control">
                    </div>
                </div>                

                <div class="row single_field">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-8">
                        <input type="submit" name="save" value="<?php echo display('update')?>" class="btn btn-primary">
                    </div>
                </div> 
            </div>

        <?php echo form_close();?>
    </section>
</aside>

<script type="text/javascript">
    document.forms['edit_user'].elements['type'].value="<?php echo @$user_info['user_type']?>";
    
</script>