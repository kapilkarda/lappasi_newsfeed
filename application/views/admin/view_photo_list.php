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
            $atts = array(
                'width' => '300',
                'height' => '150',
                'scrollbars' => 'yes',
                'status' => 'yes',
                'resizable' => 'yes',
                'screenx' => '500',
                'screeny' => '100'
            );
        ?>    
    <div class="row">                                    
        <?php
        @$attt = array('method' => 'get' );
         echo form_open('admin/Photo_list',$attt);?>
          <div class="form-group">
                    <div class="col-sm-2">
                        <label><?php echo display('photo_name')?></label>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" name="search" id="search" value="" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2">
                        <label></label>
                        <input type="submit" value="<?php echo display('search')?>" class="btn btn-primary"/>
                    </div>
                </div>
            <?php echo form_close();?>
        </div>
        <div class="voffset2"></div>

        <table border="1" rules="all" width="99%" class="table">
            <tr class="t_bg">
                <th width="30">Sl</th>
                <th width="20"><span id="buttons"><input type="checkbox" onclick="Select('true');" /></span></th>
                <th width="45"><?php echo display('photo')?></th>
                <th><?php echo display('photo_name')?></th>
                <th width="250"><?php echo display('picture_url')?></th>
                <?php if ($user_type == 3) { ?> <th colspan="3"><?php echo display('action')?></th><?php } ?>
            </tr>

            <?php
            $sl = 1;
            
            foreach ($query as $row) {
                $bgcolor = ($sl % 2 == 0) ? 'EEE' : 'CCC';
                ?>
                <tr>
                    <th><?php echo $sl; ?></th>
                    <th><input type="checkbox" name="news_id[]" value="<?php echo $row['id']; ?>" /></th>
                    <td><img src="<?php echo site_url() . 'uploads/thumb/' . $row['actual_image_name']; ?>" width="42" height="30" /></td>
                    <td><?php echo $row['picture_name']; ?></td>
                    <td><input type="text" style="width:95%" value="<?php echo site_url() . 'uploads/' . $row['actual_image_name']; ?>" onClick="this.setSelectionRange(0, this.value.length)" /></td>

                    <?php if ($user_type == 3) { ?>
                        <th width="50"><?php echo anchor_popup('admin/Photo_upload/MyWindow/' . $row['id'], '<i class="fa fa-edit fa-2x"></li>', $atts); ?></th>
                        <th width="50"><a onclick="delete_cnf('<?php echo base_url(); ?>admin/Photo_upload/delete/<?php echo $row['id']; ?>')" href="#"><i class="fa fa-trash-o fa-2x"></li></a></th>
                        <th width="50"><a title="Note: Click On for Slider start, Off for slider stop." href="<?php echo base_url(); ?>admin/Photo_upload/status_edit/<?php echo $row['id'] . '/' . $row['status']; ?>"><?php
                                echo ($row['status'] == 1) ? "On" : "Off";
                                ;
                                ?></a></th>
                    <?php } ?>
                </tr>
                <?php
                $sl++;
            }
            ?>
        </table>    
        <?php echo $links; ?>
    </section>

</aside>   
</div>
</div>