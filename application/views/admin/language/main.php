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
        <div class="col-md-12">
                <div class="panel panel-default">
                     <div class="panel-heading">
                        <div class="btn-group"> 
                           <a href="<?= base_url('admin/language/phrase') ?>" class="btn btn-info">Add Phrase</a>
                        </div> 
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <!-- language -->
                            <div class="col-sm-12">
                                <table class="table table-striped table-bordered ">
                                    <thead>
                                        <tr>
                                            <td colspan="4">
                                                <?= form_open('admin/language/addlanguage', ' class="form-inline" ') ?> 
                                                    <div class="form-group">
                                                        <label class="sr-only" for="addLanguage"> Add Language Name</label>
                                                        <input name="language" type="text" class="form-control" id="addLanguage" placeholder="Add Language Name">
                                                    </div>
                                                      
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                <?= form_close(); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><i class="fa fa-th-list"></i></th>
                                            <th>Language</th>
                                            <th><i class="fa fa-cogs"></i></th>
                                            <th>Active Status</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php if ($languages!=NULL) {?>
                                            <?php $sl = 1 ?>
                                            <?php foreach ($languages as $key => $language) {?>
                                            <tr>
                                                <td><?= $sl++ ?></td>
                                                <td><?= $language ?></td>
                                                <td><a href="<?= base_url("admin/language/editPhrase/$key") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>  
                                                <td><a href="<?= base_url("admin/language/switch_lang/$language") ?>" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-<?php echo $active_lang->language==strtolower($language)?'ok':'remove';?>"></i></a> 
                                                   
                                                </td> 
                                            </tr>
                                            <?php } ?>
                                        <?php } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    </section><!-- /.content -->
</aside><!-- /.right-side -->



