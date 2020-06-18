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
                    <a class="btn btn-success" href="<?= base_url('admin/language/phrase') ?>"> <i class="fa fa-plus"></i> Add Phrase</a>
                    <a class="btn btn-primary" href="<?= base_url('admin/language') ?>"> <i class="fa fa-list"></i>  Language List </a> 
                </div> 
            </div>
            <div class="panel-body">
                <div class="row">
                    <!-- phrase -->
                    <div class="col-sm-12">
                        <?= form_open('admin/language/addlebel') ?>
                        <table class="table table-striped">
                            <thead> 
                                <tr>
                                    <th><i class="fa fa-th-list"></i></th>
                                    <th>Phrase</th>
                                    <th>Label</th> 
                                </tr>
                            </thead>

                            <tbody>
                                <?= form_hidden('language', $language) ?>
                                    <?php if (!empty($phrases)) {?>
                                        <?php $sl = 1 ?>
                                        <?php foreach ($phrases as $value) {?>
                                        <tr class="<?= (empty($value->$language)?"bg-danger":null) ?>">
                                        
                                            <td width="2%"><?= $sl++ ?></td>
                                            <td><input type="text" name="phrase[]" value="<?= $value->phrase ?>" class="form-control" readonly></td>
                                            <td><input type="text" name="lang[]" value="<?= $value->$language ?>" class="form-control"></td> 
                                        </tr>
                                        <?php } ?>
                                    <?php } ?>

                                    <tfoot>
                                        <tr>
                                            <td colspan="2"> 
                                                <button type="reset" class="btn btn-danger">Reset</button>
                                                <button type="submit" class="btn btn-success">Save</button>
                                            </td>
                                            <td colspan="2">
                                                <?php echo (!empty($links)?$links:null) ?>
                                            </td>
                                        </tr>
                                    </tfoot>
                            </tbody>
                            <?= form_close() ?>
                        </table>
                    </div> 
                </div>
            </div>
        </div>
    </section>
</aside>