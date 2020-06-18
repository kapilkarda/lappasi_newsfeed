

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

        <button class="btn btn-success" onclick="add_menu()"><i class="glyphicon glyphicon-plus"></i><?php echo display('add_menu')?></button>
        <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> <?php echo display('reload')?></button>

        <div class="row">
            <div class="col-md-12">
                <table id="table" class="table table-bordered">
                    <tr class="t_bg">
                        <th align="center">Sl</th>
                        <th align="center"><?php echo display('menu')?></th>
                        <th align="center"><?php echo display('position')?></th>
                        <th align="center"><?php echo display('status')?></th>
                        <th align="center"><?php echo display('setup')?></th>
                        <th colspan="2"><?php echo display('action')?></th>
                    </tr>


                    <?php
                        $sl = 1;
                        foreach ($menu as $value) {             
                    ?>
                        <tr>
                            <th align="center"><?php echo $sl; ?></th>
                            <th align="center"><?php echo $value->menu_name;?></th>
                            <td align="center"><?php echo $value->menu_position;?></td>
                    
                            <td align="center">
                             <a class="label label-warning" href="<?php echo base_url(); ?>admin/Menu/Udate_status/<?php echo $value->menu_id . '/' . $value->status; ?>">
                             <?php echo ($value->status == 0) ? "Unpublish" : "Publish";?>
                             </a>
                            </td>

                            <td align="center">
                                <a class="btn btn-primary" href="<?php echo base_url();?>admin/Menu/Setup_menu_content/<?php echo $value->menu_id?>" > Setup</a>
                            </td>

                            <th width="70"><a onclick="edit_menu(<?php echo $value->menu_id?>)" href="#" ><i class="fa fa-edit fa-2x"></i></a></th>
                            <th width="70"><a onclick="delete_menu(<?php echo $value->menu_id?>)" href="#" ><i class="fa fa-trash-o fa-2x"></i></a></th>
                        </tr>
                        <?php
                        $sl++;
                    }
                    ?>
                </table>
            </div>


            </div>
        </section>
    </aside>
</div>

<script type="text/javascript">

function set_status($id){
    alert(id);
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

function add_menu()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('<?php echo display('add_menu')?>'); // Set Title to Bootstrap modal title
}

function edit_menu(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    var url = "<?php echo site_url('admin/Menu/Edit_data')?>/"+id;
    //Ajax Load data from ajax
    $.ajax({
        url : url,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id"]').val(data.menu_id);
            $('[name="menu_name"]').val(data.menu_name);
            $('[name="position"]').val(data.menu_position);
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
        url = "<?php echo site_url('admin/Menu/Save_menu')?>";
    } else {
        url = "<?php echo site_url('admin/Menu/Menu_update')?>";
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

function delete_menu(id)
{
    if(confirm('Are you sure delete this data?'))
    {
         var url = "<?php echo site_url('admin/Menu/Delete_menu')?>/"+id;
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

function set_menu()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#set_modal').modal('show'); // show bootstrap modal
    $('.modal-title').text('set Menu'); // Set Title to Bootstrap modal title
}


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
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3"><?php echo display('menu_name')?></label>
                            <div class="col-md-9">
                                <input name="menu_name" placeholder="<?php echo display('menu_name')?>" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3"><?php echo display('menu_position')?></label>
                            <div class="col-md-9">
                                <input name="position" placeholder="<?php echo display('menu_position')?>" class="form-control" type="number">
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

      