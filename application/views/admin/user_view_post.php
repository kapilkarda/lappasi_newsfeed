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
        include('common_file/array_file.php');
        $home_page = (isset($home_page)) ? $home_page : 0;
        $other_position = (isset($other_position)) ? $other_position : 1;
        $attributes = array('class' => 'myform', 'id' => 'myform', 'onsubmit' => 'return FormValidation()');
        echo form_open_multipart('admin/News_post/post', $attributes);
    ?>

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
        <div class="col-lg-3 col-xs-6 form-inline">
             <fieldset><legend><h4><?php echo display('postposition');?></h4></legend>
                <table>
                    <tr>
                        <td><?php echo display('home');?></td>
                        <td><?php echo form_dropdown('home_page', $home_position, $home_page, 'class="form-control"'); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo display('category');?></td>
                        <td>
                        <select name="other_page" class="other_page form-control">
                            <option value="0">--select--</option>
                            <?php 
                                foreach ($cat as $key => $value) {
                                    echo '<option value="'.$value->slug.'">'.$value->category_name.'</option>';
                                }
                            ?>
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo display('position');?></td>
                        <td>
                            <?php echo form_dropdown('other_position', $other_positions, $other_position, 'class="other_position form-control"'); ?>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </div>

            <div class="col-lg-4 col-xs-6">
                <fieldset><legend><h4><?php echo display('photovideos');?></h4></legend>
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
                                <?php echo anchor_popup('admin/News_post/my_window/', 'Library', $nw_img_search); ?>
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </div>

            <div class="col-lg-5 col-xs-6">
                <fieldset><legend><?php echo display('optional');?></legend>
                    <table>
                        <tr>
                           <th><?php echo display('ref');?>.</th><th>:</th><td><input type="text" name="reference" class="form-control"></td>
                            <th><?php echo display('post_date');?></th><th>:</th><td><input type="text" name="ref_date" value="<?php echo date("d-m-Y", time() + 6 * 60 * 60); ?>" id="datepicker"  class="form-control" /></td>
                        </tr>

                        <tr>
                            <th><?php echo display('video_url');?></th><th>:</th><td><input type="text" name="videos" class="form-control" /></td>
                            <th><?php echo display('reporter');?></th><th>:</th><td><input type="text" name="reporter" class="form-control"  /></td>
                        </tr>
                        <tr>
                          <th> <?php echo display('publish_date');?></th><th>:</th><td><input type="text" name="publish_date" value="<?php echo date("Y-m-d", time() + 6 * 60 * 60); ?>" class="form-control datepicker" /></td>
                        </tr>
                    </table>
                </fieldset>
            </div>
        </div>

        <div class="row"></div>
        <div class="row-fluid" style="margin-top:20px;">
            <fieldset><legend><?php echo display('news_title');?></legend>
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <th><?php echo display('short_head');?></th><th>: </th><td><input type="text" name="short_head" class="form-control"/></td>
                        <th><?php echo display('head_line');?></th><th> : </th><td width="66%"><input type="text" name="head_line" style="width:99%;" class="form-control"/></td>
                    </tr>
                </table>
            </fieldset>
        </div>
        
        <div class="row-fluid">
            <fieldset><legend><?php echo display('details');?></legend>
                <table width="100%">
                    <tr>
                        <td>
                            <textarea id="details_news" name="details_news" rows="10" cols="80"></textarea>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </div>
        
   
        <div class="row" style="margin: 10px;"></div>
        <div class="row-fluid">
            <fieldset>
                <legend> <?php echo display('keyword_and_description_area');?></legend>
                <table width="100%">
                    <tr>
                        <td colspan="2">
                            <?php echo display('keyword');?>: <input name="meta_keyword" id="tags" class="form-control" />
                           <?php echo display('description');?>:<textarea class="form-control" name="meta_description"><?php echo @$seo_info['meta_description']; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table>
                                <tr>
                                    <td>
                                        <input type="radio" value="0" name="confirm_dynamic_static" id="confirm_dynamic_static" checked="checked"/> <?php echo display('dynamic_post');?> &nbsp;
                                    </td>
                                    <td>
                                        <input type="radio" value="1" name="confirm_dynamic_static" id="confirm_dynamic_static" /> <?php echo display('static_post');?>  &nbsp;
                                    </td>
                                    <td>
                                        <input type="checkbox" value="1" name="latest_confirmed" id="latest_confirmed" checked="checked" /> <?php echo display('latest_news');?> &nbsp;
                                    </td> 
                                    <td>
                                        <input type="checkbox" value="1" name="breaking_confirmed" id="breaking_confirmed" /> <?php echo display('breaking_news');?>  &nbsp;
                                    </td> 
                                    <td>
                                        <input type="checkbox" value="1" name="send_to_temp" id="send_to_temp"/> Send to temp  &nbsp;
                                    </td>
                                    <td>
                                        <input type="checkbox" value="1" name="status_confirmed" id="status_confirmed" checked="checked" /><?php echo display('status');?> &nbsp;
                                    </td> 
                                </tr>

                            </table>  
                        </td>
                        <td align="right">
                            <input type="reset" value="<?php echo display('reset');?>" class="btn btn-danger" />
                            <input type="submit" name="" value="<?php echo display('post');?>" class="btn btn-primary" />
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



