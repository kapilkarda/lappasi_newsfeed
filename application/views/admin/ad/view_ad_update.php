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
        <h3><?php echo display('ad_list')?></h3>
        <hr/>
        <div class="row-fluid">
         <?php 
            if ($this->session->flashdata('message')!=NULL) {
                    echo $this->session->flashdata('message');
            }
        ?>
            <div class="col-sm-8 col-sm-offset-1">
                <?php
                if (isset($ads) && is_array($ads)) {
                ?>
                    <table class="table table-bordered">
                        <tr>
                            <th><?php echo display('sl');?></th>
                            <th><?php echo display('ad_position')?></th>
                            <th><?php echo display('embed_code')?></th>
                            <th><?php echo display('desktop_tablet');?></th>
                            <th><?php echo display('mobile');?></th>
                            <th><?php echo display('action')?></th>
                        </tr>
                        <?php
                        $i = 0;
                        foreach ($ads as $key => $value) {

                            echo '<tr>';
                            echo '<td>' . ++$i . '</td>';
                            echo '<td>';
                            echo "<script type='text/javascript'>
                                    view_ad_position_name(" . $value->ad_position . ")                                                  
                                    </script>";
                            echo '</td>';
                            echo '<td>' . $value->embed_code . '</td>';
                            echo "<td><a class='btn btn-".($value->large_status==0?'danger':'primary')."' href=" . base_url() . "admin/Ad/update_lg_status/" . $value->id . "/".$value->large_status.">".($value->large_status==0?'OFF':'ON')."</a></td>";
                            echo "<td><a class='btn btn-".($value->mobile_status==0?'danger':'primary')."' href=" . base_url() . "admin/Ad/update_sm_status/" . $value->id . "/".$value->mobile_status.">".($value->mobile_status==0?'OFF':'ON')."</a></td>";
                            
                            echo "<td>
                                        <a href='" . base_url() . "admin/Ad/edit_view/" . $value->id . "'><i class='glyphicon glyphicon-edit'></i></a>&nbsp;
                                        <a href='" . base_url() . "admin/Ad/delete/" . $value->id . "' onclick='return delete_confirm()'><i class='glyphicon glyphicon-trash'></i></a>
                                  </td>";
                            echo '</tr>';
                        }
                        ?>
                    </table>
                    <?php
                        } else {
                            echo "<div class='alert alert-danger'>
                                <button class='close' data-dismiss='alert'>&times;</button>
                                There have no available ads
                                </div>";
                        }
                    ?>
            </div>
        </div>
    </section>
</aside>
</div>
</div>