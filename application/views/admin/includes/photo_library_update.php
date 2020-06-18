<?php
$categorys = array(
    "0" => 'General',
    "1" => 'Political',
    "2" => 'Man',
    "3" => 'Women',
    "4" => 'Exceptional',
    "5" => 'Natural'
);
$category = (isset($category)) ? $category : '0';
?>
<form action="<?php echo base_url(); ?>admin/photo_upload/edit" method="post">
    <table>
        <tr>
            <td>Picture Name:<input type="hidden" name="id" value="<?php echo $id; ?>" /></td>
            <td> <input type="text" name="picture_name" value="<?php echo $picture_name; ?>" autocomplete="off" /></td>
        </tr>

        <tr>
            <td>Title:</td>
            <td><input type="text" name="title" value="<?php echo $title; ?>" /></td>
        </tr>

        <tr>
            <td>Category:</td>
            <td><?php echo form_dropdown('category', $categorys, $category, 'class="other_page"'); ?></td>
        </tr>

        <tr>
            <td colspan="2" align="right"><input type="submit" class="button" value="Update" /></td>
        </tr>

    </table>
</form>
