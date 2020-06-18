

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
    <section class="content">
    <?php

            if($this->session->flashdata('message')){
        ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success fade in">
                        <span class="close" data-dismiss="alert">×</span>
                        <b><?php echo $this->session->flashdata('message'); ?></b>
                    </div>
                </div>    
            </div>

        <?php
            }
        ?>
        <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <tr class="t_bg">
                    <th align="center">Sl</th>
                    <th align="center"><?php echo display('title')?></th>
                    <th align="center"><?php echo display('create_by')?></th>
                    <th align="center"><?php echo display('date')?></th>
                    <th align="center"><?php echo display('status')?></th>
                    <th colspan="2"><?php echo display('action')?></th>
                </tr>


                <?php
                    $sl = 1;
                    foreach ($page_info as $value) {
                    $bgcolor = ($sl % 2 == 0) ? 'EEE' : 'CCC';                    
                ?>
                    <tr  id="tr_<?php echo $sl; ?>" onclick="change_color('<?php echo $sl; ?>', '#<?php echo $bgcolor; ?>');">
                        <th align="center"><?php echo $sl; ?></th>
                        <th align="center"><?php echo $value->title;?></th>
                        <td align="center"><?php echo $value->name;?></td>
                        <td align="center"><?php echo $value->publish_date;?></td>
                
                        <td align="center">
                            <?php
                            if ($value->status == 0) {
                            ?>
                                <a class="label label-warning" title="Publish" href="<?php echo base_url(); ?>admin/Page/publishd/<?php echo $value->page_id; ?>"><?php echo display('publish')?></a>

                            <?php
                            } else {
                            ?>
                                <a class="label label-success" title="Publishd" href="<?php echo base_url(); ?>admin/Page/unpublishd/<?php echo $value->page_id; ?>"><?php echo display('unpublish')?></a>
                            <?php
                            }
                            ?>
                        </td>
                        <th width="40"><a href="<?php echo base_url(); ?>admin/Page/Edit_page/<?php echo $value->page_id; ?>"><i class="fa fa-edit fa-2x"></i></a></th>
                        <th width="50"><a onclick="delete_cnf('<?php echo base_url(); ?>admin/Page/Delete_page/<?php echo $value->page_id; ?>')" href="#"><i class="fa fa-trash-o fa-2x"></i></a></th>
                    </tr>
                    <?php
                    $sl++;
                }
                ?>
            </table>
            </div>
        </div>
    </section>
</aside>
<div class="pb_right_contain">
</div>
</div>