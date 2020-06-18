
<?php
$user_type = $this->session->userdata('user_type');
if (($user_type == 3) || ($user_type == 4)) {
    include("view_left_menu.php");
} else if($user_type==2){
    include("user_left_menu_view.php");
}else if($user_type==1){
    include("modaretor_left_menu_view.php");
}
$s_c = $selected_category;
?>

<aside class="right-side">
    <section class="content col-sm-11">
        <div class="page_heading"><i class="glyphicon glyphicon-bookmark"></i>&nbsp; <?php echo display('positioning_settings')?> </div>
        <div class="text-center">

        <?php 
            $attributes = array('method'=>'post','class'=>'form-inline');
            echo form_open('admin/Positioning/', $attributes);
        ?>
           <div class="form-group">
                    <select name="category" class="form-control" required="1">
                        <option value="">Select Category</option>   
                        <option <?php echo $selected_category == 'home' ? 'selected' : ''; ?>><?php echo display('home')?></option>
                        <?php
                        if (isset($categories) && is_array($categories)) {
                            foreach ($categories as $key => $value) {
                                echo '<option value="' . $value->slug . '" ' . ($selected_category == $value->slug ? 'selected' : '') . '>' . $value->category_name . '</option>';
                            }
                            unset($selected_category);
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" value="<?php echo display('search')?>" class="btn btn-primary" name="search">
                </div>
           <?php echo form_close();?>
        </div>
        <hr/>


        <?php 
            $attributes = array('method'=>'post');
            echo form_open('admin/Positioning/update_positioning', $attributes);
        ?>
         <div class="row">
            <?php
                if ($this->session->flashdata('message')) {
                    echo '<div class="alert alert-success"><button class="close" data-dismiss="alert">&times;</button><b>';
                    echo $this->session->flashdata('message');
                    echo '</b></div>';
                }
                if ($this->session->flashdata('exception')) {
                    echo '<div class="alert alert-danger"><button class="close" data-dismiss="alert">&times;</button><b>';
                    echo $this->session->flashdata('exception');
                    echo '</b></div>';
                }
                ?>
                <div class="pull-right">
                    <input type="hidden" value="<?php echo $s_c; ?>" name="category">
                    <input type="submit" value="<?php echo display('update')?>" class="btn btn-primary btn-lg">
                </div>
            </div>
            <br/>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th><?php echo display('title')?></th>
                        <th width="3%"><?php echo display('position')?></th>
                        <th width="2%"><?php echo display('action')?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php                                                                           
                    if (isset($newses) && is_array($newses)) {
                        foreach ($newses as $key => $value) {
                            ?>
                            <tr>
                                <td><?php echo $value->title; ?></td>
                                <td><input type="text"  name="position[<?php echo $value->id; ?>]" value="<?php echo $value->p_position; ?>" class="form-control"></td>
                                <td><a href="<?php echo base_url(); ?>admin/Positioning/delete_positionbyid/<?php echo $value->id; ?>" onclick="return confirm('Are you want to delete?');"><i class="glyphicon glyphicon-trash"></i></a></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>

                </tbody>
            </table>
        </form>
    </section>
</aside>		
</div>
</div>



