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
    <section class="content col-sm-11">    
        <div class="page_heading"><i class="glyphicon glyphicon-log-in"></i>&nbsp;<?php echo display('last_20_access')?>
        <a href="<?php echo base_url(); ?>admin/Users/clearLog" class="pull-right btn btn-primary" onclick="return confirm('After clear log, you will be logout.')"><?php echo display('clear_log')?></a></div>
        <?php
        if ($this->session->flashdata('message')) {
            echo '<div class="alert alert-success"><button class="close" data-dismiss="alert">&times;</button><b>';
            echo $this->session->flashdata('message');
            echo '</b></div>';
        }
        ?>
        <table class="table table-bordered">
            <tr>
                <th><?php echo display('ip_address')?></th>
                <th><?php echo display('user_agent')?></th>
                <th><?php echo display('last_activity')?></th>
            </tr>
            <?php
                if (@$last_access != FALSE) {
                    foreach (@$last_access as $key => $value) {
                        ?>
                        <tr>
                            <th><?php echo $value->ip_address; ?></th>
                            <th><?php echo $value->data; ?></th>
                            <th><?php echo $value->timestamp; ?></th>
                        </tr>                   
                    <?php
                    }
                }
            ?>
        </table>
    </section>
</aside>