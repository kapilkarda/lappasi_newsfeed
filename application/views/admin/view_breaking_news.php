<script>
    function js_value(str)
    {
        var text = $("#td_" + str).text();
        $("#id").val(str);
        $("#breaking_news").val(text);
        $(".legend").text('Update Breaking News');
        $("#MyForm").attr("action", 'breaking_edit')
        $(".button").attr("value", 'Update')
    }
</script>


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
        <fieldset><legend class="legend"><?php echo display('insert_breaking_news')?></legend>

        <?php 
            $attributes = array('class' => 'form-horizontal', 'method' => 'post', 'id' => 'MyForm', 'onsubmit' => 'return FormValidation()');
            echo form_open('admin/Common/breaking_save/', $attributes);
        ?>
                <label><?php echo display('breaking_news')?>:</label>
                <input type="hidden" name="id" id="id" value=""/>
                <textarea name="breaking_news" id="breaking_news" class="form-control" cols="50"></textarea> 
                <div class="voffset1"></div>
                <input type="submit" value="<?php echo display('save')?>" class="btn btn-primary" />
        <?php form_close();?>

        </fieldset>
        <div class="voffset1"></div>
        <?php
            $message = $this->session->flashdata('message'); 
            @extract($message);
        ?>

        <?php if (isset($msg)){ ?>
            <div class='message'><?php echo $msg ?></div>
        <?php } ?>
        <fieldset><legend><?php echo display('breaking_news_list')?></legend>   
        <?php 
            $attributes = array( 'method' => 'post', 'name' => 'f');
            echo form_open('admin/common/breaking_delete_selected', $attributes);
        ?>
            <form name="f" method="post" action="<?php echo base_url(); ?>admin/Common/breaking_delete_selected">
              
                <table class="table table-bordered">
                    <tr class="t_bg">
                        <th width="30"><?php echo display('sl')?></th>
                        <th width="20"><span id="buttons"><input type="checkbox" onclick="Select('true');" /></span></th>
                        <th><?php echo display('breaking_news')?></th>
                        <th width="90"><?php echo display('post_time')?></th>
                        <th colspan="3"><?php echo display('action')?></th>
                    </tr>

                    <?php
                    $sl = 1;

                    foreach ($query as $row) {
                        $json_decode = json_decode($row['title']);
                        $bgcolor = ($sl % 2 == 0) ? 'EEE' : 'CCC';
                        ?>
                        <tr>
                            <th><?php echo $sl; ?></th>
                            <th><input type="checkbox" name="news_id[]" value="<?php echo $row['id']; ?>" /></th>
                            <td id="td_<?php echo $row['id']; ?>" onclick="js_value(<?php echo $row['id']; ?>)"><?php echo $json_decode->news_title; ?></td>
                            <td align="center"><?php echo date("d M Y", $row['time_stamp']); ?></td>
                            <th width="50" onclick="js_value(<?php echo $row['id']; ?>)"><span style="cursor: pointer"><?php echo display('edit')?></span></th>
                            <th width="50"><a  href="<?php echo base_url(); ?>admin/Common/breaking_delete/<?php echo $row['id']; ?>"><i class="fa fa-2x fa-trash-o"></i></a></th>
                            <th width="30"><a title="Note: Click On for Slider start, Off for slider stop." href="<?php echo base_url(); ?>admin/Common/breaking_status_edit/<?php echo $row['id'] . '/' . $row['status']; ?>"><?php echo ($row['status'] == 0) ? "On" : "Off";
                    ;
                        ?></a></th>
                        </tr>
                        <?php
                        $sl++;
                    }
                    ?>
                </table>
            </form>

        </fieldset>
    </section>
    
     <div class="text-center">
        <?php echo $links; ?> 
    </div>
</aside>



