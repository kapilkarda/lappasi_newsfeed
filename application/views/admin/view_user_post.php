<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery-ui.css">
<script src="<?php echo base_url(); ?>js/jquery-ui.js"></script>    
<script src="<?php echo base_url(); ?>TextEditor/ckeditor.js" type="text/javascript"></script>

<script>
    var editor;
    CKEDITOR.on('instanceReady', function (ev) {
        editor = ev.editor;
    });

    function toggleReadOnly(isReadOnly) {
        editor.setReadOnly(isReadOnly);
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
    <?php
    @extract($news_details);
    ?>                
    <!-- Main content -->
    <section class="content">
        <?php
        include('common_file/array_file.php');
        $home_page = (isset($home_page)) ? $home_page : 0;
        $other_position = (isset($other_position)) ? $other_position : 1;
        $other_page = (isset($other_page)) ? $other_page : '0';
        $reference = (isset($reference)) ? $reference : '0';
        $attributes = array('class' => 'myform', 'id' => 'myform', 'onsubmit' => 'return FormValidation()');
        echo form_open_multipart('admin/news_post/post/' . $news_id, $attributes);

        if (isset($image) && $image != '') {
            echo '<input type="hidden" value="' . $image . '" name="selected_image">';
        }
        echo '<input type="hidden" name="post_by" value="' . $post_by . '">';
        ?>
        <div class="row">
            <div class="col-lg-4 col-xs-6 form-inline">
                <fieldset><legend><h4>Post Position</h4></legend>
                    <table>
                        <tr>
                            <td><?php echo display('home');?></td>
                            <td><?php echo form_dropdown('home_page', $home_position, $home_page, 'class="form-control"'); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo display('page');?></td>
                            <td><?php echo form_dropdown('other_page', $other_pages, $page, 'class="other_page form-control"'); ?>
                               <?php echo display('position');?>
                                <?php echo form_dropdown('other_position', $other_positions, $page_position, 'class="other_position form-control"'); ?>
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </div>
            <div class="col-lg-4 col-xs-6">
                <fieldset><legend><h4>Photo/Videos</h4></legend>
                    <table>
                        <tr>
                            <th><?php echo display('photo');?></th>
                            <td>
                                <input type="file" name="file_select_machin" id="file_select_machin" class="form-control input-sm"/>
                            </td>
                        </tr>
                        <tr>
                            <th><?php echo display('photo_name');?></th>
                            <td>
                                <input type="text" name="picture_name" value="" class="form-control"/>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="text" readonly="readonly" name="lib_file_selected" id="lib_file_selected" class="form-control" />
                                <?php echo anchor_popup('admin/news_post/MyWindow/', 'Library', $nw_img_search); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <br>

                            </td>
                        </tr>

                    </table>
                </fieldset>
            </div>
            <div class="col-lg-4 col-xs-6">
                <fieldset><legend><?php echo display('optional');?></legend>
                    <table>
                        <tr>
                            <th><?php echo display('ref');?>.</th><th>:</th><td><?php echo form_dropdown('reference', $reference_info, $reference, 'class="form-control"'); ?></td>
                            <th><?php echo display('ref_date');?></th><th>:</th><td><input type="text" name="ref_date" value="<?php echo date("d-m-Y", time() + 6 * 60 * 60); ?>" id="datepicker"  class="form-control" /></td>
                        </tr>
                        <tr>
                            <th><?php echo display('videos');?></th><th>:</th><td><input type="text" name="videos" class="form-control" /></td>
                            <th><?php echo display('reporter');?></th><th>:</th><td><input type="text" name="reporter" class="form-control"/></td>
                        </tr>

                    </table>
                </fieldset>
            </div>
        </div>
        <div class="row"></div>
        <div class="row-fluid">
            <fieldset>
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <th>Short Head</th><th>: </th><td><input type="text" name="short_head" class="form-control" value="<?php echo @$stitle; ?>"/></td>
                        <th>Head line</th><th> : </th><td width="66%"><input type="text" name="head_line" value="<?php echo @$title; ?>" style="width:99%;" class="form-control"/></td>
                    </tr>
                </table>
            </fieldset>
        </div>
        <div class="row-fluid">
            <fieldset><legend>Details</legend>
                <table width="100%">
                    <tr>
                        <td><textarea class="ckeditor" name="details_news" id="details_news">
                                <?php echo @$news; ?>
                            </textarea></td>
                    </tr>

                </table>
            </fieldset>
        </div>
        <div class="row-fluid">
            <fieldset>
                <table width="100%">
                    <tr>
                       	<td>
                            <table>
                                <tr>
                                    <td><input type="radio" value="0" name="confirm_dynamic_static" id="confirm_dynamic_static" checked="checked"/> Dynamic post &nbsp;</td>
                                    <td><input type="radio" value="1" name="confirm_dynamic_static" id="confirm_dynamic_static" /> Static post  &nbsp;</td>
                                    <td><input type="checkbox" value="1" name="latest_confirmed" id="latest_confirmed" checked="checked" /> Latest news  &nbsp;</td> 
                                    <td><input type="checkbox" value="1" name="breaking_confirmed" id="breaking_confirmed" /> Breaking news  &nbsp;</td> 
                                    <td><input type="checkbox" value="1" name="send_to_temp" id="send_to_temp"/> Send to temp  &nbsp;</td> 
                                </tr>

                            </table>
                        </td> 
                        <td align="right">
                            <input type="reset" value="Reset" class="btn btn-danger" />
                            <input type="submit" name="" value="Post" class="btn btn-primary" />
                        </td>
                    </tr>

                </table>
            </fieldset>
        </div>
        <?php
        echo form_close();
        ?>

    </section><!-- /.content -->
</aside><!-- /.right-side -->



