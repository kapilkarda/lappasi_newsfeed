<?php
    $user_id = $this->session->userdata('id');
    $user_type = $this->session->userdata('user_type');
    if (($user_type == 3) || ($user_type == 4)) {
        $this->load->view('admin/view_left_menu.php');
    } else if($user_type==2){
        $this->load->view('admin/user_left_menu_view.php');
    }else if($user_type==1){
        $this->load->view('admin/modaretor_left_menu_view.php');
    }
?>


<aside class="right-side">

    <section class="content">
        <h4><i class="fa fa-upload"></i> <?php echo display('upload_new_theme')?></h4>
        <hr/>
        <?php
        if ($this->session->userdata('message')) {
            ?>
            <div class="alert alert-success">
                <button class="close" data-dismiss="alert">&times;</button>
                <?php
                echo "<b>" . $this->session->userdata('message') . "</b>";
                $this->session->unset_userdata('message')
                ?>
            </div>
            <?php
        }
        ?>
        <?php
        if ($this->session->userdata('exception')) {
            ?>
            <div class="alert alert-danger">
                <button class="close" data-dismiss="alert">&times;</button>
                <?php
                echo "<b>" . $this->session->userdata('exception') . "</b>";
                echo $this->session->unset_userdata('exception');
                ?>
            </div>
            <?php
        }
        ?>


        <?php echo form_open_multipart('admin/Theme/upload_new_theme');?>
     
            <!--<div class="form-group">-->
            <div class="row">
                <div class="col-sm-3">
                    <label><?php echo display('theme_name')?></label>
                    <input type="text" name="theme_name" class="form-control" required="1"/>
                </div>
                <div class="col-sm-3">
                    <label><?php echo display('upload')?></label>
                    <input type="file" name="new_theme" required="1"/>
                </div>                    
                <div class="col-sm-3">
                    <input type="submit" value="<?php echo display('save')?>" name="upload_theme" class="btn btn-primary">
                </div>
            </div>
        </form>
        <hr/>


    <hr/>

        <!--preview-->
        <div class="row">
            <?php
            $result = $this->db->select('*')->from("settings")->where('id', 16)->get()->row();
            $theme = json_decode($result->details);
            if (isset($themes) && is_array($themes)) {
                foreach ($themes as $key => $value) {
                    ?>
                    <div class="col-sm-6 col-md-3">
                        <div class="thumbnail theme_img">
                            <img src="<?php echo base_url() . 'application/views/themes/' . $value . '/preview.png'; ?>"
                                 alt="<?php echo $value; ?>">
                        </div>
                        <div class="caption">
                            <h3><?php echo str_replace('-', ' ', $value); ?> Theme</h3>
                            <p>
                                <?php
                                if (@$theme->default_theme !== $value) {
                                    echo '<a href="' . base_url() . 'admin/Theme/active_theme/' . $value . '" class="btn btn-primary" role="button">'.display('active').'</a>';
                                }
                                ?>

                            </p>
                        </div>
                    </div>
                    <?php
                }

            }
            ?>  
             <div class="col-sm-6 col-md-3">
                    <div class="thumbnail theme_img">
                        <img src="<?php echo base_url() . 'application/views/preview.png'; ?>">
                    </div>
                    <div class="caption">
                        <h3> News365 Viral Theme</h3>
                    </div>
            </div>  

        </div>
    </section>
</aside>