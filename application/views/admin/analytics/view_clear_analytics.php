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
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <div class="callout bg-green">
          <h4> Do you want to delete all analytics data? </h4>
      </div>

      <?php if($this->session->flashdata('message')!=NULL){?>
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Success!</h4>
        Analytics Deleted Successfully 
      </div>
      <?php }?>

    <div class="row">

        <div class="col-md-3"> 
            <a  class="btn btn-warning btn-lg cache_modal" href="<?php echo base_url();?>admin/User_analytics/delete">
                  <?php echo display('clear_analytics');?>
            </a>
        </div>

        <div class="col-md-3"> 

        <?php $an = json_decode(@$status); 
       
        if(@$an->user_analytics=='active'){?>
            <a  class="btn btn-danger btn-lg cache_modal" href="<?php echo base_url();?>admin/User_analytics/analytics_status/<?php echo @$an->user_analytics?>">
               
                  <?php echo display('disable_analytics');?>
            </a>
            <?php } else{?>
             <a  class="btn btn-success btn-lg cache_modal" href="<?php echo base_url();?>admin/User_analytics/analytics_status/<?php echo @$an->user_analytics;?>">
                 <?php echo display('anable_analytics');?>
            </a>
            <?php }?>

        </div>

      </div>

    </section>
    <!-- /.content -->
  </div>
</aside>