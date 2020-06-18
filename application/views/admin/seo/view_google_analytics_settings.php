<?php
$user_id = $this->session->userdata('id');
$this->load->view('admin/view_left_menu');
?>
<aside class="right-side">
    <section class="content col-sm-12">
        <div class="col-sm-5">
            <div class="page_heading"><i class="glyphicon glyphicon-cog"></i>&nbsp; <?php echo display('google_analytics_setting')?> </div>
            <?php
            if ($this->session->flashdata('message')) {
                echo '<div class="alert alert-success"><button class="close" data-dismiss="alert">&times;</button><b>';
                echo $this->session->flashdata('message');
                echo '</b></div>';
            }
            $attributs = array('method' =>'post' );
            echo form_open('admin/Seo/update_google_analytics_code',$attributs);
            ?>
            <div class="form-group">
                    <label><?php echo display('google_analytics_code')?> </label>
                    <textarea name="code" class="form-control" rows="12" required="1">
                        <?php
                        echo @$previous_settings;
                        ?>
                    </textarea>
                </div>                      
                <div class="form-group">
                    <label></label>
                    <input type="submit" name="save" value="<?php echo display('update')?> " class="btn btn-primary">
                </div>
           <?php echo form_close();?>
        </div>
    </section>
</aside>