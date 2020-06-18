<?php
$this->load->view('admin/view_left_menu.php');
?>
<aside class="right-side">
    <?php
    //if($previous_settings!=false){
    // extract((array)json_decode($previous_settings));
    //}
    $result = $this->db->select('*')->where('id', 1)->from('weather')->get()->row();
    ?>
    <section class="content col-sm-8">    
        <div class="page_heading"><i class="glyphicon glyphicon-cog"></i>&nbsp;Weather time setup</div>

        <form action="<?php echo base_url(); ?>admin/view_setup/SaveSetWeather" method="post">
            <div class="form-group">
                <div class="row single_field">
                    <div class="col-sm-2"><label>Sunrise Time</label></div>
                    <div class="col-sm-10">
                        <input type="text" name="Sunrise" class="form-control" required="1"  value="<?php echo $result->sunrise; ?>">
                    </div>
                </div> 
                <div class="row single_field">
                    <div class="col-sm-2"><label>Sunset Time</label></div>
                    <div class="col-sm-10">
                        <input type="text" name="Sunset" class="form-control" required="1" value="<?php echo $result->sunset; ?>">
                    </div>
                </div>                
                <div class="row single_field">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                        <input type="submit" name="save1" value="Update" class="btn btn-primary">
                    </div>
                </div> 
            </div>                      
        </form>
    </section>
</aside>