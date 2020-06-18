<?php
$user_id = $this->session->userdata('id');
$user_type = $this->session->userdata('user_type');
if (($user_type == 3) || ($user_type == 4)) {
    $this->load->view('admin/view_left_menu.php');
} else if($user_type==2){
    $this->load->view('admin/user_left_menu_view.php');
}else if($user_type==1){
    $this->load->view('admin/modaretor_left_menu_view.php');
}
?>
<style type="text/css">
    .icheckbox_minimal {
    background-position: 0 0;
    border: 2px solid #22a436;
}
</style>
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
                 <div class="modal-body form">
              
                    <ul class="nav nav-tabs" style="border-bottom: 1px solid #70af40;">
                        <li class="active"><a href="#Category"><?php echo display('category')?></a></li>
                        <li><a href="#Pages"><?php echo display('add_page')?></a></li>
                        <li><a href="#Link"><?php echo display('link')?></a></li>
                    </ul>

                  <div class="tab-content">

                    <div id="Category" class="tab-pane fade in active">
                    <a style="margin-top: 10px;"  class="btn btn-success" href="<?php echo base_url();?>add_category"><i class="glyphicon glyphicon-plus"></i> <?php echo display('add_category')?></a>
                        <?php 
                            $attributes = array( 'class' => 'form-horizontal','method'=>'post');
                            echo form_open_multipart('admin/Menu/Save_content_menu', $attributes);
                        ?>
                      <h3><?php echo display('category')?></h3>

                        <?php foreach($categories as $cata){?>
                              <label style="padding: 8px;"><input type="checkbox" name="content_id[]"  value="<?php echo $cata->category_id?>"> <?php echo $cata->category_name?></label>&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php }?>
                        
                        <input type="hidden" value="<?php echo $menu_id?>" name="menu_id">
                        <input type="hidden" value="categories" name="content_type">

                        <div class="">
                            <button type="submit" class="btn btn-primary"><?php echo display('save')?></button>
                        </div>
                        <?php echo form_close();?>
                    </div><hr>

                    <!--page menu -->
                    <div id="Pages" class="tab-pane fade">
                        <a style="margin-top: -20px" class="btn btn-success" href="<?php echo base_url()?>admin/Page/Create_new_page"><i class="glyphicon glyphicon-plus"></i> <?php echo display('add_page')?></a>
                        <?php 
                            $attributes = array( 'class' => 'form-horizontal','method'=>'post');
                            echo form_open_multipart('admin/Menu/Save_page_content_menu', $attributes);
                        ?>
                      <h3>Pages</h3>

                        <?php foreach($page as $page_value){?>
                              <label style="padding: 8px;"><input type="checkbox" name="content_id[]" value="<?php echo $page_value->page_id?>"> <?php echo $page_value->title?></label>&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php }?>
                        
                        <input type="hidden" value="<?php echo $menu_id?>" name="menu_id">
                        <input type="hidden" value="pages" name="content_type">

                        <div class="">
                            <button type="submit" class="btn btn-primary"><?php echo display('save')?></button>
                        </div><hr>
                        <?php echo form_close();?>
                    </div>


                    <!-- link menu -->
                    <div id="Link" class="tab-pane fade">
                        <button style="margin-top: -20px"  class="btn btn-success" onclick="add_link(<?php echo $menu_id?>)"><i class="glyphicon glyphicon-plus"></i> <?php echo display('addnewlink')?></button>
                            <?php 
                                $attributes = array( 'class' => 'form-horizontal','method'=>'post');
                                echo form_open_multipart('admin/Menu/Add_link_with_content', $attributes);
                            ?>

                        <div class="" style="padding: 20px;">
                            <?php
                                foreach ($link_info as $link) {  
                                    echo'<label style="padding: 8px;"><input type="checkbox" name="content_id[]" value="'.$link->link_id.'"> '.$link->link_level.'</label>&nbsp;&nbsp;&nbsp;&nbsp'; 
                                }          
                            ?>
                            <input type="hidden" value="<?php echo $menu_id?>" name="menu_id">
                        <div class="">
                            <button type="submit" class="btn btn-primary"><?php echo display('save')?></button>
                        </div>
                            <?php echo form_close();?>
                        </div>
                    </div>

                </div>
            </div>
        </div>

 
        <?php 
            $attributes = array('method'=>'post','id'=>'fff');
            echo form_open('',$attributes)
        ?>
            <div class="col-sm-6" id="sortable">
                <?php
                    $sl = 1;
                    foreach ($menu_content as $value) {            
                ?>         
                  <div class="col-sm-12" style=" cursor: move;  border: 3px double #EAEAEA; padding: 10px; background-color:#ddd; font-size: 20px;">
                    <div class="col-sm-6">
                        <?php echo $value->menu_lavel?>
                    </div>

                    <div class="col-sm-6" style="text-align: right;">
                      <a class="btn-primary btn" onclick="edit_menu(<?php echo $value->menu_content_id?>)" href="#" ><i class="fa fa-edit fa-x"></i></a>
                      <a class="btn btn-danger" onclick="delete_menu(<?php echo $value->menu_content_id?>)" href="#" ><i class="fa fa-trash-o fa-x"></i></a>
                    </div>
                    <input type="hidden" value="<?php echo $value->menu_content_id;?>" name="id[]">
                  </div>
                <?php
                    $sl++;
                    }
                ?>
              <a style="margin-top: 15px;" class="btn btn-success" onclick="ContentPositionUpdate()"><?php echo display('update')?></a>
            </div>
         <?php echo form_close();?>
    
            </div>
        </section>
    </aside>
</div>


<script type="text/javascript">

$(function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
});

function ContentPositionUpdate(){
    var url = "<?php echo site_url('admin/Menu/DragDrop_update')?>";
    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#fff').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            if(data) //if success close modal and reload ajax table
            {
                
                $('#modal_form').modal('hide');
                reload_table();
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error  update data');
        }
    });
}

function set_status($id){
     var url = "<?php echo site_url('admin/Menu/Udate_status')?>/"+id;
        // ajax delete data to database
        $.ajax({
            url : url,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });
}


function add_link(id)
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('[name="menu_id"]').val(id);
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('<?php echo display('addnewlink')?>'); // Set Title to Bootstrap modal title
}


function edit_menu(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    var url = "<?php echo site_url('admin/Menu/Content_menu_data')?>/"+id;
    //Ajax Load data from ajax
    $.ajax({
        url : url,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id"]').val(data.menu_content_id);
            $('[name="lavel"]').val(data.menu_lavel);
            $('[name="slug"]').val(data.slug);
            $('[name="position"]').val(data.menu_position);
            $('[name="link"]').val(data.link_url);
            $('select[name="parent_id"]').val(data.parents_id);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('<?php echo display('edit_menu')?>'); // Set title to Bootstrap modal title
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}


function reload_table()
{
    window.location.reload()
}

//============================================================
function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;
    if(save_method == 'add') {
        url = "<?php echo site_url('admin/Menu/Save_link')?>";
    } else {
        url = "<?php echo site_url('admin/Menu/Content_menu_update')?>";
    }
    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
            }

            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}

// delete menu
function delete_menu(id)
{
    if(confirm('Are you sure delete this data?'))
    {
         var url = "<?php echo site_url('admin/Menu/Delete_content_menu')?>/"+id;
        // ajax delete data to database
        $.ajax({
            url : url,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
}

$(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });


});
</script>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Form</h3>
            </div>

            <div class="modal-body form">
              
                <?php 
                    $attributes = array( 'class' => 'form-horizontal','id'=>'form','method'=>'post');
                    echo form_open_multipart('#', $attributes);
                ?>
                    <input type="hidden" value="" name="id"/> 
                    <input type="hidden" name="content_type" value="link">
                    <input type="hidden" name="menu_id" value="">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3"><?php echo display('menu_level')?></label>
                            <div class="col-md-9">
                                <input name="lavel" placeholder="Menu Lavel" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3"><?php echo display('slug')?></label>
                            <div class="col-md-9">
                                <input name="slug" disabled class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3"><?php echo display('menu_position')?></label>
                            <div class="col-md-9">
                                <input name="position" placeholder="Menu Position" class="form-control" type="number">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3"><?php echo display('link')?></label>
                            <div class="col-md-9">
                                <input name="link" placeholder="Menu Link" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3"><?php echo display('parents')?></label>
                            <div class="col-md-9">
                                <select name="parent_id" class="form-control">
                                    <option value="">--Select--</option>
                                <?php foreach($menu_content as $cata){?>
                                    <option value="<?php echo $cata->menu_content_id?>"><?php echo $cata->menu_lavel?></option>
                                <?php }?>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                <?php echo form_close();?>
            </div>

            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary"><?php echo display('save')?></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo display('close')?></button>
            </div>
        </div>
    </div>
</div>
