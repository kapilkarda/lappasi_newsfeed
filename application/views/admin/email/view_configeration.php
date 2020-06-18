<?php
$user_id = $this->session->userdata('id');
$user_type = $this->session->userdata('user_type');
if (($user_type == 3) || ($user_type == 4)) {
    $this->load->view('admin/view_left_menu.php');
} else if($user_type==2){
    $this->load->view('admin/user_left_menu_view.php');
}else if($user_type==1){
    $this->load->view('admin/modaretor_left_menu_view.php');
}
?>
<aside class="right-side">

    <section class="content">

    <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo display('email_config')?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open('admin/email_setting/save');?>
              <div class="box-body">

                <div class="form-group">
                  <label for="Protocol"><?php echo display('smtp_protocol')?></label>
                  <input type="text" class="form-control" name="protocol" id="Protocol" value="<?php echo @$email_config->smtp_protocol?>" placeholder="Smtp Protocol">
                </div>
                <div class="form-group">
                  <label for="host"><?php echo display('smtp_host')?></label>
                  <input type="text" class="form-control" name="host" id="host" value="<?php echo @$email_config->smtp_host?>" placeholder="Smtp Host">
                </div>

                <div class="form-group">
                  <label for="port"><?php echo display('smtp_port')?></label>
                  <input type="text" class="form-control" name="port" id="port" value="<?php echo @$email_config->smtp_port;?>" placeholder="Smtp Port">
                </div>
                <div class="form-group">
                  <label for="username"><?php echo display('smtp_username')?></label>
                  <input type="text" class="form-control" name="username" id="username" value="<?php echo @$email_config->smtp_username;?>" placeholder="Smtp Username">
                </div>
                <div class="form-group">
                  <label for="password"><?php echo display('smtp_password')?></label>
                  <input type="password" class="form-control" name="password" value="<?php echo @$email_config->smtp_password;?>" id="password" placeholder="Smtp Password">
                </div>

                <div class="form-group">
                  <label for="mailtype"><?php echo display('smtp_mailtype')?></label>
                  <input type="text" class="form-control" name="mailtype" id="mailtype" value="<?php echo @$email_config->smtp_mailtype?>" placeholder="Smtp Mailtype">
                </div>

                <div class="form-group">
                  <label for="charset"><?php echo display('smtp_charset')?></label>
                  <input type="text" class="form-control" name="charset" id="charset" value="<?php echo @$email_config->smtp_charset?>" placeholder="Smtp charset">
                </div>

                <div class="form-group">
                  <label for="charset"><?php echo display('status')?></label>
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="status" type="checkbox" <?php echo($email_config->smtp_charset=1?'checked':'');?> > 
                </div>

                <input type="hidden" name="id" value="<?php echo $email_config->id;?>">
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary"><?php echo display('submit')?></button>
              </div>
           <?php echo form_close()?>
          </div>
          <!-- /.box -->
      </div>

    </section>
</aside>