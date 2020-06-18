
<script type="text/javascript">

    var controller = 'ajax_data';
    var base_url = '<?php echo site_url(); ?>';

    function load_data_ajax(type) {
        $("#container").html('<img src="' + base_url + 'icon/animation_processing.gif" style=" border:none;" />');
        $.ajax({
            'url': base_url + '/admin/' + controller + '/index',
            'type': 'POST', //the way you want to send data to your URL
            'data': {'type': type},
            'success': function (data) {
                $("#container").html(data);
            }
        });
    }


</script>

<fieldset >
    <label>


        <form action="javascript:load_data_ajax(document.getElementById('image_name').value)">
            <input type="text" name="image_name" id="image_name" placeholder="Enter Image Name">
            <input type="button" value="Search" onclick="load_data_ajax(document.getElementById('image_name').value)" />
        </form>
    </label>
</fieldset>
<script type="text/javascript"> document.getElementById('image_name').focus();</script>

<div id="container">
    <?php
    $query = $this->db->query("SELECT actual_image_name,picture_name FROM photo_library where picture_name like '%%' order by id desc limit 0,32");
    foreach ($query->result_array() as $row) {
        ?>
        <img src="<?php echo site_url(); ?>uploads/thumb/<?php echo $row['actual_image_name']; ?>" height="100" width="100" onclick="sendValue('<?php echo $row['actual_image_name']; ?>')" title="<?php echo $row['picture_name']; ?>" />
        <?php
    }
    ?>
</div>

