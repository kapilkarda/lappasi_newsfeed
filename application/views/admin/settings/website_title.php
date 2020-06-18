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
        <div class="page_heading"><i class="glyphicon glyphicon-cog"></i>&nbsp; Website Title </div>
        <?php
        if ($this->session->flashdata('message')) {
            echo '<div class="alert alert-success"><button class="close" data-dismiss="alert">&times;</button><b>';
            echo $this->session->flashdata('message');
            echo '</b></div>';
        }
        $attributs = array('method' =>'post' );
        echo form_open('admin/View_setup/save_website_title',$attributs);
        ?>
        
        <div class="form-group">
                <div class="row single_field">
                    <div class="col-sm-2"><label><?php echo display('website_title')?></label></div>
                    <div class="col-sm-10">
                        <input type="text" name="website_title" class="form-control" required="1" id="per_page_view" value="<?php echo @$website_title; ?>">
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