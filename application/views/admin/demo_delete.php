<?php
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
                        <div class="alert alert-success fade in">
                            <span class="close" data-dismiss="alert">×</span>
                            <b><?php echo $this->session->flashdata('message'); ?></b>
                        </div>
                    </div>
                <?php
                    }
                ?>


            <div class="row">
                <div class="col-md-12">
                    <table id="table" class="table table-bordered">
                        <tr class="t_bg">
                            <th>ITEM</th>
                            <th><?php echo display('action')?></th>
                        </tr>
                        <tr>
                            <td>Delete The Demo News</td>
                            <td><a onclick="delete_cnf('<?php echo base_url()?>admin/Demo/delet_demo')"  href="#" class="btn btn-primary"> Delete </a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>
    </aside>
</div>

