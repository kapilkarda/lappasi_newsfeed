<?php
$this->load->view('admin/view_left_menu.php');
?>
<aside class="right-side">
    <?php
    if ($previous_settings != false) {
        extract((array) json_decode($previous_settings));
    }
    ?>
    <section class="content col-sm-8">    
        <div class="page_heading"><i class="glyphicon glyphicon-cog"></i>&nbsp; Prayer Time set</div>
        <?php
        if ($this->session->flashdata('message')) {
            echo '<div class="alert alert-success"><button class="close" data-dismiss="alert">&times;</button><b>';
            echo $this->session->flashdata('message');
            $this->session->unset_userdata('message');
            echo '</b></div>';
        }

        $attributs = array('method' =>'post');
       echo form_open('admin/View_setup/save_setprayer_time',$attributs);
        ?>
       <div class="form-group">
                <div class="row single_field">
                    <div class="col-sm-2"><label>Prayer Time</label></div>
                    <div class="col-sm-10">
                        <input type="text" name="prayerTime" class="form-control" required="1" id="prayer_time" value="<?php echo @$prayer_time; ?>">
                    </div>
                </div>                
                <div class="row single_field">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                        <input type="submit" name="save1" value="Update" class="btn btn-primary">
                    </div>
                </div> 
            </div>                      
        <?php echo form_close();?>
    </section>
</aside>