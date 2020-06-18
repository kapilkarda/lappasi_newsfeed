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
        <h4>Live Now! User Analytics</h4>
      </div>

      <div class="row">
        <div class="col-md-6">
          <!-- AREA CHART -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Right Now Users</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
             <div class="small-box bg-yellow">
            <div class="inner">
              <h3 style="font-size: 40px;"><?php echo $total_user;?></h3>
              <p>Right Now Users </p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


          <!-- AREA CHART -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">URL</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <table class="table table-condensed">
                <tbody>
                <tr>
                  <th>Url Link</th>
                  <th>User</th>
                </tr>
                <?php foreach($url as $info){?>
                <tr>
                  <td><?php echo $info->link; ?></td>
                  <td><?php echo $info->total_link_user; ?></td>
                </tr>
                <?php }?>
              </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>

          <!-- /.box -->
        </div>


        <!-- /.col (LEFT) -->
        <div class="col-md-6">
          <!-- AREA CHART -->
          <div class="box box-primary">

            <div class="box-header with-border">
              <h3 class="box-title">User Location</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>


            <div class="box-body chart-responsive">
              <table class="table table-condensed">
                <tbody>
                <tr>
                  <th><?php echo display('location');?></th>
                  <th>Max user</th>
                </tr>
                <?php foreach($user_country as $info){?>
                <tr>
                  <td><?php echo $info->country; ?></td>
                  <td><?php echo $info->total_country_user; ?></td>
                </tr>
                <?php }?>
              </tbody>
              </table>
            </div>
        </div>


        <!-- AREA CHART -->
        <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">User Agent</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <table class="table table-condensed">
                <tbody>
                <tr>
                  <th>Browser</th>
                  <th><?php echo display('user')?></th>
                </tr>
                <?php foreach($browser as $info){?>
                <tr>
                  <td><?php echo $info->browser; ?></td>
                  <td><?php echo $info->total_browser_user; ?></td>
                </tr>
                <?php }?>
              </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>

        <!-- /.col (RIGHT) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
</aside><!-- /.right-side -->