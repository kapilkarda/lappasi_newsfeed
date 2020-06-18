<style type="text/css">
    img{border:1px solid #f00; float:left; margin:3px; cursor:pointer; border-radius:5px;}
</style>



<fieldset style="background:#6782B1;">
    <label>
        <?php echo form_open('admin/Ajax_data/index',array('name' =>'fname', 'id'=>'SeForm' ));?>
            <input type="text" name="image_name" id="image_name" placeholder="Enter Image Name">
            <button type="submit" class="btn btn-com active">Search</button>
        <?php echo form_close();?>
    </label>
</fieldset>


<script type="text/javascript"> document.getElementById('image_name').focus();</script>

<div id="container" style="min-height:530px; background:#FFF;">
    <?php
    $query = $this->db->query("SELECT actual_image_name,picture_name FROM photo_library where picture_name like '%%' order by id desc limit 0,100");

    foreach ($query->result_array() as $row) {
        ?>
        <img src="<?php echo site_url(); ?>uploads/thumb/<?php echo $row['actual_image_name']; ?>" height="100" width="100" onclick="sendValue('<?php echo $row['actual_image_name']; ?>')" title="<?php echo $row['picture_name']; ?>" />
        <?php
    }
    ?>
</div>


<script type="text/javascript">

    //Comment form submit by ajax start
    $("#SeForm").submit(function(event){ 

        event.preventDefault(); 
        var formdata = new FormData($(this)[0]);
        $.ajax({
            url: $(this).attr("action"),
            type: $(this).attr("method"),
            data: formdata, 
            processData: false,
            contentType: false,
           'success': function (data) {
                $("#container").html(data);
            },
            error: function (xhr, desc, err){
                 alert('failed');
            }
        });        
    });
    //Comment form submit by ajax end

</script>

