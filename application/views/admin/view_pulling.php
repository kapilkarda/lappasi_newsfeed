<script>
    function js_value(str)
    {
        var text = $("#td_" + str).text();
        $("#id").val(str);
        $("#pulling").val(text);
        $(".legend").text('Update Question');
        $("#MyForm").attr("action", 'pulling/edit')
        $(".button").attr("value", 'Update')
    }
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
    <section class="content">
        <?php
        $message = $this->session->flashdata('message');
        ?>
        <?php if (isset($message)){ 
        echo '<div class="alert alert-success"><button class="close" data-dismiss="alert">&times;</button>' . $message . '</div>';
        } ?>  

        <fieldset><legend class="legend"><?php echo display('entry_question')?></legend>
        <?php 
        $attribute = array('method' =>'post','id'=>'MyForm', 'class'=>'form-inline' );
        echo form_open('admin/Pulling/save',$attribute);
        ?>
            
                <table>
                    <tr>
                        <th><?php echo display('question')?>:</th>
                        <td>
                            <input type="hidden" name="id" id="id" value=""/>
                            <textarea name="pulling" id="pulling" class="form-control" cols="45"></textarea>
                        </td>
                        <td><input style="margin-left: 20px;" type="submit" value="<?php echo display('save')?>" class="btn btn-success" /></td>
                    </tr>
                </table>
          <?php echo form_close();?>
        </fieldset>

        <fieldset><legend><?php echo display('question_list')?></legend>   
            <table class="table table-bordered table-hover">
                <tr class="t_bg">
                    <th width="30">Sl</th>
                    <th width="20"><span id="buttons"><input type="checkbox" onclick="Select('true');" /></span></th>
                    <th><?php echo display('question_list')?></th>
                    <th width="35"><?php echo display('yes')?></th>
                    <th width="35"><?php echo display('no')?></th>
                    <th width="35"><?php echo display('nc')?></th>
                    <th width="90"><?php echo display('post_time')?></th>
                    <th colspan="3"><?php echo display('action')?></th>
                </tr>

                <?php
                    $sl = 1;
                    foreach ($query as $row) {
                    $bgcolor = ($sl % 2 == 0) ? 'EEE' : 'CCC';
                ?>
                    <tr  id="tr_<?php echo $sl; ?>" onclick="change_color('<?php echo $sl; ?>', '#<?php echo $bgcolor; ?>');">
                        <th><?php echo $sl; ?></th>
                        <th><input type="checkbox" name="news_id[]" value="<?php echo $row['id']; ?>" /></th>
                        <td id="td_<?php echo $row['id']; ?>" onclick="js_value(<?php echo $row['id']; ?>)"><?php echo $row['question']; ?></td>
                        <td align="center" bgcolor="#00CC66"><?php echo $row['yes']; ?></td>
                        <td align="center" bgcolor="#3399FF"><?php echo $row['no']; ?></td>
                        <td align="center" bgcolor="#FF0055"><?php echo $row['on_comment']; ?></td>
                        <td align="center"><?php echo date("d M Y", $row['time_stamp']); ?></td>
                        <th width="50" onclick="js_value(<?php echo $row['id']; ?>)">Edit</th>
                        <th width="50"><a onclick="delete_cnf('<?php echo base_url(); ?>admin/Pulling/delete/<?php echo $row['id']; ?>');" href="#"><i class="fa fa-trash-o fa-2x"></i></a></th>
                        <th width="30"><a title="Note: Click On for Slider start, Off for slider stop." href="<?php echo base_url(); ?>admin/Pulling/status_edit/<?php echo $row['id'] . '/' . $row['status']; ?>"><?php
                                echo ($row['status'] == 1) ? "Off" : "On";
                                ;
                                ?></a></th>
                    </tr>
                    <?php
                    $sl++;
                }
                ?>
            </table>
        </fieldset>   
    </section>
</aside>



