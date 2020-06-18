<?php
$this->load->view('admin/view_left_menu.php');
?>
<aside class="right-side">    
    <section class="content col-sm-12">    
        <div class="page_heading"><i class="glyphicon glyphicon-cog"></i>&nbsp; <?php echo display('home_page_view_setup')?> </div>
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


        <?php 
            $attributs = array('method' =>'post','class'=>'form-inline' );
            echo form_open('admin/View_setup/save_home_page_settings',$attributs);
        ?>
       
            <div class="row-fluid">
                <div class="col-sm-2">
                    <input type="number" name="position_no" class="form-control" required="1" style="width: 100%;" placeholder="<?php echo display('position_id')?>" tabindex="0">
                </div>
                <div class="col-sm-4">
                    <select name="category_name" class="form-control" required="1" style="width: 100%;" tabindex="1">
                        <option value=""><?php echo display('category_name')?></option>
                        <?php
                        if (isset($categories) && is_array(@$categories)) {
                            foreach (@$categories as $key => $value) {
                                echo '<option value="' . $value->category_id . '">' . $value->category_name . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="col-sm-3"><input type="number" name="max_news" placeholder="<?php echo display('max_news')?>" min="0" max="12" class="form-control col-sm-3" required="1" tabindex="2"></div>
                <div class="col-sm-3"><input type="submit" name="save" value="<?php echo display('add_position')?>" class="btn btn-primary" tabindex="3"></div>
            </div>

        <?php echo form_close();?>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-sm-10">
        <?php
            if (@$home_page_settings != false) {
        ?>
        <?php 
            $attributs = array('method' =>'post' );
            echo form_open('admin/View_setup/update_home_page_settings',$attributs);
        ?>

                        <input type="submit" value="<?php echo display('update')?>" class="btn btn-primary btn-lg pull-right" style="margin-bottom: 5px;"><br/>
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th><?php echo display('position_id')?></th>
                                <th><?php echo display('category_name')?></th>
                                <th><?php echo display('max_news')?></th>
                                <th><?php echo display('status')?></th>
                            </tr>
                            <?php
                            foreach (@$home_page_settings as $key1 => $value1) {
                                ?>
                                <tr>
                                    <td><input type="hidden" value="<?php echo $key1; ?>" name="position_no[]"><?php echo $key1; ?></td>
                                    <td style="width: 50%;">
                                        <select name="category_id[<?php echo $key1; ?>]" class="form-control" required="1" style="width: 100%;">
                                            <option value=""><?php echo display('category_name')?></option>
                                            <?php
                                            if (isset($categories) && is_array(@$categories)) {
                                                foreach (@$categories as $key => $value) {
                                                    if ($value->category_id === $value1->category_id) {
                                                        $selected = 'selected';
                                                    }
                                                    echo '<option ' . $selected . ' value="' . $value->category_id . '">' . $value->category_name . '</option>';
                                                    unset($selected);
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" name="max_news[<?php echo $key1; ?>]" placeholder="Max News" min="0" max="12" class="form-control " style="width: 50%;" required="1" value="<?php echo $value1->max_news; ?>">
                                    </td>
                                    <td>
                                        <?php
                                        if ($value1->status == 1) {
                                            $checked = 'checked';
                                        } else {
                                            $checked = '';
                                        }
                                        echo '<input type="checkbox" name="status[' . $key1 . ']" ' . $checked . ' value="1">';
                                        ?>
                                    </td>

                                </tr>
                                <?php
                            }
                            ?>

                        </table>
                   <?php echo form_close();?>
                    <?php
                } else {
                    echo '<div class="alert alert-danger"><button class="close" data-dismiss="alert">&times;</button> Settings not found. </div>';
                }
                ?>
            </div>
        </div>
    </section>
</aside>