<?php
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

    <section class="content">
        <h4><i class="fa fa-upload"></i> <?php echo display('password_change')?></h4>
        <hr/>
        <?php
        if ($this->session->flashdata('message')!=NULL) {
            echo $this->session->flashdata('message');
            }
        ?>
        
        <?php echo form_open_multipart('admin/Profile/save_change');?>
            <!--<div class="form-group">-->
            <div class="row">
                <div class="col-sm-6">
                    <label><?php echo display('new_password')?></label>
                    <input type="password" name="new_password" class="form-control" required="1"/>
                    <label> <?php echo display('confirm_password')?></label>
                    <input type="password" class="form-control" name="confirm_password" required="1"/>
                    <label></label>
                    <input type="submit" value="<?php echo display('save')?>" class="form-control btn btn-primary">
                </div>
            </div>
        </form>
        <hr/>

    <hr/>

    </section>
</aside>