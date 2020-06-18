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
        <div class="row">
            <div class="col-sm-12">

        <!-- alert message -->
            <?php if ($this->session->flashdata('message') != null) {  ?>
            <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo $this->session->flashdata('message'); ?>
            </div> 
            <?php } ?>

            <?php if ($this->session->flashdata('exception') != null) {  ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo $this->session->flashdata('exception'); ?>
            </div>
            <?php } ?>

            <?php if (validation_errors()) {  ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo validation_errors(); ?>
            </div>
            <?php } ?>
                
            </div>
        </div>
        <br/>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="btn-group"> 
                    <a href="<?= base_url('admin/language') ?>" class="btn btn-info"><i class="fa fa-list"></i>  Language List</a>
                </div> 
            </div>

            <div class="panel-body">
                <div class="row">
                    <!-- phrase -->
                    <div class="col-sm-12">
                      <table class="table table-striped">
                        <thead>
                            <tr>
                                <td colspan="2">
                                    <?= form_open('admin/language/addPhrase', ' class="form-inline" ') ?> 
                                         <div class="form-group">
                                            <label class="sr-only" for="addphrase"> Phrase Name</label>
                                            <input name="phrase[]" type="text" class="form-control" id="addphrase" placeholder="Phrase Name">
                                        </div>
                                          
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    <?= form_close(); ?>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="fa fa-th-list"></i></th>
                                <th>Phrase</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($phrases)) {?>
                                <?php $sl = 1 ?>
                                <?php foreach ($phrases as $value) {?>
                                <tr>
                                    <td><?= $sl++ ?></td>
                                    <td><?= $value->phrase ?></td>
                                </tr>
                                <?php } ?>
                            <?php } ?>
                        </tbody>

                        <tfoot>
                            <tr><td colspan="2"><?php echo (!empty($links)?$links:null) ?></td></tr>
                        </tfoot>
                      </table>
                    </div>

                </div>
            </div>
        </div>
    </section>
</aside><!-- /.right-side -->
