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

        <div class="col-md-8">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo display('registration')?> <i class="glyphicon glyphicon-user"></i></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php
            $attributes = array('class' => '','name'=>'');
            echo form_open_multipart('admin/users/create_new_usr', $attributes);
        ?>
        <div class="box-body">

            <div class="form-group">        
                <div class="row single_field">
                    <div class="col-sm-4"><label><?php echo display('full_name')?></label></div>
                    <div class="col-sm-8">
                        <input type="text" name="name" class="form-control" required="">
                    </div>
                </div>
                <div class="row single_field">
                    <div class="col-sm-4"><label><?php echo display('email')?> </label></div>
                    <div class="col-sm-8">
                        <input type="email" name="email" class="form-control" required="">
                    </div>
                </div>
                <div class="row single_field">
                    <div class="col-sm-4"><label><?php echo display('password')?> </label></div>
                    <div class="col-sm-8">
                        <input type="password" name="password" class="form-control" required="">
                    </div>
                </div>                
                <div class="row single_field">
                    <div class="col-sm-4"><label><?php echo display('mobile')?> </label></div>
                    <div class="col-sm-8">
                        <input type="text" name="mobile" class="form-control">
                    </div>
                </div>

                <div class="row single_field">
                    <div class="col-sm-4"><label><?php echo display('picture')?> </label></div>
                    <div class="col-sm-8">
                        <input type="file" name="photo" class="form-control">
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
                    <div class="col-sm-4"></div>
                    <div class="col-sm-8">
                        <input type="submit" name="save" value="<?php echo display('create')?>" class="btn btn-primary">
                    </div>
                </div> 
            </div>  
            </div>                    
        <?php echo form_close();?>
          </div>
          <!-- /.box -->
      </div>

        
    </section>
</aside>