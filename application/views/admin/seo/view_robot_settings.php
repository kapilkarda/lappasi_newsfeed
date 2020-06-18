<?php
$user_id = $this->session->userdata('id');
$this->load->view('view_left_menu');
?>
<aside class="right-side">
    <section class="content col-sm-12">
        <div class="col-sm-5">
            <div class="page_heading"><i class="glyphicon glyphicon-cog"></i>&nbsp; Robot Settings </div>
            <?php
            if ($this->session->flashdata('message')) {
                echo '<div class="alert alert-success"><button class="close" data-dismiss="alert">&times;</button><b>';
                echo $this->session->flashdata('message');
                echo '</b></div>';
            }
            ?>
            <form action="<?php echo base_url(); ?>seo/update_robot_code" method="post">
                <div class="form-group">
                    <label>Robot Code</label>
                    <textarea name="code" class="form-control" rows="12" required="1">
                        <?php
                        echo @$previous_settings;
                        ?>
                    </textarea>
                </div>                      
                <div class="form-group">
                    <label></label>
                    <input type="submit" name="save" value="Update" class="btn btn-primary">
                </div>
            </form>
        </div>
    </section>
</aside>