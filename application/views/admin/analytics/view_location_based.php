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
      </div>

        <div class="row">
          <div class="col-sm-12">

            <?php 
                $form_attribute = array('method' =>'get','class'=>'form-horizontal');
                echo form_open('admin/User_analytics/location_based/',$form_attribute);
            ?>

              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Select country :</label>

                  <div class="col-sm-8">
                   <select name="country" id="country" onchange="submit()" class="form-control">
                        <option value="">-Select Country-</option>
                        <?php foreach ($country as  $info){?>
                            <option value="<?php echo $info->country; ?>"<?php
                            if ($info->country == @$_GET['country']) {
                                echo'selected';
                            }
                            ?>><?php echo $info->country; ?>
                            </option>
                        <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
                    
            <?php echo form_close();?>
            </div>
        </div>

      
      <div class="row">
        <div class="col-sm-12">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Location Based User Anaylytics</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
                <tr role="row">
                <th class="sorting_asc">Country</th>
                <th class="sorting">City</th>
                <th class="sorting">Ip</th>
                <th class="sorting">News</th>
                <th class="sorting">Date Time</th>
                </tr>
                </thead>

                <tbody>
                <?php foreach($analytics as $info){?>
                  <tr role="row" class="odd">
                    <td ><?php echo $info->country;?></td>
                    <td><?php echo $info->city;?></td>
                    <td><?php echo $info->ip;?></td>
                    <td><?php echo $info->link;?></td>
                    <td><?php echo $info->date_time;?></td>
                  </tr>
                  <?php }?>
                </tbody>
              </table>
              </div></div>
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