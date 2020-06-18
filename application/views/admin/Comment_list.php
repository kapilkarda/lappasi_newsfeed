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
        if ($this->session->flashdata('message')) {
            echo '<div class="alert alert-success"><button class="close" data-dismiss="alert">&times;</button><b>';
            echo $this->session->flashdata('message');
            echo '</b></div>';
        }
    ?>
        <fieldset><legend><?php echo display('comment_list')?></legend>   
            <table class="table table-bordered table-hover">
                <tr>
                    <th><?php echo display('sl');?></th>
                    <th><?php echo display('name');?></th>
                    <th><?php echo display('email');?></th>
                    <th><?php echo display('comments');?></th>
                    <th><?php echo display('news_id');?></th>
                    <th><?php echo display('status');?></th>
                    <th><?php echo display('action');?></th>
                </tr>

            <?php
                $sl = 1;
                foreach ($comments as $row) {
            ?>
                    <tr>
                        <th><?php echo $sl; ?></th>
                        <td> <?php echo $row->name;?></td>
                        <th><?php echo $row->email;?></th>
                        <td><?php 
                         $exp_data = implode(' ', array_slice(explode(' ', $row->comments), 0, 15));
                        echo $exp_data;
                        ?></td>
                        <td><?php echo $row->news_id;?></td>
                        <td>
                        <?php  if($row->com_status==1){;?>
                        <span class="label label-success">  <?php echo display('approved');?></span>
                        <?php  }else{?>
                        <span class="label label-warning"><?php echo display('pending');?></span>
                        <?php  }?>
                        </td>

                        <td style="width: 100px;">
                            <a href="#" onclick="viewInfo('<?php echo $row->com_id ?>')">
                        <span class="label label-info" ><i class="fa fa-eye" aria-hidden="true"></i></span>
                        </a>

                         <?php  if($row->com_status==1){;?>
                         <a href="<?php echo base_url()?>admin/Comments_manage/un_varifid/<?php echo $row->com_id;?>">
                        <span class="label label-success" > <i class="fa fa-check" aria-hidden="true"></i></span>
                        </a>
                        <?php  }else{?>
                        <a href="<?php echo base_url()?>admin/Comments_manage/varifid/<?php echo $row->com_id;?>">
                        <span class="label label-danger" ><i class="fa fa-times" aria-hidden="true"></i></span>
                        </a>
                        <?php  }?>
                           
                             <a href="<?php echo base_url()?>admin/Comments_manage/delete_comments/<?php echo $row->com_id;?>"><span class="label label-danger" ><i class="fa fa-trash-o"></i><span class="label label-danger" ></a>
                        </td>
                    
                    </tr>
                <?php
                    $sl++;
                    }
                ?>
            </table>
        </fieldset>   

        <?php echo $links; ?> 
    </section>


</aside>

<script type="text/javascript">
    function viewInfo(id) {
       
        var url = "<?php echo site_url('admin/Comments_manage/get_com_by_id')?>/"+id;
        //Ajax Load data from ajax
        $.ajax({
            url : url,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {                
                $('#info').text(data.comments);
                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });  

    }
    //Comment form submit by ajax end
</script>

<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title"><?php echo display('comments');?></h3>
            </div>

            <div class="modal-body form">
                <div class="form-body">
                    <p id="info"></p>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo display('close')?></button>
            </div>
        </div>
    </div>
</div>


