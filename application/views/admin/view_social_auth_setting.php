<?php

    $user_id = $this->session->userdata('id');
    $user_type = $this->session->userdata('user_type');
    if (($user_type == 3) || ($user_type == 4)) {
        include("view_left_menu.php");
    } else if($user_type==2){
        include("user_left_menu_view.php");
    } else if($user_type==1){
        include("modaretor_left_menu_view.php");
    }

?>

    <aside class="right-side">
        <section class="content">
        <?php
            if($this->session->flashdata('message')){
        ?>
            <div class="row">
                <div class="alert alert-success fade in">
                    <span class="close" data-dismiss="alert">×</span>
                    <b><?php echo $this->session->flashdata('message'); ?></b>
                </div>
            </div>
        <?php
            }
        ?>
        <?php  echo form_open('admin/Social_auth_setting/update', array('method' =>'post'));?>

        <button class="btn btn-success pull-right" ><?php echo display('update');?></button>

        <div class="row">
            <div class="col-md-12">
                <table id="table" class="table table-bordered">
                    <tr class="t_bg">
                        <th align="center"><?php echo display('sl')?></th>
                        <th align="center"><?php echo display('name')?></th>
                        <th align="center"><?php echo display('ap_id')?></th>
                        <th align="center"><?php echo display('app_secret')?></th>
                        <th align="center"><?php echo display('api_key')?></th>
                        <th align="center"><?php echo display('status')?></th>
                    </tr>


                    <?php
                        $sl = 1;    
                        foreach ($social_auth as $key => $value) {              
                    ?>
                    <input type="hidden" name="id[]" value="<?php echo $value->id; ?>" class="form-control">
                        <tr>
                            <td align="center"><?php echo $sl;?></td>
                            <td align="center"><?php echo $value->name;?></td>
                            <td align="center"><input type="text" name="app_id[]" value="<?php echo $value->app_id; ?>" class="form-control"></td>
                            <td align="center"><input type="text" name="app_secret[]" value="<?php echo $value->app_secret; ?>" class="form-control"></td>
                            <td align="center"><input type="text" name="api_key[]" value="<?php echo $value->api_key; ?>" class="form-control"></td>
                            <td align="center"><a href="<?php echo base_url()?>admin/Social_auth_setting/update_status/<?php echo $value->id?>/<?php echo $value->status?>" class="btn btn-success">
                            <i class="glyphicon glyphicon-<?php echo ($value->status==1?'ok':'remove')?>"></i>
                            </a></td>
                        </tr>

                    
                    <?php
                        $sl++;
                        }
                    ?>

                    <tr>
                        <td colspan="3"><b>Facebook redirect Url : </b> <?php echo base_url();?>registration/facebook_login</td>
                            
                        <td colspan="3"><b>Google redirect Url : </b> <?php echo base_url();?>registration/googl_login/ </td>
                    </tr>
                </table>
            </div>
            </div>
            <?php echo form_close();?>
        </section>
    </aside>
</div>

