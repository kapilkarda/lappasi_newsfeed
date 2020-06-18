<?php
$user_type = $this->session->userdata('user_type');

    if(($user_type==3) || ($user_type==4)) {
        $this->load->view('admin/view_left_menu'); 
    } else{  
        $this->load->view('admin/user_left_menu_view.php');
    }
?>

<aside class="right-side">
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      
       <?php if($this->session->flashdata('message')!=NULL){?>
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Success!</h4>
        <?php echo $this->session->flashdata('message');?>
      </div>
      <?php }?>
      
      <div class="row">
        <div class="col-sm-12">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php echo display('subscribers_list');?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
          
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr role="row">
                <th class="sorting_asc"><?php echo display('user_name');?></th>
                <th class="sorting"><?php echo display('email');?></th>
                <th class="sorting"><?php echo display('phone');?></th>
                <th class="sorting"><?php echo display('action');?></th>
                </tr>
                </thead>

                <tbody>
                <?php foreach($subscription as $info){?>
                  <tr role="row" class="odd">
                    <td ><?php echo $info->name;?></td>
                    <td><?php echo $info->email;?></td>
                    <td><?php echo $info->phone;?></td>
                    <td>  
                        <a href="<?php echo base_url()?>admin/Subscriber_manage/delete/<?php echo $info->subs_id;?>"><span class="label label-danger" ><i class="fa fa-trash-o"></i><span class="label label-danger" ></a>
                    </td>
                  </tr>
                  <?php }?>
                </tbody>
              </table>
                  <div class="row">
                  <div class="col-sm-5">
                  </div>
                  <div class="col-sm-7"><?php echo @$links;?></div>
                  </div>
            
            </div>
            <!-- /.box-body -->
          </div>
          </div>

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
</aside><!-- /.right-side -->