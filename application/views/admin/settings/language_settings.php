<?php
$this->load->view('admin/view_left_menu.php');
?>
<aside class="right-side">
    <section class="content col-sm-5">    
        <div class="page_heading"><i class="glyphicon glyphicon-cog"></i>&nbsp; <?php echo display('language_settings')?> </div>
        <?php
        if ($this->session->flashdata('message')) {
            echo '<div class="alert alert-success"><button class="close" data-dismiss="alert">&times;</button><b>';
            echo $this->session->flashdata('message');
            echo '</b></div>';
        }
        ?>

        <?php 
            $attributs = array('method' =>'post' );
            echo form_open('admin/View_setup/update_language_settings',$attributs);
        ?>
            <div class="form-group">    
                <div class="row single_field">
                    <div class="col-sm-4"><label><?php echo display('latest_news')?></label></div>
                    <div class="col-sm-8">
                        <input type="text" name="l[latest_news]" class="form-control" value="<?php echo @$latest_news; ?>">
                    </div>
                </div>

                <div class="row single_field">
                    <div class="col-sm-4"><label><?php echo display('most_read')?></label></div>
                    <div class="col-sm-8">
                        <input type="text" name="l[most_read]" class="form-control" value="<?php echo @$most_read; ?>">
                    </div>
                </div>

                <div class="row single_field">
                    <div class="col-sm-4"><label><?php echo display('whole_country')?></label></div>
                    <div class="col-sm-8">
                        <input type="text" name="l[whole_country]" class="form-control" value="<?php echo @$whole_country; ?>">
                    </div>
                </div>

                <div class="row single_field">
                    <div class="col-sm-4"><label><?php echo display('headline')?></label></div>
                    <div class="col-sm-8">
                        <input type="text" name="l[headline]" class="form-control" value="<?php echo @$headline; ?>">
                    </div>
                </div>

                <div class="row single_field">
                    <div class="col-sm-4"><label><?php echo display('home')?></label></div>
                    <div class="col-sm-8">
                        <input type="text" name="l[home]" class="form-control" value="<?php echo @$home; ?>">
                    </div>
                </div>

                <div class="row single_field">
                    <div class="col-sm-4"><label><?php echo display('such_more_news')?></label></div>
                    <div class="col-sm-8">
                        <input type="text" name="l[such_more_news]" class="form-control" value="<?php echo @$such_more_news; ?>">
                    </div>
                </div>
                <div class="row single_field">
                    <div class="col-sm-4"><label><?php echo display('details')?></label></div>
                    <div class="col-sm-8">
                        <input type="text" name="l[details]" class="form-control" value="<?php echo @$details; ?>">
                    </div>
                </div>
                <div class="row single_field">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-8">
                        <input type="submit" name="updateLanguageSettings" value="<?php echo display('update')?>" class="btn btn-primary">
                    </div>
                </div> 
            </div>                      
      <?php echo form_close();?>
    </section>
</aside>