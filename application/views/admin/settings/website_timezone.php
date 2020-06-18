<?php
    $this->load->view('admin/view_left_menu.php');
?>
<aside class="right-side">
<?php
    include('common_file/function.php');
    if (@$previous_settings != false) {
        extract((array) json_decode($previous_settings));
    }
?>

    <section class="content col-sm-8">    
        <div class="page_heading"><i class="glyphicon glyphicon-cog"></i>&nbsp; Website Time Zone </div>
        <?php
            if ($this->session->userdata('message')) {
                echo '<div class="alert alert-success"><button class="close" data-dismiss="alert">&times;</button><b>';
                echo $this->session->userdata('message');
                $this->session->unset_userdata('message');
                echo '</b></div>';
            }
            $attributs = array('method' =>'post', );
            echo form_open('admin/View_setup/save_timezone');
        ?>
        <div class="form-group">
            <div class="row single_field">
                <div class="col-sm-2"><label><?php echo display('website_time_zone')?></label></div>
                <div class="col-sm-10">
                    <select name="website_timezone" class="form-control" required="1" id="per_page_view">
                        <option value="">Please, select Timezone</option>

                    <?php
                    foreach ($locations as $continent => $zone) {
                        foreach ($zone as $timezone => $country) {
                            ?>
                                <option
                                    <?php
                                    if ($timezone == @$website_timezone)
                                        echo "selected";
                                    ?>	
                                    value="<?php echo $timezone; ?>"><?php echo $timezone; ?>
                                </option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>


            <div class="row single_field">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <input type="submit" name="save" value="<?php echo display('update')?>" class="btn btn-primary">
                </div>
            </div> 
        </div>                      
       <?php echo form_close();?>
    </section>
</aside>