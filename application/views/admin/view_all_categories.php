<script type="text/javascript">
    $(document).ready(function () {
        $("[rel=tooltip]").tooltip({placement: 'right'});
    });
</script>


<?php
$user_id = $this->session->userdata('id');

$user_type = $this->session->userdata('user_type');
if (($user_type == 3) || ($user_type == 4)) {
    include("view_left_menu.php");
} else if($user_type==2){
    include("user_left_menu_view.php");
}else if($user_type==1){
    include("modaretor_left_menu_view.php");
}
?>

<aside class="right-side">
    <section class="content col-sm-12">
        <div class="page_heading"><i class="glyphicon glyphicon-list"></i>&nbsp; All Categories</div>
        <?php
        if ($this->session->flashdata('message')) {
            echo '<div class="alert alert-success"><button class="close" data-dismiss="alert">&times;</button><b>';
            echo $this->session->flashdata('message');
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
    $at = array('method' =>'post');
    echo form_open('admin/Category/save_category_positions',$at);
?>
        <input type="submit" value="Update" class="btn btn-primary btn-lg pull-right" style="margin-bottom: 5px;"><br/>
            <table class="table table-bordered">
                <tr>
                    <th>#</th>
                    <th><?php echo display('category_name')?></th>
                    <th><?php echo display('slug')?></th>
                    <th><?php echo display('category_image')?></th>
                    <th><?php echo display('in_menu')?></th>
                    <th><?php echo display('position')?></th>
                    <th><?php echo display('action')?></th>
                </tr>
            <?php
                $i = 0;
                if (isset($all_categories) && is_array($all_categories)) {
                    foreach ($all_categories as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo ++$i; ?>.</td>
                            <td style="width: 35%;"><?php echo $value->category_name; ?></td>
                            <td style="width: 30%;"><?php echo $value->slug; ?></td>
                            <td style="width: 35%;"> 
                                <?php
                                if($value->category_imgae!=NULL){
                                        echo '<img width="100" src="'.base_url(). @$value->category_imgae.'">';
                                    if ($value->img_status == 1) {
                                        echo '<a style="cursor:default; margin-left:4px" onclick="imgStatus('.$value->category_id.')"><i class="glyphicon glyphicon-check" rel="tooltip" title="Will be show in category page" id="blah"></i></a>';
                                    } else {
                                        echo '<a style="cursor:default;  margin-left:4px" onclick="imgStatus('.$value->category_id.')"><i class="glyphicon glyphicon-remove" rel="tooltip" title="Will not be show in category page" id="blah"></i></a>';
                                    }
                                }
                                ?>
                            </td>

                            <td>
                                <?php
                                if ($value->menu == 1) {
                                    echo '<i class="glyphicon glyphicon-check" rel="tooltip" title="Will be in Menu" id="blah"></i>';
                                } else {
                                    echo '<i class="glyphicon glyphicon-remove" rel="tooltip" title="Will not be in Menu" id="blah"></i>';
                                }
                                ?>
                            </td>
                            <td><input type="number" min="0" value="<?php echo $value->position; ?>" class="form-control" style="width: 100%;" name="position[<?php echo $value->category_id; ?>]"></td>
                            <td>
                                <a href="<?php echo base_url(); ?>admin/Category/update_view/<?php echo $value->category_id; ?>"><i class="glyphicon glyphicon-edit" rel="tooltip" title="Edit Category" id="blah"></i></a>&nbsp;
                                <a href="<?php echo base_url(); ?>admin/Category/delete/<?php echo $value->category_id; ?>" onclick="return confirm('Are you want to delelte?');"><i class="glyphicon glyphicon-trash" rel="tooltip" title="Delete Category" id="blah"></i></a>
                            </td>
                        </tr>            
                        <?php
                    }
                } else {
                    echo '<tr>
                            <td colspan="5">
                            <div class="alert alert-danger">No Category found. <a href="' . base_url() . 'admin/Category/add_category">Add Category</a>
                             </div>
                            </td>
                    </tr>';
                }
                ?>

            </table> 
    <?php echo form_close();?>
    </section>
</aside>
<script type="text/javascript">
    function imgStatus(category_id){
        
        $.ajax({
                url: "<?php echo base_url(); ?>admin/Category/save_category_img_status/" + category_id,
                context: document.body
            }).done(function (data) {
            location.reload();
        });
    }
</script>