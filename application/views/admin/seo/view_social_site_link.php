<?php
    $this->load->view('admin/view_left_menu.php');
?>
<aside class="right-side">
    <?php
    $settings = json_decode('[' . $previous_settings . ']');
    ?>
    <section class="content col-sm-8">    
        <div class="page_heading"><i class="glyphicon glyphicon-cog"></i>&nbsp;  <?php echo display('social_site_link')?> </div>
        <?php
        if ($this->session->flashdata('message')) {
            echo '<div class="alert alert-success"><button class="close" data-dismiss="alert">&times;</button><b>';
            echo $this->session->flashdata('message');
            echo '</b></div>';
        }
    
        $attributs = array('method' =>'post' );
         echo form_open('admin/Seo/social_link_save',$attributs);
        ?>
        <div class="form-group">
            <div class="row single_field">
                <div class="col-sm-2"><label><?php echo display('facebook')?> </label></div>
                <div class="col-sm-10">
                    <input type="text" name="fb" class="form-control" id="" value="<?php if (isset($settings[0]->fb)) echo @$settings[0]->fb; ?>">
                </div>
            </div> 
                <div class="row single_field">
                    <div class="col-sm-2"><label><?php echo display('twitter')?></label></div>
                    <div class="col-sm-10">
                        <input type="text" name="tw" class="form-control" id="" value="<?php if (isset($settings[0]->tw)) echo @$settings[0]->tw; ?>">
                    </div>
                </div>
                <div class="row single_field">
                    <div class="col-sm-2"><label><?php echo display('linkedin')?></label></div>
                    <div class="col-sm-10">
                        <input type="text" name="linkd" class="form-control" id="" value="<?php if (isset($settings[0]->linkd)) echo @$settings[0]->linkd; ?>">
                    </div>
                </div>
                <div class="row single_field">
                    <div class="col-sm-2"><label><?php echo display('google')?></label></div>
                    <div class="col-sm-10">
                        <input type="text" name="google" class="form-control" id="" value="<?php if (isset($settings[0]->google)) echo @$settings[0]->google; ?>">
                    </div>
                </div>
                <div class="row single_field">
                    <div class="col-sm-2"><label><?php echo display('pinterest')?></label></div>
                    <div class="col-sm-10">
                        <input type="text" name="pin" class="form-control" id="" value="<?php if (isset($settings[0]->pin)) echo @$settings[0]->pin; ?>">
                    </div>
                </div>
                <div class="row single_field">
                    <div class="col-sm-2"><label><?php echo display('vimeo')?></label></div>
                    <div class="col-sm-10">
                        <input type="text" name="vimo" class="form-control" id="" value="<?php if (isset($settings[0]->vimo)) echo @$settings[0]->vimo; ?>">
                    </div>
                </div> 
                <div class="row single_field">
                    <div class="col-sm-2"><label><?php echo display('youtube')?></label></div>
                    <div class="col-sm-10">
                        <input type="text" name="youtube" class="form-control" id="" value="<?php if (isset($settings[0]->youtube)) echo @$settings[0]->youtube; ?>">
                    </div>
                </div>
                <div class="row single_field">
                    <div class="col-sm-2"><label><?php echo display('flickr')?></label></div>
                    <div class="col-sm-10">
                        <input type="text" name="flickr" class="form-control" id="" value="<?php if (isset($settings[0]->flickr)) echo @$settings[0]->flickr; ?>">
                    </div>
                </div>
                <div class="row single_field">
                    <div class="col-sm-2"><label><?php echo display('vk')?></label></div>
                    <div class="col-sm-10">
                        <input type="text" name="vk" class="form-control" id="" value="<?php if (isset($settings[0]->vk)) echo @$settings[0]->vk; ?>">
                    </div>
                </div> 

                <div class="row single_field">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                        <input type="submit" name="save1" value="<?php echo display('update')?>" class="btn btn-primary">
                    </div>
                </div> 
            </div>                      
       <?php echo form_close();?>
    </section>
</aside>