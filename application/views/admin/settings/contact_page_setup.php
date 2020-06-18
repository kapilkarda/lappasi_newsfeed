<?php
$this->load->view('admin/view_left_menu.php');
?>
<aside class="right-side">

    <?php
        $settings = json_decode('[' . $previous_settings . ']');
    ?>
    <section class="content col-sm-8">    
        <div class="page_heading"><i class="glyphicon glyphicon-cog"></i>&nbsp; <?php echo display('contact_page_setting')?></div>
        <?php
        if ($this->session->flashdata('message')) {
            echo '<div class="alert alert-success"><button class="close" data-dismiss="alert">&times;</button><b>';
            echo $this->session->flashdata('message');
            echo '</b></div>';
        }
       
        ?>
        <?php echo form_open('admin/view_setup/save_contact_page')?>
            <div class="form-group">

                <div class="row single_field">
                    <div class="col-sm-2"><label><?php echo display('content')?></label></div>
                    <div class="col-sm-10">
                    <textarea name="content" class="form-control" >
                        <?php if (isset($settings[0]->content)) echo @$settings[0]->content; ?>
                    </textarea>
                        
                    </div>
                </div> 

                <div class="row single_field">
                    <div class="col-sm-2"><label><?php echo display('address')?></label></div>
                    <div class="col-sm-10">
                        <textarea name="address" class="form-control" ><?php if (isset($settings[0]->address)) echo @$settings[0]->address; ?></textarea>
                    </div>
                </div>
                <div class="row single_field">
                    <div class="col-sm-2"><label><?php echo display('phone')?></label></div>
                    <div class="col-sm-10">

                        <input type="text" name="phone" class="form-control" id="" value="<?php if (isset($settings[0]->phone)) echo @$settings[0]->phone; ?>">
                    </div>
                </div>
                <div class="row single_field">
                    <div class="col-sm-2"><label><?php echo display('phone_two')?></label></div>
                    <div class="col-sm-10">

                        <input type="text" name="phone_two" class="form-control" id="" value="<?php if (isset($settings[0]->phone_two)) echo @$settings[0]->phone_two; ?>">
                    </div>
                </div>
                <div class="row single_field">
                    <div class="col-sm-2"><label><?php echo display('email')?></label></div>
                    <div class="col-sm-10">
                        <input type="text" name="email" class="form-control" id="" value="<?php if (isset($settings[0]->email)) echo @$settings[0]->email; ?>">
                    </div>
                </div>
                 <div class="row single_field">
                    <div class="col-sm-2"><label><?php echo display('website')?></label></div>
                    <div class="col-sm-10">
                        <input type="text" name="website" class="form-control" id="" value="<?php if (isset($settings[0]->website)) echo @$settings[0]->website; ?>">
                    </div>
                </div>
                <div class="row single_field">
                    <div class="col-sm-2"><label><?php echo display('google_map')?></label></div>
                    <div class="col-sm-10">
                    <textarea name="googlemap" class="form-control">
                        <?php if (isset($settings[0]->googlemap)) echo @$settings[0]->googlemap; ?>
                    </textarea>
                       
                    </div>
                </div>
                 
                <div class="row single_field">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                        <input type="submit" name="save1" value="<?php echo display('update')?>" class="btn btn-primary">
                    </div>
                </div> 
            </div>                      
        </form>
    </section>
</aside>