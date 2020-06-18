<?php
$user_id = $this->session->userdata('id');
$this->load->view('admin/view_left_menu');
?>
<aside class="right-side">
    <section class="content col-sm-12">
        <div class="col-sm-8">
            <?php
            $settings = json_decode('[' . $previous_settings . ']');
            ?>
            <div class="page_heading"><i class="glyphicon glyphicon-cog"></i>&nbsp; <?php echo display('social_site_settings')?> </div>
            <?php
            if ($this->session->flashdata('message')) {
                echo '<div class="alert alert-success"><button class="close" data-dismiss="alert">&times;</button><b>';
                echo $this->session->flashdata('message');
                echo '</b></div>';
            }
            $attributs = array('method' =>'post' );
            echo form_open('admin/Seo/update_social_site_settings',$attributs);
            ?>
                <!--facebook-->
                <div class="row">
                    <div class="form-group">
                        <div class="col-sm-4"><label><?php echo display('facebook_url')?></label></div>
                        <div class="col-sm-8">
                            <textarea name="fb[URL]" class="form-control" rows="6">
                                <?php if (isset($settings[0]->fb->URL)) echo @$settings[0]->fb->URL; ?>
                            </textarea>
                        </div>                                        
                    </div>   
                </div>   
                <br/>
                <div class="row">
                    <div class="form-group">
                        <div class="col-sm-4"><label><?php echo display('show_on')?></label></div>
                        <div class="col-sm-8">
                            <input type="checkbox" name="fb[h_p]" value="1" <?php if (@$settings[0]->fb->h_p == 1) echo 'checked'; ?>>&nbsp;<?php echo display('home')?> &nbsp;
                            <input type="checkbox" name="fb[c_p]" value="1" <?php if (@$settings[0]->fb->c_p == 1) echo 'checked'; ?>>&nbsp;<?php echo display('category')?> &nbsp;
                            <input type="checkbox" name="fb[d_p]" value="1" <?php if (@$settings[0]->fb->d_p == 1) echo 'checked'; ?>>&nbsp;<?php echo display('details')?> 
                        </div>                                        
                    </div>   
                </div>   
                <hr/>
                <br/>

                <!--twitter-->
                <div class="row">
                    <div class="form-group">
                        <div class="col-sm-4"><label><?php echo display('twitter_url')?></label></div>
                        <div class="col-sm-8">
                            <textarea name="tw[URL]" class="form-control" rows="6">
                                <?php if (isset($settings[0]->tw->URL)) echo @$settings[0]->tw->URL; ?>
                            </textarea>
                        </div>                                        
                    </div>   
                </div>   
                <br/>
                <div class="row">
                    <div class="form-group">
                        <div class="col-sm-4"><label><?php echo display('show_on')?></label></div>
                        <div class="col-sm-8">
                            <input type="checkbox" name="tw[h_p]" value="1" <?php if (@$settings[0]->tw->h_p == 1) echo 'checked'; ?>>&nbsp;<?php echo display('home')?> &nbsp;
                            <input type="checkbox" name="tw[c_p]" value="1" <?php if (@$settings[0]->tw->c_p == 1) echo 'checked'; ?>>&nbsp;<?php echo display('category')?> &nbsp;
                            <input type="checkbox" name="tw[d_p]" value="1" <?php if (@$settings[0]->tw->d_p == 1) echo 'checked'; ?>>&nbsp;<?php echo display('details')?>e 
                        </div>                                        
                    </div>   
                </div>   
                <hr/>
                <br/>

                <!--facebook-->
                <div class="row">
                    <div class="form-group">
                        <div class="col-sm-4"><label><?php echo display('google_plus')?></label></div>
                        <div class="col-sm-8">
                            <textarea name="gplus[URL]" class="form-control" rows="6">
                                <?php if (isset($settings[0]->gplus->URL)) echo @$settings[0]->gplus->URL; ?>
                            </textarea>
                        </div>                                        
                    </div>   
                </div>   
                <br/>
                <div class="row">
                    <div class="form-group">
                        <div class="col-sm-4"><label><?php echo display('show_on')?></label></div>
                        <div class="col-sm-8">
                            <input type="checkbox" name="gplus[h_p]" value="1" <?php if (@$settings[0]->gplus->h_p == 1) echo 'checked'; ?>>&nbsp;<?php echo display('home')?> &nbsp;
                            <input type="checkbox" name="gplus[c_p]" value="1" <?php if (@$settings[0]->gplus->c_p == 1) echo 'checked'; ?>>&nbsp;<?php echo display('category')?> &nbsp;
                            <input type="checkbox" name="gplus[d_p]" value="1" <?php if (@$settings[0]->gplus->d_p == 1) echo 'checked'; ?>>&nbsp;<?php echo display('details')?> 
                        </div>                                        
                    </div>   
                </div>   
                <hr/>
                <br/>

                <!--Linkedin-->
                <div class="row">
                    <div class="form-group">
                        <div class="col-sm-4"><label><?php echo display('linkedin')?></label></div>
                        <div class="col-sm-8">
                            <textarea name="ln[URL]" class="form-control" rows="6">
                                <?php if (isset($settings[0]->ln->URL)) echo @$settings[0]->ln->URL; ?>
                            </textarea>
                        </div>                                        
                    </div>   
                </div>   
                <br/>
                <div class="row">
                    <div class="form-group">
                        <div class="col-sm-4"><label><?php echo display('show_on')?></label></div>
                        <div class="col-sm-8">
                            <input type="checkbox" name="ln[h_p]" value="1" <?php if (@$settings[0]->ln->h_p == 1) echo 'checked'; ?>>&nbsp;<?php echo display('home')?> &nbsp;
                            <input type="checkbox" name="ln[c_p]" value="1" <?php if (@$settings[0]->ln->c_p == 1) echo 'checked'; ?>>&nbsp;<?php echo display('category')?>&nbsp;
                            <input type="checkbox" name="ln[d_p]" value="1" <?php if (@$settings[0]->ln->d_p == 1) echo 'checked'; ?>>&nbsp;<?php echo display('details')?> 
                        </div>                                        
                    </div>   
                </div>   
                <hr/>
                <br/>
                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label></label>
                            <input type="submit" name="save" value="<?php echo display('update')?>" class="btn btn-primary">
                        </div>
                    </div>
                </div>

            <?php echo form_close();?>
        </div>
    </section>
</aside>