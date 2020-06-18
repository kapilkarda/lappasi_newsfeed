<?php
if ($action == "photo") {
    $query = $this->db->query("SELECT actual_image_name,picture_name FROM photo_library where picture_name like '%$id%' order by id desc limit 0,50");
    foreach ($query->result_array() as $row) {
        ?>
        <img src="<?php echo base_url(); ?>uploads/thumb/<?php echo $row['actual_image_name']; ?>" height="100" width="100" onclick="sendValue('<?php echo $row['actual_image_name']; ?>')" title="<?php echo $row['picture_name']; ?>" />
        <?php
    }
}
if (count($query->result_array()) == 0)
    echo '<h2>&#9755; Sorry! Not Found any Photo by this "' . $id . '" word.</h2>';
?>


