<?php
$this->load->view('users/view_left_menu'); 
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
        <?php echo form_open_multipart('users/User_profile/save_change')?>
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