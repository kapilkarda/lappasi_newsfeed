<script type="text/javascript">
    function validateSettingsPage() {
        var page_style = $("#page_style option:selected").text();
        var per_page_view = $("#per_page_view").val()
        var sider_bar_type = $("#sider_bar_type option:selected").text();
    }
</script>
<?php
$this->load->view('admin/view_left_menu.php');
?>

<aside class="right-side">
    <?php
    if ($previous_settings != false) {
        extract((array) json_decode($previous_settings));
    }
    ?>
    <section class="content col-sm-5">    
        <div class="page_heading"><i class="glyphicon glyphicon-cog"></i>&nbsp; Category Page View Setup </div>
        <?php
        if ($this->session->userdata('message')) {
            echo '<div class="alert alert-success"><button class="close" data-dismiss="alert">&times;</button><b>';
            echo $this->session->userdata('message');
            $this->session->unset_userdata('message');
            echo '</b></div>';
        }
        if ($this->session->userdata('exception')) {
            echo '<div class="alert alert-danger"><button class="close" data-dismiss="alert">&times;</button><b>';
            echo $this->session->userdata('exception');
            $this->session->unset_userdata('exception');
            echo '</b></div>';
        }
        ?>
        <?php echo form_open('admin/view_setup/save_category_pageSettings')?>
        <form action="<?php echo base_url(); ?>" method="post" onsubmit="return validateSettingsPage()">
            <div class="form-group">
                <div class="row single_field">
                    <div class="col-sm-4"><label>Page Style</label></div>
                    <div class="col-sm-8">
                        <select name="page_style" class="form-control" required="1" id="page_style">
                            <option value="">Select</option>
                            <option <?php echo @$page_style == 'List' ? 'selected' : ''; ?>>List</option>
                            <option <?php echo @$page_style == 'Grid' ? 'selected' : ''; ?>>Grid</option>
                        </select>
                    </div>
                </div>
                <div class="row single_field">
                    <div class="col-sm-4"><label>Per page view</label></div>
                    <div class="col-sm-8">
                        <input type="number" name="per_page_view" class="form-control" required="1" id="per_page_view" value="<?php echo @$per_page_view; ?>">
                    </div>
                </div>
                <div class="row single_field">
                    <div class="col-sm-4"><label>Side Bar Position</label></div>
                    <div class="col-sm-8">
                        <select name="sider_bar_type" class="form-control" required="1" id="sider_bar_type">
                            <option value="">Select</option>
                            <option <?php echo @$side_bar_type == 'Left' ? 'selected' : ''; ?>>Left</option>
                            <option <?php echo @$side_bar_type == 'Right' ? 'selected' : ''; ?>>Right</option>
                        </select>
                    </div>
                </div>
                <div class="row single_field">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-8">
                        <input type="submit" name="save" value="Update" class="btn btn-primary">
                    </div>
                </div> 
            </div>                      
        </form>
    </section>
</aside>